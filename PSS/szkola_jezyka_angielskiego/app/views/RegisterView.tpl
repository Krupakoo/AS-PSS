{extends file="main.tpl"}

{block name=top}
<div class="bottom-margin">
    <form action="{$conf->action_root}registerSave" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Rejestracja Kursanta</legend>
            
            <div class="pure-control-group">
                <label for="login">Login</label>
                <input id="login" type="text" name="login" value="{$form->login}">
            </div>
            
            <div class="pure-control-group">
                <label for="pass">Hasło</label>
                <input id="pass" type="password" name="pass">
            </div>

            <div class="pure-control-group">
                <label for="imie">Imię</label>
                <input id="imie" type="text" name="imie" value="{$form->imie}">
            </div>

            <div class="pure-control-group">
                <label for="nazwisko">Nazwisko</label>
                <input id="nazwisko" type="text" name="nazwisko" value="{$form->nazwisko}">
            </div>

            <div class="pure-control-group">
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" value="{$form->email}">
            </div>

            <div class="pure-control-group">
                <label for="telefon">Numer telefonu</label>
                <input id="telefon" type="text" name="telefon" value="{$form->telefon}">
            </div>

            <div class="pure-controls">
                <input type="submit" class="pure-button button-success" value="Zarejestruj się"/>
                <a class="pure-button button-secondary" href="{$conf->action_root}courseList">Anuluj</a>
            </div>
        </fieldset>
    </form>
</div>
{/block}