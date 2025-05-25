function cacher() {
    const mdp = document.getElementById("password");
    const confirm = document.getElementById("confirm");
    const bouton = document.querySelector(".bouton2");

    if (mdp.type === "password") {
        mdp.type = "text";
        if (confirm) confirm.type = "text";
        bouton.textContent = "🙈";
    } else {
        mdp.type = "password";
        if (confirm) confirm.type = "password";
        bouton.textContent = "👁️";
    }
}

document.getElementById("password").addEventListener("input", function () {
    const compteur = document.getElementById("password-counter");
    const message = document.getElementById("message");
    const afficher = document.getElementById("afficher");
    const confirm2 = document.getElementById("confirm-mdp");

    const longueur = this.value.length;
    compteur.textContent = longueur;

    if (longueur > 0) {
        afficher.style.display = "inline";
        confirm2.style.display = "block";
    } else {
        afficher.style.display = "none";
        confirm2.style.display = "none";
    }

    if (longueur >= 25) {
        message.style.color = "red";
    } else {
        message.style.color = "";
    }
});
