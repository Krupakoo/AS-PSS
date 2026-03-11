{extends file="main.tpl"}

{block name=top}
    <div class="msg" style="max-width: 500px; margin: 2em auto; text-align: center;">
        <h2>Wybierz tryb nauki</h2>
        <p>Kurs: <strong>ID {$id_kursu}</strong></p>
        
        <form action="{$conf->action_url}courseEnroll" method="post" style="margin-top: 2em;">
            <input type="hidden" name="id_kursu" value="{$id_kursu}">
            
            <div style="margin-bottom: 2em;">
                <label style="margin-right: 20px; font-size: 1.2em; cursor: pointer;">
                    <input type="radio" name="tryb" value="online" checked> Online
                </label>
                <label style="font-size: 1.2em; cursor: pointer;">
                    <input type="radio" name="tryb" value="stacjonarne"> Stacjonarnie
                </label>
            </div>

            <button type="submit" class="button-success button-large" style="width: 100%; border: none;">
                POTWIERDŹ ZAPIS
            </button>
        </form>
        
        <br>
        <a href="{$conf->action_url}courseList" style="color: #7f8c8d; text-decoration: none;">Wróć do listy</a>
    </div>
{/block}