<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content-users'); ?>

<style>
    .card {
        background-color: white;
        box-shadow: 1px 1px 10px rgb(146, 143, 143) !important;
    }

    .img img:nth-child(2) {
        position: relative;
        display: block;
        height: 140px;
        width: 140px;
        margin-left: auto;
        margin-right: auto;
        margin-top: -75px;
        box-shadow: 0 0 0 0 var(--dark);
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <!-- tes tampil baru -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="img">
                    <img class="img-fluid rounded top" src="<?= base_url('/img/slider1.jpg'); ?>" alt="bg">
                    <img style="max-width:50%;height: auto;" src="<?= base_url('/img/fotoprofile/' . user()->user_image); ?>" class="img-fluid rounded-circle" alt=" <?= user()->username; ?>">
                </div>
                <div class="card-body">
                    <div class="card-tittle">
                        <h3 class="text-uppercase text-center"><?= user()->fullname; ?></h3>
                    </div>
                    <div class="card-text text-center">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-primary">
                                <?= $daftar->nik; ?>
                            </li>
                            <li class="list-group-item">
                                <?= $daftar->jabatan_peg; ?>
                            </li>
                            <li class="list-group-item">
                                <?= $unit->unit_kerja; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- account edit  -->
        <div class="col md-4 card" style="max-width: 20rem;height:fit-content;">
            <div class="card-header bg-transparent border-secondary"><b>KOSTUMISASI AKUN</b></div>
            <div class="card-body text-secondary">
                <h5 class="card-title"><?= user()->fullname; ?></h5>
                <p class="card-text">Username : <?= user()->username; ?></p>
                <p class="card-text">Password : ********</p>

                <!-- change password -->
                <button class="btn btn-secondary" type="button">
                    Edit Password
                </button>
            </div>
            <div class="card-footer bg-transparent border-secondary"> </div>
        </div>

        <!-- info gaji  -->
        <div class="col md-4 ml-3 card" style="max-width: 40rem;height:fit-content;">
            <div class="card-header bg-transparent border-secondary"><b>INFO GAJI</b></div>
            <div class="card-body text-secondary">
                <div class="d-flex justify-content-between">
                    <p class="justify-content-start">Bulan <?= date('F'); ?> <?= date('Y'); ?></p>
                    <!-- button print  -->
                    <li class="justify-content-end" style="list-style: none;">
                        <form action="/CetakGaji/cetakGaji/<?= $daftar->id_identitas; ?>" method="POST" target="_blank">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="cetakgaji">
                            <button type="submit" class="btn btn-outline-primary" data-placement="Bottom" title="Cetak Info Gaji">
                                <i class="fas fa-fw fa-print"></i>
                            </button>
                        </form>
                    </li>
                </div>
                <!-- tabel gaji penerimaan -->
                <p class="card-text"><b>Penerimaan : </b></p>
                <table class="table table-sm table-bordered table-hover" id="PenerimaanGaji" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Gaji Pokok</td>
                            <td style="text-align:right;">Rp. 961.280</td>
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

                <p class="card-text"><b>Potongan : </b></p>
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
                <table class="table table-sm table-bordered table-hover" id="GajiBersih" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Jumlah Gaji Bersih</th>
                            <th style="text-align: right;color:blue">Rp. 2.890.429</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-transparent border-secondary"> </div>
        </div>


    </div>
</div>

<?= $this->endSection(); ?>