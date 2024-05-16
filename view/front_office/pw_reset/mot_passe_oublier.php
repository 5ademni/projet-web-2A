<?php
session_start();


require_once '../../../auth/config.php'; //config file

require_once '../../../controller/adminC.php';

// Include PHPMailer autoloader
require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Define variables to store form input and error messages
$email = $email_error = "";
$success_message = $error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if (empty($_POST["email"])) {
        $email_error = "L'e-mail est requis";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Format d'email invalide";
        }
    }

    // If there are no errors, proceed to send reset link
    if (empty($email_error)) {
        // Instantiate UserController
        $userController = new adminC();
        // Check if email exists in database
        $user = $userController->getUserByEmail($email);
        if ($user) {
            // Generate and store password reset token
            $token = bin2hex(random_bytes(16)); // Generate a random token
            $userController->updateResetToken($email, $token);

            // Send password reset link via email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'mohamedmalek.hammami8@gmail.com'; // Your Gmail username
                $mail->Password = 'vmrp zyva odds efpu'; // Your Gmail password
                $mail->SMTPSecure = 'ssl';
                $mail->Port =  465;

                //Recipients
                $mail->setFrom('5ademni@esprit.tn', '5ademni'); // Replace with your name and email
                $mail->addAddress($email); // Add a recipient

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Reinitialisation du mot de passe';
                $mail->Body = 'Cliquez sur le lien suivant pour réinitialiser votre mot de passe : <a href="http://localhost:8011/projet-web-2A/View/front_office/pw_reset/pwd_reset.php?email=' . urlencode($email) . '&token=' . urlencode($token) . '">Réinitialiser le mot de passe</a>';


                $mail->send();
                $success_message = "Lien de réinitialisation du mot de passe envoyé à votre adresse e-mail.";
            } catch (Exception $e) {
                $error_message = "Erreur lors de l'envoi du lien de réinitialisation du mot de passe: {$mail->ErrorInfo}";
            }
        } else {
            $error_message = "Adresse e-mail introuvable.";
        }
    }
}

// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/custom-style.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/sparchnova.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <main class="login-body" data-vide-bg="assets/img/login-bg.mp4">

        <form class="form-default" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="login-form">
                <div class="logo-login">
                    <a href="index.php"><img src="assets/img/logo/loader.png" alt=""></a>
                </div>
                <h2>forgot password</h2>
                <?php if ($success_message) : ?>
                    <p style="color: green;"><?php echo $success_message; ?></p>
                <?php endif; ?>
                <?php if ($error_message) : ?>
                    <p style="color: red;"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <div class="form-input">
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" placeholder="email"><br>
                    <span style="color: red;"><?php echo $email_error; ?></span><br>
                </div>
                <div class="form-input pt-30">
                    <input type="submit" value="valider">
                </div>
            </div>
        </form>
    </main>

    <!-- JS here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Video bg -->
    <script src="./assets/js/jquery.vide.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>

<style>
    /* Styles for the reset password form */
    .form-default {
        max-width: 400px;
        margin: 0 auto;
        padding: 40px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .form-default h2 {
        margin-bottom: 30px;
        text-align: center;
        color: #333;
    }

    .form-default label {
        font-weight: bold;
    }

    .form-default input[type="text"],
    .form-default input[type="email"],
    .form-default input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-default input[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-default input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    .success-message {
        color: green;
        font-size: 14px;
        margin-top: 5px;
    }
</style>