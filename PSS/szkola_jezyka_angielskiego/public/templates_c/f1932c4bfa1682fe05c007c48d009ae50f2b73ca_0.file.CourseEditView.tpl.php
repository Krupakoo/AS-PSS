<?php
/* Smarty version 3.1.30, created on 2026-01-09 13:21:57
  from "D:\xampp\htdocs\php_09_bd\app\views\CourseEditView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6960f2e59c2ea8_14537912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1932c4bfa1682fe05c007c48d009ae50f2b73ca' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_09_bd\\app\\views\\CourseEditView.tpl',
      1 => 1767957853,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6960f2e59c2ea8_14537912 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21417157996960f2e59b5c66_52986887', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15930374836960f2e59c2b02_54913941', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_21417157996960f2e59b5c66_52986887 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="margin-bottom: 2em; border-left: 6px solid #1cb841; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Edycja Kursu</h1>
    <p style="color: #7f8c8d; margin-top: 5px;">Modyfikacja danych istniejącego kursu w systemie</p>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_15930374836960f2e59c2b02_54913941 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <div class="pure-u-1" style="max-width: 600px; margin: 0 auto; background: white; padding: 2em; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        
        <h2 style="color: #2c3e50; border-bottom: 2px solid #1cb841; padding-bottom: 10px; margin-bottom: 20px;">
            <i class="fa fa-edit"></i> Kurs: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value['nazwa'])===null||$tmp==='' ? 'Brak nazwy' : $tmp);?>

        </h2>

        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseSave" method="post" class="pure-form pure-form-stacked">
            
            <input type="hidden" name="id_kursu" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['id_kursu'];?>
">

            <fieldset>
                <label for="nazwa">Nazwa kursu:</label>
                <input type="text" name="nazwa" id="nazwa" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value['nazwa'])===null||$tmp==='' ? '' : $tmp);?>
" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>

                <label for="opis">Opis kursu:</label>
<textarea name="opis" id="opis" style="width: 100%; height: 100px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value['opis'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
                <div style="margin-top: 30px; display: flex; gap: 10px;">
                    <button type="submit" class="pure-button" style="background: #1cb841; color: white; border-radius: 5px; padding: 0.8em 2em;">
                        <i class="fa fa-save"></i> Zapisz zmiany
                    </button>
                    
                    <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myCourses" class="pure-button" style="border-radius: 5px; padding: 0.8em 2em;">
                        Anuluj
                    </a>
                </div>
            </fieldset>
        </form>
        
    </div>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
