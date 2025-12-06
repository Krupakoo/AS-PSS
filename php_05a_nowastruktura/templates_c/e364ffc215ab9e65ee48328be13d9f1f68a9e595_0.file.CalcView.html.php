<?php
/* Smarty version 3.1.30, created on 2025-12-06 21:33:31
  from "D:\xampp\htdocs\php_06_nowastruktura\app\views\CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6934931bd648a6_10591224',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e364ffc215ab9e65ee48328be13d9f1f68a9e595' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_06_nowastruktura\\app\\views\\CalcView.html',
      1 => 1765053184,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.html' => 1,
  ),
),false)) {
function content_6934931bd648a6_10591224 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9964772076934931bba0cf4_60220952', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7113276286934931bd64419_78465399', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_9964772076934931bba0cf4_60220952 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa treść stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_7113276286934931bd64419_78465399 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Kalkulator Kredytowy</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
	<fieldset>
		
		<label for="kwota">Kwota kredytu (PLN)</label>
		<input id="kwota" type="text" placeholder="Np. 150000" name="kwota" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value->kwota)===null||$tmp==='' ? '' : $tmp);?>
">
		
		<label for="lata">Okres kredytowania (Lata)</label>
		<input id="lata" type="text" placeholder="Np. 20" name="lata" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value->lata)===null||$tmp==='' ? '' : $tmp);?>
">
		
		<label for="procent">Oprocentowanie (%)</label>
		<input id="procent" type="text" placeholder="Np. 7.5" name="procent" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value->procent)===null||$tmp==='' ? '' : $tmp);?>
">
		
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz Ratę</button>
</form>

<div class="messages">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->rata)) {?>
	<h4>Wynik</h4>
	<p class="res">
	Miesięczna rata wynosi: **<?php echo $_smarty_tpl->tpl_vars['res']->value->rata;?>
**
	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
