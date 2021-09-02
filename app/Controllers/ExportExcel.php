<?php

namespace App\Controllers;

use App\Models\daftarModel;
use App\Models\keluargaModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportExcel extends BaseController
{
    public function cetak()
    {
        $identitias = new daftarModel();
        $daftar = $identitias->findAll();


        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'DATA PEGAWAI PT BPR BKK WONOGIRI')
            ->setCellValue('A3', 'DATA IDENTITAS')
            ->setCellValue('A4', 'NO')
            ->setCellValue('B4', 'Nama')
            ->setCellValue('C4', 'NIK')
            ->setCellValue('D4', 'Jabatan')
            ->setCellValue('E4', 'Tempat Lahir')
            ->setCellValue('F4', 'Tanggal Lahir')
            ->setCellValue('G4', 'Alamat')
            ->setCellValue('H4', 'Status Pegawai')
            ->setCellValue('I4', 'Satatus Menikah')
            ->setCellValue('J4', 'Nama Keluarga')
            ->setCellValue('K4', 'Tanggal Lahir');

        // lebar kolom
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(27);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15);

        // center text

        // merge kolom
        $spreadsheet->getActiveSheet()->mergeCells('A1:D1');
        $spreadsheet->getActiveSheet()->mergeCells('A3:I3');

        $column = 5;
        // tulis data ke cell
        $i = 1;
        foreach ($daftar as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $i++)
                ->setCellValue('B' . $column, $data['namapeg'])
                ->setCellValue('C' . $column, $data['nik'])
                ->setCellValue('D' . $column, $data['jabatan_peg'])
                ->setCellValue('E' . $column, $data['tmplahir'])
                ->setCellValue('F' . $column, $data['tgllahir'])
                ->setCellValue('G' . $column, $data['alamat'])
                ->setCellValue('H' . $column, $data['Statuspeg'])
                ->setCellValue('I' . $column, $data['statuskeluarga']);
            $column++;
        }

        // Tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Pegawai';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xls');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('php://output');
    }
}
