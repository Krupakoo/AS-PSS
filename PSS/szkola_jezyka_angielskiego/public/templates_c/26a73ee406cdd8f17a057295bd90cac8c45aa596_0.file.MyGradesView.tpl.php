<?php
/* Smarty version 3.1.30, created on 2026-01-09 23:11:06
  from "D:\xampp\htdocs\szkola_jezyka_angielskiego\app\views\MyGradesView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_69617cfa3f16a5_84359361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26a73ee406cdd8f17a057295bd90cac8c45aa596' => 
    array (
      0 => 'D:\\xampp\\htdocs\\szkola_jezyka_angielskiego\\app\\views\\MyGradesView.tpl',
      1 => 1767955716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_69617cfa3f16a5_84359361 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_58669897569617cfa3f1101_52027267', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'bottom'} */
class Block_58669897569617cfa3f1101_52027267 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <div class="pure-u-1" style="background: white; padding: 2em; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h2 style="color: #2c3e50; border-bottom: 2px solid #9b59b6; padding-bottom: 10px;">
            <i class="fa fa-star"></i> 
            <?php if ($_SESSION['role'] == 'kursant') {?>Moje Oceny<?php } else { ?>Dziennik Ocen<?php }?>
        </h2>

        <?php if (count($_smarty_tpl->tpl_vars['grades']->value) > 0) {?>
            <table class="pure-table pure-table-horizontal" style="width: 100%;">
                <thead>
                    <tr style="background: #f8f9fa;">
                        <th>Kurs</th>
                        <th>Ocena</th>
                        <th>Data</th>
                        
                        <?php if ($_SESSION['role'] != 'kursant') {?><th>Kursant</th><?php }?>
                        
                        <?php if ($_SESSION['role'] != 'lektor') {?><th>Lektor</th><?php }?>
                    </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['grades']->value, 'g');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
?>
                    <tr>
                        <td><strong><?php echo $_smarty_tpl->tpl_vars['g']->value['nazwa'];?>
</strong></td>
                        <td><span class="pure-button" style="background: #9b59b6; color: white; border-radius: 5px; min-width: 40px;"><?php echo $_smarty_tpl->tpl_vars['g']->value['wartosc'];?>
</span></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['g']->value['data_wystawienia'];?>
</td>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['g']->value['student_imie'])) {?>
                            <td><?php echo $_smarty_tpl->tpl_vars['g']->value['student_imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['g']->value['student_nazwisko'];?>
</td>
                        <?php }?>
                        
                        <?php if (isset($_smarty_tpl->tpl_vars['g']->value['lektor_imie'])) {?>
                            <td><?php echo $_smarty_tpl->tpl_vars['g']->value['lektor_imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['g']->value['lektor_nazwisko'];?>
</td>
                        <?php }?>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </tbody>
            </table>
        <?php } else { ?>
            <div class="msg info">Brak zapisanych ocen w systemie.</div>
        <?php }?>
        
        <div style="margin-top: 20px;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myCourses" class="pure-button">Powrót do kursów</a>
        </div>
    </div>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
