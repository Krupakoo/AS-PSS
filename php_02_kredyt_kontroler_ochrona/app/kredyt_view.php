<?php 
require_once dirname(__FILE__) . '/../config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@2.1.0/build/pure-min.css">
<style>
    body { margin: 20px; font-family: Arial; }
    .msg-error {
        padding: 10px;
        background-color: #f88;
        border-radius: 5px;
        width: 300px;
        margin: 15px 0;
    }
    .msg-ok {
        padding: 10px;
        background-color: #ff0;
        border-radius: 5px;
        width: 300px;
        margin: 15px 0;
    }
</style>
</head>
<body>


<div style="margin-bottom: 20px;">
<?php if (isset($_SESSION['role']) && $_SESSION['role'] != ''): ?>
    <a href="<?php print(_APP_ROOT); ?>/app/inna_ochrona.php" class="pure-button">Inna strona</a>
    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
    <span style="margin-left:10px;">(Zalogowano jako: <?php echo $_SESSION['role']; ?>)</span>
<?php else: ?>
    <a href="<?php print(_APP_ROOT); ?>/app/security/login.php" class="pure-button pure-button-primary">Zaloguj</a>
<?php endif; ?>
</div>


<form action="<?php print(_APP_URL);?>/app/kredyt_calc.php" method="post" class="pure-form pure-form-stacked" style="width:300px;">

	<label for="id_amount">Kwota kredytu: </label>
	<input id="id_amount" type="text" name="amount" value="<?php if(isset($amount)) print($amount); ?>" />
	
	<label for="id_installments">Liczba rat: </label>
	<select name="installments" id="id_installments">
		<option value="">-- wybierz --</option>
		<option value="2"  <?php if(isset($installments) && $installments=='2')  print('selected'); ?>>2</option>
		<option value="6"  <?php if(isset($installments) && $installments=='6')  print('selected'); ?>>6</option>
		<option value="12" <?php if(isset($installments) && $installments=='12') print('selected'); ?>>12</option>
		<option value="24" <?php if(isset($installments) && $installments=='24') print('selected'); ?>>24</option>
		<option value="30" <?php if(isset($installments) && $installments=='30') print('selected'); ?>>30</option>
	</select>
	
	<label for="id_interest">Oprocentowanie (%): </label>
	<input id="id_interest" type="text" name="interest" value="<?php if(isset($interest)) print($interest); ?>" />

	<input type="submit" value="Oblicz ratę" class="pure-button pure-button-primary" style="margin-top:10px;" />
</form>

<?php

if (isset($messages) && count($messages) > 0) {
	echo '<div class="msg-error"><ol>';
	foreach ($messages as $msg) {
		echo '<li>'.$msg.'</li>';
	}
	echo '</ol></div>';
}
?>

<?php if (isset($result)) { ?>
<div class="msg-ok">
<?php echo 'Miesięczna rata: '.number_format($result,2,',',' ').' zł'; ?>
</div>
<?php } ?>

<p>
Minimalna kwota kredytu: 5000 zł<br>
Minimalne oprocentowanie: 2%
</p>


<div style="margin-top: 20px;">
    <?php if (!isset($_SESSION['role'])): ?>
        <p><b>Gość:</b> może brać kredyt do 10 000 zł</p>
    <?php elseif ($_SESSION['role'] == 'user'): ?>
        <p><b>Pracownik:</b> może brać kredyt do 50 000 zł</p>
    <?php elseif ($_SESSION['role'] == 'admin'): ?>
        <p><b>Administrator:</b> pełny dostęp</p>
    <?php endif; ?>
</div>

</body>
</html>
