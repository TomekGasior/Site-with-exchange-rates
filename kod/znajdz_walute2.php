<?php
require_once('funkcje.php');
session_start();
if (!isset($_SESSION['ID'])) 
{
		header("Location: formularz_logowania.php");
		exit;
}

$poziom = $_SESSION['uprawnienia'];
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
	
<?php 
if($_GET['id'] == 0 )
{
	echo "Nie ma informacji o walucie.";
}
else
	{
			$nazwa = $_GET['id'];
				$polaczenie = new mysqli("localhost","root","","waluty");
					$sql = "Select * from waluty where id_waluty = '$nazwa'";
					$wynik = $polaczenie->query($sql);
					$row = $wynik -> fetch_assoc();
					echo "Waluta: ";
					echo $row['nazwa_waluty'];
					echo "<br>";
					echo "Kupno: ";
					echo $row['kupno'];
					echo "<br>";
					echo "Sprzedaz: ";
					echo $row['sprzedaz'];
					echo "<br>";
					echo "Data: ";
					echo $row['data_waluty'];
					echo "<br>";
	}
?>
</html>

