<?php
require_once('funkcje.php');
session_start();
if (!isset($_SESSION['ID'])) 
{
		header("Location: formularz_logowania.php");
		exit;
}

$poziom = $_SESSION['uprawnienia'];

if(isset($_POST['submit']))
			{
				$nazwa = $_POST['nazwa'];
				$polaczenie = new mysqli("localhost","root","","waluty");
					$sql = "Select * from waluty where nazwa_waluty = '$nazwa' order by id_waluty desc";
					$wynik = $polaczenie->query($sql);
					$ile = $wynik->num_rows;
					if($ile ==  0)
	{
		header("Location: znajdz_walute2.php?id=0");
		exit;
	}
	else
	{		
		$row = $wynik -> fetch_assoc();
		$id = $row['id_waluty'];
			header("Location: znajdz_walute2.php?id=$id");
			exit;
	}
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

<form method = "POST" action = "">
Wprowadz walute
</select>
<br>
<select name = "nazwa">
  <option value="USD">dolar amerykanski</option>
  <option value="EUR">euro</option>
  <option value="CHF">frank szwajcarski</option>
  <option value="NOK">korona dunska</option>
  <option value="NIS">szekel izraelski</option>
</select>
<input type = "submit" name = "submit" value = "Szukaj">
</form>
</html>