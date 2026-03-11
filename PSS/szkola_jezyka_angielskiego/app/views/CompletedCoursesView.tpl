{extends file="main.tpl"}

{block name=top}
<div style="margin-bottom: 2em; border-left: 6px solid #f39c12; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Historia i Ocenianie</h1>
    <p style="color: #7f8c8d; margin-top: 5px;">Tutaj znajdziesz swoje ukończone kursy i możesz podzielić się opinią.</p>
</div>
{/block}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1">
        {if count($courses) > 0}
            <div class="pure-g">
                {foreach $courses as $c}
                    <div class="pure-u-1 pure-u-md-1-2">
                        <div style="margin: 10px; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-top: 4px solid #f39c12;">
                            <h3 style="margin-top:0; color: #e67e22;">{$c['nazwa']}</h3>
                            <p style="font-size: 0.9em; color: #666; margin-bottom: 15px;">
                                Status: <span style="color: #27ae60; font-weight: bold;">{$c['status']}</span>
                            </p>
                            
                            <hr style="border: 0; border-top: 1px solid #eee; margin: 15px 0;">
                            
                            <form action="{$conf->action_url}addOpinion" method="post" class="pure-form pure-form-stacked">
                                <input type="hidden" name="id_kursu" value="{$c['id_kursu']}">
                                
                                <label for="tresc_opinii" style="font-weight: bold; color: #2c3e50;">Twoja opinia:</label>
                                <textarea name="tresc_opinii" id="tresc_opinii" 
                                          placeholder="Jak oceniasz ten kurs? Napisz kilka słów..." 
                                          style="width: 100%; height: 100px; border-radius: 5px; border: 1px solid #ddd; padding: 10px; resize: none;" 
                                          required></textarea>
                                
                                <button type="submit" class="pure-button" 
                                        style="background: #f39c12; color: white; margin-top: 15px; border-radius: 5px; width: 100%; font-weight: bold; padding: 0.8em;">
                                    <i class="fa fa-paper-plane"></i> Wyślij opinię
                                </button>
                            </form>
                        </div>
                    </div>
                {/foreach}
            </div>
        {else}
            <div style="padding: 2em; background: white; border-radius: 10px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
                <i class="fa fa-info-circle" style="font-size: 2em; color: #34495e; margin-bottom: 10px;"></i>
                <p style="color: #7f8c8d;">Nie masz jeszcze żadnych ukończonych kursów do ocenienia.</p>
                <a href="{$conf->action_url}myCourses" class="pure-button" style="background: #34495e; color: white; border-radius: 5px; margin-top: 10px;">
                    Wróć do moich kursów
                </a>
            </div>
        {/if}
        
        <div style="margin-top: 2em; text-align: center;">
            <a href="{$conf->action_url}myCourses" class="pure-button" style="background: #7f8c8d; color: white; border-radius: 5px; padding: 0.8em 2em;">
                <i class="fa fa-arrow-left"></i> Powrót do Panelu Głównego
            </a>
        </div>
    </div>
</div>
{/block}