<?php
/* Smarty version 3.1.30, created on 2026-01-09 13:25:09
  from "D:\xampp\htdocs\php_09_bd\app\views\MessageNewView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6960f3a558d518_96430382',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a9e0488761da85f0e9054ef0d82b5c4b284955e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_09_bd\\app\\views\\MessageNewView.tpl',
      1 => 1767958928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6960f3a558d518_96430382 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2015577776960f3a557fd63_35916117', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21473207146960f3a558d0c6_34489667', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_2015577776960f3a557fd63_35916117 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="margin-bottom: 2em; border-left: 6px solid #3498db; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Nowa Wiadomość</h1>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_21473207146960f3a558d0c6_34489667 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <div class="pure-u-1" style="max-width: 700px; margin: 0 auto;">
        <div style="background: white; padding: 2em; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
messageSend" method="post" class="pure-form pure-form-stacked">
                <label for="id_odbiorca">Odbiorca:</label>
                <select name="id_odbiorca" id="id_odbiorca" style="width: 100%; height: 2.5em;" required>
                    <option value="">-- Wybierz z listy --</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['receivers']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['r']->value['id_uzytkownika'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['r']->value['nazwisko'];?>
 (<?php echo $_smarty_tpl->tpl_vars['r']->value['rola'];?>
)</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </select>
                <label for="temat">Temat:</label>
                <input type="text" name="temat" id="temat" style="width: 100%;" required>
                <label for="tresc">Treść:</label>
                <textarea name="tresc" id="tresc" rows="6" style="width: 100%;" required></textarea>
                <button type="submit" class="pure-button button-success" style="background: #1cb841; color: white; margin-top: 1em;">Wyślij</button>
            </form>
        </div>
    </div>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
