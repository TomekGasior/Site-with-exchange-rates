<?php
require('funkcje.php');
session_start();
if (!isset($_SESSION['ID'])) 
{
		header("Location: formularz_logowania.php");
		exit;
}

$poziom = $_SESSION['uprawnienia'];
$data = Date("Y-m-d");

if(isset($_POST['dodaj']))
{
		$polaczenie = new PDO('mysql:host=localhost;dbname=waluty','root','');
	
					$zapytanie = $polaczenie->prepare('insert into spolki(walor, cena, data_spolki) values(:walor, :cena, :data)');
					$zapytanie -> bindParam(':nazwa',$_POST['nazwa']);
					$zapytanie -> bindParam(':cena',$_POST['cena']);
					$zapytanie -> bindParam(':data',$data);
					$zapytanie -> execute();
}
?>

<html>
<header>
<h1>Kantor</h1>
<hr>
		<ul>
			<li><a href = "./index.php">Strona główna</a></li>
		<?php
			if($poziom == 2)
			{
			
				echo "<li><a href = './ceny_walut.php'>Dodaj aktualne kursy waluty</a></li>";
				echo "<li><a href = './ceny_akcji.php'>Dodaj aktualna cene akcji spolki</a></li>";
				echo "<li><a href = './raport_uzytkownicy.php'>Raport o uzytkownikach</a></li>";
			}
				
				if($poziom == 1)
				{ 
				echo "<li><a href = './znajdz_walute.php'>Szukaj kursu waluty</a></li>";
				echo "<li><a href = './znajdz_akcje2.php'>Szukaj kursu akcji</a></li>";
			}
		?>
			<li><a href = "./index.php?link=zmienhaslo">Zmien haslo</a></li>
			<li><a href = "./index.php?link=wyloguj">Wyloguj </a></li>
		</ul>

<form action ="" method = "POST">
Dodaj ceny wymiany dla waluty
<br><br>
Nazwa spolki:
</select>
<br>
<select name = "nazwa">
  <option value="TAURONPE">Tauron Polska Energia SA</option>
  <option value="PGNIG">Polskie Górnictwo Naftowe i Gazownictwo SA</option>
  <option value="PGE">Polska Grupa Energetyczna SA</option>
  <option value="GETINOBLE">Getin Noble Bank SA</option>
  <option value="PZU">Powszechny Zaklad Ubezpieczen SA</option>
</select>
<br>
Cena:
<br>
<input type = "value" name = "cena" required>
<br>
<button type = "submit" name = "dodaj">Odswiez cene akcji</button>
</form>
</html>
