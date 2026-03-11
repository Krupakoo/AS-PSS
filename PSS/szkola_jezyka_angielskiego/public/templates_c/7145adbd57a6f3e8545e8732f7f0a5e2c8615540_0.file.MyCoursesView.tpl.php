<?php
/* Smarty version 3.1.30, created on 2026-01-09 13:21:01
  from "D:\xampp\htdocs\php_09_bd\app\views\MyCoursesView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6960f2ad3ae769_58950509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7145adbd57a6f3e8545e8732f7f0a5e2c8615540' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_09_bd\\app\\views\\MyCoursesView.tpl',
      1 => 1767961259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6960f2ad3ae769_58950509 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5469291566960f2ad391bd3_71471356', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3407100636960f2ad3ae1b5_09093563', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_5469291566960f2ad391bd3_71471356 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="margin-bottom: 2em; border-left: 6px solid #1cb841; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Panel Zarządzania Kursami</h1>
    <p style="color: #7f8c8d; margin-top: 5px;">
        <?php if ($_SESSION['role'] == 'admin') {?>
            Panel Administratora - Zarządzanie systemem
        <?php } else { ?>
            Twoje kursy i grupy
        <?php }?>
    </p>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_3407100636960f2ad3ae1b5_09093563 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <div class="pure-u-1" style="margin-bottom: 1.5em; display: flex; gap: 10px; flex-wrap: wrap;">
        
        <?php if ($_SESSION['role'] == 'kursant') {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
completedCourses" class="pure-button" style="background: #34495e; color: white; border-radius: 5px;">
                <i class="fa fa-archive"></i> Historia i ocenianie ukończonych kursów
            </a>
        <?php }?>

        <?php if ($_SESSION['role'] == 'admin') {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
enrollManage" class="pure-button" style="background: #2c3e50; color: white; border-radius: 5px;">
                <i class="fa fa-users"></i> Zarządzaj zapisami
            </a>
        <?php }?>
        
        <?php if ($_SESSION['role'] == 'lektor' || $_SESSION['role'] == 'admin') {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
gradeAdd" class="pure-button" style="background: #e67e22; color: white; border-radius: 5px;">
                <i class="fa fa-plus"></i> Wystaw nową ocenę
            </a>
            
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
materialAdd" class="pure-button" style="background: #3498db; color: white; border-radius: 5px;">
                <i class="fa fa-file-upload"></i> Dodaj materiał
            </a>
        <?php }?>
    </div>

    <?php if (count($_smarty_tpl->tpl_vars['courses']->value) > 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['courses']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
            <div class="pure-u-1 pure-u-md-1-2">
                <div style="margin: 10px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-top: 4px solid #1cb841;">
                    <h3 style="margin-top:0; color: #1cb841;"><?php echo $_smarty_tpl->tpl_vars['c']->value['nazwa'];?>
</h3>
                    
                    <p style="font-size: 0.9em; color: #666;">Status: <strong><?php echo (($tmp = @$_smarty_tpl->tpl_vars['c']->value['status'])===null||$tmp==='' ? 'aktywny' : $tmp);?>
</strong></p>

                    <div style="display: flex; gap: 10px; margin-top: 15px; flex-wrap: wrap;">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseMaterials/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_kursu'];?>
" class="pure-button" style="background: #f39c12; color: white; border-radius: 5px;">
                            <i class="fa fa-folder-open"></i> Materiały
                        </a>

                        
                        <?php if ($_SESSION['role'] == 'lektor' || $_SESSION['role'] == 'admin') {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseOpinions/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_kursu'];?>
" class="pure-button" style="background: #9b59b6; color: white; border-radius: 5px;">
                                <i class="fa fa-comments"></i> Opinie
                            </a>
                        <?php }?>
                        
                        <?php if ($_SESSION['role'] == 'kursant' && isset($_smarty_tpl->tpl_vars['c']->value['id_zapisu'])) {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseFinish/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_zapisu'];?>
" 
                               class="pure-button" 
                               style="background: #d35400; color: white; border-radius: 5px;"
                               onclick="return confirm('Czy na pewno chcesz zakończyć ten kurs?')">
                                <i class="fa fa-check"></i> Zakończ kurs
                            </a>
                        <?php }?>

                        <?php if ($_SESSION['role'] == 'admin') {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_kursu'];?>
" class="pure-button" style="background: #34495e; color: white; border-radius: 5px;">
                                <i class="fa fa-edit"></i> Edytuj
                            </a>
                        <?php }?>
                    </div>
                </div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php } else { ?>
        <div class="pure-u-1">
            <div class="msg info">Brak aktywnych kursów do wyświetlenia.</div>
        </div>
    <?php }?>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
