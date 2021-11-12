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
        <div class="col md-4 card" style="max-width: 18rem;height:fit-content;">
            <div class="card-header bg-transparent border-secondary">Kostumisasi Akun</div>
            <div class="card-body text-secondary">
                <h5 class="card-title"><?= user()->fullname; ?></h5>
                <p class="card-text">Username : <?= user()->username; ?></p>
                <p class="card-text">Password : ********</p>

                <button type="button" class="btn btn-sm btn-outline-secondary">Ganti Username</button>
            </div>
            <div class="card-footer bg-transparent border-secondary"> </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>