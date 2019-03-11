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
	
					$zapytanie = $polaczenie->prepare('insert into waluty(nazwa_waluty, kupno, sprzedaz, data_waluty) values(:nazwa, :kupno, :sprzedaz, :data)');
					$zapytanie -> bindParam(':nazwa',$_POST['nazwa']);
					$zapytanie -> bindParam(':kupno',$_POST['kupno']);
					$zapytanie -> bindParam(':sprzedaz',$_POST['sprzedaz']);
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
Waluta:
</select>
<br>
<select name = "nazwa">
  <option value="USD">dolar amerykanski</option>
  <option value="EUR">euro</option>
  <option value="CHF">frank szwajcarski</option>
  <option value="NOK">korona norweska</option>
  <option value="NIS">szekel izraelski</option>
</select>
<br>
Kupno:
<br>
<input type = "value" name = "kupno" required>
<br>
Sprzedaz:
<br>
<input type = "value" name = "sprzedaz" required>
<br>
<button type = "submit" name = "dodaj">Odswiez kurs</button>
</form>
</html>
