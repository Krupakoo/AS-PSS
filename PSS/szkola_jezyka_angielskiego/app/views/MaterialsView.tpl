{extends file="main.tpl"}

{block name=top}
<div style="margin-bottom: 2em; border-left: 6px solid #3498db; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Materiały: {$course_info['nazwa']}</h1>
    <p style="color: #7f8c8d; margin-top: 5px;">Lista materiałów edukacyjnych udostępnionych przez lektora.</p>
</div>
{/block}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1">
        {if count($materials) > 0}
            <div class="pure-g">
                {foreach $materials as $m}
                    <div class="pure-u-1 pure-u-md-1-2">
                        <div style="margin: 10px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-top: 4px solid #3498db;">
                            <h3 style="margin-top:0; color: #2980b9;">{$m['tytul']}</h3> {* Zgodnie z bazą: tytul *}
                            <p style="color: #555; font-size: 0.9em; min-height: 40px;">{$m['opis']}</p>
                            
                            <div style="margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px; text-align: right;">
                                {* KLUCZOWE: używamy url_pliku zamiast link_url *}
                                <a href="{$m['url_pliku']}" target="_blank" class="pure-button" style="background: #3498db; color: white; border-radius: 5px;">
                                    <i class="fa fa-external-link-alt"></i> Otwórz / Pobierz
                                </a>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </div>
        {else}
            <div class="msg info">Brak dostępnych materiałów dla tego kursu.</div>
        {/if}

        <div style="margin-top: 2em;">
            <a href="{$conf->action_url}myCourses" class="pure-button" style="background: #34495e; color: white; border-radius: 5px;">
                <i class="fa fa-arrow-left"></i> Powrót do moich kursów
            </a>
        </div>
    </div>
</div>
{/block}