<?php
/* Smarty version 4.1.0, created on 2022-06-05 22:12:50
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\AdminPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629d0e428ee070_75148628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd208181a258677db15276895b7aa56ba906bcb9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\AdminPanel.tpl',
      1 => 1654459967,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629d0e428ee070_75148628 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_350615305629d0e428d61e2_02952803', 'sidebar');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_741230654629d0e428df4b1_90734285', 'page');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main_temp.tpl");
}
/* {block 'sidebar'} */
class Block_350615305629d0e428d61e2_02952803 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_350615305629d0e428d61e2_02952803',
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
            <a class="sidebar-link active" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>'adminpanel'),$_smarty_tpl ) );?>
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
class Block_741230654629d0e428df4b1_90734285 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_741230654629d0e428df4b1_90734285',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div style="text-align: center">
        <h3>Panel administratora</h3>
        <p>Liczba użytkowników: <span id="usernum"><?php echo $_smarty_tpl->tpl_vars['usernum']->value;?>
</span>.</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Rola</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="t_b">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user', false, 'key');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                <tr id="user_<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                    <td id="id_<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value["id"];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value["login"];?>
</td>
                    <td>
                        <select id="user_role_<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" onchange="changeRole(<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
)">
                            <option value="1" <?php if ($_smarty_tpl->tpl_vars['user']->value["role"] == 1) {?>selected<?php }?>>Administrator</option>
                            <option value="0" <?php if ($_smarty_tpl->tpl_vars['user']->value["role"] == 0) {?>selected<?php }?>>Użytkownik</option>
                        </select>
                    </td>
                    <td><i onclick="removeUser(<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
)" class="mdi mdi-delete-forever"></i></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <div style="text-align: center" id="links"></div>
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
/js/adminpanel.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'page'} */
}
