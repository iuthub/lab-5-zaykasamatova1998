<?php 
	$name = isset($_POST["name"]) ? $_POST["name"] : "";
	$section = isset($_POST["section"]) ? $_POST["section"] : "";
	$card = isset($_POST["card"]) ? $_POST["card"] : "";
	$cardType = isset($_POST["card-type"]) ? $_POST["card-type"] : "";


	$data = implode(";", [$name, $section, $card, $cardType]);




	$error = false;

	if(!$name || !$section || !$card || !$cardType){
		$error = true;
	}else{

		file_put_contents(__DIR__ ."/suckers.txt", $data."\n", FILE_APPEND | LOCK_EX);

		$suckers = file_get_contents(__DIR__."/suckers.txt");
	}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sucker php</title>
	<link href="buyagrade.css" type="text/css" rel="stylesheet" />

</head>
<body>
	
	<?php
if(!isset($_POST['name'])||!isset ($_POST['section'])||!isset($_POST['cardnumber'])||!isset($_POST['cardtype'])) {
	?>
	<h1>Sorry</h1>
	<p>
	You didn't fill out the form completely.<a href="buyagrade.html">Try again?</a>
	</p>
	
<?php 
}else{
	?>
	<h1>Thanks, sucker</h1>
	<p>Your information has been recorded</p>

	<dl>
		<dt>Name</dt>
		<dd>
			<?= $_POST['name']?>
		</dd>

		<dt>Section</dt>
		<dd>
			<?= $_POST['section']?>
		</dd>

		<dt>Credit Card</dt>
		<dd>
			<?= $_POST['cardnumber'] ?> (<?=$_POST['cardtype']?>)
		</dd>

	</dl>

	<p>Here are all the suckers who have submitted here:</p>

<?php 
$data = $_POST['name'].";".$_POST['section'].";".$_POST['cardnumber'].";".$_POST['cardtype']."\n";
file_put_contents("sucker.txt", $data, FILE_APPEND);
?>

	<pre><?= file_get_contents("suckers.txt") ?>
	</pre>

	<?php else: ?>

	<h1>Sorry</h1>
	<p>You did not fill the form correctly. <a href="/buyagrade.html">Try again?</a></p>

	<?php end if; 
	?>

</body>
</html>
