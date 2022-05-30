<?php
/* Smarty version 4.1.0, created on 2022-05-28 11:51:31
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\Register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6291f0a33022c6_01469615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbb7b1beac9c5f11973e278ab028533673f032fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\Register.tpl',
      1 => 1652886655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6291f0a33022c6_01469615 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21236495776291f0a32f1f55_08647376', 'sidebar');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5942277876291f0a32f5079_83363631', 'page');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_temp.tpl");
}
/* {block 'sidebar'} */
class Block_21236495776291f0a32f1f55_08647376 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_21236495776291f0a32f1f55_08647376',
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
class Block_5942277876291f0a32f5079_83363631 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_5942277876291f0a32f5079_83363631',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h3>Rejestracja</h3>
    <form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'registeruser'),$_smarty_tpl ) );?>
" method="post">
        <p><label>Login: <input type="text" name="login"></label></p>
        <p><label>Hasło: <input type="password" name="pass"></label> <label>Powtórz hasło: <input type="password" name="conf"></label></p>
        <input type="submit" value="Zarejestruj">
    </form>
    <p>Masz już konto? <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'login'),$_smarty_tpl ) );?>
">Zaloguj się</a></p>
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
