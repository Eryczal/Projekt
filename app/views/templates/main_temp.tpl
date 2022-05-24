<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Eryczal">
        <meta name="keywords" content="Todo">
        <meta name="description" content="Todo">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Todo</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.6.96/css/materialdesignicons.min.css">
    </head>
    <body>
        <div id="main-wrapper">
            <header class="topbar">
                <nav class="top-navbar">
                    <div class="navbar-header">
                        <a class="navbar-brand">
                            <img class="logo" src="logo-icon.png">
                            <img class="logo-text" src="logo-text.png">
                        </a>
                    </div>
                    <div class="navbar-content">
                        {block name=topnavbar} {/block}
                    </div>
                </nav>
            </header>
            <aside class="left-sidebar">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        {block name=sidebar} {/block}
                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">
                <div class="container">
                    <div class="card">
                        {block name=page} {/block}
                    </div>
                </div>
                <footer class="footer">
                    Todo App
                </footer>
            </div>
        </div>
    </body>
</html>