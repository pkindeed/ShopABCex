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

		if ($page = isset($_GET['page'])){
			$page = $_GET['page'];
		};
		
		//// Patikrina, kiek išvis reikia puslapių ir juos pavaizduoja

		$totalcount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM duomenys"));
		$a = $totalcount/10;
		$a = ceil($a)+1;

		for ($b=1; $b<$a; $b++){
			  ?><a href="sarasas.php?page=<?php echo $b;?>" style="text-decoration: none" method="_GET"><?php 
			  	echo $b;
			  	 ?> </a>  
			  <?php
		}

		

		if (empty($page) || $page == 1){
			$page = isset($_GET['page']);
			$page1 = 0;
	
		}else{
			$page1=($page*10)-10;

		}


	if (isset($rikiavimas) &&  $rikiavimas =='varda'){
			$sql = "SELECT * FROM duomenys ORDER BY vardas LIMIT $page1, 10";
		}else if (isset($rikiavimas) &&  $rikiavimas =='pavarda'){
			$sql = "SELECT * FROM duomenys ORDER BY pavarde LIMIT $page1, 10";
		}else if (isset($rikiavimas) &&  $rikiavimas =='adresa'){
			$sql = "SELECT * FROM duomenys ORDER BY adresas LIMIT $page1, 10";
		}else{
			$sql = "SELECT * FROM duomenys LIMIT $page1, 10";
		}


		//////////

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