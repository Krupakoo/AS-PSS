{extends file="main.tpl"}

{block name=top}
    <div style="margin-bottom: 2em; border-left: 6px solid #42b8dd; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h1 style="margin:0; color: #2c3e50;">Mój Profil</h1>
        <p style="color: #7f8c8d;">Twoje dane w systemie English Hub.</p>
    </div>
{/block}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1 pure-u-md-1-2" style="margin: auto;">
        <div class="msg" style="text-align: left; padding: 2em; border-top: 5px solid #42b8dd !important;">
            <div style="text-align: center; margin-bottom: 2em;">
                <div style="width: 80px; height: 80px; background: #eee; border-radius: 50%; margin: 0 auto 10px; display: flex; align-items: center; justify-content: center; font-size: 2em; color: #bdc3c7;">
                    <i class="fa fa-user"></i>
                </div>
                <h2 style="margin:0;">{$user['imie']} {$user['nazwisko']}</h2>
                
                {* POPRAWKA: Obsługa trzech ról (Admin, Lektor, Uczeń) *}
                <span style="display: inline-block; margin-top: 5px; padding: 5px 15px; border-radius: 20px; font-size: 0.8em; text-transform: uppercase; font-weight: bold;
                    {if $user['rola'] == 'admin'} background: #e74c3c; color: white;
                    {elseif $user['rola'] == 'lektor'} background: #f1c40f; color: black;
                    {else} background: #1cb841; color: white; {/if}">
                    
                    {if $user['rola'] == 'admin'}Administrator
                    {elseif $user['rola'] == 'lektor'}Lektor
                    {else}Uczeń{/if}
                </span>
            </div>

            <table class="pure-table pure-table-horizontal" style="width: 100%; border: none;">
                <tr>
                    <td style="color: #7f8c8d; border: none;">Login:</td>
                    <td style="font-weight: bold; border: none;">{$user['login']}</td>
                </tr>
                <tr>
                    <td style="color: #7f8c8d; border: none;">E-mail:</td>
                    <td style="font-weight: bold; border: none;">{$user['email']}</td>
                </tr>
                
                {* Poziom językowy wyświetlany tylko dla uczniów *}
                {if $user['rola'] != 'lektor' && $user['rola'] != 'admin'}
                <tr>
                    <td style="color: #7f8c8d; border: none;">Poziom:</td>
                    <td style="border: none;">
                        <strong style="color: #42b8dd; font-size: 1.2em;">{$user['poziom_jezykowy']}</strong>
                    </td>
                </tr>
                {/if}
            </table>

            <div style="margin-top: 2em; text-align: center;">
                <a href="{$conf->action_url}logout" 
                   class="pure-button" 
                   style="background: #e74c3c; color: white; border-radius: 20px; padding: 10px 25px;">
                   Wyloguj się
                </a>
            </div>
        </div>
    </div>
</div>
{/block}