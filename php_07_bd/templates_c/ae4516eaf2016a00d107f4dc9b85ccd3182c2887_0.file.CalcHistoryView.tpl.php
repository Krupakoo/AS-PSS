<?php
/* Smarty version 3.1.30, created on 2025-12-16 22:14:43
  from "D:\xampp\htdocs\php_08_bd\app\views\CalcHistoryView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6941cbc3ae1f09_12244002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae4516eaf2016a00d107f4dc9b85ccd3182c2887' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_08_bd\\app\\views\\CalcHistoryView.tpl',
      1 => 1765919679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6941cbc3ae1f09_12244002 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1273474736941cbc3ae1ad2_72106337', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_1273474736941cbc3ae1ad2_72106337 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-1-2">

<h2 class="content-head is-center">Historia obliczeń</h2>

<table class="pure-table pure-table-bordered" style="margin: 0 auto;">
<thead>
	<tr>
		<th>Kwota</th>
		<th>Lata</th>
		<th>Procent</th>
		<th>Rata</th>
		<th>Data</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['records']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["kwota"];?>
 zł</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["lata"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["procent"];?>
%</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["rata"];?>
 zł</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["data"];?>
</td></tr>
<?php
}
} else {
?>

	<tr>
		<td colspan="5">Brak zapisanych obliczeń w historii.</td>
	</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</tbody>
</table>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
