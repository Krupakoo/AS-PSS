<?php
/* Smarty version 3.1.30, created on 2026-01-09 13:14:41
  from "D:\xampp\htdocs\php_09_bd\app\views\MessageListView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6960f131ad0119_88915783',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e68663ab8a7ceb13a588375e5bfa60c7313bc7b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_09_bd\\app\\views\\MessageListView.tpl',
      1 => 1767959667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6960f131ad0119_88915783 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1137348956960f131ac24e3_55799351', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18446521836960f131acfcc4_75569201', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_1137348956960f131ac24e3_55799351 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="margin-bottom: 2em; border-left: 6px solid #1cb841; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Moje Wiadomości</h1>
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
messageNew" class="pure-button button-success" style="background: #1cb841; color: white; margin-top: 10px;">+ NAPISZ NOWĄ</a>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_18446521836960f131acfcc4_75569201 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2 style="color: #2c3e50; border-bottom: 2px solid #1cb841; padding-bottom: 10px; margin-bottom: 20px;">Skrzynka odbiorcza</h2>

<table class="pure-table pure-table-horizontal" style="width: 100%; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <thead>
        <tr style="background: #eee;">
            <th style="width: 20%;">Od</th>
            <th style="width: 25%;">Temat</th>
            <th style="width: 40%;">Treść</th>
            <th style="width: 15%;">Data</th>
        </tr>
    </thead>
    <tbody>
    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value) && count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['nazwisko'];?>
</td>
                <td><strong><?php echo $_smarty_tpl->tpl_vars['m']->value['temat'];?>
</strong></td>
                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['tresc'];?>
</td>
                <td><small><?php echo $_smarty_tpl->tpl_vars['m']->value['data_wyslania'];?>
</small></td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php } else { ?>
        <tr><td colspan="4" style="text-align: center; padding: 2em;">Brak odebranych wiadomości.</td></tr>
    <?php }?>
    </tbody>
</table>

<div style="margin-top: 20px;">
    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
messageNew" class="pure-button button-success" style="background: #1cb841; color: white;">+ NAPISZ NOWĄ</a>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
