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
})