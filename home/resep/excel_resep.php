<?php
// Load file koneksi.php
include "../../koneksi.php";

// Load plugin PHPExcel nya
require_once '../../PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal fil excel
$excel->getProperties()->setCreator('Anisa')->setLastModifiedBy('Anisa')->setTitle("Data Resep")->setSubject("Klinik Anisa")->setDescription("Data Resep")->setKeywords("Resep");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
	'font' => array('bold' => true), // Set font nya jadi bold
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
	)
);

$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA Resep"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A1:B1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "ID");
$excel->setActiveSheetIndex(0)->setCellValue('B3', "ID Berobat/Diagnosa");
$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Obat");

// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa
$sql = $koneksi->prepare("SELECT * FROM resep_obat a JOIN obat b ON a.id_obat=b.id_obat JOIN berobat c ON a.id_berobat=c.id_berobat");

$sql->execute(); // Eksekusi querynya
$result = $sql->get_result();

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
// var_dump($sql)
while($data = $result->fetch_assoc()) {// Ambil semua data dari hasil eksekusi $sql
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['id_resep']);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['id_berobat']."/".$data['hasil_diagnosa']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['nama_obat']);


	// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);


	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);

	$no++; // Tambah 1 setiap kali looping
	$numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(50); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom B


// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Data Resep");
$excel->setActiveSheetIndex(0);

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Report Data Resep.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
ob_end_clean(); // Cara FIX grgr ana output tambahan line kosong ng duwur sedurunge di export
$write->save('php://output');

?>
