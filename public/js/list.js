document.getElementById("addTask").addEventListener("click", () => {
    var arr = window.location.href.split("/");

    var listID = parseInt(arr[arr.length-1]);

    fetch(`http://192.168.1.16/Strony/Projekt/public/addtask/${listID}`)
        .then(response => {
            return response.ok ? response.json() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            document.getElementById("list_tasks").insertAdjacentHTML("beforeend",
            `<div class="task" id="ptask_${response[0].id}">
                <div class="task_container">
                    <div class="edit_task_position" id="etask_${response[0].id}" ondrop="dropTask(event)" ondragover="dragOverTask(event)">
                        <i id="${response[0].id}" draggable="true" ondragstart="dragTask(event)" class="mdi mdi-arrow-all"></i>
                    </div>
                    <div class="remove_task" id="rtask_${response[0].id}">
                        <i id="r_${response[0].id}" onclick="removeTask(${response[0].id})" class="mdi mdi-delete-forever"></i>
                    </div>
                    <div class="task_priority">
                        <div class="edit_container">
                            <div class="ib editable">Priorytet: <div id="taskpriority_${response[0].id}" class="ib">${response[0].priority}</div></div>
                            <i onclick="editList('taskpriority', ${response[0].id})" class="edit-button mdi mdi-pencil-outline"></i>
                            <div id="taskpriority_eb_${response[0].id}" class="editButtons"></div>
                        </div>
                    </div>
                    <div class="task_info">
                        <div class="edit_container">
                            <div id="taskname_${response[0].id}" class="ib editable taskname">${response[0].name}</div>
                            <i onclick="editList('taskname', ${response[0].id})" class="edit-button mdi mdi-pencil-outline"></i>
                            <div id="taskname_eb_${response[0].id}" class="editButtons"></div>
                        </div>
                        <div class="edit_container">
                            <div id="taskdescription_${response[0].id}" class="ib editable">${response[0].description}</div>
                            <i onclick="editList('taskdescription', ${response[0].id})" class="edit-button mdi mdi-pencil-outline"></i>
                            <div id="taskdescription_eb_${response[0].id}" class="editButtons"></div>
                        </div>
                    </div>
                </div>
                <div class="steps" id="steps_${response[0].id}">
                    <p id="e_t_s">W tym zadaniu nie ma jeszcze żadnych kroków.</p>
                    <input type="button" onclick="addStep(${response[0].id})" class="addButton" value="Dodaj krok">
                </div>
            </div>`
            );
        })
        .catch(error => {
            console.error(error);
        });
});

function editList(column, id) {
    let oldText = document.getElementById(column + "_" + id).textContent;
    if(column != "priority" && column != "taskpriority") {
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
    if(column != "priority" && column != "taskpriority") {
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
    var value;
    if(column != "priority" && column != "taskpriority") {
        value = document.getElementById(column + "_" + id).textContent;
    } else {
        value = parseInt(document.getElementById(column + "_" + id).textContent);
    }
    var link = "";
    if(column != "priority" && column != "taskpriority") {
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

        case "taskname":
            link = "renametask"; 
            break;

        case "taskdescription":
            link = "redescriptiontask"; 
            break;

        case "taskpriority":
            link = "reprioritizetask"; 
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

function removeTask(id) {
    var formData = new FormData();
    formData.append("id", id);
    fetch("http://192.168.1.16/Strony/Projekt/public/deletetask", {
        method: "POST",
        body: formData
    })
        .then(response => {
            return response.ok ? response.text() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            if(response == 1) document.getElementById("ptask_" + id).remove();
        })
        .catch(error => {
            console.error(error);
        });
}

function dragTask(event) {
    event.dataTransfer.setData("text", (event.target.id));
}

function dropTask(event) {
    event.preventDefault();
    var taskID = event.dataTransfer.getData("text");
    var oldPos = getPos(taskID);
    var newPos = getPos(event.currentTarget.children[0].id);

    event.currentTarget.parentNode.parentNode.parentNode.insertBefore(document.getElementById("ptask_" + taskID), oldPos < newPos ? event.currentTarget.parentNode.parentNode.nextSibling : event.currentTarget.parentNode.parentNode);
    
    var formData = new FormData();
    formData.append("id", taskID);
    formData.append("oldPos", oldPos);
    formData.append("newPos", newPos);
    fetch("http://192.168.1.16/Strony/Projekt/public/movetask", {
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

function dragOverTask(event) {
    event.preventDefault();
}

function getPos(id) {
    for(let i = 0; i < document.getElementsByClassName("mdi-arrow-all").length; i++) {
        if(document.getElementsByClassName("mdi-arrow-all")[i].id == id) {
            return i + 1;
        }
    }
}

function addStep(id) {
    fetch(`http://192.168.1.16/Strony/Projekt/public/addstep/${id}`)
        .then(response => {
            return response.ok ? response.text() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            // document.getElementById("steps_" + id).insertAdjacentHTML("beforeend",
            // `GIT`
            // );
            alert(response)
        })
        .catch(error => {
            console.error(error);
        });
}