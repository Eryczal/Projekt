<?php
/* Smarty version 4.1.0, created on 2022-06-05 16:18:28
  from 'C:\xampp\htdocs\Strony\Projekt\app\views\templates\main_temp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629cbb34878e04_39070626',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b28d2723104278aee4e15049263fa55f81c798ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Strony\\Projekt\\app\\views\\templates\\main_temp.tpl',
      1 => 1654438706,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629cbb34878e04_39070626 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Eryczal">
        <meta name="keywords" content="Todo">
        <meta name="description" content="Todo">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Todo</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/darkMode.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.6.96/css/materialdesignicons.min.css">
    </head>
    <body>
        <div id="main-wrapper">
            <header class="topbar">
                <nav class="top-navbar">
                    <div class="navbar-header">
                        <h1>Todo</h1>
                    </div>
                    <div class="navbar-content">
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8520396629cbb34876de7_48582659', 'topnavbar');
?>

                    </div>
                </nav>
            </header>
            <aside class="left-sidebar">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1283315891629cbb34877de8_47354436', 'sidebar');
?>

                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">
                <div class="container">
                    <div class="card">
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2052928107629cbb34878677_52740968', 'page');
?>

                    </div>
                </div>
                <footer class="footer">
                    Todo App
                </footer>
            </div>
        </div>
    </body>
</html><?php }
/* {block 'topnavbar'} */
class Block_8520396629cbb34876de7_48582659 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'topnavbar' => 
  array (
    0 => 'Block_8520396629cbb34876de7_48582659',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'topnavbar'} */
/* {block 'sidebar'} */
class Block_1283315891629cbb34877de8_47354436 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_1283315891629cbb34877de8_47354436',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'sidebar'} */
/* {block 'page'} */
class Block_2052928107629cbb34878677_52740968 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_2052928107629cbb34878677_52740968',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'page'} */
}
