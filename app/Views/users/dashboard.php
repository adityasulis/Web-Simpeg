<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content-users'); ?>
<style>
    .card {
        background-color: white;
        box-shadow: 1px 1px 5px rgb(146, 143, 143) !important;
    }

    .konten {
        background-color: white;
        box-shadow: 1px 1px 5px rgb(146, 143, 143) !important;
        width: auto;
    }

    .iden,
    .pend,
    .kel,
    .pang,
    .jab {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        border-color: black;
    }

    .tbhead,
    .tbbody {
        text-align: center;
    }

    .foto-user {
        position: relative;
        display: block;
        height: 200px;
        width: 200px;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
    }

    .print {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    div .navigasi a:nth-child(1) {
        width: 162px;
    }
</style>
<div class="container">
    <h2 style="text-align: center;margin-bottom:30px;"><?= $title; ?></h2>
    <div class="row align-items-start">
        <div class="card" style="width: 15rem;">
            <img src="<?= base_url('/img/fotoprofile/' . user()->user_image); ?>" class="foto-user" alt="profile">
            <div class="card-body text-center">
                <h6 style="text-transform: uppercase;font-family: Verdana, Geneva, Tahoma, sans-serif;"><?= user()->fullname; ?></h6>
                <p class="card-text text-primary"><?= $identitas->nik; ?></p>
                <p class="card-text"><?= $identitas->jabatan_peg; ?> - Kantor Pusat Manajemen</p>

                <form action="/Cetak/cetakDataUser/<?= $identitas->id_identitas; ?>" method="POST" class="d-inline" target="_blank">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="cetakadmin">
                    <button type="submit" class="print btn btn-outline-primary btn-sm">
                        <i class="fas fa-fw fa-print"></i> CETAK
                    </button>
                </form>
            </div>
        </div>
        <div class="col">
            <div class="konten table table-light table-bordered">
                <div class="navbar nav-fill bg-white justify-content-center">
                    <!-- <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase"></span>
                    </div> -->
                    <ul class="nav navigasi nav-tabs text-center">
                        <li class="active nav-item">
                            <a class="nav-link" href="#nav_identitas" data-toggle="tab">Identitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nav_pendidikan" data-toggle="tab">Pendidikan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nav_keluarga" data-toggle="tab">Keluarga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nav_pangkat" data-toggle="tab">Pangkat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nav_jabatan" data-toggle="tab">Jabatan</a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body">
                    <div class="tab-content">
                        <div class="tab-pane active col-align-items-center" id="nav_identitas">
                            <table class="iden table table-bordered table-light align-middle table-hover" id="table_identitas">
                                <tbody>
                                    <tr>
                                        <th colspan="2">IDENTITAS</th>
                                    </tr>

                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $identitas->namapeg ?></td>
                                    </tr>
                                    <tr>
                                        <th>NIK Pegawai</th>
                                        <td><?= $identitas->nik; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td><?= $identitas->jabatan_peg; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td><?= $identitas->tmplahir; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td><?= $identitas->tgllahir; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?= $identitas->alamat; ?></td>
                                    </tr>
                                    <tr>

                                        <th>Status Pegawai</th>
                                        <td><?= $identitas->Statuspeg; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status Menikah</th>
                                        <td><?= $identitas->statuskeluarga; ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="nav_pendidikan">
                            <table class="pend table table-bordered align-middle table-hover" id="table_pendidikan">
                                <thead>
                                    <tr>
                                        <th colspan="3">RIWAYAT PENDIDIKAN</th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">Pendidikan Formal</th>
                                    </tr>
                                    <tr class="tbhead">
                                        <th>No</th>
                                        <th>Nama Pendidikan</th>
                                        <th>Tahun Lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($pendidikan as $p) : ?>
                                        <tr class="tbbody">
                                            <td><?= $i++; ?></td>
                                            <td style="text-align: left;"><?= $p['nama_pendidikan']; ?></td>
                                            <td><?= $p['thn_lulus']; ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <!-- pendidikan non formal -->

                            <table class="pend table table-bordered align-middle table-hover mt-3" id="table_pendidikan">
                                <thead>
                                    <tr>
                                        <th colspan="3">Pendidikan Non Formal</th>
                                    </tr>
                                    <tr class="tbhead">
                                        <th>No</th>
                                        <th>Nama Pendidikan</th>
                                        <th>Tahun Lulus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $non = 1;
                                    foreach ($nonformal as $n) : ?>
                                        <tr class="tbbody">
                                            <td><?= $non++; ?></td>
                                            <td style="text-align: left;"><?= $n['nama_pend_non']; ?></td>
                                            <td><?= $n['thn_lulus_non']; ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <!-- Habis non formalnya -->
                        </div>
                        <div class="tab-pane" id="nav_keluarga">
                            <table class="kel table table-bordered table-hover" id="table_keluarga">
                                <thead>
                                    <tr>
                                        <th colspan="4">KELUARGA</th>
                                    </tr>
                                    <tr class="tbhead">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Status Keluarga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $k = 1;
                                    foreach ($keluarga as $kel) : ?>
                                        <tr class="tbbody">
                                            <td><?= $k++; ?></td>
                                            <td><?= $kel['nama_kel']; ?></td>
                                            <td><?= $kel['tgllahir_kel']; ?></td>
                                            <td><?= $kel['status_kel']; ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="nav_pangkat">
                            <table class="pang table table-bordered table-hover" id="table_pangkat">
                                <thead>
                                    <tr>
                                        <th colspan="3">RIWAYAT KEPANGKATAN</th>
                                    </tr>
                                    <tr class="tbhead">
                                        <th>No</th>
                                        <th>Pangkat/Golongan</th>
                                        <th>Tahun Perolehan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $p = 1;
                                    foreach ($pangkat as $pang) : ?>
                                        <tr class="tbbody">
                                            <td><?= $p++; ?></td>
                                            <td><?= $pang['nama_pangkat']; ?></td>
                                            <td><?= $pang['thn_perolehan']; ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="nav_jabatan">
                            <table class="jab table table-bordered table-hover" id="table_jabatan">
                                <thead>
                                    <tr>
                                        <th colspan="5">RIWAYAT JABATAN</th>
                                    </tr>
                                    <tr class="tbhead">
                                        <th>No</th>
                                        <th>Jabatan</th>
                                        <th>Periode Mulai</th>
                                        <th>Periode Selesai</th>
                                        <th>Unit Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $j = 1;
                                    foreach ($jabatan as $rank) : ?>
                                        <tr class="tbbody">
                                            <td><?= $j++; ?></td>
                                            <td><?= $rank['nama_jabatan']; ?></td>
                                            <td><?= $rank['periode_mulai']; ?></td>
                                            <td><?= $rank['periode_selesai']; ?></td>
                                            <td><?= $rank['unit_kerja']; ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>