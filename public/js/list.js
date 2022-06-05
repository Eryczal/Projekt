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
                        <i id="${response[0].id}" draggable="true" ondragstart="dragTask(event)" class="mdi mdi-arrow-all t_u_class"></i>
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
                    <p id="e_t_s_${response[0].id}">W tym zadaniu nie ma jeszcze żadnych kroków.</p>
                </div>
                <input type="button" onclick="addStep(${response[0].id})" class="addButton aS" value="Dodaj krok">
            </div>`
            );
            if(document.getElementById("e_l_t")) {
                document.getElementById("e_l_t").remove();
            }
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

        case "stepname":
            link = "renamestep"; 
            break;

        case "stepdescription":
            link = "redescriptionstep"; 
            break;

        case "steppriority":
            link = "reprioritizestep"; 
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
    if(event.dataTransfer.getData("text").charAt(0) == "s") return;
    var taskID = event.dataTransfer.getData("text");
    var oldPos = getPos("t_u_class", taskID);
    var newPos = getPos("t_u_class", event.currentTarget.children[0].id);

    console.log(oldPos, newPos)

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

function getPos(type, id) {
    for(let i = 0; i < document.getElementsByClassName(type).length; i++) {
        if(document.getElementsByClassName(type)[i].id == id) {
            return i + 1;
        }
    }
}

function addStep(id) {
    fetch(`http://192.168.1.16/Strony/Projekt/public/addstep/${id}`)
        .then(response => {
            return response.ok ? response.json() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            document.getElementById("steps_" + id).insertAdjacentHTML("beforeend",
            `<div class="step" id="step_${response[0].id}">
                <div class="step_container">
                    <div class="edit_step_position" id="estep_${response[0].id}" ondrop="dropStep(event)" ondragover="dragOverStep(event)">
                        <i id="s${response[0].id}" draggable="true" ondragstart="dragStep(event)" class="mdi mdi-arrow-all s_u_class"></i>
                    </div>
                    <div class="remove_step" id="rstep_${response[0].id}">
                        <i id="rs_${response[0].id}" onclick="removeStep(${response[0].id})" class="mdi mdi-delete-forever"></i>
                    </div>
                    <div class="step_priority">
                        <div class="edit_container">
                            <div class="ib editable">Priorytet: <div id="steppriority_${response[0].id}" class="ib">${response[0].priority}</div></div>
                            <i onclick="editList('steppriority', ${response[0].id})" class="edit-button mdi mdi-pencil-outline"></i>
                            <div id="steppriority_eb_${response[0].id}" class="editButtons"></div>
                        </div>
                    </div>
                    <div class="step_info">
                        <div class="edit_container">
                            <div id="stepname_${response[0].id}" class="ib editable stepname">${response[0].name}</div>
                            <i onclick="editList('stepname', ${response[0].id})" class="edit-button mdi mdi-pencil-outline"></i>
                            <div id="stepname_eb_${response[0].id}" class="editButtons"></div>
                        </div>
                        <div class="edit_container">
                            <div id="stepdescription_${response[0].id}" class="ib editable">${response[0].description}</div>
                            <i onclick="editList('stepdescription', ${response[0].id})" class="edit-button mdi mdi-pencil-outline"></i>
                            <div id="stepdescription_eb_${response[0].id}" class="editButtons"></div>
                        </div>
                    </div>
                    <div class="step_completion">
                        <input type="checkbox" id="completion_${response[0].id}" class="step_checkbox" onclick="changeCompletion(${response[0].id})">
                    </div>
                </div>
            </div>`
            );
            if(document.getElementById("e_t_s_" + id)) {
                document.getElementById("e_t_s_" + id).remove();
            }
        })
        .catch(error => {
            console.error(error);
        });
}

function removeStep(id) {
    var formData = new FormData();
    formData.append("id", id);
    fetch("http://192.168.1.16/Strony/Projekt/public/deletestep", {
        method: "POST",
        body: formData
    })
        .then(response => {
            return response.ok ? response.text() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            if(response == 1) document.getElementById("step_" + id).remove();
        })
        .catch(error => {
            console.error(error);
        });
}

function dragStep(event) {
    event.dataTransfer.setData("text", (event.target.id));
}

function dropStep(event) {
    event.preventDefault();

    if(event.dataTransfer.getData("text").charAt(0) != "s") return;
    if(document.getElementById(event.dataTransfer.getData("text")).parentNode.parentNode.parentNode.parentNode.id != event.currentTarget.parentNode.parentNode.parentNode.id) return;
    var stepID = event.dataTransfer.getData("text");
    var oldPos = getPos("s_u_class", stepID);
    var newPos = getPos("s_u_class", event.currentTarget.children[0].id);

    event.currentTarget.parentNode.parentNode.parentNode.insertBefore(document.getElementById("step_" + stepID.substring(1)), oldPos < newPos ? event.currentTarget.parentNode.parentNode.nextSibling : event.currentTarget.parentNode.parentNode);
    
    var formData = new FormData();
    formData.append("id", stepID.substring(1));
    formData.append("oldPos", oldPos);
    formData.append("newPos", newPos);
    fetch("http://192.168.1.16/Strony/Projekt/public/movestep", {
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

function dragOverStep(event) {
    event.preventDefault();
}

function changeCompletion(id) {
    var formData = new FormData();
    var check = document.getElementById("completion_" + id).checked ? 1 : 0;
    formData.append("id", id);
    formData.append("value", check);
    fetch("http://192.168.1.16/Strony/Projekt/public/completestep", {
        method: "POST",
        body: formData
    })
        .then(response => {
            return response.ok ? response.text() : Promise.reject("Błąd " + response.status + ": " + response.statusText);
        })
        .then(response => {
            if(response == 1) {
                if(check == 1) {
                    document.getElementById("stepname_" + id).classList.add("completed_step");
                    document.getElementById("stepdescription_" + id).classList.add("completed_step");
                } else {
                    document.getElementById("stepname_" + id).classList.remove("completed_step");
                    document.getElementById("stepdescription_" + id).classList.remove("completed_step");
                }
            }
        })
        .catch(error => {
            console.error(error);
        });
}