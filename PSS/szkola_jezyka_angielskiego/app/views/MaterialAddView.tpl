{extends file="main.tpl"}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1" style="max-width: 600px; margin: 0 auto; background: white; padding: 2em; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <h2 style="color: #2c3e50; border-bottom: 2px solid #f39c12; padding-bottom: 10px;">Dodaj nowy materiał</h2>
        
        <form action="{$conf->action_url}materialSave" method="post" class="pure-form pure-form-stacked">
            <label for="id_kursu">Wybierz kurs:</label>
            <select name="id_kursu" id="id_kursu" style="width: 100%;" required>
                <option value="">-- Wybierz kurs --</option>
                {foreach $courses as $c}
                    <option value="{$c['id_kursu']}">{$c['nazwa']}</option>
                {/foreach}
            </select>

            <label for="tytul" style="margin-top:15px;">Tytuł materiału:</label>
            <input type="text" name="tytul" id="tytul" style="width: 100%;" placeholder="np. Słówka Unit 1" required>

            <label for="opis" style="margin-top:15px;">Opis (opcjonalnie):</label>
            <textarea name="opis" id="opis" style="width: 100%; height: 80px;"></textarea>

            <label for="url_pliku" style="margin-top:15px;">Link do materiału (np. Google Drive / PDF):</label>
            <input type="url" name="url_pliku" id="url_pliku" style="width: 100%;" placeholder="https://..." required>

            <div style="margin-top: 25px; display: flex; gap: 10px;">
                <button type="submit" class="pure-button" style="background: #f39c12; color: white; border-radius: 5px;">Zapisz materiał</button>
                <a href="{$conf->action_url}myCourses" class="pure-button">Anuluj</a>
            </div>
        </form>
    </div>
</div>
{/block}