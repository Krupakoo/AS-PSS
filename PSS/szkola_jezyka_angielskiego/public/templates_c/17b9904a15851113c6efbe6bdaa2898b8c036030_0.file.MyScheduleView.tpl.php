<?php
/* Smarty version 3.1.30, created on 2026-01-10 11:06:27
  from "D:\xampp\htdocs\szkola_jezyka_angielskiego\app\views\MyScheduleView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_696224a3ce42c4_06192948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17b9904a15851113c6efbe6bdaa2898b8c036030' => 
    array (
      0 => 'D:\\xampp\\htdocs\\szkola_jezyka_angielskiego\\app\\views\\MyScheduleView.tpl',
      1 => 1767912041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_696224a3ce42c4_06192948 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_534143533696224a3b93620_95860592', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_449042437696224a3ce3d03_10532267', 'bottom');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'top'} */
class Block_534143533696224a3b93620_95860592 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div style="margin-bottom: 2em; border-left: 6px solid #1cb841; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h1 style="margin:0; color: #2c3e50;">Mój Harmonogram</h1>
        <p style="color: #7f8c8d;">Nadchodzące lekcje dla Twoich kursów.</p>
    </div>
<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_449042437696224a3ce3d03_10532267 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="pure-g">
    <?php if (count($_smarty_tpl->tpl_vars['schedule']->value) > 0) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['schedule']->value, 's');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
?>
            <div class="pure-u-1" style="padding: 10px;">
                <div class="msg" style="text-align: left; display: flex; justify-content: space-between; align-items: center; border-left: 5px solid #42b8dd !important; background: white; padding: 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                    <div>
                        <div style="color: #42b8dd; font-weight: bold; font-size: 0.85em; margin-bottom: 5px;">
                            <i class="fa fa-calendar"></i> <?php echo $_smarty_tpl->tpl_vars['s']->value["data_czas"];?>

                        </div>
                        <h3 style="margin: 0; color: #2c3e50;"><?php echo $_smarty_tpl->tpl_vars['s']->value["nazwa"];?>
</h3>
                        
                        <p style="margin: 5px 0 0 0; color: #7f8c8d;">
                            Temat: <strong><?php echo $_smarty_tpl->tpl_vars['s']->value["temat"];?>
</strong>
                        </p>
                        
                        <p style="margin: 5px 0 0 0; color: #2c3e50; font-size: 0.9em;">
                            Prowadzący: <i class="fa fa-user"></i> <strong><?php echo $_smarty_tpl->tpl_vars['s']->value["imie"];?>
 <?php echo $_smarty_tpl->tpl_vars['s']->value["nazwisko"];?>
</strong>
                        </p>

                        <span style="display:inline-block; margin-top:10px; font-size: 0.75em; background: #eee; padding: 3px 10px; border-radius: 15px; text-transform: uppercase; font-weight: bold; color: #555;">
                            Tryb: <?php echo $_smarty_tpl->tpl_vars['s']->value["tryb"];?>

                        </span>
                    </div>
                    
                    <div>
                        
                        <?php if (mb_strtolower($_smarty_tpl->tpl_vars['s']->value["tryb"], 'UTF-8') == 'online') {?>
                            <?php if ($_smarty_tpl->tpl_vars['s']->value["link_do_spotkania"]) {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['s']->value['link_do_spotkania'];?>
" class="pure-button" target="_blank" style="background: #42b8dd; color: white; border-radius: 20px; text-decoration: none !important;">
                                    <i class="fa fa-video-camera"></i> DOŁĄCZ
                                </a>
                            <?php } else { ?>
                                <span style="color: #95a5a6; font-style: italic;">Oczekiwanie na link...</span>
                            <?php }?>
                        <?php } else { ?>
                            <span style="color: #2c3e50; font-weight: bold;">
                                <i class="fa fa-map-marker" style="color: #e74c3c;"></i> 
                                <?php if (!empty($_smarty_tpl->tpl_vars['s']->value["miejsce"])) {
echo $_smarty_tpl->tpl_vars['s']->value["miejsce"];
} else { ?>Sala zajęć<?php }?>
                            </span>
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
        <div class="pure-u-1" style="text-align: center; padding: 3em;">
            <div class="msg info" style="margin-bottom: 1em;">Nie masz jeszcze żadnych zaplanowanych zajęć.</div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
courseList" class="pure-button" style="background: #1cb841; color: white; border-radius: 20px; text-decoration: none !important;">Zobacz ofertę kursów</a>
        </div>
    <?php }?>
</div>
<?php
}
}
/* {/block 'bottom'} */
}
