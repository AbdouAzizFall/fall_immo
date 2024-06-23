function showMessage() {
    const messageElement = document.getElementById('message');
    messageElement.style.display = 'block'; // Afficher le message

    // Masquer le message après 3 secondes (3000 millisecondes)
    setTimeout(() => {
        messageElement.style.display = 'none'; // Masquer le message
    }, 3000);
}

showMessage();

function confirmation(){
    return confirm('Voulez-vous supprimer ce produit ?');
}