<?php
error_reporting(E_ERROR);
session_start();
require_once('fpdf.php');
require_once('funkcje.php');
session_start();

if (!isset($_SESSION['ID'])) 
{
		header("Location: formularz_logowania.php");
		exit;
}

$poziom = $_SESSION['poziom'];
$pdf = new FPDF();
$polaczenie = new mysqli('localhost','root','','waluty');

if (mysqli_connect_errno() !=0)
	{
	echo 'Blad poaczenia'.mysqli_connect_error();
	exit;
	}
	
$sql = "select * from uzytkownicy";
$wynik = $polaczenie -> query($sql);

$pdf -> AddPage();
$pdf -> SetFont('Arial','B',20);

$pdf -> Cell(75,15,'',0,0);
$pdf -> Cell(50,15,'Lista uzytkownikow',0,1,'C');

$pdf -> SetFont('Arial','B',10);

$pdf -> Cell(30,8,'Login',1,0,'L');
$pdf -> Cell(30,8,'Uprawnienia',1,0,'L');
$pdf -> Cell(30,8,'Data rejestracji ',1,0,'L');
$pdf -> Cell(30,8,'Imie ',1,0,'L');
$pdf -> Cell(30,8,'Nazwisko ',1,1,'L');

$pdf -> SetFont('Arial','',10);
$pdf -> SetFillColor(255,255,255);

while (($rekord = $wynik -> fetch_assoc()) != null)
{
	$pdf -> Cell(30,8,$rekord['login'],1,0,'L');
	$pdf -> Cell(30,8,$rekord['uprawnienia'],1,0,'L');
	$pdf -> Cell(30,8,$rekord['data_zarejestrowania'],1,0,'L');
	$pdf -> Cell(30,8,$rekord['imie'],1,0,'L');
	$pdf -> Cell(30,8,$rekord['nazwisko'],1,1,'L');
}

$pdf -> Output();
?>