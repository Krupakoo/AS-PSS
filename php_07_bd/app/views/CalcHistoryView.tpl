{extends file="main.tpl"}

{block name=content}

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-1-2">

<h2 class="content-head is-center">Historia obliczeń</h2>

<table class="pure-table pure-table-bordered" style="margin: 0 auto;">
<thead>
	<tr>
		<th>Kwota</th>
		<th>Lata</th>
		<th>Procent</th>
		<th>Rata</th>
		<th>Data</th>
	</tr>
</thead>
<tbody>
{foreach $records as $r}
{strip}
	<tr>
		<td>{$r["kwota"]} zł</td>
		<td>{$r["lata"]}</td>
		<td>{$r["procent"]}%</td>
		<td>{$r["rata"]} zł</td>
		<td>{$r["data"]}</td>
	</tr>
{/strip}
{foreachelse}
	<tr>
		<td colspan="5">Brak zapisanych obliczeń w historii.</td>
	</tr>
{/foreach}
</tbody>
</table>

</div>
</div>

{/block}