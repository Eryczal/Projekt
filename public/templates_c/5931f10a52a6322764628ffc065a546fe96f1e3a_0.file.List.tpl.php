<?php
/* Smarty version 4.1.0, created on 2022-06-04 17:34:46
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\List.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629b7b9674b511_14593048',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5931f10a52a6322764628ffc065a546fe96f1e3a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\List.tpl',
      1 => 1654356880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629b7b9674b511_14593048 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1835189853629b7b9671f1c5_46304334', 'sidebar');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1257544243629b7b9672a4c2_44654918', 'page');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_temp.tpl");
}
/* {block 'sidebar'} */
class Block_1835189853629b7b9671f1c5_46304334 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_1835189853629b7b9671f1c5_46304334',
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
class Block_1257544243629b7b9672a4c2_44654918 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_1257544243629b7b9672a4c2_44654918',
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
                <?php if ($_smarty_tpl->tpl_vars['tasks']->value != 1 && count((array)$_smarty_tpl->tpl_vars['tasks']->value) > 0) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks']->value, 'task', false, 'key');
$_smarty_tpl->tpl_vars['task']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['task']->value) {
$_smarty_tpl->tpl_vars['task']->do_else = false;
?>
                        <div class="task" id="ptask_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
">
                            <div class="task_container">
                                <div class="edit_task_position" id="etask_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
" ondrop="dropTask(event)" ondragover="dragOverTask(event)">
                                    <i id="<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
" draggable="true" ondragstart="dragTask(event)" class="mdi mdi-arrow-all"></i>
                                </div>
                                <div class="remove_task" id="rtask_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
">
                                    <i id="r_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
" onclick="removeTask(<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
)" class="mdi mdi-delete-forever"></i>
                                </div>
                                <div class="task_priority">
                                    <div class="edit_container">
                                        <div class="ib editable">Priorytet: <div id="taskpriority_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
" class="ib"><?php echo $_smarty_tpl->tpl_vars['task']->value["priority"];?>
</div></div>
                                        <i onclick="editList('taskpriority', <?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
)" class="edit-button mdi mdi-pencil-outline"></i>
                                        <div id="taskpriority_eb_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
" class="editButtons"></div>
                                    </div>
                                </div>
                                <div class="task_info">
                                    <div class="edit_container">
                                        <div id="taskname_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
" class="ib editable taskname"><?php echo $_smarty_tpl->tpl_vars['task']->value['name'];?>
</div>
                                        <i onclick="editList('taskname', <?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
)" class="edit-button mdi mdi-pencil-outline"></i>
                                        <div id="taskname_eb_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
" class="editButtons"></div>
                                    </div>
                                    <div class="edit_container">
                                        <div id="taskdescription_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
" class="ib editable"><?php echo $_smarty_tpl->tpl_vars['task']->value['description'];?>
</div>
                                        <i onclick="editList('taskdescription', <?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
)" class="edit-button mdi mdi-pencil-outline"></i>
                                        <div id="taskdescription_eb_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
" class="editButtons"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="steps" id="steps_<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
">
                                <?php if ($_smarty_tpl->tpl_vars['steps']->value[$_smarty_tpl->tpl_vars['key']->value] != 1 && count((array)$_smarty_tpl->tpl_vars['steps']->value[$_smarty_tpl->tpl_vars['key']->value]) > 0) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['steps']->value[$_smarty_tpl->tpl_vars['key']->value], 'step');
$_smarty_tpl->tpl_vars['step']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['step']->value) {
$_smarty_tpl->tpl_vars['step']->do_else = false;
?>
                                        <div>
                                            <p><?php echo $_smarty_tpl->tpl_vars['step']->value['name'];?>
</p>
                                            <p><?php echo $_smarty_tpl->tpl_vars['step']->value['description'];?>
</p>
                                            <input type="button" id="removeStep_<?php echo $_smarty_tpl->tpl_vars['step']->value['id'];?>
" value="Usuń krok">
                                        </div>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                    <div class="button_container"><input type="button" id="addStep" value="Dodaj krok"></div>
                                <?php } else { ?>
                                    <p id="e_t_s">W tym zadaniu nie ma jeszcze żadnych kroków.</p>
                                <?php }?>
                                <input type="button" onclick="addStep(<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
)" class="addButton" value="Dodaj krok">
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } else { ?>
                    <p>Lista nie ma jeszcze żadnych zadań.</p>
                <?php }?>
            </div>
            <input type="button" id="addTask" class="addButton" value="Dodaj zadanie">
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
