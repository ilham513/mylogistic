<?php /*
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,15,'Tunjukan QR ini Code ke Panitia',0,1,'C');
// Insert a dynamic image from a URL
$pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World', 60, 30, 90, 0, 'PNG');
$pdf->Output();
*/?>

<?php
// memanggil library FPDF
require('fpdf.php');
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(200,10,'PDF Pengiriman',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(140,7,'Nama Perusahaan',1,0,'C');
$pdf->Cell(50,7,'No. Resi' ,1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);

$pdf->Cell(70,6, 'Pengirim: AAAA',1,0);
$pdf->Cell(70,6, 'Penerima: BBBB',1,0);
$pdf->Cell(50,6, 'Jumlah: 99999',1,0);  

$pdf->Cell(10,6,'',0,1);
$pdf->SetFont('Times','',10);

$pdf->Cell(70,6, 'Alamat: AAA',1,0);
$pdf->Cell(70,6, 'Alamat: BBBB',1,0);
$pdf->Cell(50,6, '',1,0);  

$pdf->Cell(10,6,'',0,1);
$pdf->SetFont('Times','',10);

$pdf->Cell(40,6, 'Tanggal: 00-00-0000',1,0);
$pdf->Cell(50,6, 'Kurir: BBBB',1,0);
$pdf->Cell(50,6, 'Penerima: AAAA',1,0);  
$pdf->Cell(50,6, 'Berat: 00 KG',1,0);  





$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(140,7,'Nama Perusahaan',1,0,'C');
$pdf->Cell(50,7,'No. Resi' ,1,0,'C');
 
 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);

$pdf->Cell(70,6, 'Pengirim: AAAA',1,0);
$pdf->Cell(70,6, 'Penerima: BBBB',1,0);
$pdf->Cell(50,6, 'Jumlah: 99999',1,0);  

$pdf->Cell(10,6,'',0,1);
$pdf->SetFont('Times','',10);

$pdf->Cell(70,6, 'Alamat: AAA',1,0);
$pdf->Cell(70,6, 'Alamat: BBBB',1,0);
$pdf->Cell(50,6, '',1,0);  

$pdf->Cell(10,6,'',0,1);
$pdf->SetFont('Times','',10);

$pdf->Cell(40,6, 'Tanggal: 00-00-0000',1,0);
$pdf->Cell(50,6, 'Kurir: BBBB',1,0);
$pdf->Cell(50,6, 'Penerima: AAAA',1,0);  
$pdf->Cell(50,6, 'Berat: 00 KG',1,0);  

$pdf->Cell(10,6,'',0,1);
$pdf->SetFont('Times','',10);

$pdf->Cell(95,20, 'TTD Penerima: ......................',1,0,'C');
$pdf->Cell(95,20, 'TTD Kurir: ......................',1,0,'C');

$pdf->Output();
 
?>