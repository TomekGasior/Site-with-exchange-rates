<?php 
if(isset($_POST['submit']))
	{
		$haslo = md5($_POST['haslo']);
		
		if($_POST['haslo'] != $_POST['haslo2'])
		{
		echo 'Hasla roznia sie od siebie!';
		exit;
		}
		
	$data = Date("Y-m-d");
	
		$polaczenie = new PDO('mysql:host=localhost;dbname=waluty','root','');
					$uprawnienia =1;
					$zapytanie = $polaczenie->prepare('insert into uzytkownicy(Login, Haslo, uprawnienia, Data_zarejestrowania, imie, nazwisko)
					values(:login,:haslo,:uprawnienia,:data, :imie, :nazwisko)');
					$zapytanie -> bindParam(':login',$_POST['login']);
					$zapytanie -> bindParam(':haslo',$haslo);
					$zapytanie -> bindParam(':uprawnienia',$uprawnienia);
					$zapytanie -> bindParam(':data',$data);
					$zapytanie -> bindParam(':imie',$_POST['imie']);
					$zapytanie -> bindParam(':nazwisko',$_POST['nazwisko']);
					$zapytanie -> execute();
					header("Location: formularz_logowania.html");
	}
?>

<html>
<body>
<form action ="" method ="POST">
Login:
<br>
<input type = "text" name = "login">
<br>
Haslo:
<br>
<input type = "password" name = "haslo">
<br>
Powtorz haslo:
<br>
<input type = "password" name = "haslo2">
<br>
Imie:
<br>
<input type = "text" name = "imie">
<br>
Nazwisko:
<br>
<input type = "text" name = "nazwisko">
<br>
<button type = "submit" name = "submit">Zarejestruj sie</button>
</form>
</html>