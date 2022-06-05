{extends file="main_temp.tpl"}

{block name=sidebar}
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action='profile'}">
            <i class="mdi mdi-home"></i>
            <span class="sidebar-text">Mój profil</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action='lists'}">
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
            <a class="sidebar-link active" href="{url action='adminpanel'}">
                <i class="mdi mdi-cogs"></i>
                <span class="sidebar-text">Zarządzanie</span>
            </a>
        </li>
    {/if}
{/block}


{block name=page}
    <div style="text-align: center">
        <h3>Panel administratora</h3>
        <p>Liczba użytkowników: <span id="usernum">{$usernum}</span>.</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Rola</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="t_b">
            {foreach $users as $key=>$user}
                <tr id="user_{$user['id']}">
                    <td id="id_{$user['id']}">{$user["id"]}</td>
                    <td>{$user["login"]}</td>
                    <td>
                        <select id="user_role_{$user['id']}" onchange="changeRole({$user['id']})">
                            <option value="1" {if $user["role"] == 1}selected{/if}>Administrator</option>
                            <option value="0" {if $user["role"] == 0}selected{/if}>Użytkownik</option>
                        </select>
                    </td>
                    <td><i onclick="removeUser({$user['id']})" class="mdi mdi-delete-forever"></i></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
    <div style="text-align: center" id="links"></div>
    {foreach $msgs->getMessages() as $msg}
        <div class="alert {if $msg->isInfo()}alert-success{/if}
            {if $msg->isWarning()}alert-warning{/if}
            {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}
    <script src="{$conf->app_url}/js/adminpanel.js"></script>
{/block}