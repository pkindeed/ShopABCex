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
<body>
	
	<nav>
		<div class="wrapper">
	<ul>
	<li>
		<a href="index.php">Prekių užsakymas</a>
		<a href="sarasas.php">Užsakymų sąrašas</a>
	</li>
</ul>
</div>

</nav>
<div class="wrapper2">
<h2>Norėdami ieškoti užsakymo, įveskite vardą, pavardę arba adresą į šią eilutę:</h2>



<form method="POST" style="padding-bottom: 25px;">
	<input type="text" name="search" placeholder="Ieškoti">
		<select name="rikiavimas">
	  <option value="varda">Rikiuoti pagal vardą</option>
	  <option value="pavarda">Rikiuoti pagal pavardę</option>
	  <option value="adresa">Rikiuoti pagal adresą</option>
	</select>
	<input type="submit" name="submit-rikiavimas" value="Pateikti"></button>

</form>





<table>
	<tr>
		<th>Vardas</th>
		<th>Pavardė</th>
		<th>Adresas</th>
		

		<?php

		function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}
		
		if (isset($_POST['search'])){
		$search = $_POST['search'];
		};

		if (isset($_POST['rikiavimas'])){
		$rikiavimas = $_POST['rikiavimas'];
		};
		
		

		if (isset($rikiavimas) &&  $rikiavimas =='varda'){
			$sql = "SELECT * FROM duomenys ORDER BY vardas";
		}else if (isset($rikiavimas) &&  $rikiavimas =='pavarda'){
			$sql = "SELECT * FROM duomenys ORDER BY pavarde";
		}else if (isset($rikiavimas) &&  $rikiavimas =='adresa'){
			$sql = "SELECT * FROM duomenys ORDER BY adresas";
		}else{
			$sql = "SELECT * FROM duomenys";
		}



		
		$results = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_assoc($results)){
			if (empty($search)){
			echo "<tr>";
			echo "<td>$row[vardas]</td>";
			echo "<td>$row[pavarde]</td>";
			echo "<td>$row[adresas]</td>";
			echo "</tr>";

			}else{
			if (contains($search, $row['vardas'])== true || contains($search, $row['pavarde'])== true|| contains($search, $row['adresas'])== true){
				echo "<tr>";
			echo "<td>$row[vardas]</td>";
			echo "<td>$row[pavarde]</td>";
			echo "<td>$row[adresas]</td>";
			echo "</tr>";
			}
			
		}
		
	};

		?>


</table>
</div>

</body>
</html>