<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pegawai.xls");
?>

<html>
<?php

use App\Models\pendidikanModel;
use App\Models\pendidikannonModel;
use App\Models\keluargaModel;
use App\Models\jabatanModel;
use App\Models\pangkatModel;

//constructor
$this->pendidikanModel = new pendidikanModel();
$this->pendidikannonModel = new pendidikannonModel();
$this->keluargaModel = new keluargaModel();
$this->jabatanModel = new jabatanModel();
$this->pangkatModel = new pangkatModel();
?>

<body>

    <h4 style="display: inherit;">DAFTAR PEGAWAI PT BPR BKK WONOGIRI (Perseroda)</h4>
    <table border="1">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th colspan="8">PROFILE PEGAWAI</th>
                <th colspan="2">RIWAYAT PENDIDIKAN</th>
                <th colspan="2">DATA KELUARGA</th>
                <th colspan="">RIWAYAT KEPANGKATAN</th>
                <th colspan="3">RIWAYAT JABATAN</th>
            </tr>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>TMT</th>
                <th>Jabatan</th>
                <th>Tempat Lahir/Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Status Pegawai</th>
                <th>Status Perkawinan</th>
                <th>Pendidikan Formal</th>
                <th>Pendidikan Non Formal</th>
                <th>Pasangan/Tanggal Lahir</th>
                <th>Anak/Tanggal Lahir</th>
                <th>Pangkat/Tahun Perolehan</th>
                <th>Periode Mulai - Periode Selesai</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($identitas as $iden) : ?>

                <!-- deklarasi variabel untuk menampilkan di deskripsi berdasar id_identitas -->
                <?php
                $pen = $this->pendidikanModel->getExcelPendidikan($iden->id_identitas);
                $pennon = $this->pendidikannonModel->getCetakPendidikanNon($iden->id_identitas);
                $fam = $this->keluargaModel->getCetakPasangan($iden->id_identitas);
                $famkid = $this->keluargaModel->getCetakAnak($iden->id_identitas);
                $pangkat = $this->pangkatModel->getCetakPangkat($iden->id_identitas);
                $jabatan = $this->jabatanModel->getCetakJabatan($iden->id_identitas);
                ?>

                <!-- deklarasi variabel selesai -->
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $iden->namapeg ?></td>
                    <td><?= $iden->nik ?></td>
                    <td><?= $iden->tmt; ?></td>
                    <td><?= $iden->jabatan_peg ?></td>
                    <td><?= $iden->tmplahir ?>/<?= $iden->tgllahir ?></td>
                    <td><?= $iden->alamat ?></td>
                    <td><?= $iden->Statuspeg ?></td>
                    <td><?= $iden->statuskeluarga ?></td>
                    <td>
                        <?php foreach ($pen as $p) : ?>
                            <?= $p['nama_pendidikan']; ?>/<?= $p['thn_lulus']; ?><br>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <?php foreach ($pennon as $pn) : ?>
                            <?= $pn->nama_pend_non; ?>/<?= $pn->thn_lulus_non; ?><br>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <?php foreach ($fam as $f) : ?>
                            <?= $f->nama_kel; ?> / <?= $f->tgllahir_kel; ?><br>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <?php foreach ($famkid as $fk) : ?>
                            <?= $fk->nama_kel; ?> / <?= $fk->tgllahir_kel; ?> <br>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <?php foreach ($pangkat as $pnk) : ?>
                            <?= $pnk->nama_pangkat; ?>/<?= $pnk->thn_perolehan; ?> <br>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <?php foreach ($jabatan as $jab) : ?>
                            <?= $jab->periode_mulai; ?> - <?= $jab->periode_selesai; ?><br>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <?php foreach ($jabatan as $jab) : ?>
                            <?= $jab->nama_jabatan; ?> <br>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <?php foreach ($jabatan as $jab) : ?>
                            <?= $jab->unit_kerja; ?> <br>
                        <?php endforeach ?>
                    </td>

                <?php endforeach ?>
                </tr>
        </tbody>
    </table>
</body>

</html>