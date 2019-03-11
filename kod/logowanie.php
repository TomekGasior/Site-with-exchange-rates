<?php
$polaczenie = new mysqli('localhost','root','','waluty');

	if (mysqli_connect_errno() !=0)
	{
	echo 'Blad polaczenia: '.mysqli_connect_error();
	exit;
	}
	
	$login = $_POST['log'];
	$password = md5($_POST['password']);
	
	$sql = "Select * from uzytkownicy where login = '$login' and haslo = '$password' ";
	$wynik = $polaczenie -> query($sql);
	$ilerowsow = $wynik->num_rows;
	
	if($ilerowsow ==  0)
	{
		echo "Podany login i/lub haslo jest/sa bledne.";
	}
	else
	{		
	session_start();
		$rekord = $wynik -> fetch_assoc();
		$_SESSION['ID'] = $rekord['id_uzytkownika'];
		$_SESSION['uprawnienia'] = $rekord['uprawnienia'];
			header("Location: index.php");
			exit;
	}
?>

