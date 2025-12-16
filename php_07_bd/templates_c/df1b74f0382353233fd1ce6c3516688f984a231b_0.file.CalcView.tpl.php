<?php
/* Smarty version 3.1.30, created on 2025-12-16 16:15:28
  from "D:\xampp\htdocs\php_08_bd\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_69417790ee6f42_05501136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df1b74f0382353233fd1ce6c3516688f984a231b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_08_bd\\app\\views\\CalcView.tpl',
      1 => 1765896528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_69417790ee6f42_05501136 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_52316339069417790ed8e39_58671286', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_104178086569417790ee6b12_13652357', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_52316339069417790ed8e39_58671286 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <header>
        <h2>Kalkulator Kredytowy z Zapisem do BD</h2>
    </header>

    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcHistory" class="pure-button button-secondary">Pokaż Historię Obliczeń</a>
    <br><br>

    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Parametry Kredytu</legend>
            
            <div class="pure-control-group">
                <label for="id_kwota">Kwota Kredytu:</label>
                <input id="id_kwota" type="text" name="kwota" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value->kwota)===null||$tmp==='' ? '' : $tmp);?>
" placeholder="np. 10000" />
            </div>
            
            <div class="pure-control-group">
                <label for="id_lata">Liczba Lat:</label>
                <input id="id_lata" type="text" name="lata" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value->lata)===null||$tmp==='' ? '' : $tmp);?>
" placeholder="np. 5" />
            </div>
            
            <div class="pure-control-group">
                <label for="id_procent">Oprocentowanie (%):</label>
                <input id="id_procent" type="text" name="procent" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value->procent)===null||$tmp==='' ? '' : $tmp);?>
" placeholder="np. 8" />
            </div>
            
            <div class="pure-controls">
                <input type="submit" value="Oblicz i Zapisz" class="pure-button pure-button-primary" />
            </div>
        </fieldset>
    </form>
</div>

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_104178086569417790ee6b12_13652357 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
    <div class="messages">
    <ul class="pure-alert pure-alert-error">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
        <li class="msg type-error"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
    </div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
    <div class="messages">
    <ul class="pure-alert pure-alert-info">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
        <li class="msg type-info"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ul>
    </div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['result']->value->rata)) {?>
    <div class="bottom-margin">
        <p class="pure-form message-success">
            Miesięczna Rata: **<?php echo $_smarty_tpl->tpl_vars['result']->value->rata;?>
** PLN.
        </p>
    </div>
<?php }?>

<?php
}
}
/* {/block 'bottom'} */
}
