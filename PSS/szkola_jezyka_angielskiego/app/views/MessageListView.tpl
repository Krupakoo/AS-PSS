{extends file="main.tpl"}

{block name=top}
<div style="margin-bottom: 2em; border-left: 6px solid #1cb841; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Moje Wiadomości</h1>
    <a href="{$conf->action_url}messageNew" class="pure-button button-success" style="background: #1cb841; color: white; margin-top: 10px;">+ NAPISZ NOWĄ</a>
</div>
{/block}

{block name=bottom}
<h2 style="color: #2c3e50; border-bottom: 2px solid #1cb841; padding-bottom: 10px; margin-bottom: 20px;">Skrzynka odbiorcza</h2>

<table class="pure-table pure-table-horizontal" style="width: 100%; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
    <thead>
        <tr style="background: #eee;">
            <th style="width: 20%;">Od</th>
            <th style="width: 25%;">Temat</th>
            <th style="width: 40%;">Treść</th>
            <th style="width: 15%;">Data</th>
        </tr>
    </thead>
    <tbody>
    {if isset($messages) && count($messages) > 0}
        {foreach $messages as $m}
            <tr>
                <td>{$m['imie']} {$m['nazwisko']}</td>
                <td><strong>{$m['temat']}</strong></td>
                <td>{$m['tresc']}</td>
                <td><small>{$m['data_wyslania']}</small></td>
            </tr>
        {/foreach}
    {else}
        <tr><td colspan="4" style="text-align: center; padding: 2em;">Brak odebranych wiadomości.</td></tr>
    {/if}
    </tbody>
</table>

<div style="margin-top: 20px;">
    <a href="{$conf->action_url}messageNew" class="pure-button button-success" style="background: #1cb841; color: white;">+ NAPISZ NOWĄ</a>
</div>
{/block}