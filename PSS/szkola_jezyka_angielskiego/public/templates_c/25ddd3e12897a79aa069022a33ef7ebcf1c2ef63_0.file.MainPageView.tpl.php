<?php
/* Smarty version 3.1.30, created on 2026-01-09 23:00:00
  from "D:\xampp\htdocs\szkola_jezyka_angielskiego\app\views\MainPageView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_69617a602530f1_32711089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25ddd3e12897a79aa069022a33ef7ebcf1c2ef63' => 
    array (
      0 => 'D:\\xampp\\htdocs\\szkola_jezyka_angielskiego\\app\\views\\MainPageView.tpl',
      1 => 1767914263,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_69617a602530f1_32711089 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_212832790269617a60252c22_29870162', 'top');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_212832790269617a60252c22_29870162 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="text-align: center; padding: 4em 2em; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); margin-top: 1em;">
    <div style="font-size: 4em; color: #1cb841; margin-bottom: 0.2em;">
        <i class="fa fa-graduation-cap"></i>
    </div>
    
    <h1 style="font-size: 3em; color: #2c3e50; margin-bottom: 0.5em; font-weight: 800;">
        Witaj w English Hub!
    </h1>
    
    <p style="font-size: 1.25em; color: #7f8c8d; max-width: 700px; margin: 0 auto 3em auto; line-height: 1.7;">
        Przełam barierę językową i otwórz się na świat.
        Nasza szkoła oferuje nowoczesne kursy online dostosowane do Twojego tempa nauki.
    </p>
    
    <div style="display: flex; justify-content: center; gap: 25px; flex-wrap: wrap;">
        <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseList" class="button-success button-large" style="min-width: 250px;">
            <i class="fa fa-book" style="margin-right: 12px;"></i> Zobacz ofertę kursów
        </a>

        <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) == 0) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
registerShow" class="button-secondary button-large" style="min-width: 250px;">
                <i class="fa fa-user-plus" style="margin-right: 12px;"></i> Dołącz do nas teraz
            </a>
        <?php } else { ?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myCourses" class="button-secondary button-large" style="min-width: 250px;">
                <i class="fa fa-mortar-board" style="margin-right: 12px;"></i> Przejdź do moich kursów
            </a>
        <?php }?>
    </div>
</div>


<?php if (isset($_smarty_tpl->tpl_vars['stats']->value['count_students'])) {?>
<div class="pure-g" style="margin-top: 3em;">
    <div class="pure-u-1 pure-u-md-1-3" style="padding: 10px;">
        <div style="background: #ffffff; padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-bottom: 4px solid #3498db; text-align: center;">
            <h5 style="color: #7f8c8d; text-transform: uppercase; margin-bottom: 10px; font-size: 0.8em; letter-spacing: 1px;">Aktywni Kursanci</h5>
            <div style="font-size: 2.8em; font-weight: bold; color: #2c3e50;"><?php echo $_smarty_tpl->tpl_vars['stats']->value['count_students'];?>
</div>
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-1-3" style="padding: 10px;">
        <div style="background: #ffffff; padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-bottom: 4px solid #1cb841; text-align: center;">
            <h5 style="color: #7f8c8d; text-transform: uppercase; margin-bottom: 10px; font-size: 0.8em; letter-spacing: 1px;">Dostępne Kursy</h5>
            <div style="font-size: 2.8em; font-weight: bold; color: #2c3e50;"><?php echo $_smarty_tpl->tpl_vars['stats']->value['count_courses'];?>
</div>
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-1-3" style="padding: 10px;">
        <div style="background: #ffffff; padding: 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-bottom: 4px solid #e74c3c; text-align: center;">
            <h5 style="color: #7f8c8d; text-transform: uppercase; margin-bottom: 10px; font-size: 0.8em; letter-spacing: 1px;">Zapisy (7 dni)</h5>
            <div style="font-size: 2.8em; font-weight: bold; color: #2c3e50;"><?php echo $_smarty_tpl->tpl_vars['stats']->value['last_enrolls'];?>
</div>
        </div>
    </div>
</div>
<?php }?>


<div class="pure-g" style="margin-top: 4em; text-align: center;">
    <div class="pure-u-1 pure-u-md-1-3" style="padding: 1em;">
        <i class="fa fa-clock-o" style="font-size: 2.5em; color: #1cb841;"></i>
        <h4 style="margin: 0.8em 0 0.4em; color: #2c3e50; font-weight: 700;">Elastyczne godziny</h4>
        <p style="color: #7f8c8d; line-height: 1.6;">Ucz się rano lub wieczorem. Dopasujemy się do Ciebie.</p>
    </div>
    <div class="pure-u-1 pure-u-md-1-3" style="padding: 1em;">
        <i class="fa fa-comments-o" style="font-size: 2.5em; color: #1cb841;"></i>
        <h4 style="margin: 0.8em 0 0.4em; color: #2c3e50; font-weight: 700;">Native Speakers</h4>
        <p style="color: #7f8c8d; line-height: 1.6;">Rozmawiaj z ludźmi z całego świata i szlifuj akcent.</p>
    </div>
    <div class="pure-u-1 pure-u-md-1-3" style="padding: 1em;">
        <i class="fa fa-certificate" style="font-size: 2.5em; color: #1cb841;"></i>
        <h4 style="margin: 0.8em 0 0.4em; color: #2c3e50; font-weight: 700;">Certyfikat</h4>
        <p style="color: #7f8c8d; line-height: 1.6;">Otrzymaj oficjalne potwierdzenie swoich umiejętności.</p>
    </div>
</div>
<?php
}
}
/* {/block 'top'} */
}
