<?php
/* Smarty version 4.1.0, created on 2022-06-01 20:33:12
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\List.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6297b0e8258987_84701115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5931f10a52a6322764628ffc065a546fe96f1e3a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\List.tpl',
      1 => 1654108390,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6297b0e8258987_84701115 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_936223026297b0e823d0b2_22056949', 'sidebar');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18861680986297b0e8246df3_62729198', 'page');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_temp.tpl");
}
/* {block 'sidebar'} */
class Block_936223026297b0e823d0b2_22056949 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_936223026297b0e823d0b2_22056949',
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
class Block_18861680986297b0e8246df3_62729198 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_18861680986297b0e8246df3_62729198',
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
            <div class="edit_container">
                <div id="name_<?php echo $_smarty_tpl->tpl_vars['list']->value[0]['id'];?>
" class="list_header ib editable"><?php echo $_smarty_tpl->tpl_vars['list']->value[0]["name"];?>
</div>
                <i onclick="editList('name', <?php echo $_smarty_tpl->tpl_vars['list']->value[0]['id'];?>
)" class="edit-button list_header mdi mdi-pencil-outline"></i>
                <div id="name_eb_<?php echo $_smarty_tpl->tpl_vars['list']->value[0]['id'];?>
" class="editButtons"></div>
            </div>
            <div class="edit_container">
                <div id="description_<?php echo $_smarty_tpl->tpl_vars['list']->value[0]['id'];?>
" class="ib editable"><?php echo $_smarty_tpl->tpl_vars['list']->value[0]["description"];?>
</div>
                <i onclick="editList('description', <?php echo $_smarty_tpl->tpl_vars['list']->value[0]['id'];?>
)" class="edit-button mdi mdi-pencil-outline"></i>
                <div id="description_eb_<?php echo $_smarty_tpl->tpl_vars['list']->value[0]['id'];?>
" class="editButtons"></div>
            </div>
            <div class="edit_container">
                <div class="ib editable">Priorytet: <div id="priority_<?php echo $_smarty_tpl->tpl_vars['list']->value[0]['id'];?>
" class="ib"><?php echo $_smarty_tpl->tpl_vars['list']->value[0]["priority"];?>
</div></div>
                <i onclick="editList('priority', <?php echo $_smarty_tpl->tpl_vars['list']->value[0]['id'];?>
)" class="edit-button mdi mdi-pencil-outline"></i>
                <div id="priority_eb_<?php echo $_smarty_tpl->tpl_vars['list']->value[0]['id'];?>
" class="editButtons"></div>
            </div>
            
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
