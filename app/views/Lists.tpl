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
    <h3>Moje listy</h3>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Priorytet</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="t_b">
        {if $lists != 1 && count((array)$lists) > 0}
            {foreach $lists as $key=>$list}
                <tr id="list_{$key}">
                    <td id="plist_{$list['id']}" ondrop="dropList(event)" ondragover="dragOverList(event)"><i id="{$key}" draggable="true" ondragstart="dragList(event)" class="mdi mdi-arrow-all"></i></td>
                    <td id="id_{$key}">{$list["id"]}</td>
                    <td>{$list["name"]}</td>
                    <td>{$list["description"]}</td>
                    <td>{$list["priority"]}</td>
                    <td><a href="{$conf->app_url}/list/{$list['id']}"><i class="mdi mdi-dots-vertical"></i></a></td>
                    <td><i onclick="removeList({$list['id']})" class="mdi mdi-delete-forever"></i></td>
                </tr>
            {/foreach}
        {else} 
            <tr id="e_u_l"><td colspan="4">Nie masz jeszcze żadnej listy.</td></tr>
        {/if}
        </tbody>
    </table>
    <div ondrop="dropList(event)" ondragover="dragOverList(event)">test</div>
    <input type="button" id="addList" value="Dodaj listę">
    {foreach $msgs->getMessages() as $msg}
        <div class="alert {if $msg->isInfo()}alert-success{/if}
            {if $msg->isWarning()}alert-warning{/if}
            {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}
    <script src="{$conf->app_url}/js/lists.js"></script>
{/block}