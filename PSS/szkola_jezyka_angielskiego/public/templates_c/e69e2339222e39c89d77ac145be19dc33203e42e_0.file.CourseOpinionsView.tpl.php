<?php
/* Smarty version 3.1.30, created on 2026-01-09 13:23:49
  from "D:\xampp\htdocs\php_09_bd\app\views\CourseOpinionsView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6960f355db05c9_10790468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e69e2339222e39c89d77ac145be19dc33203e42e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_09_bd\\app\\views\\CourseOpinionsView.tpl',
      1 => 1767961428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6960f355db05c9_10790468 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3950911346960f355d9ed15_76614566', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14754542406960f355db0160_24442534', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_3950911346960f355d9ed15_76614566 extends Smarty_Internal_Block
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
class Block_14754542406960f355db0160_24442534 extends Smarty_Internal_Block
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
