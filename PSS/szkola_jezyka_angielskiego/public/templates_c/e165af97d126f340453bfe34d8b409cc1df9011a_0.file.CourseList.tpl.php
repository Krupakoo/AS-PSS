<?php
/* Smarty version 3.1.30, created on 2026-01-09 13:28:22
  from "D:\xampp\htdocs\php_09_bd\app\views\CourseList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6960f466262e43_55902966',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e165af97d126f340453bfe34d8b409cc1df9011a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_09_bd\\app\\views\\CourseList.tpl',
      1 => 1767961696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_6960f466262e43_55902966 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17355209876960f466253032_07630783', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8486852026960f466262a31_09476188', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_17355209876960f466253032_07630783 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="background: white; padding: 1.5em; border-radius: 15px; margin-bottom: 2em; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseList" method="post" class="pure-form">
        <legend>Wyszukaj kurs</legend>
        <fieldset>
            <input type="text" name="sf_nazwa" placeholder="Nazwa kursu..." value="<?php echo $_smarty_tpl->tpl_vars['search_name']->value;?>
" class="pure-input-1-2">
            <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseList" class="pure-button">Wyczyść</a>
        </fieldset>
    </form>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_8486852026960f466262a31_09476188 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g" style="margin: 0 -10px;">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['courses']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
        <div class="pure-u-1 pure-u-md-1-3" style="padding: 10px;">
            <div class="msg" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between; text-align: left;">
                
                <div>
                    <h3 style="margin-top: 0; color: #1cb841;"><?php echo $_smarty_tpl->tpl_vars['c']->value["nazwa"];?>
</h3>
                    <p style="color: #7f8c8d; font-size: 0.9em; line-height: 1.6;">
                        Profesjonalne zajęcia z lektorem online. Program obejmuje konwersacje, gramatykę oraz słownictwo tematyczne.
                    </p>
                    <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">
                    <ul style="list-style: none; padding: 0; font-size: 0.85em; color: #555;">
                        <li><i class="fa fa-check" style="color: #1cb841;"></i> Materiały PDF w cenie</li>
                        <li><i class="fa fa-check" style="color: #1cb841;"></i> Certyfikat ukończenia</li>
                    </ul>
                </div>

                <div style="margin-top: 2em; text-align: center;">
                    <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                        
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'kursant') {?>
                            <a class="button-success button-large" 
                               href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseEnroll/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_kursu'];?>
"
                               style="width: 100%; text-decoration: none !important;">
                                ZAPISZ SIĘ <i class="fa fa-chevron-right" style="margin-left: 10px;"></i>
                            </a>
                        <?php } else { ?>
                            <span style="color: #7f8c8d; font-size: 0.85em;">Opcja zapisu dostępna dla kursantów</span>
                        <?php }?>
                    <?php } else { ?>
                        <a class="button-secondary button-small" 
                           href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginShow"
                           style="width: 100%; text-decoration: none !important;">
                            Zaloguj się, aby kupić
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

</div>
<?php
}
}
/* {/block 'bottom'} */
}
