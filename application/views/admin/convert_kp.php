<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'layanan_jtpi';
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);

include "PHPExcel.php";

$csv = new PHPExcel();
$csv->getProperties()->setCreator('Admin JTPI ITERA')
             ->setLastModifiedBy('Admin JTPI ITERA')
             ->setTitle("Data Kerja Praktik Mahasiswa ITERA")
             ->setSubject("Mahasiswa ITERA")
             ->setDescription("Laporan Semua Kerja Praktik Mahasiswa")
             ->setKeywords("Data Mahasiswa");
$csv->setActiveSheetIndex(0)->setCellValue('A1', "No");             
$csv->setActiveSheetIndex(0)->setCellValue('B1', "NIM");
$csv->setActiveSheetIndex(0)->setCellValue('C1', "Nama Mahasiswa");
$csv->setActiveSheetIndex(0)->setCellValue('D1', "Prodi");
$csv->setActiveSheetIndex(0)->setCellValue('E1', "Tempat KP");
$csv->setActiveSheetIndex(0)->setCellValue('F1', "Alamat KP");
$csv->setActiveSheetIndex(0)->setCellValue('G1', "Keterangan");

$sql = $pdo->prepare("SELECT id,Nim,Nama,nama_prodi,Tempat_KP,Alamat_KP,nama_status FROM tbl_perizinan JOIN prodi ON tbl_kp.kode_prodi=prodi.kode_prodi JOIN status ON tbl_kp.id=status.id ");
$sql->execute();
$numrow = 2;
while($data = $sql->fetch()){
    $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['id']);
    $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['Nim']);
    $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['Nama']);
    $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['nama_prodi']);
    $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['Tempat_KP']);
    $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['Alamat_KP']);
    $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['nama_status']);

  $numrow++;
}
$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$csv->getActiveSheet(0)->setTitle("Data Kerja Praktik Mahasiswa JTPI ITERA");
$csv->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Kerja Praktik Mahasiswa JTPI ITERA.csv"'); // Set nama file excel nya
header('Cache-Control: max-age=0');
$write = new PHPExcel_Writer_CSV($csv);
$write->save('php://output');
?>