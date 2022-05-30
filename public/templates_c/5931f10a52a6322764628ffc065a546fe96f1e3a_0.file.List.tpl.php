<?php
/* Smarty version 4.1.0, created on 2022-05-29 22:15:28
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\List.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6293d4606f4de2_03412016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5931f10a52a6322764628ffc065a546fe96f1e3a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\List.tpl',
      1 => 1653855308,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6293d4606f4de2_03412016 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_399608186293d4606de5a4_78523785', 'sidebar');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18885618166293d4606e8386_97009851', 'page');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_temp.tpl");
}
/* {block 'sidebar'} */
class Block_399608186293d4606de5a4_78523785 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_399608186293d4606de5a4_78523785',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'profile'),$_smarty_tpl ) );?>
">
            <i class="mdi mdi-home"></i>
            <span class="sidebar-text">Mój profil</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a class="sidebar-link active-link" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'lists'),$_smarty_tpl ) );?>
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
class Block_18885618166293d4606e8386_97009851 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_18885618166293d4606e8386_97009851',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['list']->value != "error") {?>
            <?php echo var_dump($_smarty_tpl->tpl_vars['list']->value);?>

            <h1 class="editable"><?php echo $_smarty_tpl->tpl_vars['list']->value[0]["name"];?>
 <i class="edit-button mdi mdi-pencil-outline"></i></h1>
            <p class="editable"><?php echo $_smarty_tpl->tpl_vars['list']->value[0]["description"];?>
 <i class="edit-button mdi mdi-pencil-outline"></i></p>
            
            <div id="list_tasks">
            </div>
            <input type="button" id="addTask" value="Dodaj zadanie">
            <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/list.js"><?php echo '</script'; ?>
>
        <?php } else { ?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/lists">Wróć do przeglądania Twoich list</a>
        <?php }
}
}
/* {/block 'page'} */
}
