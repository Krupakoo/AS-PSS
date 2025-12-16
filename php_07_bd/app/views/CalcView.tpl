{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
    <header>
        <h2>Kalkulator Kredytowy z Zapisem do BD</h2>
    </header>

    <a href="{$conf->action_root}calcHistory" class="pure-button button-secondary">Pokaż Historię Obliczeń</a>
    <br><br>

    <form action="{$conf->action_root}calcCompute" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Parametry Kredytu</legend>
            
            <div class="pure-control-group">
                <label for="id_kwota">Kwota Kredytu:</label>
                <input id="id_kwota" type="text" name="kwota" value="{$form->kwota|default:''}" placeholder="np. 10000" />
            </div>
            
            <div class="pure-control-group">
                <label for="id_lata">Liczba Lat:</label>
                <input id="id_lata" type="text" name="lata" value="{$form->lata|default:''}" placeholder="np. 5" />
            </div>
            
            <div class="pure-control-group">
                <label for="id_procent">Oprocentowanie (%):</label>
                <input id="id_procent" type="text" name="procent" value="{$form->procent|default:''}" placeholder="np. 8" />
            </div>
            
            <div class="pure-controls">
                <input type="submit" value="Oblicz i Zapisz" class="pure-button pure-button-primary" />
            </div>
        </fieldset>
    </form>
</div>

{/block}

{block name=bottom}

{if $msgs->isError()}
    <div class="messages">
    <ul class="pure-alert pure-alert-error">
    {foreach $msgs->getErrors() as $msg}
        <li class="msg type-error">{$msg}</li>
    {/foreach}
    </ul>
    </div>
{/if}

{if $msgs->isInfo()}
    <div class="messages">
    <ul class="pure-alert pure-alert-info">
    {foreach $msgs->getInfos() as $msg}
        <li class="msg type-info">{$msg}</li>
    {/foreach}
    </ul>
    </div>
{/if}

{if isset($result->rata)}
    <div class="bottom-margin">
        <p class="pure-form message-success">
            Miesięczna Rata: **{$result->rata}** PLN.
        </p>
    </div>
{/if}

{/block}