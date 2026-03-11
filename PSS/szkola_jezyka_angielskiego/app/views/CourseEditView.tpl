{extends file="main.tpl"}

{block name=top}
<div style="margin-bottom: 2em; border-left: 6px solid #1cb841; padding: 1.5em; background: white; border-radius: 0 15px 15px 0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <h1 style="margin:0; color: #2c3e50;">Edycja Kursu</h1>
    <p style="color: #7f8c8d; margin-top: 5px;">Modyfikacja danych istniejącego kursu w systemie</p>
</div>
{/block}

{block name=bottom}
<div class="pure-g">
    <div class="pure-u-1" style="max-width: 600px; margin: 0 auto; background: white; padding: 2em; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        
        <h2 style="color: #2c3e50; border-bottom: 2px solid #1cb841; padding-bottom: 10px; margin-bottom: 20px;">
            <i class="fa fa-edit"></i> Kurs: {$form['nazwa']|default:'Brak nazwy'}
        </h2>

        <form action="{$conf->action_url}courseSave" method="post" class="pure-form pure-form-stacked">
            {* Ukryte pole z ID kursu, niezbędne do zapisu (UPDATE) w bazie *}
            <input type="hidden" name="id_kursu" value="{$form['id_kursu']}">

            <fieldset>
                <label for="nazwa">Nazwa kursu:</label>
                <input type="text" name="nazwa" id="nazwa" value="{$form['nazwa']|default:''}" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>

                <label for="opis">Opis kursu:</label>
<textarea name="opis" id="opis" style="width: 100%; height: 100px;">{$form['opis']|default:''}</textarea>
                <div style="margin-top: 30px; display: flex; gap: 10px;">
                    <button type="submit" class="pure-button" style="background: #1cb841; color: white; border-radius: 5px; padding: 0.8em 2em;">
                        <i class="fa fa-save"></i> Zapisz zmiany
                    </button>
                    
                    <a href="{$conf->action_url}myCourses" class="pure-button" style="border-radius: 5px; padding: 0.8em 2em;">
                        Anuluj
                    </a>
                </div>
            </fieldset>
        </form>
        
    </div>
</div>
{/block}