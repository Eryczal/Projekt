document.getElementById("addTask").addEventListener("click", () => {
    var arr = window.location.href.split("/");

    var list_id = parseInt(arr[arr.length-1]);

    fetch(`http://192.168.1.16/Strony/Projekt/public/addtask/${list_id}`)
        .then(response => {
            return response.ok ? response.json() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            document.getElementById("list_tasks").insertAdjacentHTML("beforeend",
                `<div id="task">
                    <h3>${response[0].name}</h3>
                    <p>${response[0].description}</p>
                </div>`
            );
        })
        .catch(error => {
            console.error(error);
        });
});

function editList(column, id) {
    let oldText = document.getElementById(column + "_" + id).textContent;
    if(column != "priority") {
        document.getElementById(column + "_" + id).parentNode.classList.add("editing");
    } else {
        document.getElementById(column + "_" + id).parentNode.parentNode.classList.add("editing");
    }
    document.getElementById(column + "_" + id).classList.add("inedit");
    document.getElementById(column + "_" + id).contentEditable = "true";
    document.getElementById(column + "_eb_" + id).innerHTML = `
        <div class="cancel_button" onclick="cancelEditing('${column}', '${oldText}', ${id})"><i class="mdi mdi-close"></i> Anuluj</div>
        <div class="approve_button" onclick="approveEditing('${column}', ${id})"><i class="mdi mdi-check"></i> Zatwierdź</div>
    `;
}

function cancelEditing(column, oldText, id) {
    if(column != "priority") {
        document.getElementById(column + "_" + id).parentNode.classList.remove("editing");
    } else {
        document.getElementById(column + "_" + id).parentNode.parentNode.classList.remove("editing");
    }
    document.getElementById(column + "_" + id).classList.remove("inedit");
    document.getElementById(column + "_" + id).contentEditable = "false";
    document.getElementById(column + "_" + id).innerHTML = oldText;
    document.getElementById(column + "_eb_" + id).innerHTML = ``;
}

function approveEditing(column, id) {
    var value = column != "priority" ? document.getElementById(column + "_" + id).textContent : parseInt(document.getElementById(column + "_" + id).textContent);
    var link = "";
    if(column != "priority") {
        document.getElementById(column + "_" + id).parentNode.classList.remove("editing");
    } else {
        document.getElementById(column + "_" + id).parentNode.parentNode.classList.remove("editing");
        if(typeof(value) != "number" || isNaN(value) || value < 0) {
            cancelEditing(column, "0", id);
            return false;
        }
    }
    document.getElementById(column + "_" + id).classList.remove("inedit");
    document.getElementById(column + "_" + id).contentEditable = "false";
    document.getElementById(column + "_eb_" + id).innerHTML = ``;

    switch(column) {
        case "name":
            link = "renamelist"; 
            break;

        case "description":
            link = "redescriptionlist"; 
            break;

        case "priority":
            link = "reprioritizelist"; 
            break;
    }

    var formData = new FormData();
    formData.append("id", id);
    formData.append("value", value);
    fetch("http://192.168.1.16/Strony/Projekt/public/" + link, {
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