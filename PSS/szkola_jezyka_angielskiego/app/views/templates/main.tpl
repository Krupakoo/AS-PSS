<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>{$page_title|default:"English Hub"}</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css">
    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

<div class="header" style="background: white; padding: 1em 2em; box-shadow: 0 2px 10px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center;">
    <div class="logo" style="font-size: 1.5em; font-weight: bold;">
        <a href="{$conf->action_url}mainPage" style="text-decoration: none !important; color: #1cb841;">
            <i class="fa fa-graduation-cap"></i> English Hub
        </a>
    </div>
    
    <div class="menu">
        <a href="{$conf->action_url}courseList" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">Kursy</a>
        {if count($conf->roles)>0}
            <a href="{$conf->action_url}myCourses" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">Moje Kursy</a>
            <a href="{$conf->action_url}mySchedule" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">
                <i class="fa fa-calendar"></i> Harmonogram
            </a>
            <a href="{$conf->action_url}messageList" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">
                <i class="fa fa-envelope"></i> Wiadomości
            </a>
            {* NOWA LINIA - LINK DO OCEN *}
            <a href="{$conf->action_url}myGrades" class="pure-button" style="background: none; text-decoration: none !important; color: #555;">
                <i class="fa fa-star"></i> Oceny
            </a>
        {/if}

        {if count($conf->roles)>0}
            <a href="{$conf->action_url}logout" class="pure-button button-error" style="border-radius: 20px; text-decoration: none !important; margin-left: 10px;">
                Wyloguj
            </a>
        {else}
            <a href="{$conf->action_url}loginShow" class="pure-button button-success" style="border-radius: 20px; text-decoration: none !important; background: #1cb841; color: white;">
                Zaloguj się
            </a>
        {/if}
    </div>
</div>

<div class="content" style="max-width: 1000px; margin: 2em auto; padding: 0 20px;">
    {if $msgs->isInfo()}
        <div class="msg info" style="margin-bottom: 1em; background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; border-left: 5px solid #28a745;">
            {foreach $msgs->getMessages() as $msg}
                <div>{$msg->text}</div>
            {/foreach}
        </div>
    {/if}

    {if $msgs->isError()}
        <div class="msg error" style="margin-bottom: 1em; background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; border-left: 5px solid #dc3545;">
            {foreach $msgs->getMessages() as $msg}
                <div>{$msg->text}</div>
            {/foreach}
        </div>
    {/if}

    {block name=top}{/block}
    {block name=bottom}{/block}
</div>
</body>
</html>