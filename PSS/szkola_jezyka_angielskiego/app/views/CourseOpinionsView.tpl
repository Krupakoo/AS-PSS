{extends file="main.tpl"}

{block name=top}
<div style="margin-bottom: 2em; border-left: 6px solid #3498db; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Opinie o kursie: {$course_info['nazwa']}</h1>
    <p style="color: #7f8c8d; margin-top: 5px;">Zestawienie recenzji wystawionych przez kursantów.</p>
</div>
{/block}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1">
        {if count($opinions) > 0}
            {foreach $opinions as $o}
                <div style="margin-bottom: 1.5em; padding: 20px; background: white; border-radius: 10px; border: 1px solid #eee; position: relative;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <strong style="color: #2c3e50;">{$o['imie']} {$o['nazwisko']}</strong>
                        <small style="color: #bdc3c7;">{$o['data_utworzenia']}</small>
                    </div>
                    <p style="color: #34495e; font-style: italic; line-height: 1.6;">"{$o['tresc_opinii']}"</p>

                    {if $smarty.session.role == 'admin'}
    <div style="text-align: right; margin-top: 10px;">
        {* Przekazujemy ID opinii oraz ID kursu w adresie URL *}
        <a href="{$conf->action_url}opinionDelete/{$o['id_opinii']}/{$course_info['id_kursu']}" 
           class="pure-button" 
           style="background: #e74c3c; color: white; border-radius: 5px;"
           onclick="return confirm('Czy na pewno chcesz usunąć tę opinię?')">
            <i class="fa fa-trash"></i> Usuń opinię
        </a>
    </div>
{/if}
                </div>
            {/foreach}
        {else}
            <div class="msg info">Ten kurs nie posiada jeszcze żadnych opinii.</div>
        {/if}

        <div style="margin-top: 2em;">
            <a href="{$conf->action_url}myCourses" class="pure-button" style="background: #34495e; color: white; border-radius: 5px;">
                <i class="fa fa-arrow-left"></i> Powrót do listy kursów
            </a>
        </div>
    </div>
</div>
{/block}