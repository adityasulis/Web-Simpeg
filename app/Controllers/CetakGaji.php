<?php

namespace App\Controllers;

use App\Models\daftarModel;

class CetakGaji extends BaseController
{

    public function __construct()
    {
        $this->daftarModel = new daftarModel();
    }

    public function cetakGaji($id)
    {
        $mpdf = new \Mpdf\Mpdf();

        $daftar = $this->daftarModel->getCetakData($id);

        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" type="image/png" sizes="20x20" href="/img/logo-kop/logo.png">
            <title>' . $daftar->namapeg . '</title>

            <style>
                table{
                    table-layout: fixed;
                    margin : 0px 0px 0px 20px;
                    border: 1px solid black;
                    border-collapse: collapse;
                    padding: 2px;
                    width: 100%;
                }
                td{
                    border: 1px solid black;
                    border-collapse: collapse;
                    padding: 2px;
                }
                th{
                    border: 1px solid black;
                    border-collapse: collapse;
                    padding: 2px;
                }
                .jabttd{
                    display: flex;
                    justify-content: space-between;
                }
            </style>
        </head>
        <body>
        <img src="img/logo-kop/kop-gaji.png">
        <h4 style="margin:2px 0 4px 20px;">DAFTAR PENERIMAAN GAJI</h4>
        <p style="margin:2px 0 18px 20px;">Bulan ' . date('F') . ' ' .  date('Y') . '</p>
        
        <p style="margin:2px 0 5px 20px;">Nama    : ' . $daftar->namapeg . '</p>
        <p style="margin:2px 0 5px 20px;">Jabatan : ' . $daftar->jabatan_peg . '</p>

        <p style="margin:15px 0 5px 20px;"><b>Penerimaan</p>
        <table>
            <tbody>
                <tr>
                    <td>Gaji Pokok</td>
                    <td style="text-align:right;">Rp. 960.800</td>
                </tr>
                <tr>
                    <td>Tunj. Istri/Suami</td>
                    <td style="text-align:right;">Rp. 0</td>
                </tr>
                <tr>
                    <td>Tunj. Anak</td>
                    <td style="text-align:right;">Rp. 0</td>
                </tr>
                <tr>
                    <td>Tunj. Beras</td>
                    <td style="text-align:right;">Rp. 100.000</td>
                </tr>
                <tr>
                    <td>Tunj. Jabatan</td>
                    <td style="text-align:right;">Rp. 0</td>
                </tr>
                <tr>
                    <td>Tunj. Fungsional</td>
                    <td style="text-align:right;">Rp. 0</td>
                </tr>
                <tr>
                    <td>Tunj. Operasional</td>
                    <td style="text-align:right;">Rp. 1.960.000</td>
                </tr>
                <tr>
                    <td>Tunj. Profesi</td>
                    <td style="text-align:right;">Rp. 0</td>
                </tr>
                <tr>
                    <td>Kontrak</td>
                    <td style="text-align:right;">Rp. 0</td>
                </tr>
                <tr style="border-bottom:2px solid ;">
                </tr>
                <tr>
                    <th>Jumlah Gaji Kotor</th>
                    <th style="text-align:right;">Rp. 3.021.280</th>
                </tr>
            </tbody>
        </table>

        <p style="margin:15px 0 5px 20px;"><b>Potongan : </b></p>
                <table class="table table-sm table-bordered table-hover" id="PotonganGaji" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Iuran Koperasi</td>
                            <td style="text-align:right;">Rp. 0</td>
                        </tr>
                        <tr>
                            <td>Koperasi</td>
                            <td style="text-align:right;">Rp. 0</td>
                        </tr>
                        <tr>
                            <td>Ang. Pinj.Kantor</td>
                            <td style="text-align:right;">Rp. 0</td>
                        </tr>
                        <tr>
                            <td>ASTEK</td>
                            <td style="text-align:right;">Rp. 90.638</td>
                        </tr>
                        <tr>
                            <td>BPJS</td>
                            <td style="text-align: right;">Rp. 30.213</td>
                        </tr>
                        <tr>
                            <td>DPLK</td>
                            <td style="text-align:right;">Rp. 0</td>
                        </tr>
                        <tr>
                            <td>INFAQ</td>
                            <td style="text-align:right;">Rp. 10.000</td>
                        </tr>
                        <tr>
                            <td>Lain - lain</td>
                            <td style="text-align:right;">Rp. 0</td>
                        </tr>
                        <tr style="border-bottom:2px solid ;">
                        </tr>
                        <tr>
                            <th>Jumlah Potongan</th>
                            <th style="text-align:right;">Rp. 130.851</th>
                        </tr>
                    </tbody>
                </table>
                <table style="margin-top:8px;" id="GajiBersih" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Jumlah Gaji Bersih</th>
                            <th style="text-align: right;color:blue">Rp. 2.890.429</th>
                        </tr>
                    </tbody>
                </table>
                
                <p style="margin:40px 0 6px 30px;"> Wonogiri, ' . date("d F Y") . '</p>
                <table style="border-style: none;margin: 0 0 0 30px;">
                    <tr style="border-style: none;">
                        <td style="border-style: none;">Kabid Umum</td>
                        <td style="border: none;text-align:center;">Penerima</td>
                    </tr>
                    <tr style="border-style: none;">
                        <td style="border-style: none;color: white;">Kabid Umum</td>
                        <td style="border: none;text-align:center;color: white;">Penerima</td>
                    </tr>
                    <tr style="border-style: none;">
                        <td style="border-style: none;color: white;">Kabid Umum</td>
                        <td style="border: none;text-align:center;color: white;">Penerima</td>
                    </tr>
                    <tr style="border-style: none;">
                        <td style="border-style: none;color: white;">Kabid Umum</td>
                        <td style="border: none;text-align:center;color: white;">Penerima</td>
                    </tr>
                    
                    <tr style="border-style: none;">
                        <td style="border-style: none;">INDRIYULIAWATI, SE</td>
                        <td style="border: none;text-align: center;">' . $daftar->namapeg . '</td>
                    </tr>
                </table>
        
        ';

        $html .= ' </body>
        </html>';

        $mpdf->WriteHTML($html);
        $namafile = $daftar->namapeg . ".pdf";
        $ekstensi = ".pdf";
        $mpdf->Output($namafile . $ekstensi, 'I');

        return view('CetakGaji/cetakGaji');
    }
}
