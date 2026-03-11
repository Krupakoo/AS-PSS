<?php
/* Smarty version 3.1.30, created on 2026-01-09 23:10:57
  from "D:\xampp\htdocs\szkola_jezyka_angielskiego\app\views\AdminEnrollView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_69617cf16320d0_57171612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ba95c8a3c70a00e46f92f18cb2be93a6fc596e6' => 
    array (
      0 => 'D:\\xampp\\htdocs\\szkola_jezyka_angielskiego\\app\\views\\AdminEnrollView.tpl',
      1 => 1767914556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_69617cf16320d0_57171612 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_94575133269617cf1619286_75268512', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_210930391169617cf1631c88_80317411', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_94575133269617cf1619286_75268512 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="margin-bottom: 2em; border-left: 6px solid #e74c3c; padding: 1.5em; background: white; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;"><i class="fa fa-users"></i> Zarządzanie Zapisami</h1>
    <p style="color: #7f8c8d;">Panel administratora: zatwierdzanie i usuwanie zapisów.</p>
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_210930391169617cf1631c88_80317411 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <div class="pure-u-1">
        
        
        <div style="background: white; padding: 20px; border-radius: 10px; margin-bottom: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
enrollManage" method="post" class="pure-form">
                <input type="text" name="sf_nazwisko" placeholder="Nazwisko..." value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['searchName']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <button type="submit" class="pure-button button-secondary">Szukaj</button>
            </form>
        </div>

        <table class="pure-table pure-table-horizontal" style="width: 100%; background: white;">
            <thead>
                <tr>
                    <th>Kursant</th>
                    <th>Kurs</th>
                    <th>Status</th>
                    <th>Opcje</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['enrollments']->value, 'e');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['e']->value) {
?>
                <tr>
                    <td><strong><?php echo $_smarty_tpl->tpl_vars['e']->value['imie'];?>
 <?php echo $_smarty_tpl->tpl_vars['e']->value['nazwisko'];?>
</strong></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['e']->value['kurs_nazwa'];?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['e']->value['status'] == 'oczekujacy') {?>
                            <span style="color: #e67e22; font-weight: bold;"><i class="fa fa-clock-o"></i> Oczekuje</span>
                        <?php } else { ?>
                            <span style="color: #27ae60; font-weight: bold;"><i class="fa fa-check-circle"></i> Aktywny</span>
                        <?php }?>
                    </td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['e']->value['status'] == 'oczekujacy') {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
enrollAccept/<?php echo $_smarty_tpl->tpl_vars['e']->value['id_zapisu'];?>
" class="pure-button" style="background: #27ae60; color: white;">Akceptuj</a>
                        <?php }?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
enrollDelete/<?php echo $_smarty_tpl->tpl_vars['e']->value['id_zapisu'];?>
" class="pure-button" style="background: #e74c3c; color: white;" onclick="return confirm('Usunąć zapis?')">Usuń</a>
                    </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </tbody>
        </table>
    </div>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
