<?php
include_once 'includes/dbh.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>ShopABC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
	<link rel="stylesheet" href="style.css">
</head>
<body class="homepage">
	
	<nav>
		<div class="wrapper">
	<ul>
	<li>
		<a  href="index.php">Prekių užsakymas</a>
		&emsp;
		<a  href="sarasas.php">Užsakymų sąrašas</a>
	</li>
</ul>
</div>

</nav>
<h1 style="">Mūsų produktas - pats geriausias!</h1>
<div class="wrapper2">
<h2>Norėdami užsakyti produktą, įveskite savo duomenis:</h2>
<form  method="_GET">
	<input class="INFO" type="text" name="vardas" placeholder="Jūsų vardas">
	<input class="INFO"type="text" name="pavardė" placeholder="Jūsų pavardė">
	<input class="INFO"type="text" name="adresas" placeholder="Jūsų adresas">
	
<h2>Kai teisingai užpildysite langelius, paspauskite mygtuką ,,Pateikti".</h2>
	<div class="buttonpostion">
	<button class="button" type="submit" name="submit"	value="submit">Pateikti</button>
	</div>
</form>
</div>

<?php
if (!empty($_GET['vardas']) && !empty($_GET['pavardė']) && !empty($_GET['adresas']) ){
$name = $_GET['vardas'];
$surname = $_GET['pavardė'];
$adress = $_GET['adresas'];
$sql = "INSERT INTO duomenys (vardas, pavarde, adresas) VALUES ('$name', '$surname', '$adress');";
mysqli_query($conn, $sql);
echo "<script type='text/javascript'>alert('Sėkmingai užsakėte prekę!');</script>";

}
?>

</body>
</html>




