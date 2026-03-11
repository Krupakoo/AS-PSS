{extends file="main.tpl"}

{block name=top}
<div style="background: white; padding: 1.5em; border-radius: 15px; margin-bottom: 2em; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
    <form action="{$conf->action_url}courseList" method="post" class="pure-form">
        <legend>Wyszukaj kurs</legend>
        <fieldset>
            <input type="text" name="sf_nazwa" placeholder="Nazwa kursu..." value="{$search_name}" class="pure-input-1-2">
            <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
            <a href="{$conf->action_url}courseList" class="pure-button">Wyczyść</a>
        </fieldset>
    </form>
</div>
{/block}

{block name=bottom}
<div class="pure-g" style="margin: 0 -10px;">
    {foreach $courses as $c}
        <div class="pure-u-1 pure-u-md-1-3" style="padding: 10px;">
            <div class="msg" style="height: 100%; display: flex; flex-direction: column; justify-content: space-between; text-align: left;">
                
                <div>
                    <h3 style="margin-top: 0; color: #1cb841;">{$c["nazwa"]}</h3>
                    <p style="color: #7f8c8d; font-size: 0.9em; line-height: 1.6;">
                        Profesjonalne zajęcia z lektorem online. Program obejmuje konwersacje, gramatykę oraz słownictwo tematyczne.
                    </p>
                    <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">
                    <ul style="list-style: none; padding: 0; font-size: 0.85em; color: #555;">
                        <li><i class="fa fa-check" style="color: #1cb841;"></i> Materiały PDF w cenie</li>
                        <li><i class="fa fa-check" style="color: #1cb841;"></i> Certyfikat ukończenia</li>
                    </ul>
                </div>

               <div style="margin-top: auto; padding-top: 1.5em; width: 100%; box-sizing: border-box;">
    {if count($conf->roles) > 0}
        {if isset($smarty.session.role) && $smarty.session.role == 'kursant'}
            <a class="button-success" 
               href="{$conf->action_url}courseEnroll/{$c['id_kursu']}"
               style="display: block; 
                      width: 100%; 
                      padding: 12px 0; 
                      text-align: center; 
                      border-radius: 8px; 
                      text-decoration: none !important; 
                      font-weight: bold; 
                      box-sizing: border-box;">
                ZAPISZ SIĘ <i class="fa fa-chevron-right" style="margin-left: 10px;"></i>
            </a>
        {else}
            <div style="background: #f8f9fa; padding: 10px; border-radius: 8px; text-align: center;">
                <span style="color: #7f8c8d; font-size: 0.85em;">Opcja zapisu dostępna dla kursantów</span>
            </div>
        {/if}
    {else}
        <a class="button-secondary" 
           href="{$conf->action_url}loginShow"
           style="display: block; 
                  width: 100%; 
                  padding: 10px 0; 
                  text-align: center; 
                  border-radius: 8px; 
                  text-decoration: none !important; 
                  box-sizing: border-box;">
            Zaloguj się, aby kupić
        </a>
    {/if}
</div>

            </div>
        </div>
    {/foreach}
</div>
{/block}