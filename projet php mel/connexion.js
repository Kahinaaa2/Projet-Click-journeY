function cacher() {
    const voir = document.getElementById("password1");
    const bouton = document.querySelector(".bouton");

    if (voir.type === "password") {
        voir.type = "text";
        bouton.textContent = "🙈"; 
    } else {
        voir.type = "password";
        bouton.textContent = "👁️"; 
    }
}
