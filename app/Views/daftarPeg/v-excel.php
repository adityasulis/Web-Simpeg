<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content-users'); ?>

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
                                    <th>Jabatan</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Status Pegawai</th>
                                    <th>Status Menikah</th>
                                    <th>nama pendidikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($identitas as $iden) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $iden->namapeg ?></td>
                                        <td><?= $iden->nik ?></td>
                                        <td><?= $iden->jabatan_peg ?></td>
                                        <td><?= $iden->tmplahir ?>/<?= $iden->tgllahir ?></td>
                                        <td><?= $iden->alamat ?></td>
                                        <td><?= $iden->Statuspeg ?></td>
                                        <td><?= $iden->statuskeluarga ?></td>
                                        <td>
                                            <?php foreach ($pend as $p) : ?>
                                                <?= $p->nama_pendidikan; ?>/<?= $p->thn_lulus; ?>|
                                            <?php endforeach ?>
                                        </td>
                                    <?php endforeach ?>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>