<?php
include "koneksi.php";
include "PHPExcel.php";
$csv = new PHPExcel();
$csv->getProperties()->setCreator('Admin JTPI ITERA')
             ->setLastModifiedBy('Admin JTPI ITERA')
             ->setTitle("Data Kerja Praktik Mahasiswa ITERA")
             ->setSubject("Mahasiswa ITERA")
             ->setDescription("Laporan Semua Kerja Praktik Mahasiswa")
             ->setKeywords("Data Mahasiswa");
$csv->setActiveSheetIndex(0)->setCellValue('A1', "HARI");
$csv->setActiveSheetIndex(0)->setCellValue('B1', "NO.");
$csv->setActiveSheetIndex(0)->setCellValue('C1', "NAMA PESDIK");
$csv->setActiveSheetIndex(0)->setCellValue('D1', "JENIS KELAMIN");
$csv->setActiveSheetIndex(0)->setCellValue('E1', "NISN");
$csv->setActiveSheetIndex(0)->setCellValue('F1', "NIS");
$csv->setActiveSheetIndex(0)->setCellValue('G1', "NIK");
$csv->setActiveSheetIndex(0)->setCellValue('H1', "TEMPAT LAHIR");
$csv->setActiveSheetIndex(0)->setCellValue('I1', "TANGGAL LAHIR");
$csv->setActiveSheetIndex(0)->setCellValue('J1', "DESA");
$csv->setActiveSheetIndex(0)->setCellValue('K1', "RT");
$csv->setActiveSheetIndex(0)->setCellValue('L1', "RW");
$csv->setActiveSheetIndex(0)->setCellValue('M1', "ASAL SEKOLAH");
$csv->setActiveSheetIndex(0)->setCellValue('N1', "KODE POS");
$csv->setActiveSheetIndex(0)->setCellValue('O1', "TELEPON PESDIK");
$csv->setActiveSheetIndex(0)->setCellValue('P1', "NAMA AYAH KANDUNG");
$csv->setActiveSheetIndex(0)->setCellValue('Q1', "NIK AYAH");
$csv->setActiveSheetIndex(0)->setCellValue('R1', "TEMPAT LAHIR");
$csv->setActiveSheetIndex(0)->setCellValue('S1', "TANGGAL LAHIR AYAH");
$csv->setActiveSheetIndex(0)->setCellValue('T1', "PENDIDIKAN TERKAHIR AYAH");
$csv->setActiveSheetIndex(0)->setCellValue('U1', "PEKERJAAN AYAH");
$csv->setActiveSheetIndex(0)->setCellValue('V1', "NOMOR TELEPON AYAH");
$csv->setActiveSheetIndex(0)->setCellValue('W1', "NAMA IBU KANDUNG");
$csv->setActiveSheetIndex(0)->setCellValue('X1', "NIK IBU");
$csv->setActiveSheetIndex(0)->setCellValue('Y1', "TEMPAT LAHIR");
$csv->setActiveSheetIndex(0)->setCellValue('Z1', "TANGGAL LAHIR IBU");
$csv->setActiveSheetIndex(0)->setCellValue('AA1', "PENDIDIKAN TERAKHIR IBU");
$csv->setActiveSheetIndex(0)->setCellValue('AB1', "PEKERJAAN IBU");
$csv->setActiveSheetIndex(0)->setCellValue('AC1', "NOMOR TELEPON IBU");
$csv->setActiveSheetIndex(0)->setCellValue('AD1', "NAMA WALI");
$csv->setActiveSheetIndex(0)->setCellValue('AE1', "NIK WALI");
$csv->setActiveSheetIndex(0)->setCellValue('AF1', "TANGGAL LAHIR WALI");
$csv->setActiveSheetIndex(0)->setCellValue('AG1', "PENDIDIKAN TERAKHIR WALI");
$csv->setActiveSheetIndex(0)->setCellValue('AH1', "PEKERJAAN WALI");
$csv->setActiveSheetIndex(0)->setCellValue('AI1', "TELEPON WALI");
$csv->setActiveSheetIndex(0)->setCellValue('AJ1', "IJAZAH");
$csv->setActiveSheetIndex(0)->setCellValue('AK1', "SKHUN");
$csv->setActiveSheetIndex(0)->setCellValue('AL1', "AKTE KELAHIRAN");
$csv->setActiveSheetIndex(0)->setCellValue('AM1', "KARTU KELUARGA");
$csv->setActiveSheetIndex(0)->setCellValue('AN1', "KPS");
$csv->setActiveSheetIndex(0)->setCellValue('AO1', "KIP");
$csv->setActiveSheetIndex(0)->setCellValue('AP1', "PKH");
$csv->setActiveSheetIndex(0)->setCellValue('AQ1', "KIS");
$csv->setActiveSheetIndex(0)->setCellValue('AR1', "BPJS");
$csv->setActiveSheetIndex(0)->setCellValue('AS1', "HOBY & PRESTASI");
$sql = $pdo->prepare("SELECT * FROM siswabaru");
$sql->execute();
$numrow = 2;
while($data = $sql->fetch()){
    $csv->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['hari']);
    $csv->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['no']);
    $csv->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['namapesdik']);
    $csv->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['jk']);
    $csv->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['nisn']);
    $csv->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['nis']);
    $csv->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['nik']);
    $csv->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['tempatlahirpesdik']);
    $csv->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['tlpesdik']);
    $csv->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['desa']);
    $csv->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['rt']);
    $csv->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['rw']);
    $csv->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data['asalsekolah']);
    $csv->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data['kodepos']);
    $csv->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data['teleponpesdik']);
    $csv->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data['namaayah']);
    $csv->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data['nikayah']);
    $csv->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data['tempatlahirayah']);
    $csv->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data['tlayah']);
    $csv->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data['pendidikanterakhirayah']);
    $csv->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data['pekerjaanayah']);
    $csv->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data['teleponayah']);
    $csv->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data['namaibu']);
    $csv->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data['nikibu']);
    $csv->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data['tempatlahiribu']);
    $csv->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data['tlibu']);
    $csv->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data['pendidikanterakhiribu']);
    $csv->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data['pekerjaanibu']);
    $csv->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data['teleponibu']);
    $csv->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data['namawali']);
    $csv->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data['nikwali']);
    $csv->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data['tlwali']);
    $csv->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data['pendidikanterakhirwali']);
    $csv->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data['pekerjaanwali']);
    $csv->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data['teleponwali']);
    $csv->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data['ijazah']);
    $csv->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data['skhun']);
    $csv->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data['aktekelahiran']);
    $csv->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data['kartukeluarga']);
    $csv->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data['kps']);
    $csv->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data['kip']);
    $csv->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data['pkh']);
    $csv->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data['kis']);
    $csv->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data['bpjs']);
    $csv->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data['hobiprestasi']);

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