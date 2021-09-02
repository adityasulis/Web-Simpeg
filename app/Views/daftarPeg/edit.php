<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content-users'); ?>

<div class="container">
    <div class="row">
        <div class="justify-content-center align-items-center">
            <h2 class="my-3">Form Edit Data Pegawai</h2>

            <form class="row g-3" action="/daftarPeg/update/<?= $edit['id']; ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="col-md-6">
                    <label for="username" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $edit['namapeg']; ?>" required autofocus>
                </div>
                <div class="col-md-6">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="nik" name="nik" value="<?= $edit['nik']; ?>" required>
                    <div class="invalid-feedback">
                        <?= $validation->getError('nik'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Wonogiri" value="<?= $edit['alamat']; ?>" required>
                </div>
                <div class="col-6">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $edit['jabatan_peg']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="tmplahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" style="text-transform: uppercase;" id="tmplahir" name="tmplahir" value="<?= $edit['tmplahir']; ?>" required></input>
                </div>
                <div class="col-md-4">
                    <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" id="tgllahir" class="form-control" id="tgllahir" name="tgllahir" value="<?= $edit['tgllahir']; ?>" required></ipnut>
                </div>
                <div class="col-md-6">
                    <label for="statuspegawai" class="form-label">Status Pegawai</label>
                    <select id="statuspegawai" class="form-select" name="statuspegawai" required>
                        <option selected></option>
                        <option value="Pegawai Tetap">Pegawai Tetap</option>
                        <option value="Calon Pegawai">Calon Pegawai</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="statusmenikah" class="form-label">Status Menikah</label>
                    <select id="statusmenikah" name="statusmenikah" class="form-select" required>
                        <option selected></option>
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>