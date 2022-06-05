document.getElementById("removeAccount").addEventListener("click", () => {
    fetch("http://192.168.1.16/Strony/Projekt/public/deleteaccount")
        .then(response => {
            return response.ok ? response.text() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            window.location.reload();
        })
        .catch(error => {
            console.error(error);
        });
});

function clickDark() {
    localStorage.setItem("darkmode", document.getElementById("darkMode").checked);
    darkMode();
}