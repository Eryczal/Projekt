{extends file="main_temp.tpl"}

{block name=sidebar}
    <li class="sidebar-item">
        <a class="sidebar-link" href="{url action=''}">
            <i class="mdi mdi-home"></i>
            <span class="sidebar-text">Strona główna</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link active-link" href="{url action='login'}">
            <i class="mdi mdi-login"></i>
            <span class="sidebar-text">Logowanie</span>
        </a>
    </li>
{/block}

{block name=page}
    <h3>Rejestracja</h3>
    <form action="{url action='registeruser'}" method="post">
        <p><label>Login: <input type="text" name="login"></label></p>
        <p><label>Hasło: <input type="password" name="pass"></label> <label>Powtórz hasło: <input type="password" name="conf"></label></p>
        <input type="submit" value="Zarejestruj">
    </form>
    <p>Masz już konto? <a href="{url action='login'}">Zaloguj się</a></p>
    {foreach $msgs->getMessages() as $msg}
        <div class="alert {if $msg->isInfo()}alert-success{/if}
            {if $msg->isWarning()}alert-warning{/if}
            {if $msg->isError()}alert-danger{/if}" role="alert">
            {$msg->text}
        </div>
    {/foreach}
{/block}