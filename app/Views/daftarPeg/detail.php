<?php

use App\Controllers\Cetak;
?>
<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content-users'); ?>
<style>
    .body_detail_profile>td {
        text-align: left;
    }

    th {
        text-align: center;
        background-color: #009879;
        color: white;
    }
</style>
<div class="content-detail">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h4 class="justify-content-start" style="margin-top: 7px; margin-bottom:20px;">DETAIL PEGAWAI PT BPR BKK WONOGIRI (Perseroda)</h4>
            <li class="justify-content-end" style="list-style: none;">
                <form action="/Cetak/cetakDataUser/<?= $daftar['id_identitas']; ?>" method="POST" class="d-inline" target="_blank">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="cetakadmin">
                    <button type="submit" class="btn btn-outline-info">
                        <i class="fas fa-fw fa-print"></i></button>
                </form>
                <a href="<?= base_url('DaftarPeg/index'); ?>" class="btn btn-outline-info ">
                    <i class="fas fa-fw fa-angle-double-left"></i>
                </a>
            </li>
        </div>
        <div class="row">
            <div class="col md-4 mt-3">

                <!-- tabel PROFILE pegawai dimulai -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Identitas</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <tbody class="body_detail_profile">
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $daftar['namapeg']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <td><?= $daftar['nik']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>TMT</th>
                                        <td><?= $daftar['tmt']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td><?= $daftar['jabatan_peg']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td><?= $daftar['tmplahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td><?= $daftar['tgllahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?= $daftar['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Pegawai</th>
                                        <td><?= $daftar['Statuspeg']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Menikah</th>
                                        <td><?= $daftar['statuskeluarga']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tabel data PROFILE pegawai selesai -->

                <!-- tabel data KELUARGA pegawai mulai -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Keluarga</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Status Keluarga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($keluarga as $k) : ?>
                                        <tr style="text-align: center;">
                                            <td><?= $k['nama_kel']; ?></td>
                                            <td><?= $k['tgllahir_kel']; ?></td>
                                            <td><?= $k['status_kel']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tabel data KELUARGA selesai -->
                <!-- tabel data KELUARGA pegawai mulai -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Pendidikan Non Formal</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pendidikan</th>
                                        <th>Tahun Lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $non = 1;
                                    foreach ($nonformal as $n) : ?>
                                        <tr style="text-align: center;">
                                            <td><?= $non++; ?></td>
                                            <td><?= $n['nama_pend_non']; ?></td>
                                            <td><?= $n['thn_lulus_non']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tabel data KELUARGA selesai -->

                <!-- batas tampil layar kiri selesai -->
            </div>

            <!-- tampil kanan layar -->
            <div class="col md-4 mt-3">
                <!-- tabel PENDIDIKAN pegawai dimulai -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Pendidikan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-hover" id="dataTable" width="95%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pendidikan</th>
                                        <th>Tahun Lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $pe = 1;
                                    foreach ($pendidikan as $p) : ?>
                                        <tr style="text-align: center;">
                                            <td><?= $pe++; ?></td>
                                            <td style="text-align: left;"><?= $p['nama_pendidikan']; ?></td>
                                            <td><?= $p['thn_lulus']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tabel PENDIDIKAN pegawai selesai -->

                <!-- tabel PANGKAT pegawai mulai -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Kepangkatan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pangkat</th>
                                        <th>Tahun Perolehan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $pa = 1;
                                    foreach ($pangkat as $g) : ?>
                                        <tr style="text-align: center;">
                                            <td><?= $pa++; ?></td>
                                            <td><?= $g['nama_pangkat']; ?></td>
                                            <td><?= $g['thn_perolehan']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tabel data pangkat selesai -->

                <!-- tabel PANGKAT pegawai mulai -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Jabatan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="110%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Jabatan</th>
                                        <th>Periode Mulai</th>
                                        <th>Periode Selesai</th>
                                        <th>Unit Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($jabatan as $j) : ?>
                                        <tr style="text-align: center;">

                                            <td><?= $j['nama_jabatan']; ?></td>
                                            <td><?= $j['periode_mulai']; ?></td>
                                            <td><?= $j['periode_selesai']; ?></td>
                                            <td><?= $j['unit_kerja']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- tabel data pangkat selesai -->

                <!-- batas layar kanan selesai -->

            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>