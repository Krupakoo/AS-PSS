{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator Kredytowy</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="kwota">Kwota kredytu (PLN): </label>
			<input id="kwota" type="text" name="kwota" value="{$form->kwota|default:''}"/>
		</div>
        <div class="pure-control-group">
			<label for="lata">Okres (Lata): </label>
			<input id="lata" type="text" name="lata" value="{$form->lata|default:''}"/>
		</div>
        <div class="pure-control-group">
			<label for="procent">Oprocentowanie (%): </label>
			<input id="procent" type="text" name="procent" value="{$form->procent|default:''}"/>
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz Ratę" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

{include file='messages.tpl'}

{if isset($res->rata)}
<div class="messages info">
	Miesięczna rata wynosi: **{$res->rata}**
</div>
{/if}

{/block}