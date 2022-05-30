{extends file="main_temp.tpl"}

{block name=sidebar}
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action='profile'}">
            <i class="mdi mdi-home"></i>
            <span class="sidebar-text">Mój profil</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link active-link" href="{url action='lists'}">
            <i class="mdi mdi-file-document-multiple-outline"></i>
            <span class="sidebar-text">Moje listy</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action='settings'}">
            <i class="mdi mdi-cog"></i>
            <span class="sidebar-text">Ustawienia</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action='logout'}">
            <i class="mdi mdi-logout"></i>
            <span class="sidebar-text">Wyloguj</span>
        </a>
    </li>
    <hr style="margin-top:30px">
    <p>Zalogowano jako: {$role}</p>
    {if $role eq "Administrator"}
        <hr style="margin-bottom:30px">
        <p style="margin-bottom: 0">Panel administratora:</p>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{url action='logout'}">
                <i class="mdi mdi-cogs"></i>
                <span class="sidebar-text">Zarządzanie</span>
            </a>
        </li>
    {/if}
{/block}

{block name=page}
        {foreach $msgs->getMessages() as $msg}
            <div class="alert {if $msg->isInfo()}alert-success{/if}
                {if $msg->isWarning()}alert-warning{/if}
                {if $msg->isError()}alert-danger{/if}" role="alert">
                {$msg->text}
            </div>
        {/foreach}
        {if $list neq "error"}
            {var_dump($list)}
            <h1 class="editable">{$list[0]["name"]} <i class="edit-button mdi mdi-pencil-outline"></i></h1>
            <p class="editable">{$list[0]["description"]} <i class="edit-button mdi mdi-pencil-outline"></i></p>
            
            <div id="list_tasks">
            </div>
            <input type="button" id="addTask" value="Dodaj zadanie">
            <script src="{$conf->app_url}/js/list.js"></script>
        {else}
            <a href="{$conf->app_url}/lists">Wróć do przeglądania Twoich list</a>
        {/if}
{/block}