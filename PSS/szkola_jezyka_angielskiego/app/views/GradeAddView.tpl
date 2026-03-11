{extends file="main.tpl"}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1" style="max-width: 600px; margin: 0 auto; background: white; padding: 2em; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <h2 style="color: #2c3e50;">Wystaw ocenę kursantowi</h2>
        <form action="{$conf->action_url}gradeSave" method="post" class="pure-form pure-form-stacked">
            <label for="id_kursant">Wybierz Kursanta:</label>
            <select name="id_kursant" id="id_kursant" style="width: 100%;" required>
                {foreach $students as $s}
                    <option value="{$s['id_uzytkownika']}">{$s['imie']} {$s['nazwisko']}</option>
                {/foreach}
            </select>

            <label for="id_kursu" style="margin-top: 15px;">Wybierz Kurs:</label>
            <select name="id_kursu" id="id_kursu" style="width: 100%;" required>
                {foreach $courses as $k}
                    <option value="{$k['id_kursu']}">{$k['nazwa']}</option>
                {/foreach}
            </select>

            <label for="ocena" style="margin-top: 15px;">Ocena:</label>
            <input type="text" name="ocena" id="ocena" placeholder="Np. 5" style="width: 100%;" required>

            <div style="margin-top: 25px; display: flex; gap: 10px;">
                <button type="submit" class="pure-button button-success">Zapisz ocenę</button>
                <a href="{$conf->action_url}myCourses" class="pure-button">Powrót</a>
            </div>
        </form>
    </div>
</div>
{/block}