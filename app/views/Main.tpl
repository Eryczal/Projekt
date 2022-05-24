{extends file="main_temp.tpl"}

{block name=sidebar}
    <li class="sidebar-item">
        <a class="sidebar-link active-link" href="{url action=''}">
            <i class="mdi mdi-home"></i>
            <span class="sidebar-text">Strona główna</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action='login'}">
            <i class="mdi mdi-login"></i>
            <span class="sidebar-text">Logowanie</span>
        </a>
    </li>
{/block}

{block name=page}
    <h3>Strona Główna</h3>
    <p>Zaloguj się, by móc dodać listę Todo</p>
{/block}