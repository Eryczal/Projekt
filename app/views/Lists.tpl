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
    <p>Zalogowano jako: {$rola}</p>
    {if $rola eq "Administrator"}
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
    <form action="{url action='loginuser'}" method="post">
        <p><label>Login: <input type="text" name="login"></label></p>
        <p><label>Hasło: <input type="password" name="pass"></label></p>
        <input type="submit" value="Zaloguj">
    </form>
    <p>Nie masz konta? <a href="{url action='register'}">Zarejestruj się</a></p>
    {foreach $msgs->getMessages() as $msg}
        <div class="alert {if $msg->isInfo()}alert-success{/if}
            {if $msg->isWarning()}alert-warning{/if}
            {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}
{/block}