function removeUser(id) {
    var formData = new FormData();
    formData.append("id", id);
    fetch("http://192.168.1.16/Strony/Projekt/public/deleteuser", {
        method: "POST",
        body: formData
    })
        .then(response => {
            return response.ok ? response.text() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            if(response == 1) document.getElementById("user_" + id).remove();
        })
        .catch(error => {
            console.error(error);
        });
}

function changeRole(id) {
    var role = document.getElementById("user_role_" + id).value;
    var formData = new FormData();
    formData.append("id", id);
    formData.append("role", role);
    fetch("http://192.168.1.16/Strony/Projekt/public/changerole", {
        method: "POST",
        body: formData
    })
        .then(response => {
            return response.ok ? response.text() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            if(response != 1) window.location.reload();
        })
        .catch(error => {
            console.error(error);
        });
}

function checkLinks() {
    var usernum = parseInt(document.getElementById("usernum").textContent);
    var links = Math.ceil(usernum / 15);

    for(let i = 1; i <= links; i++) {
        document.getElementById("links").innerHTML += `<a href="http://192.168.1.16/Strony/Projekt/public/adminpanel/${i}">${i}</a> `;
    }
}

checkLinks();