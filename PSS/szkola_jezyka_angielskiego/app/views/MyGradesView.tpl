{extends file="main.tpl"}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1" style="background: white; padding: 2em; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h2 style="color: #2c3e50; border-bottom: 2px solid #9b59b6; padding-bottom: 10px;">
            <i class="fa fa-star"></i> 
            {if $smarty.session.role == 'kursant'}Moje Oceny{else}Dziennik Ocen{/if}
        </h2>

        {if count($grades) > 0}
            <table class="pure-table pure-table-horizontal" style="width: 100%;">
                <thead>
                    <tr style="background: #f8f9fa;">
                        <th>Kurs</th>
                        <th>Ocena</th>
                        <th>Data</th>
                        {* Lektor i Admin widzą komu wystawili ocenę *}
                        {if $smarty.session.role != 'kursant'}<th>Kursant</th>{/if}
                        {* Kursant i Admin widzą kto wystawił ocenę *}
                        {if $smarty.session.role != 'lektor'}<th>Lektor</th>{/if}
                    </tr>
                </thead>
                <tbody>
                {foreach $grades as $g}
                    <tr>
                        <td><strong>{$g['nazwa']}</strong></td>
                        <td><span class="pure-button" style="background: #9b59b6; color: white; border-radius: 5px; min-width: 40px;">{$g['wartosc']}</span></td>
                        <td>{$g['data_wystawienia']}</td>
                        
                        {if isset($g['student_imie'])}
                            <td>{$g['student_imie']} {$g['student_nazwisko']}</td>
                        {/if}
                        
                        {if isset($g['lektor_imie'])}
                            <td>{$g['lektor_imie']} {$g['lektor_nazwisko']}</td>
                        {/if}
                    </tr>
                {/foreach}
                </tbody>
            </table>
        {else}
            <div class="msg info">Brak zapisanych ocen w systemie.</div>
        {/if}
        
        <div style="margin-top: 20px;">
            <a href="{$conf->action_url}myCourses" class="pure-button">Powrót do kursów</a>
        </div>
    </div>
</div>
{/block}