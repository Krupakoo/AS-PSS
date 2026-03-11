<?php
/* Smarty version 3.1.30, created on 2026-01-10 11:06:36
  from "D:\xampp\htdocs\szkola_jezyka_angielskiego\app\views\GradeAddView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_696224ac30dd64_26656749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fc499dfbd7137438e278c583d563a9d24f747cd' => 
    array (
      0 => 'D:\\xampp\\htdocs\\szkola_jezyka_angielskiego\\app\\views\\GradeAddView.tpl',
      1 => 1767953875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_696224ac30dd64_26656749 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1184918770696224ac30d921_30534030', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'bottom'} */
class Block_1184918770696224ac30d921_30534030 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <div class="pure-u-1" style="max-width: 600px; margin: 0 auto; background: white; padding: 2em; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <h2 style="color: #2c3e50;">Wystaw ocenę kursantowi</h2>
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gradeSave" method="post" class="pure-form pure-form-stacked">
            <label for="id_kursant">Wybierz Kursanta:</label>
            <select name="id_kursant" id="id_kursant" style="width: 100%;" required>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['students']->value, 's');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['id_uzytkownika'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['s']->value['nazwisko'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </select>

            <label for="id_kursu" style="margin-top: 15px;">Wybierz Kurs:</label>
            <select name="id_kursu" id="id_kursu" style="width: 100%;" required>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['courses']->value, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value['id_kursu'];?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value['nazwa'];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </select>

            <label for="ocena" style="margin-top: 15px;">Ocena:</label>
            <input type="text" name="ocena" id="ocena" placeholder="Np. 5" style="width: 100%;" required>

            <div style="margin-top: 25px; display: flex; gap: 10px;">
                <button type="submit" class="pure-button button-success">Zapisz ocenę</button>
                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myCourses" class="pure-button">Powrót</a>
            </div>
        </form>
    </div>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
