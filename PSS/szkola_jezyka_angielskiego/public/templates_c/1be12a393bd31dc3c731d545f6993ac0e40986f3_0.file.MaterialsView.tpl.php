<?php
/* Smarty version 3.1.30, created on 2026-01-09 14:09:45
  from "D:\xampp\htdocs\php_09_bd\app\views\MaterialsView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6960fe19dbc198_59925747',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1be12a393bd31dc3c731d545f6993ac0e40986f3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_09_bd\\app\\views\\MaterialsView.tpl',
      1 => 1767964182,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6960fe19dbc198_59925747 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3302821376960fe19daf792_69281968', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11464623926960fe19dbbd73_55720001', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_3302821376960fe19daf792_69281968 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="margin-bottom: 2em; border-left: 6px solid #3498db; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Materiały: <?php echo $_smarty_tpl->tpl_vars['course_info']->value['nazwa'];?>
</h1>
    <p style="color: #7f8c8d; margin-top: 5px;">Lista materiałów edukacyjnych udostępnionych przez lektora.</p>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_11464623926960fe19dbbd73_55720001 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <div class="pure-u-1">
        <?php if (count($_smarty_tpl->tpl_vars['materials']->value) > 0) {?>
            <div class="pure-g">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['materials']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                    <div class="pure-u-1 pure-u-md-1-2">
                        <div style="margin: 10px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-top: 4px solid #3498db;">
                            <h3 style="margin-top:0; color: #2980b9;"><?php echo $_smarty_tpl->tpl_vars['m']->value['tytul'];?>
</h3> 
                            <p style="color: #555; font-size: 0.9em; min-height: 40px;"><?php echo $_smarty_tpl->tpl_vars['m']->value['opis'];?>
</p>
                            
                            <div style="margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px; text-align: right;">
                                
                                <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url_pliku'];?>
" target="_blank" class="pure-button" style="background: #3498db; color: white; border-radius: 5px;">
                                    <i class="fa fa-external-link-alt"></i> Otwórz / Pobierz
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </div>
        <?php } else { ?>
            <div class="msg info">Brak dostępnych materiałów dla tego kursu.</div>
        <?php }?>

        <div style="margin-top: 2em;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myCourses" class="pure-button" style="background: #34495e; color: white; border-radius: 5px;">
                <i class="fa fa-arrow-left"></i> Powrót do moich kursów
            </a>
        </div>
    </div>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
