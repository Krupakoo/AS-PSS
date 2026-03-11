{extends file="main.tpl"}

{block name=top}
<div style="margin-bottom: 2em; border-left: 6px solid #3498db; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Nowa Wiadomość</h1>
</div>
{/block}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1" style="max-width: 700px; margin: 0 auto;">
        <div style="background: white; padding: 2em; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
            <form action="{$conf->action_url}messageSend" method="post" class="pure-form pure-form-stacked">
                <label for="id_odbiorca">Odbiorca:</label>
                <select name="id_odbiorca" id="id_odbiorca" style="width: 100%; height: 2.5em;" required>
                    <option value="">-- Wybierz z listy --</option>
                    {foreach $receivers as $r}
                        <option value="{$r['id_uzytkownika']}">{$r['imie']} {$r['nazwisko']} ({$r['rola']})</option>
                    {/foreach}
                </select>
                <label for="temat">Temat:</label>
                <input type="text" name="temat" id="temat" style="width: 100%;" required>
                <label for="tresc">Treść:</label>
                <textarea name="tresc" id="tresc" rows="6" style="width: 100%;" required></textarea>
                <button type="submit" class="pure-button button-success" style="background: #1cb841; color: white; margin-top: 1em;">Wyślij</button>
            </form>
        </div>
    </div>
</div>
{/block}