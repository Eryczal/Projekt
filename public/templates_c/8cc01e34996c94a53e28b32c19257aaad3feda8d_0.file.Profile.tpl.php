<?php
/* Smarty version 4.1.0, created on 2022-05-28 11:51:43
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\Profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6291f0af93b015_32845646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8cc01e34996c94a53e28b32c19257aaad3feda8d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\Profile.tpl',
      1 => 1653581290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6291f0af93b015_32845646 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_552191396291f0af930f11_86960441', 'sidebar');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20737441756291f0af93a4e3_34278328', 'page');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_temp.tpl");
}
/* {block 'sidebar'} */
class Block_552191396291f0af930f11_86960441 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_552191396291f0af930f11_86960441',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <li class="sidebar-item">
        <a class="sidebar-link active-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'profile'),$_smarty_tpl ) );?>
">
            <i class="mdi mdi-home"></i>
            <span class="sidebar-text">Mój profil</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'lists'),$_smarty_tpl ) );?>
">
            <i class="mdi mdi-file-document-multiple-outline"></i>
            <span class="sidebar-text">Moje listy</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'settings'),$_smarty_tpl ) );?>
">
            <i class="mdi mdi-cog"></i>
            <span class="sidebar-text">Ustawienia</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'logout'),$_smarty_tpl ) );?>
">
            <i class="mdi mdi-logout"></i>
            <span class="sidebar-text">Wyloguj</span>
        </a>
    </li>
    <hr style="margin-top:30px">
    <p>Zalogowano jako: <?php echo $_smarty_tpl->tpl_vars['role']->value;?>
</p>
    <?php if ($_smarty_tpl->tpl_vars['role']->value == "Administrator") {?>
        <hr style="margin-bottom:30px">
        <p style="margin-bottom: 0">Panel administratora:</p>
        <li class="sidebar-item">
            <a class="sidebar-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'logout'),$_smarty_tpl ) );?>
">
                <i class="mdi mdi-cogs"></i>
                <span class="sidebar-text">Zarządzanie</span>
            </a>
        </li>
    <?php }
}
}
/* {/block 'sidebar'} */
/* {block 'page'} */
class Block_20737441756291f0af93a4e3_34278328 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_20737441756291f0af93a4e3_34278328',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h3>Mój profil</h3>
    <p>Twój login: <?php echo $_smarty_tpl->tpl_vars['nick']->value;?>
</p>
    <p>Zalogowany jako: <?php echo $_smarty_tpl->tpl_vars['role']->value;?>
</p>
<?php
}
}
/* {/block 'page'} */
}
