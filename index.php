<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sklep papierniczy</title>
	<link rel="stylesheet" href="styl.css">
</head>
<body>
<div id="baner">
	<h1>W naszym sklepie internetowym kupisz taniej</h1>
</div>
<div id="lewy">
	<h3>Promocja 15% obejmuje artykuły:</h3>


	<ul>
	<?php
$conn = mysqli_connect('localhost','root','','sklep');
$sql = "SELECT nazwa FROM towary WHERE promocja= 1";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($res)){
echo '<li>'.$row['nazwa'].'</li>';
}

?>
</ul>
</div>
<div id="srodkowy"><h3>Cena wybranego artykułu w promocji</h3>


<?php
$conn = mysqli_connect('localhost','root','','sklep');
$sql = "SELECT nazwa FROM towary where promocja = 1";
$res = mysqli_query($conn, $sql);
echo '<form method="post"><select name="rzecz">';
while($row = mysqli_fetch_assoc($res)){
echo '<option>'.$row['nazwa'].'</option>';
}
echo '</select>';
echo '<input type="checkbox" name="checkbox" value="1"/><input type="submit" value="WYBIERZ"></form>';
$rzecz = $_POST["rzecz"];

if (empty($_POST['checkbox'])) {
 if(isset($_POST["rzecz"])){
$sql2 = "SELECT * FROM towary WHERE nazwa = '$rzecz'";
$res2 =  mysqli_query($conn, $sql2);
while($row2 = mysqli_fetch_assoc($res2)){
echo $row2['cena'];
}
}
}elseif (isset($_POST['checkbox']) && $_POST['checkbox'] == 1) 
	{
		 if(isset($_POST["rzecz"])){
	$sql2 = "SELECT cena, round(0.85*cena,2) as 'ile'  FROM towary where nazwa = '$rzecz'";
	$res2 =  mysqli_query(	$conn, $sql2);
	while($row2 = mysqli_fetch_assoc($res2)){
	echo $row2['wynik'];
}
}
	}

?>

</div>
<div id="prawy"><h3>Kontakt</h3>
<p>telefon:123123123<br>e-mail: <a href=""> bok@sklep.pl</a></p>
<img src="promocja2.png">
</div>
<div id="stopka">Autor strony:11223344555</div>
</body>
</html>