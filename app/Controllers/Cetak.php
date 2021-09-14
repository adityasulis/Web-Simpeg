<?php

namespace App\Controllers;

use App\Models\daftarModel;
use App\Models\keluargaModel;
use App\Models\pendidikanModel;
use App\Models\pangkatModel;
use App\Models\jabatanModel;
use App\Models\pendidikannonModel;

class Cetak extends BaseController
{
    public function __construct()
    {
        $this->daftarModel = new daftarModel();
        $this->keluargaModel = new keluargaModel();
        $this->pendidikanModel = new pendidikanModel();
        $this->pangkatModel = new pangkatModel();
        $this->jabatanModel = new jabatanModel();
        $this->pendidikannonModel = new pendidikannonModel();
    }
    public function cetakDataUser($id)
    {

        $mpdf = new \Mpdf\Mpdf();

        $daftar = $this->daftarModel->getCetakData($id);
        $keluarga = $this->keluargaModel->getCetakkel($id);
        $pendidikan = $this->pendidikanModel->getCetakPendidikan($id);
        $pangkat = $this->pangkatModel->getCetakPangkat($id);
        $jabatan = $this->jabatanModel->getCetakJabatan($id);
        $pendnon = $this->pendidikannonModel->getCetakPendidikanNon($id);

        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" type="image/png" sizes="20x20" href="/img/logo-kop/logo.png">
            <title>' . $daftar->namapeg . '</title>
        </head>
        <body>
        <style>
            h2{
            text-align:center;
            margin-top:18px;
           
            }
            table{
                table-layout: fixed;
                border: 1px solid black;
                border-collapse: collapse;
                padding: 2px;
                width:80%;
            }
            th{
                border: 1px solid black;
                border-collapse: collapse;
                padding: 2px;
                text-align:center;
            }
            td{
                border: 1px solid black;
                border-collapse: collapse;
                padding: 2px;
                text-align:center;
            }
            caption {
                text-align:left;
            }
            .index{
                margin-top:18px;
                margin-left:40px;
                text-align:left;
                border: 0px;
            }

            .tabel-konten{
                margin-top:10px;
                text-align:left; 
                margin-left:35px;
                margin-right:auto;
                border: 1px solid black;
                border-collapse: collapse;
                padding: 2px;
                width: 87%;
            }

            
        </style>
        <img src="img/logo-kop/kopbpr.png">
        <h2>DATA PEGAWAI PT BPR BKK WONOGIRI (Perseroda)</h2>

        <div class="index">PROFIL PEGAWAI</div>
        <table style="margin-top:10px; text-align:left; margin-left:35px;margin-right:auto;">
        <tbody>';

        $html .= '   <tr>
                    <th style="text-align:left;">Nama</th>
                    <td>' . $daftar->namapeg . '</td>
                </tr>
                <tr>
                    <th style="text-align:left;">NIK Pegawai</th>
                    <td>' . $daftar->nik . '</td>
                </tr>
                <tr>
                    <th style="text-align:left;">Jabatan</th>
                    <td>' . $daftar->jabatan_peg . '</td>
                </tr>
                <tr>
                    <th style="text-align:left;">Tempat Lahir</th>
                    <td>' . $daftar->tmplahir . '</td>
                </tr>
                <tr>
                    <th style="text-align:left;">Tanggal Lahir</th>
                    <td>' . $daftar->tgllahir . '</td>
                </tr>
                <tr>
                    <th style="text-align:left;">Alamat</th>
                    <td>' . $daftar->alamat . '</td>  
                </tr>
                <tr>
                    <th style="text-align:left;">Status Pegawai</th>
                    <td>' . $daftar->Statuspeg . '</td>
                </tr>
                <tr>
                    <th style="text-align:left;">Status Menikah</th>
                    <td>' . $daftar->statuskeluarga . '</td>
                </tr>
            </tbody>
        </table>

        
            <div class="index">DATA KELUARGA PEGAWAI</div>
            <table class="tabel-konten">';
        $html .= '<tbody>
                    <tr style="text-align:center;">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Status Keluarga</th>
                    </tr>';
        $i = 1;
        foreach ($keluarga as $k) {
            $html .= ' <tr>
                            <td>' . $i++ . '</td>
                            <td>' . $k->nama_kel . '</td>
                            <td>' . $k->tgllahir_kel . '</td>
                            <td>' . $k->status_kel . '</td>
                        </tr>';
        }
        $html .= '</tbody>
                </table>

                <div class="index">RIWAYAT PENDIDIKAN PEGAWAI</div>
                <table class="tabel-konten">';
        $html .= '<tbody>
                <tr>
                    <th colspan="3" style="text-align:left;">Pendidikan Formal</th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Pendidikan</th>
                    <th>Tahun Lulus</th>
                </tr>';
        $pe = 1;
        foreach ($pendidikan as $p) {
            $html .= ' <tr>
                                <td>' . $pe++ . '</td>
                                <td>' . $p->nama_pendidikan . '</td>
                                <td>' . $p->thn_lulus . '</td>
                            </tr>';
        }
        $html .= '</tbody>
                </table>

                <table class="tabel-konten" style="margin-top:7px;">';
        $html .= '<tbody>
                <tr style="table-border:none">
                    <th colspan="3" style="text-align:left;">Pendidikan Non Formal</th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Pendidikan</th>
                    <th>Tahun Lulus</th>
                </tr>';
        $ne = 1;
        foreach ($pendnon as $no) {
            $html .= ' <tr>
                                <td>' . $ne++ . '</td>
                                <td>' . $no->nama_pend_non . '</td>
                                <td>' . $no->thn_lulus_non . '</td>
                            </tr>';
        }
        $html .= '</tbody>
                    </table>
                    <div class="index">RIWAYAT PANGKAT PEGAWAI</div>
                    <table class="tabel-konten">';
        $html .= '<tbody>
                    <tr>
                        <th>No</th>
                        <th>Pangkat</th>
                        <th>Tahun Perolehan</th>
                    </tr>';
        $pa = 1;
        foreach ($pangkat as $pang) {
            $html .= ' <tr>
                            <td>' . $pa++ . '</td>
                            <td>' . $pang->nama_pangkat . '</td>
                            <td>' . $pang->thn_perolehan . '</td>
                         </tr>';
        }
        $html .= '</tbody>
        </table>
            <div class="index">RIWAYAT JABATAN PEGAWAI</div>
            <table class="tabel-konten">';
        $html .= '<tbody>
            <tr>
                <th>No</th>
                <th>Jabatan</th>
                <th>Periode Mulai</th>
                <th>Periode Selesai</th>
                <th>Unit Kerja</th>
            </tr>';
        $ja = 1;
        foreach ($jabatan as $jab) {
            $html .= ' <tr>
                                <td>' . $ja++ . '</td>
                                <td>' . $jab->nama_jabatan . '</td>
                                <td>' . $jab->periode_mulai . '</td>
                                <td>' . $jab->periode_selesai . '</td>
                                <td>' . $jab->unit_kerja . '</td>
                             </tr>';
        }
        $html .= '</tbody>
        </table>';

        $html .= ' </body>
        </html>';

        $mpdf->WriteHTML($html);
        $namafile = $daftar->namapeg . ".pdf";
        $ekstensi = ".pdf";
        $mpdf->Output($namafile . $ekstensi, 'I');


        return view('Cetak/cetakDataUser');
    }

    public function excel()
    {

        $data = [
            'identitas' => $this->daftarModel->getDaftarExcel()

        ];

        return view('daftarPeg/v-excel', $data);
    }

    public function excelprint()
    {
        $data = [
            'identitas' => $this->daftarModel->getDaftarExcel()

        ];

        return view('daftarPeg/excel', $data);
    }
}
