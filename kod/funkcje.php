<?php
function zmien_haslo()
{
	$polaczenie = new PDO('mysql:host=localhost;dbname=waluty','root','');
			
			if(isset($_POST['SubmitButton']))
			{			
			$nowe_haslo = md5($_POST['nowe']);
				$zapytanie = $polaczenie->prepare('update uzytkownicy set haslo = :nowe where id_uzytkownika = :id ');
				$zapytanie -> bindParam(':nowe',$nowe_haslo);
				$zapytanie -> bindParam(':id',$_SESSION['ID']);
				$zapytanie -> execute();
			}
				
				echo "<form action ='' method = 'POST'>";
				echo "Zmien haslo <br> <br>";
				echo "Nowe haslo: <br> <input type = 'password' name = 'nowe' required > <br>";	
				echo "<br> <input type = 'submit' value = 'Zmien'  name = 'SubmitButton'>";
				echo '</form>';
		$polaczenie = null;
}



function wyloguj()
{
	session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header("Location: formularz_logowania.html");
	exit;
}



?>
