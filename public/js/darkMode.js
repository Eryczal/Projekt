function darkMode() {
    var lsdm = localStorage.getItem("darkmode");

    if(lsdm == "true") {
        var darkCSS = `
            body {
                background-color: #262626;
                color: #fff;
            }
            .topbar {
                background-color: #222;
            }
            .sidebar-link {
                color: #fff;
            }
            .sidebar-link i {
                color: #fff;
            }
            .active-link {
                background-color: #1c1c1c;
                color: #26c6da;
            }
            .active-link i {
                color: #26c6da;
            }
            .active-link:hover {
                color: #26c6da;
            }
            .active-link:hover i {
                color: #26c6da;
            }
            .left-sidebar hr {
                background-color: #fff;
            }
            .left-sidebar p {
                color: #fff;
            }
            .page-wrapper {
                background-color: #222;
            }
            .footer {
                background-color: #222;
                color: #fff;
                border-top: 1px solid #303030;
            }
            .card {
                background-color: #2a2a2a;
                color: #fff;
                border: 1px solid #1a1a1a;
            }
            .removeButton {
                background-color: #922;
                box-shadow: 1px 1px 5px 1px #222;
            }
            td, th {
                box-shadow: 0 0 2px 0 #000;
            }
            .mdi-delete-forever {
                color: #933;
            }
            .addButton {
                background-color: #222;
                box-shadow: 1px 1px 5px 1px #111;
            }
            .addButton:hover {
                background-color: #262626;
            }
            .task, .step {
                border: 1px solid #111;
            }
            .steps {
                border-top: 1px solid #111;
            }
            .remove_task, .task_priority, .remove_step, .step_priority, .step_info {
                border-right: 1px solid #111;
            }
            .completed_step {
                text-decoration: line-through #ddd 2px;
            }
        `;
        var style = document.createElement("style");
        style.id = "dark_mode_style";
        style.innerText = darkCSS;
        document.head.appendChild(style);

        window.addEventListener("load", () => {
            if(document.getElementById("darkMode")) {
                document.getElementById("darkMode").checked = true;
            }
        });
    } else {
        if(document.getElementById("dark_mode_style")) {
            document.getElementById("dark_mode_style").remove();
        }
    }
}

darkMode();