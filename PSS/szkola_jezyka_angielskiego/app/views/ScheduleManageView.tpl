{extends file="main.tpl"}

{block name=top}
<div class="pure-g">
    <div class="pure-u-1">
        <h2 style="color: #2c3e50;"><i class="fa fa-edit"></i> Zarządzanie Zajęciami</h2>
        
        <div style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 30px;">
            <form action="{$conf->action_url}scheduleSave" method="post" class="pure-form pure-form-stacked" id="scheduleForm">
                <legend>Dodaj nowe zajęcia</legend>
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-6">
                        <label for="id_kurs">Kurs</label>
                        <select name="id_kurs" id="id_kurs" class="pure-input-1">
                            {foreach $courses as $c}
                                <option value="{$c['id_kursu']}">{$c['nazwa']}</option>
                            {/foreach}
                        </select>
                    </div>
                    
                    <div class="pure-u-1 pure-u-md-1-6">
                        <label for="tryb_select">Tryb zajęć</label>
                        <select name="tryb" id="tryb_select" class="pure-input-1" onchange="toggleFields()">
                            <option value="stacjonarne">Stacjonarne</option>
                            <option value="online">Online</option>
                        </select>
                    </div>

                    <div class="pure-u-1 pure-u-md-1-6">
                        <label for="data_czas">Data i godzina</label>
                        {* DODANO: min="{$smarty.now|date_format:'%Y-%m-%dT%H:%M'}" - blokuje daty wsteczne *}
                        <input type="datetime-local" 
                               name="data_czas" 
                               id="data_czas" 
                               class="pure-input-1" 
                               required 
                               min="{$smarty.now|date_format:'%Y-%m-%dT%H:%M'}">
                    </div>
                    
                    <div class="pure-u-1 pure-u-md-1-6">
                        <label for="temat">Temat</label>
                        <input type="text" name="temat" id="temat" placeholder="Temat lekcji" class="pure-input-1" required>
                    </div>

                    <div class="pure-u-1 pure-u-md-1-6" id="link_container" style="display: none;">
                        <label for="link">Link do spotkania</label>
                        <input type="text" name="link" id="link" placeholder="Zoom/Meet" class="pure-input-1">
                    </div>

                    <div class="pure-u-1 pure-u-md-1-6" id="adres_container">
                        <label for="miejsce">Adres / Sala</label>
                        <input type="text" name="miejsce" id="miejsce" placeholder="np. Sala 202" class="pure-input-1">
                    </div>
                </div>
                <button type="submit" class="pure-button" style="margin-top: 10px; background: #1cb841; color: white; border-radius: 5px;">
                    <i class="fa fa-plus"></i> Dodaj zajęcia
                </button>
            </form>
        </div>

        <table class="pure-table pure-table-horizontal" style="width: 100%; background: white;">
            <thead>
                <tr>
                    <th>Kurs</th>
                    <th>Data</th>
                    <th>Temat</th>
                    <th>Tryb</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                {foreach $schedule as $s}
                <tr>
                    <td><strong>{$s['nazwa']}</strong></td>
                    <td>{$s['data_czas']}</td>
                    <td>{$s['temat']}</td>
                    <td>
                        {if $s['tryb'] == 'online'}
                            <span style="color: #3498db;"><i class="fa fa-video-camera"></i> Online</span>
                        {else}
                            <span style="color: #67b26f;"><i class="fa fa-building"></i> Stacjonarne</span>
                        {/if}
                    </td>
                    <td>
                        <a href="{$conf->action_url}scheduleDelete/{$s['id_zajec']}" 
                           class="pure-button" 
                           style="background: #e74c3c; color: white; border-radius: 5px;" 
                           onclick="return confirm('Czy na pewno chcesz usunąć te zajęcia?')">
                           <i class="fa fa-trash"></i> Usuń
                        </a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>

<script>
function toggleFields() {
    var tryb = document.getElementById('tryb_select').value;
    var linkCont = document.getElementById('link_container');
    var adresCont = document.getElementById('adres_container');
    var linkInput = document.getElementById('link');
    var miejsceInput = document.getElementById('miejsce');
    
    if (tryb === 'online') {
        linkCont.style.display = 'block';
        adresCont.style.display = 'none';
        linkInput.required = true;
        miejsceInput.required = false;
    } else {
        linkCont.style.display = 'none';
        adresCont.style.display = 'block';
        linkInput.required = false;
        miejsceInput.required = true;
    }
}
window.onload = toggleFields;
</script>
{/block}