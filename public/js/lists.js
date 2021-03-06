document.getElementById("addList").addEventListener("click", () => {
    fetch("http://192.168.1.16/Strony/Projekt/public/addlist")
        .then(response => {
            return response.ok ? response.json() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            if(document.getElementById("e_u_l")) document.getElementById("e_u_l").remove();
            document.getElementById("t_b").insertAdjacentHTML("beforeend",
                `<tr id="list_${response[0].id}">
                    <td id="plist_${response[0].id}" ondrop="dropList(event)" ondragover="dragOverList(event)"><i id="${response[0].id}" draggable="true" ondragstart="dragList(event)" class="mdi mdi-arrow-all"></i></td>
                    <td id="id_${response[0].id}">${response[0].id}</td>
                    <td>${response[0].name}</td>
                    <td>${response[0].description}</td>
                    <td>${response[0].priority}</td>
                    <td><a href="http://192.168.1.16/Strony/Projekt/public/list/${response[0].id}"><i class="mdi mdi-dots-vertical"></i></a></td>
                    <td><i onclick="removeList(${response[0].id})" class="mdi mdi-delete-forever"></i></td>
                 </tr>`
            );
        })
        .catch(error => {
            console.error(error);
        });
})

function removeList(id) {
    var formData = new FormData();
    formData.append("id", id);
    fetch("http://192.168.1.16/Strony/Projekt/public/deletelist", {
        method: "POST",
        body: formData
    })
        .then(response => {
            return response.ok ? response.text() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            if(response == 1) document.getElementById("plist_" + id).parentNode.remove();
        })
        .catch(error => {
            console.error(error);
        });
}

function dragList(event) {
    event.dataTransfer.setData("text", (event.target.id));
}

function dropList(event) {
    event.preventDefault();
    var listID = event.dataTransfer.getData("text");
    var oldPos = getPos(listID);
    var newPos = getPos(event.currentTarget.children[0].id);
    
    event.currentTarget.parentNode.parentNode.insertBefore(document.getElementById("list_" + listID), oldPos < newPos ? event.currentTarget.parentNode.nextSibling : event.currentTarget.parentNode);
    
    var formData = new FormData();
    formData.append("id", listID);
    formData.append("oldPos", oldPos);
    formData.append("newPos", newPos);
    fetch("http://192.168.1.16/Strony/Projekt/public/movelist", {
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

function dragOverList(event) {
    event.preventDefault();
}

function getPos(id) {
    for(let i = 0; i < document.getElementsByClassName("mdi-arrow-all").length; i++) {
        if(document.getElementsByClassName("mdi-arrow-all")[i].id == id) {
            return i + 1;
        }
    }
}

function checkLinks() {
    var listnum = parseInt(document.getElementById("listnum").textContent);
    var links = Math.ceil(listnum / 15);

    for(let i = 1; i <= links; i++) {
        document.getElementById("links").innerHTML += `<a href="http://192.168.1.16/Strony/Projekt/public/lists/${i}">${i}</a> `;
    }
}

checkLinks();