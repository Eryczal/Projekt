<?php
/* Smarty version 4.1.0, created on 2022-05-28 11:42:39
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\Main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6291ee8f6462b1_10407775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3c3922e38f818375b2bc27cfe744359bf987e54' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\Main.tpl',
      1 => 1652577792,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6291ee8f6462b1_10407775 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11989009406291ee8f642601_33840495', 'sidebar');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10116451656291ee8f645ae7_64809310', 'page');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_temp.tpl");
}
/* {block 'sidebar'} */
class Block_11989009406291ee8f642601_33840495 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_11989009406291ee8f642601_33840495',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <li class="sidebar-item">
        <a class="sidebar-link active-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>''),$_smarty_tpl ) );?>
">
            <i class="mdi mdi-home"></i>
            <span class="sidebar-text">Strona główna</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'login'),$_smarty_tpl ) );?>
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
class Block_10116451656291ee8f645ae7_64809310 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_10116451656291ee8f645ae7_64809310',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h3>Strona Główna</h3>
    <p>Zaloguj się, by móc dodać listę Todo</p>
<?php
}
}
/* {/block 'page'} */
}
