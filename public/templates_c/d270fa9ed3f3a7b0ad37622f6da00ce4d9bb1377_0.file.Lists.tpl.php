<?php
/* Smarty version 4.1.0, created on 2022-06-04 13:18:35
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\Lists.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629b3f8b55d965_10958740',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd270fa9ed3f3a7b0ad37622f6da00ce4d9bb1377' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\Lists.tpl',
      1 => 1654341510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629b3f8b55d965_10958740 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_993253997629b3f8b544318_55692242', 'sidebar');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1247264938629b3f8b54d916_81225908', 'page');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_temp.tpl");
}
/* {block 'sidebar'} */
class Block_993253997629b3f8b544318_55692242 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_993253997629b3f8b544318_55692242',
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
class Block_1247264938629b3f8b54d916_81225908 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_1247264938629b3f8b54d916_81225908',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div style="text-align: center">
        <h3>Moje listy</h3>
        <p>Liczba twoich list: <span id="listnum"><?php echo $_smarty_tpl->tpl_vars['listnum']->value;?>
</span>.</p>
    </div>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Priorytet</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="t_b">
        <?php if ($_smarty_tpl->tpl_vars['lists']->value != 1 && count((array)$_smarty_tpl->tpl_vars['lists']->value) > 0) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lists']->value, 'list', false, 'key');
$_smarty_tpl->tpl_vars['list']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['list']->value) {
$_smarty_tpl->tpl_vars['list']->do_else = false;
?>
                <tr id="list_<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">
                    <td id="plist_<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" ondrop="dropList(event)" ondragover="dragOverList(event)"><i id="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
" draggable="true" ondragstart="dragList(event)" class="mdi mdi-arrow-all"></i></td>
                    <td id="id_<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value["id"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list']->value["name"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list']->value["description"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['list']->value["priority"];?>
</td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/list/<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"><i class="mdi mdi-dots-vertical"></i></a></td>
                    <td><i onclick="removeList(<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
)" class="mdi mdi-delete-forever"></i></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php } else { ?> 
            <tr id="e_u_l"><td colspan="4">Nie masz jeszcze żadnej listy.</td></tr>
        <?php }?>
        </tbody>
    </table>
    <div style="text-align: center" id="links"></div>
    <div class="button_container"><input type="button" id="addList" class="addButton" value="Dodaj listę"></div>
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
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/lists.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'page'} */
}
