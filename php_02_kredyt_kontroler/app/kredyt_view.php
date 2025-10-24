<?php require_once dirname(__FILE__) .'/../config.php'; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/kredyt_calc.php" method="post">
	<label for="id_amount">Kwota kredytu: </label>
	<input id="id_amount" type="text" name="amount" value="<?php if(isset($amount)) print($amount); ?>" /><br />
	
	<label for="id_installments">Liczba rat: </label>
	<select name="installments" id="id_installments">
		<option value="">-- wybierz --</option>
		<option value="2"  <?php if(isset($installments) && $installments=='2')  print('selected'); ?>>2</option>
		<option value="6"  <?php if(isset($installments) && $installments=='6')  print('selected'); ?>>6</option>
		<option value="12" <?php if(isset($installments) && $installments=='12') print('selected'); ?>>12</option>
		<option value="24" <?php if(isset($installments) && $installments=='24') print('selected'); ?>>24</option>
		<option value="30" <?php if(isset($installments) && $installments=='30') print('selected'); ?>>30</option>
	</select><br />
	
	<label for="id_interest">Oprocentowanie (%): </label>
	<input id="id_interest" type="text" name="interest" value="<?php if(isset($interest)) print($interest); ?>" /><br />

	<input type="submit" value="Oblicz ratę" />
</form>

<?php
// Wyświetlenie błędów
if (isset($messages) && count($messages) > 0) {
	echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
	foreach ($messages as $msg) {
		echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
}
?>

<?php if (isset($result)) { ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Miesięczna rata: '.number_format($result,2,',',' ').' zł'; ?>
</div>
<?php } ?>

<p>Minimalna kwota kredytu: 5000 zł<br>
Minimalne oprocentowanie: 2%</p>

</body>
</html>
