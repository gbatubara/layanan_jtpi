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
             ->setTitle("Izin Kegiatan")
             ->setSubject("Mahasiswa ITERA")
             ->setDescription("Laporan Semua Izin Mahasiswa")
             ->setKeywords("Data Mahasiswa");
$csv->setActiveSheetIndex(0)->setCellValue('A1', "No");             
$csv->setActiveSheetIndex(0)->setCellValue('B1', "NIM");
$csv->setActiveSheetIndex(0)->setCellValue('C1', "Nama Mahasiswa");
$csv->setActiveSheetIndex(0)->setCellValue('D1', "Prodi");
$csv->setActiveSheetIndex(0)->setCellValue('E1', "Nama Kegiatan");
$csv->setActiveSheetIndex(0)->setCellValue('F1', "Agenda");
$csv->setActiveSheetIndex(0)->setCellValue('G1', "Tempat");
$csv->setActiveSheetIndex(0)->setCellValue('H1', "Tanggal");
$csv->setActiveSheetIndex(0)->setCellValue('I1', "Waktu");
$csv->setActiveSheetIndex(0)->setCellValue('J1', "Nama Penanggung Jawab");
$csv->setActiveSheetIndex(0)->setCellValue('K1', "Jabatan Penanggung Jawab");
$csv->setActiveSheetIndex(0)->setCellValue('L1', "Keterangan");

$sql = $pdo->prepare("SELECT tbl_perizinan.id,Nim,Nama,nama_prodi,Nama_kegiatan,Agenda,Tempat,Tanggal,Waktu,Namapj,Jabatanpj,nama_status FROM tbl_perizinan JOIN prodi ON tbl_perizinan.kode_prodi=prodi.kode_prodi JOIN status ON tbl_perizinan.id=status.id ");
$sql->execute();
$numrow = 2;
while($data = $sql->fetch()){
    $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['id']);
    $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['Nim']);
    $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['Nama']);
    $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['nama_prodi']);
    $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['Nama_kegiatan']);
    $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['Agenda']);
    $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['Tempat']);
    $csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['Tanggal']);
    $csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['Waktu']);
    $csv->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['Namapj']);
    $csv->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['Jabatanpj']);
    $csv->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['nama_status']);

  $numrow++;
}
$csv->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$csv->getActiveSheet(0)->setTitle("Izin Kegiatan");
$csv->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Izin Kegiatan Mahasiswa JTPI ITERA.csv"'); // Set nama file excel nya
header('Cache-Control: max-age=0');
$write = new PHPExcel_Writer_CSV($csv);
$write->save('php://output');
?>