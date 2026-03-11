<?php
/* Smarty version 3.1.30, created on 2026-01-09 22:59:57
  from "D:\xampp\htdocs\szkola_jezyka_angielskiego\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_69617a5db5a090_73738045',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27acaf2b72f21bd0a10c2149343c1eaa9f917b75' => 
    array (
      0 => 'D:\\xampp\\htdocs\\szkola_jezyka_angielskiego\\app\\views\\templates\\main.tpl',
      1 => 1767953431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69617a5db5a090_73738045 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "English Hub" : $tmp);?>
</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

<div class="header" style="background: white; padding: 1em 2em; box-shadow: 0 2px 10px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center;">
    <div class="logo" style="font-size: 1.5em; font-weight: bold;">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
mainPage" style="text-decoration: none !important; color: #1cb841;">
            <i class="fa fa-graduation-cap"></i> English Hub
        </a>
    </div>
    
    <div class="menu">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseList" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">Kursy</a>
        <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myCourses" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">Moje Kursy</a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
mySchedule" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">
                <i class="fa fa-calendar"></i> Harmonogram
            </a>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
messageList" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">
                <i class="fa fa-envelope"></i> Wiadomości
            </a>
            
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myGrades" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">
                <i class="fa fa-star"></i> Oceny
            </a>
        <?php }?>

        <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" class="pure-button button-error" style="border-radius: 20px; text-decoration: none !important; margin-left: 10px;">
                Wyloguj
            </a>
        <?php } else { ?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginShow" class="pure-button button-success" style="border-radius: 20px; text-decoration: none !important; background: #1cb841; color: white;">
                Zaloguj się
            </a>
        <?php }?>
    </div>
</div>

<div class="content" style="max-width: 1000px; margin: 2em auto; padding: 0 20px;">
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
        <div class="msg info" style="margin-bottom: 1em; background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; border-left: 5px solid #28a745;">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
                <div><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
        <div class="msg error" style="margin-bottom: 1em; background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; border-left: 5px solid #dc3545;">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
                <div><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    <?php }?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_80083334469617a5db59538_30698553', 'top');
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_84950191969617a5db59bf4_43090065', 'bottom');
?>

</div>
</body>
</html><?php }
/* {block 'top'} */
class Block_80083334469617a5db59538_30698553 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_84950191969617a5db59bf4_43090065 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'bottom'} */
}
