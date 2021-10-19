<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content-users'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h2 class="mt-3 mb-3 ml-4">DAFTAR PEGAWAI PT BPR BKK WONOGIRI</h2>
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan keyword pencarian ..." name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <table class="table table-bordered table-striped">
                <thead style="background-color: #009879;">
                    <tr style="color: white;">
                        <th scope="col">NO</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (20 * ($currentPage - 1)); ?>
                    <?php foreach ($daftar as $d) : ?>
                        <tr>
                            <td style="text-align: center;"><?= $i++; ?></td>
                            <td><?= $d['namapeg']; ?></td>
                            <td style="text-align: center;"><?= $d['nik']; ?></td>
                            <td style="text-align: center;"><?= $d['jabatan_peg']; ?></td>
                            <td style="text-align: center;"><?= $d['Statuspeg']; ?></td>
                            <td style="text-align: center;">
                                <a href="/daftarPeg/<?= $d['id_identitas']; ?>" method="POST" class="btn btn-info">Detail</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('identitaspeg', 'daftar_pager'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>