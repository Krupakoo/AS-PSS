{extends file="main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<h3>Kalkulator Kredytowy</h2>


<form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
	<fieldset>
		
		<label for="kwota">Kwota kredytu (PLN)</label>
		<input id="kwota" type="text" placeholder="Np. 150000" name="kwota" value="{$form->kwota|default:''}">
		
		<label for="lata">Okres kredytowania (Lata)</label>
		<input id="lata" type="text" placeholder="Np. 20" name="lata" value="{$form->lata|default:''}">
		
		<label for="procent">Oprocentowanie (%)</label>
		<input id="procent" type="text" placeholder="Np. 7.5" name="procent" value="{$form->procent|default:''}">
		
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz Ratę</button>
</form>

<div class="messages">

{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->rata)}
	<h4>Wynik</h4>
	<p class="res">
	Miesięczna rata wynosi: **{$res->rata}**
	</p>
{/if}

</div>

{/block}