<?php
/* Smarty version 3.1.30, created on 2026-01-10 11:42:17
  from "D:\xampp\htdocs\szkola_jezyka_angielskiego\app\views\MessageNewView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_69622d091c4172_35191658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2b4b0517cc17b33746693ffaab907a302c4d9bd' => 
    array (
      0 => 'D:\\xampp\\htdocs\\szkola_jezyka_angielskiego\\app\\views\\MessageNewView.tpl',
      1 => 1767958928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_69622d091c4172_35191658 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_154244207469622d091b3f63_06691755', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_60837734069622d091c3d94_05260887', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_154244207469622d091b3f63_06691755 extends Smarty_Internal_Block
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
class Block_60837734069622d091c3d94_05260887 extends Smarty_Internal_Block
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
