function convertEmoji(shortcode) {
    // Dictionnaire des correspondances shortcode - image emoji
    var emojiMap = {
        ':\\)': '😊',   // Utilisation de '\\)' pour échapper le caractère ')'
        '<3': '❤️',
        '<\\/': '👍',   // Utilisation de '<\\/' pour échapper le caractère '</'
        // Ajoutez d'autres correspondances ici
    };

    // Remplacez les shortcodes par les images emoji correspondantes
    var convertedMessage = shortcode;
    for (var key in emojiMap) {
        if (emojiMap.hasOwnProperty(key)) {
            var regex = new RegExp(key, 'gi');  // Utilisation de 'gi' pour correspondre globalement et insensiblement à la casse
            convertedMessage = convertedMessage.replace(regex, emojiMap[key]);
        }
    }

    return convertedMessage;
}
