<?php
try {
    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=5ademni;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Active le mode d'erreur PDO exception
} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Traitement de l'envoi de message texte
if (isset($_POST['valider'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['message'])) {
        // Récupération des données du formulaire
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $message = nl2br(htmlspecialchars($_POST['message']));

        // Préparation et exécution de la requête SQL pour insérer le message dans la base de données
        $insererMessage = $bdd->prepare('INSERT INTO message(pseudo, message, timestamp) VALUES(?, ?, NOW())');
        $insererMessage->execute(array($pseudo, $message));

        // Affichage d'une notification pour indiquer que le message a été ajouté
        echo '<script>notifyNewMessage("Nouveau message ajouté : ' . $message . '");</script>';
    } else {
        // Si des champs sont manquants, affichage d'un message d'erreur
        echo "Veuillez compléter tous les champs...";
    }
}

// Traitement de l'envoi de message vocal
if (isset($_FILES['audio']) && !empty($_FILES['audio']['tmp_name'])) {
    // Déplacement du fichier audio vers un emplacement de stockage approprié
    $audioFile = $_FILES['audio']['tmp_name'];
    $destination = 'chemin/vers/dossier/audio/' . $_FILES['audio']['name'];
    move_uploaded_file($audioFile, $destination);

    // Insérer le chemin du fichier audio dans la base de données
    $audioPath = $_FILES['audio']['name'];
    $insertQuery = $bdd->prepare('INSERT INTO message (pseudo, message, timestamp) VALUES (?, ?, NOW())');
    $insertQuery->execute(['', $audioPath]);
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Messagerie instantanée</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojione/3.1.2/assets/css/emojione.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojione/3.1.2/lib/js/emojione.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 20px;
        }

        .chat-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .message-container {
            max-height: 300px;
            overflow-y: auto;
            padding: 10px;
            margin-bottom: 20px;
        }

        .message {
            background-color: #e6e6e6;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .message h4 {
            margin: 0;
            color: #333;
            font-size: 16px;
        }

        .message p {
            margin: 5px 0;
            color: #666;
        }

        .message-form input,
        .message-form textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .message-form button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .message-form button:hover {
            background-color: #0056b3;
        }

        #emoji-list {
            display: none;
            margin-top: 10px;
        }

        .emoji {
            cursor: pointer;
            font-size: 20px;
            margin-right: 5px;
        }

        .emoji-btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 20px;
        }

        .logo {
            margin-left: 5px;
            font-size: 20px;
        }

        .dark-theme {
            background-color: #333;
            color: #fff;
        }

        #icon {
            width: 30px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <img src="../../front_office/images/moon.png" id="icon">
    <div class="chat-container">
        <section id="messages" class="message-container"></section>
        <form id="message-form" class="message-form" method="POST" action="" enctype="multipart/form-data">
            <input type="text" name="pseudo" placeholder="Votre pseudo">
            <textarea id="message" name="message" placeholder="Votre message"></textarea>
            <button type="submit" name="valider">Envoyer</button>
            <!-- Ajoutez un bouton pour l'enregistrement vocal -->
            <input type="file" accept="audio/*" capture="microphone" name="audio" style="display: none;">
            <button type="button" id="record-button">Enregistrer audio</button>
            <!-- Ajoutez un élément audio pour la lecture du message vocal -->
            <audio id="audio-preview" controls style="display: none;"></audio>
        </form>
        <!-- Liste d'emojis -->
        <div id="emoji-list">
            <span class="emoji">😊</span>
            <span class="emoji">❤️</span>
            <span class="emoji">👍</span>
            <!-- Ajoutez d'autres emojis ici -->
        </div>
        <button type="button" id="emoji-btn" class="emoji-btn">😊</button>
    </div>
    <script>
        var icon = document.getElementById("icon");
        icon.onclick = function() {
            document.body.classList.toggle("dark-theme");
            if (document.body.classList.contains("dark-theme")) {
                icon.src = "../../front_office/images/sun.png";
            } else {
                icon.src = "../../front_office/images/moon.png";
            }
        }

        $(document).ready(function() {
            // Afficher/masquer la liste d'emojis
            $('#emoji-btn').click(function() {
                $('#emoji-list').toggle();
            });

            // Sélectionner un emoji de la liste
            $('.emoji').click(function() {
                var emoji = $(this).text();
                var messageInput = $('#message');
                var currentMessage = messageInput.val();
                var newMessage = currentMessage + emoji;
                messageInput.val(newMessage);
            });

            // Définir les variables pour l'enregistrement audio
            let mediaRecorder;
            let chunks = [];

            // Obtenir l'accès au microphone
            navigator.mediaDevices.getUserMedia({
                    audio: true
                })
                .then(function(stream) {
                    // Créer un enregistreur audio à partir du flux audio
                    mediaRecorder = new MediaRecorder(stream);

                    // Événement lorsqu'un segment d'audio est disponible
                    mediaRecorder.ondataavailable = function(e) {
                        chunks.push(e.data);
                    };

                    // Événement lors de l'arrêt de l'enregistrement
                    mediaRecorder.onstop = function() {
                        // Créer un objet Blob à partir des segments audio enregistrés
                        let audioBlob = new Blob(chunks, {
                            type: 'audio/wav'
                        });
                        chunks = [];

                        // Créer une URL pour le Blob audio
                        let audioURL = URL.createObjectURL(audioBlob);

                        // Mettre à jour l'élément audio avec l'URL
                        $('#audio-preview').attr('src', audioURL).show();

                        // Envoyer le fichier audio au serveur (à implémenter)
                        sendAudioToServer(audioBlob);
                    };
                })
                .catch(function(err) {
                    console.log('Erreur lors de l\'accès au microphone : ' + err);
                });

            // Gérer le clic sur le bouton d'enregistrement
            $('#record-button').click(function() {
                // Vérifier si l'enregistreur audio est disponible
                if (mediaRecorder && mediaRecorder.state === 'inactive') {
                    // Commencer l'enregistrement
                    mediaRecorder.start();
                    console.log('Enregistrement audio en cours...');
                } else if (mediaRecorder && mediaRecorder.state === 'recording') {
                    // Arrêter l'enregistrement
                    mediaRecorder.stop();
                    console.log('Arrêt de l\'enregistrement audio.');
                }
            });

            // Fonction pour envoyer le fichier audio au serveur
            function sendAudioToServer(audioBlob) {
                // Code AJAX pour envoyer le fichier audio au serveur (à implémenter)
                // Vous devez envoyer le fichier audioBlob via une requête POST au serveur
            }

            // Fonction pour charger les messages depuis loadMessages.php
            function loadMessages() {
                $('#messages').load('loadMessages.php');
            }

            // Demander la permission pour afficher les notifications
            function requestNotificationPermission() {
                if (Notification.permission !== "granted" && Notification.permission !== "denied") {
                    Notification.requestPermission().then(function(permission) {
                        if (permission === "granted") {
                            console.log("Notifications autorisées.");
                        } else {
                            console.log("Notifications refusées.");
                        }
                    });
                }
            }

            // Charge les messages toutes les 500 ms
            setInterval(loadMessages, 500);

            // Demander la permission pour afficher les notifications lors du chargement de la page
            requestNotificationPermission();
        });
    </script>
</body>

</html>