<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content-users'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4 mt-5 ml-2">
                        <img src="<?= base_url('/img/' . $user->user_image); ?>" class="img-fluid rounded-start" alt="<?= $user->username; ?>">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= $user->fullname; ?></h4>
                                </li>
                                <li class="list-group-item">Username : <?= $user->username; ?></li>
                                <li class="list-group-item"> Role :
                                    <span class="badge badge-<?= ($user->name == 'superadmin') ? 'success' : 'warning' ?>">
                                        <?= $user->name; ?>
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <small><a href="<?= base_url('admin'); ?>">&laquo; kembali ke daftar users</a></small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>