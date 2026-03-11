<?php
/* Smarty version 3.1.30, created on 2026-01-10 11:45:51
  from "D:\xampp\htdocs\szkola_jezyka_angielskiego\app\views\CourseOpinionsView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_69622ddfb19bc2_30462209',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89b1925b10e6f919f4b6ef07dd76303fa24dbdd9' => 
    array (
      0 => 'D:\\xampp\\htdocs\\szkola_jezyka_angielskiego\\app\\views\\CourseOpinionsView.tpl',
      1 => 1767961428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_69622ddfb19bc2_30462209 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_57497967869622ddfb07e28_84648899', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_38682524869622ddfb19530_44650914', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_57497967869622ddfb07e28_84648899 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="margin-bottom: 2em; border-left: 6px solid #3498db; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Opinie o kursie: <?php echo $_smarty_tpl->tpl_vars['course_info']->value['nazwa'];?>
</h1>
    <p style="color: #7f8c8d; margin-top: 5px;">Zestawienie recenzji wystawionych przez kursantów.</p>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_38682524869622ddfb19530_44650914 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <div class="pure-u-1">
        <?php if (count($_smarty_tpl->tpl_vars['opinions']->value) > 0) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['opinions']->value, 'o');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
?>
                <div style="margin-bottom: 1.5em; padding: 20px; background: white; border-radius: 10px; border: 1px solid #eee; position: relative;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <strong style="color: #2c3e50;"><?php echo $_smarty_tpl->tpl_vars['o']->value['imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['o']->value['nazwisko'];?>
</strong>
                        <small style="color: #bdc3c7;"><?php echo $_smarty_tpl->tpl_vars['o']->value['data_utworzenia'];?>
</small>
                    </div>
                    <p style="color: #34495e; font-style: italic; line-height: 1.6;">"<?php echo $_smarty_tpl->tpl_vars['o']->value['tresc_opinii'];?>
"</p>

                    <?php if ($_SESSION['role'] == 'admin') {?>
    <div style="text-align: right; margin-top: 10px;">
        
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
opinionDelete/<?php echo $_smarty_tpl->tpl_vars['o']->value['id_opinii'];?>
/<?php echo $_smarty_tpl->tpl_vars['course_info']->value['id_kursu'];?>
" 
           class="pure-button" 
           style="background: #e74c3c; color: white; border-radius: 5px;"
           onclick="return confirm('Czy na pewno chcesz usunąć tę opinię?')">
            <i class="fa fa-trash"></i> Usuń opinię
        </a>
    </div>
<?php }?>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php } else { ?>
            <div class="msg info">Ten kurs nie posiada jeszcze żadnych opinii.</div>
        <?php }?>

        <div style="margin-top: 2em;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myCourses" class="pure-button" style="background: #34495e; color: white; border-radius: 5px;">
                <i class="fa fa-arrow-left"></i> Powrót do listy kursów
            </a>
        </div>
    </div>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
