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
		&emsp;
		<a href="sarasas.php?page=1">Užsakymų sąrašas</a>
	</li>
</ul>
</div>

</nav>
<div class="wrapper2">
<h2>Norėdami ieškoti užsakymo, įveskite vardą, pavardę arba adresą į šią eilutę:</h2>



<form method="GET" style="padding-bottom: 25px;">
	<input type="text" name="search" placeholder="Ieškoti" value="<?php 
	if(isset($_POST['rikiavimas'])){echo $_GET['rikiavimas'] ;} ?>" >
		<select name="rikiavimas">
	  <option value="varda">Rikiuoti pagal vardą</option>
	  <option value="pavarda">Rikiuoti pagal pavardę</option>
	  <option value="adresa">Rikiuoti pagal adresą</option>
	</select>
	<input type="submit" name="submit-rikiavimas" value="Pateikti" ></button>

</form>



<h3>Rezultatų skaičius: <?php  
if (isset($_GET['search'])){
		$search = htmlentities($_GET['search']);
		};
if (empty($search)){
		$totalcount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM duomenys"));
		}else{
		$totalcount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM duomenys WHERE (vardas LIKE '%$search%' OR pavarde LIKE '%$search%' OR adresas LIKE '%$search%')"));
		}
if(!empty($totalcount)){
	echo $totalcount;
}else{
	echo "Nėra tokių rezultatų";
}
?>
&emsp; Dabar rodomas puslapis:   <?php echo htmlentities($_GET['page']);?>      
&emsp; Rinktis puslapį:
<?php  
	function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}
		
		if (isset($_GET['search'])){
		$search = htmlentities($_GET['search']);
		};

		if (isset($_GET['rikiavimas'])){
		$rikiavimas = $_GET['rikiavimas'];
		};

		if ($page = isset($_GET['page'])){
			$page = $_GET['page'];
		}
		
		//// Patikrina, kiek išvis reikia puslapių ir juos pavaizduoja, isimena ka jau rinkosi klientas.

		if (empty($search)){
		$totalcount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM duomenys"));
		}else{
		$totalcount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM duomenys WHERE (vardas LIKE '%$search%' OR pavarde LIKE '%$search%' OR adresas LIKE '%$search%')"));
		}
		$a = $totalcount/10;
		$a = ceil($a)+1;
 		$xxx=0;
 		$yyy=0;
		for ($b=1; $b<$a; $b++){
			  ?><a 
			  href="sarasas.php?page=<?php 
			  echo $b; 
			  if (!empty($rikiavimas)){
			  	echo '&rikiavimas=';
			  	echo htmlentities($rikiavimas);
			  }
			  if (!empty($search)){
			  	echo '&search=';
			  	echo htmlentities($search);
			  }
			  ?>" 

			 style="text-decoration: none" method="_GET"><?php 
			 
			 ///sutvarko kad paginge butu per viduri ... is abieju pusiu kai per daug entries
					if ($b==1 || $b==2){
			  		echo $b;
			  		}else if ($b == $page||$b == $page-1||$b == $page+1 ){
					echo $b;
			  		}else if ($b==$a-1){
			  		echo $b;
			  		}else if ($xxx<1&& $b <$page){
			  			echo "...";
			  			$xxx++;
			  		}else if ($yyy<1&& $b >$page){
			  			echo "...";
			  			$yyy++;
			  		}

			  		
			  	 ?> </a>  


			  <?php
		}

		if (empty($page) || $page == 1){
			$page = isset($_GET['page']);
			$page1 = 0;
	
		}else{
			$page1=($page*10)-10;

		}

		//// Atrenka po 10 atitinkamame psl.
if (empty($search)){
	if (isset($rikiavimas) &&  $rikiavimas =='varda'){
			$sql = "SELECT * FROM duomenys ORDER BY vardas LIMIT $page1, 10";
		}else if (isset($rikiavimas) &&  $rikiavimas =='pavarda'){
			$sql = "SELECT * FROM duomenys ORDER BY pavarde LIMIT $page1, 10";
		}else if (isset($rikiavimas) &&  $rikiavimas =='adresa'){
			$sql = "SELECT * FROM duomenys ORDER BY adresas LIMIT $page1, 10";
		}else{
			$sql = "SELECT * FROM duomenys LIMIT $page1, 10";
		}
	}else{
		if (isset($rikiavimas) &&  $rikiavimas =='varda'){
			$sql = "SELECT * FROM duomenys WHERE (vardas LIKE '%$search%' OR pavarde LIKE '%$search%' OR adresas LIKE '%$search%') ORDER BY vardas LIMIT $page1, 10";
		}else if (isset($rikiavimas) &&  $rikiavimas =='pavarda'){
			$sql = "SELECT * FROM duomenys WHERE (vardas LIKE '%$search%' OR pavarde LIKE '%$search%' OR adresas LIKE '%$search%')ORDER BY pavarde LIMIT $page1, 10";
		}else if (isset($rikiavimas) &&  $rikiavimas =='adresa'){
			$sql = "SELECT * FROM duomenys WHERE (vardas LIKE '%$search%' OR pavarde LIKE '%$search%' OR adresas LIKE '%$search%')ORDER BY adresas LIMIT $page1, 10";
		}else{
			$sql = "SELECT * FROM duomenys WHERE (vardas LIKE '%$search%' OR pavarde LIKE '%$search%' OR adresas LIKE '%$search%') LIMIT $page1, 10";
		}
	}


; ?> 
<form method="_GET">
<input  type="button" name="minus-pagenumber" value="<" onClick="window.location.href='https://shopabcfun.herokuapp.com/sarasas.php?page=<?php 
				
				if($page>1){echo $page-1;}else{
					echo $page;
				}  
				if (!empty($rikiavimas)){
			  	echo '&rikiavimas=';
			  	echo htmlentities($rikiavimas);
			  }
			  if (!empty($search)){
			  	echo '&search=';
			  	echo htmlentities($search);
			  }?>'"></button>
<input  type="button" name="add-pagenumber" value=">" onClick="window.location.href='https://shopabcfun.herokuapp.com/sarasas.php?page=<?php 
				if (isset($_GET['search'])){
		$search = htmlentities($_GET['search']);
		};
				if (empty($search)){
		$totalcount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM duomenys"));
		}else{
		$totalcount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM duomenys WHERE (vardas LIKE '%$search%' OR pavarde LIKE '%$search%' OR adresas LIKE '%$search%')"));
		}

		$a = $totalcount/10;
		$a = ceil($a)+1;
				if(($page==1&&$totalcount>10)||$page<($a-1)){echo $page+1;} else{
					echo $page;
				}
				if (!empty($rikiavimas)){
			  	echo '&rikiavimas=';
			  	echo htmlentities($rikiavimas);
			  }
			  if (!empty($search)){
			  	echo '&search=';
			  	echo htmlentities($search);
			  } ?>'"></button></form></h3>



<table>
	<tr>
		<th>Vardas</th>
		<th>Pavardė</th>
		<th>Adresas</th>
		

		<?php

	

		//// Parašo lentelėje tik tuos, kurie atitinka search.

		$results = mysqli_query($conn, $sql);
		
		while ($row = mysqli_fetch_assoc($results)){
			echo "<tr>";
			echo "<td>$row[vardas]</td>";
			echo "<td>$row[pavarde]</td>";
			echo "<td>$row[adresas]</td>";
			echo "</tr>";
	};

		?>


</table>
</div>

</body>
</html>