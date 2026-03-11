{extends file="main.tpl"}

{block name=top}
    <div style="margin-bottom: 2em; border-left: 6px solid #1cb841; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h1 style="margin:0; color: #2c3e50;">Mój Harmonogram</h1>
        <p style="color: #7f8c8d;">Nadchodzące lekcje dla Twoich kursów.</p>
    </div>
{/block}

{block name=bottom}
<div class="pure-g">
    {if count($schedule) > 0}
        {foreach $schedule as $s}
            <div class="pure-u-1" style="padding: 10px;">
                <div class="msg" style="text-align: left; display: flex; justify-content: space-between; align-items: center; border-left: 5px solid #42b8dd !important; background: white; padding: 15px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                    <div>
                        <div style="color: #42b8dd; font-weight: bold; font-size: 0.85em; margin-bottom: 5px;">
                            <i class="fa fa-calendar"></i> {$s["data_czas"]}
                        </div>
                        <h3 style="margin: 0; color: #2c3e50;">{$s["nazwa"]}</h3>
                        
                        <p style="margin: 5px 0 0 0; color: #7f8c8d;">
                            Temat: <strong>{$s["temat"]}</strong>
                        </p>
                        
                        <p style="margin: 5px 0 0 0; color: #2c3e50; font-size: 0.9em;">
                            Prowadzący: <i class="fa fa-user"></i> <strong>{$s["imie"]} {$s["nazwisko"]}</strong>
                        </p>

                        <span style="display:inline-block; margin-top:10px; font-size: 0.75em; background: #eee; padding: 3px 10px; border-radius: 15px; text-transform: uppercase; font-weight: bold; color: #555;">
                            Tryb: {$s["tryb"]}
                        </span>
                    </div>
                    
                    <div>
                        {* Logika wyświetlania: Link dla ONLINE lub Adres dla STACJONARNYCH *}
                        {if $s["tryb"]|lower == 'online'}
                            {if $s["link_do_spotkania"]}
                                <a href="{$s['link_do_spotkania']}" class="pure-button" target="_blank" style="background: #42b8dd; color: white; border-radius: 20px; text-decoration: none !important;">
                                    <i class="fa fa-video-camera"></i> DOŁĄCZ
                                </a>
                            {else}
                                <span style="color: #95a5a6; font-style: italic;">Oczekiwanie na link...</span>
                            {/if}
                        {else}
                            <span style="color: #2c3e50; font-weight: bold;">
                                <i class="fa fa-map-marker" style="color: #e74c3c;"></i> 
                                {if !empty($s["miejsce"])}{$s["miejsce"]}{else}Sala zajęć{/if}
                            </span>
                        {/if}
                    </div>
                </div>
            </div>
        {/foreach}
    {else}
        <div class="pure-u-1" style="text-align: center; padding: 3em;">
            <div class="msg info" style="margin-bottom: 1em;">Nie masz jeszcze żadnych zaplanowanych zajęć.</div>
            <a href="{$conf->action_url}courseList" class="pure-button" style="background: #1cb841; color: white; border-radius: 20px; text-decoration: none !important;">Zobacz ofertę kursów</a>
        </div>
    {/if}
</div>
{/block}