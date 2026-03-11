<?php
/* Smarty version 3.1.30, created on 2026-01-09 14:05:25
  from "D:\xampp\htdocs\php_09_bd\app\views\MaterialAddView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6960fd15034b66_81676445',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c33097dbdc0279d9a5246160e38e66c3c46b219a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_09_bd\\app\\views\\MaterialAddView.tpl',
      1 => 1767963921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6960fd15034b66_81676445 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11497879326960fd15034774_30787187', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'bottom'} */
class Block_11497879326960fd15034774_30787187 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <div class="pure-u-1" style="max-width: 600px; margin: 0 auto; background: white; padding: 2em; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <h2 style="color: #2c3e50; border-bottom: 2px solid #f39c12; padding-bottom: 10px;">Dodaj nowy materiał</h2>
        
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
materialSave" method="post" class="pure-form pure-form-stacked">
            <label for="id_kursu">Wybierz kurs:</label>
            <select name="id_kursu" id="id_kursu" style="width: 100%;" required>
                <option value="">-- Wybierz kurs --</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['courses']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id_kursu'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['nazwa'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </select>

            <label for="tytul" style="margin-top:15px;">Tytuł materiału:</label>
            <input type="text" name="tytul" id="tytul" style="width: 100%;" placeholder="np. Słówka Unit 1" required>

            <label for="opis" style="margin-top:15px;">Opis (opcjonalnie):</label>
            <textarea name="opis" id="opis" style="width: 100%; height: 80px;"></textarea>

            <label for="url_pliku" style="margin-top:15px;">Link do materiału (np. Google Drive / PDF):</label>
            <input type="url" name="url_pliku" id="url_pliku" style="width: 100%;" placeholder="https://..." required>

            <div style="margin-top: 25px; display: flex; gap: 10px;">
                <button type="submit" class="pure-button" style="background: #f39c12; color: white; border-radius: 5px;">Zapisz materiał</button>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myCourses" class="pure-button">Anuluj</a>
            </div>
        </form>
    </div>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
