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
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id expedita quos molestiae nesciunt quam laboriosam mollitia sed deleniti dolorum asperiores placeat, eligendi natus exercitationem corrupti atque culpa nulla impedit? Rerum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>