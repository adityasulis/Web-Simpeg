<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content-users'); ?>
<style>
    th {
        text-align: center;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800 text-center"><?= $title; ?></h1>
    <div class="row justify-content-center">
        <div class="col-8 mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Akun Pegawai</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <?php  ?>
                                <tr>
                                    <th>NO</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($users as $user) : ?>
                                    <tr>
                                        <td style="text-align:center;"><?= $i++; ?></td>
                                        <td><?= $user->username; ?></td>
                                        <td><?= $user->name; ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?= base_url('admin/detail/' . $user->userid); ?>" class="btn btn-info btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>