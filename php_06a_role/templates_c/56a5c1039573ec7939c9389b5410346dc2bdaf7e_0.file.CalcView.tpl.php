<?php
/* Smarty version 3.1.30, created on 2025-12-06 21:58:16
  from "D:\xampp\htdocs\php_07_role\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_693498e8d11f63_01390320',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56a5c1039573ec7939c9389b5410346dc2bdaf7e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_07_role\\app\\views\\CalcView.tpl',
      1 => 1765054668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_693498e8d11f63_01390320 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1868253497693498e8d11a35_34460741', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_1868253497693498e8d11a35_34460741 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator Kredytowy</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="kwota">Kwota kredytu (PLN): </label>
			<input id="kwota" type="text" name="kwota" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value->kwota)===null||$tmp==='' ? '' : $tmp);?>
"/>
		</div>
        <div class="pure-control-group">
			<label for="lata">Okres (Lata): </label>
			<input id="lata" type="text" name="lata" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value->lata)===null||$tmp==='' ? '' : $tmp);?>
"/>
		</div>
        <div class="pure-control-group">
			<label for="procent">Oprocentowanie (%): </label>
			<input id="procent" type="text" name="procent" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value->procent)===null||$tmp==='' ? '' : $tmp);?>
"/>
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz Ratę" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if (isset($_smarty_tpl->tpl_vars['res']->value->rata)) {?>
<div class="messages info">
	Miesięczna rata wynosi: **<?php echo $_smarty_tpl->tpl_vars['res']->value->rata;?>
**
</div>
<?php }?>

<?php
}
}
/* {/block 'content'} */
}
