<?php
/* Smarty version 3.1.30, created on 2026-01-09 23:10:44
  from "D:\xampp\htdocs\szkola_jezyka_angielskiego\app\views\RegisterView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_69617ce43c9c12_07525142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bbbd05315064209bc4834d1a2e46be15c4fd37b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\szkola_jezyka_angielskiego\\app\\views\\RegisterView.tpl',
      1 => 1767629785,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_69617ce43c9c12_07525142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_72332316869617ce43c97a4_56582723', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_72332316869617ce43c97a4_56582723 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="bottom-margin">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
registerSave" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Rejestracja Kursanta</legend>
            
            <div class="pure-control-group">
                <label for="login">Login</label>
                <input id="login" type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
">
            </div>
            
            <div class="pure-control-group">
                <label for="pass">Hasło</label>
                <input id="pass" type="password" name="pass">
            </div>

            <div class="pure-control-group">
                <label for="imie">Imię</label>
                <input id="imie" type="text" name="imie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->imie;?>
">
            </div>

            <div class="pure-control-group">
                <label for="nazwisko">Nazwisko</label>
                <input id="nazwisko" type="text" name="nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwisko;?>
">
            </div>

            <div class="pure-control-group">
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
">
            </div>

            <div class="pure-control-group">
                <label for="telefon">Numer telefonu</label>
                <input id="telefon" type="text" name="telefon" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->telefon;?>
">
            </div>

            <div class="pure-controls">
                <input type="submit" class="pure-button button-success" value="Zarejestruj się"/>
                <a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
courseList">Anuluj</a>
            </div>
        </fieldset>
    </form>
</div>
<?php
}
}
/* {/block 'top'} */
}
