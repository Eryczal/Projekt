<?php
/* Smarty version 4.1.0, created on 2022-05-28 11:51:30
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\Login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6291f0a207d159_87841804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f05dc03fa52139d403982e706691e61ed57bf47' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\Login.tpl',
      1 => 1652887404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6291f0a207d159_87841804 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16736370526291f0a206c525_27287413', 'sidebar');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10905492186291f0a206f705_96035193', 'page');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_temp.tpl");
}
/* {block 'sidebar'} */
class Block_16736370526291f0a206c525_27287413 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_16736370526291f0a206c525_27287413',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>''),$_smarty_tpl ) );?>
">
            <i class="mdi mdi-home"></i>
            <span class="sidebar-text">Strona główna</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link active-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'login'),$_smarty_tpl ) );?>
">
            <i class="mdi mdi-login"></i>
            <span class="sidebar-text">Logowanie</span>
        </a>
    </li>
<?php
}
}
/* {/block 'sidebar'} */
/* {block 'page'} */
class Block_10905492186291f0a206f705_96035193 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_10905492186291f0a206f705_96035193',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h3>Logowanie</h3>
    <form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'loginuser'),$_smarty_tpl ) );?>
" method="post">
        <p><label>Login: <input type="text" name="login"></label></p>
        <p><label>Hasło: <input type="password" name="pass"></label></p>
        <input type="submit" value="Zaloguj">
    </form>
    <p>Nie masz konta? <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'register'),$_smarty_tpl ) );?>
">Zarejestruj się</a></p>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
        <div class="alert <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-success<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" role="alert">
            <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
/* {/block 'page'} */
}
