<?php include _ROOT_PATH.'/templates/top.php'; ?>

<h2>Kalkulator kredytowy</h2>

<form class="pure-form pure-form-stacked" action="<?php print(_APP_ROOT);?>/app/calc.php" method="post">

    <label>Kwota kredytu:</label>
    <input type="text" name="amount" value="<?php if(isset($amount)) print($amount); ?>">

    <label>Liczba rat:</label>
    <select name="installments">
        <option value="">-- wybierz --</option>
        <option value="2"  <?php if(isset($installments)&&$installments=='2') print('selected'); ?>>2</option>
        <option value="6"  <?php if(isset($installments)&&$installments=='6') print('selected'); ?>>6</option>
        <option value="12" <?php if(isset($installments)&&$installments=='12') print('selected'); ?>>12</option>
        <option value="24" <?php if(isset($installments)&&$installments=='24') print('selected'); ?>>24</option>
        <option value="30" <?php if(isset($installments)&&$installments=='30') print('selected'); ?>>30</option>
    </select>

    <label>Oprocentowanie (%):</label>
    <input type="text" name="interest" value="<?php if(isset($interest)) print($interest); ?>">

    <button type="submit" class="pure-button pure-button-primary">Oblicz ratę</button>
</form>

<?php
if (isset($messages) && count($messages) > 0) {
    echo '<div class="messages"><ol>';
    foreach ($messages as $msg)
        echo '<li>'.$msg.'</li>';
    echo '</ol></div>';
}
?>

<?php if (isset($result)) { ?>
<div class="result">
    <h3>Miesięczna rata:</h3>
    <p><strong><?php echo number_format($result,2,',',' '); ?> zł</strong></p>
</div>
<?php } ?>

<p>Minimalna kwota kredytu: <strong>5000 zł</strong><br>
Minimalne oprocentowanie: <strong>2%</strong></p>

<?php include _ROOT_PATH.'/templates/bottom.php'; ?>
