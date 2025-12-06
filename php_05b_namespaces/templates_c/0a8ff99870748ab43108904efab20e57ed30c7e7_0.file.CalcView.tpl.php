<?php
/* Smarty version 3.1.30, created on 2025-12-06 21:54:03
  from "D:\xampp\htdocs\php_05b_namespaces\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_693497eb200b27_54461683',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a8ff99870748ab43108904efab20e57ed30c7e7' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_05b_namespaces\\app\\views\\CalcView.tpl',
      1 => 1765054150,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_693497eb200b27_54461683 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1972059708693497eb1e6548_19075526', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_164589287693497eb200683_39514342', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_1972059708693497eb1e6548_19075526 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_164589287693497eb200683_39514342 extends Smarty_Internal_Block
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
