<?php
/* Smarty version 5.4.2, created on 2025-11-23 14:53:44
  from 'file:D:\xampp\htdocs\php_04_szablony_smarty\app\../templates/main.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_692311e85c3707_52609711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6261a79756eaaf0d5a706a436c1c522d37aee5f1' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_04_szablony_smarty\\app\\../templates/main.html',
      1 => 1742282302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_692311e85c3707_52609711 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_szablony_smarty\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = $_smarty_tpl->getValue('page_description') ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>
">

    <title><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/layouts/marketing.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/style.css">
<?php if ($_smarty_tpl->getValue('hide_intro')) {?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('app_url');?>
/css/style_hide_intro.css">
<?php }?>
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/js/softscroll.js"><?php echo '</script'; ?>
>

</head>
<body>

<div id="app_top" class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href=""><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</a>
        <ul>
            <li class="pure-menu-selected"><a href="#app_top">Góra strony</a></li>
            <li><a href="#app_content">Idź do formularza</a></li>
        </ul>
    </div>
</div>

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head"><?php echo (($tmp = $_smarty_tpl->getValue('page_title') ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</h1>
        <p class="splash-subhead">
             <?php echo (($tmp = $_smarty_tpl->getValue('page_description') ?? null)===null||$tmp==='' ? "Opis domyślny" ?? null : $tmp);?>

        </p>
        <p>
            <a href="#app_content" class="pure-button pure-button-primary">Idź do formularza</a>
        </p>
    </div>
</div>

<div class="content-wrapper">

    <div id="app_content" class="content">

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1232953207692311e85c2162_63003071', 'content');
?>


    </div>

    <div class="footer l-box is-center">
		<p>
<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1055767473692311e85c2ed4_93810777', 'footer');
?>

		</p>
        <p>Widok oparty na stylach i szablonie <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>. (autor przykładu: Przemysław Kudłacik)</p>
    </div>

</div>


</body>
</html><?php }
/* {block 'content'} */
class Block_1232953207692311e85c2162_63003071 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_szablony_smarty\\templates';
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_1055767473692311e85c2ed4_93810777 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_szablony_smarty\\templates';
?>
 Domyślna treść stopki .... <?php
}
}
/* {/block 'footer'} */
}
