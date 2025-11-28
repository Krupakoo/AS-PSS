<?php
/* Smarty version 3.1.30, created on 2025-11-28 22:56:47
  from "D:\xampp\htdocs\php_04_obiektowosc\app\CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_692a1a9f19edb3_28208052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33b02621fc8414788e81245615a87bd1ef2192db' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_04_obiektowosc\\app\\CalcView.html',
      1 => 1764366503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_692a1a9f19edb3_28208052 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1844220627692a1a9f18da17_51311774', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1423233673692a1a9f19e603_21127632', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender(($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'footer'} */
class Block_1844220627692a1a9f18da17_51311774 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1423233673692a1a9f19e603_21127632 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Kalkulator Kredytowy (OOP)</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post">
    <fieldset>

        <label for="id_kwota">Kwota kredytu (PLN)</label>
        <input id="id_kwota" type="text" placeholder="Kwota" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
">

        <label for="id_lata">Liczba lat</label>
        <input id="id_lata" type="text" placeholder="Lata" name="lata" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lata;?>
">

        <label for="id_procent">Oprocentowanie (%)</label>
        <input id="id_procent" type="text" placeholder="Procent" name="procent" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->procent;?>
">

        <button type="submit" class="pure-button pure-button-primary">Oblicz ratę</button>
    </fieldset>
</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
    <h4>Informacje: </h4>
    <ol class="inf">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
    <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
    <h4>Wystąpiły błędy: </h4>
    <ol class="err">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
    <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ol>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->rata)) {?>
    <h4>Miesięczna rata</h4>
    <p class="res">
    <?php echo $_smarty_tpl->tpl_vars['res']->value->rata;?>

    </p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
