<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content-users'); ?>

<!-- memanggil model untuk diinisiasi -->
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

<!-- konten -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DATA PEGAWAI PT BPR BKK Wonogiri</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-outline-success">
                            <a href="<?= base_url('Cetak/excelprint'); ?>" style="text-decoration: none;color:green;">
                                <i class="fas fa-file-excel"></i>
                                Export
                            </a>
                        </button>
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>TMT</th>
                                    <th>Jabatan</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Status Pegawai</th>
                                    <th>Status Perkawinan</th>
                                    <th>Pendidikan Formal</th>
                                    <th>Pendidikan NonFormal</th>
                                    <th>Pasangan/Tanggal Lahir</th>
                                    <th>Anak/Tanggal Lahir</th>
                                    <th>Pangkat/Tahun Perolehan</th>
                                    <th>Periode Mulai/Periode Selesai</th>
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
                                                <?= $p['nama_pendidikan']; ?>/<?= $p['thn_lulus']; ?> ,
                                            <?php endforeach ?>
                                        </td>
                                        <td>
                                            <?php foreach ($pennon as $pn) : ?>
                                                <?= $pn->nama_pend_non; ?>/<?= $pn->thn_lulus_non; ?>,
                                            <?php endforeach ?>
                                        </td>
                                        <td>
                                            <?php foreach ($fam as $f) : ?>
                                                <?= $f->nama_kel; ?> / <?= $f->tgllahir_kel; ?> /<?= $f->tertanggung; ?>
                                            <?php endforeach ?>
                                        </td>
                                        <td>
                                            <?php foreach ($famkid as $fk) : ?>
                                                <?= $fk->nama_kel; ?> / <?= $fk->tgllahir_kel; ?> / <?= $fk->tertanggung; ?> <br>
                                            <?php endforeach ?>
                                        </td>
                                        <td>
                                            <?php foreach ($pangkat as $pnk) : ?>
                                                <?= $pnk->nama_pangkat; ?>/<?= $pnk->thn_perolehan; ?> , <br>
                                            <?php endforeach ?>
                                        </td>
                                        <td>
                                            <?php foreach ($jabatan as $jab) : ?>
                                                <?= $jab->periode_mulai; ?> - <?= $jab->periode_selesai; ?> , <br>
                                            <?php endforeach ?>
                                        </td>
                                        <td>
                                            <?php foreach ($jabatan as $jab) : ?>
                                                <?= $jab->nama_jabatan; ?> , <br>
                                            <?php endforeach ?>
                                        </td>
                                        <td>
                                            <?php foreach ($jabatan as $jab) : ?>
                                                <?= $jab->unit_kerja; ?> , <br>
                                            <?php endforeach ?>
                                        </td>

                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>