<?php
/* Smarty version 5.4.2, created on 2025-11-23 15:28:13
  from 'file:D:\xampp\htdocs\php_04_szablony_smarty/app/calc.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_692319fdd95698_56738645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cd103ad91c857da6934489172dfb1f64d2a5503' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_04_szablony_smarty/app/calc.html',
      1 => 1763908080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_692319fdd95698_56738645 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_szablony_smarty\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_913617894692319fdd7abd4_17371333', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1101128889692319fdd7ed00_24686764', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_913617894692319fdd7abd4_17371333 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_szablony_smarty\\app';
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1101128889692319fdd7ed00_24686764 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_szablony_smarty\\app';
?>


<h2 class="content-head is-center">Kalkulator Kredytowy</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
    <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
        <fieldset>

            <label for="id_kwota">Kwota kredytu (PLN)</label>
            <input id="id_kwota" type="text" placeholder="Kwota" name="kwota" value="<?php echo $_smarty_tpl->getValue('form')['kwota'];?>
">

            <label for="id_lata">Liczba lat</label>
            <input id="id_lata" type="text" placeholder="Lata" name="lata" value="<?php echo $_smarty_tpl->getValue('form')['lata'];?>
">

            <label for="id_procent">Oprocentowanie (%)</label>
            <input id="id_procent" type="text" placeholder="Procent" name="procent" value="<?php echo $_smarty_tpl->getValue('form')['procent'];?>
">

            <button type="submit" class="pure-button pure-button-primary">Oblicz ratę</button>
        </fieldset>
    </form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

<?php if ((null !== ($_smarty_tpl->getValue('infos') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('infos')) > 0) {?>
        <h4>Informacje: </h4>
        <ol class="inf">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('infos'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
                    <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>        
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ol>
<?php }?>

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null)) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?>
        <h4>Wystąpiły błędy: </h4>
        <ol class="err">
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
                    <li><?php echo $_smarty_tpl->getValue('msg');?>
</li>        
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ol>
<?php }?>

<?php if ((null !== ($_smarty_tpl->getValue('result') ?? null))) {?>
    <h4>Miesięczna rata</h4>
    <p class="res">
    <?php echo $_smarty_tpl->getValue('result');?>

    </p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
