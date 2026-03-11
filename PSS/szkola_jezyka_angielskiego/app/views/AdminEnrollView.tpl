{extends file="main.tpl"}

{block name=top}
<div style="margin-bottom: 2em; border-left: 6px solid #e74c3c; padding: 1.5em; background: white; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;"><i class="fa fa-users"></i> Zarządzanie Zapisami</h1>
    <p style="color: #7f8c8d;">Panel administratora: zatwierdzanie i usuwanie zapisów.</p>
</div>
{/block}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1">
        
        {* WYSZUKIWARKA *}
        <div style="background: white; padding: 20px; border-radius: 10px; margin-bottom: 25px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <form action="{$conf->action_url}enrollManage" method="post" class="pure-form">
                <input type="text" name="sf_nazwisko" placeholder="Nazwisko..." value="{$searchName|default:''}">
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
                {foreach $enrollments as $e}
                <tr>
                    <td><strong>{$e['imie']} {$e['nazwisko']}</strong></td>
                    <td>{$e['kurs_nazwa']}</td>
                    <td>
                        {if $e['status'] == 'oczekujacy'}
                            <span style="color: #e67e22; font-weight: bold;"><i class="fa fa-clock-o"></i> Oczekuje</span>
                        {else}
                            <span style="color: #27ae60; font-weight: bold;"><i class="fa fa-check-circle"></i> Aktywny</span>
                        {/if}
                    </td>
                    <td>
                        {if $e['status'] == 'oczekujacy'}
                            <a href="{$conf->action_url}enrollAccept/{$e['id_zapisu']}" class="pure-button" style="background: #27ae60; color: white;">Akceptuj</a>
                        {/if}
                        <a href="{$conf->action_url}enrollDelete/{$e['id_zapisu']}" class="pure-button" style="background: #e74c3c; color: white;" onclick="return confirm('Usunąć zapis?')">Usuń</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
{/block}