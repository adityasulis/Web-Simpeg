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
                    <button type="submit" class="btn btn-outline-primary" data-placement="Bottom" title="Cetak Data Pegawai">
                        <i class="fas fa-fw fa-print"></i></button>
                </form>

                <!-- <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin?');">
                        <i class="fas fa-trash-alt"></i>
                    </button> -->
                <?php if ($daftar['Aktif'] > "0") : ?>
                    <a id="status" type="button" class="btn btn-outline-danger" style="text-decoration: none;" data-placement="Bottom" title="Non Aktifkan Pegawai">
                        <i class="fas fa-times-circle"></i>
                    </a>

                <?php else : ?>
                    <form action="/DaftarPeg/Aktif/<?= $daftar['id_identitas']; ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="aktifkan">
                        <button type="submit" class="btn btn-outline-success" data-placement="Bottom" title="Aktifkan Pegawai" onclick="return confirm('Apakah Anda Yakin');">
                            <i class="fas fa-check-square"></i>
                        </button>
                    </form>
                <?php endif ?>

                <a href="<?= base_url('DaftarPeg/index'); ?>" class="btn btn-outline-info ">
                    <i class="fas fa-fw fa-angle-double-left" data-placement="Bottom" title="Kembali ke Daftar Pegawai"></i>
                </a>
            </li>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->getFlashdata('pesan_salah')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan_salah'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif (session()->getFlashdata('pesan_benar')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan_benar'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if ($daftar['Aktif'] > "0") : ?>
                    <a id="status" type="button-disable" class="btn-sm btn-success" style="text-decoration: none;">
                        <i class="fas fa-check-square"></i>
                        Status Pegawai Aktif
                    </a>
                <?php else : ?>
                    <a id="status" type="button-disable" class="btn-sm btn-danger" style="text-decoration: none;">
                        <i class="fas fa-times-circle"></i>
                        Status Pegawai Non Aktif
                    </a>
                <?php endif ?>
            </div>
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
                            <?php if (count($user_linked) > 0) : ?>
                                <button type="button" class="btn-sm btn-warning" data-toggle="modal" data-target="#editUsernamePassword" style="float: left;">
                                    Ubah Username dan Password
                                </button>
                            <?php endif; ?>
                            <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#editData" style="float: right;" data-placement="Bottom" title="Edit Data">
                                Edit
                            </button>
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
                        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#tambahKeluarga" style="float: right;margin-bottom: 10px;" data-placement="Bottom" title="Tambah Data">
                            Tambah
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Status Keluarga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($keluarga as $k) : ?>
                                        <tr style="text-align: center;">
                                            <td><?= $k->nama_kel; ?></td>
                                            <td><?= $k->tgllahir_kel; ?></td>
                                            <td><?= $k->status_kel; ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#Modaldelkeluarga" class="btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash-alt"></i></a>
                                                <a href="" class="btn-sm btn-outline-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <!-- modal delete -->
                                            <div class="modal fade" id="Modaldelkeluarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Keluarga?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Anda tidak akan bisa mengembalikan data yang sudah dihapus. Apakah anda yakin akan menghapus data tersebut?</div>
                                                        <div class="modal-footer">

                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <a class="btn btn-danger" href="/DaftarPeg/deleteKeluarga/<?= $k->id_data_kel; ?>/<?= $daftar['id_identitas']; ?>">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal delete end -->
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
                        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#tambahPendidikanNonFormal" style="float: right;margin-bottom: 10px;" data-placement="Bottom" title="Tambah Data">
                            Tambah
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pendidikan</th>
                                        <th>Tahun Lulus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $non = 1;
                                    foreach ($nonformal as $n) : ?>
                                        <tr style="text-align: center;">
                                            <td><?= $non++; ?></td>
                                            <td><?= $n['nama_pend_non']; ?></td>
                                            <td><?= $n['thn_lulus_non']; ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#Modaldelnonformal" class="btn-sm  btn-outline-danger">
                                                    <i class="fas fa-trash-alt"> </i></a>
                                                <a href="#" data-toggle="modal" data-target="#" class="btn-sm  btn-outline-info">
                                                    <i class="fas fa-edit"> </i></a>
                                            </td>
                                        </tr>
                                        <!-- Delete Modal Pendidikan Non Formal  -->
                                        <div class="modal fade" id="Modaldelnonformal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pendidikan Non Formal?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Anda tidak akan bisa mengembalikan data yang sudah dihapus. Apakah anda yakin akan menghapus data tersebut?</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-danger" href="/DaftarPeg/deletePendidikanNonFormal/<?= $n['id_nonformal']; ?>/<?= $daftar['id_identitas']; ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end of modal delete pendidikan non formal -->
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
                        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#tambahPendidikan" style="float: right;margin-bottom: 10px;" data-placement="Bottom" title="Tambah Data">
                            Tambah
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm table-hover" id="dataTable" width="95%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pendidikan</th>
                                        <th>Tahun Lulus</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $pe = 1;
                                    foreach ($pendidikan as $p) : ?>
                                        <tr style="text-align: center;">
                                            <td><?= $pe++; ?></td>
                                            <td style="text-align: left;"><?= $p['nama_pendidikan']; ?></td>
                                            <td><?= $p['thn_lulus']; ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#editPendidikan" class="btn-sm btn-outline-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
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
                        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#tambahPangkat" style="float: right;margin-bottom: 10px;" data-placement="Bottom" title="Tambah Data">
                            Tambah
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pangkat</th>
                                        <th>Tahun Perolehan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $pa = 1;
                                    foreach ($pangkat as $g) : ?>
                                        <tr style="text-align: center;">
                                            <td><?= $pa++; ?></td>
                                            <td><?= $g['nama_pangkat']; ?></td>
                                            <td><?= $g['thn_perolehan']; ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#Modaldelpangkat" class="btn-sm  btn-outline-danger">
                                                    <i class="fas fa-trash-alt"> </i>
                                                </a>
                                            </td>
                                        </tr>
                                        <!-- Modal Delete Pangkat -->
                                        <div class="modal fade" id="Modaldelpangkat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pangkat?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Anda tidak akan bisa mengembalikan data yang sudah dihapus. Apakah anda yakin akan menghapus data tersebut?</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-danger" href="/DaftarPeg/deletePangkat/<?= $g['id_ambil_pangkat']; ?>/<?= $daftar['id_identitas']; ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Delete Pangkat -->
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
                        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#tambahJabatan" style="float: right;margin-bottom: 10px;" data-placement="Bottom" title="Tambah Data">
                            Tambah
                        </button>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="110%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Jabatan</th>
                                        <th>Periode Mulai</th>
                                        <th>Periode Selesai</th>
                                        <th>Unit Kerja</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($jabatan as $j) : ?>
                                        <tr style="text-align: center;">

                                            <td><?= $j['nama_jabatan']; ?></td>
                                            <td><?= $j['periode_mulai']; ?></td>
                                            <td><?= $j['periode_selesai']; ?></td>
                                            <td><?= $j['unit_kerja']; ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#Modaldeljabatan" class="btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Modal Delete Data Jabatan -->
                                        <div class="modal fade" id="Modaldeljabatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Jabatan?</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Anda tidak akan bisa mengembalikan data yang sudah dihapus. Apakah anda yakin akan menghapus data tersebut?</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <a class="btn btn-danger" href="/DaftarPeg/deleteJabatan/<?= $j['id_ambil_jabatan']; ?>/<?= $daftar['id_identitas']; ?>">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of delete data jabatan -->
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

<!-- MODAL -->
<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/daftarPeg/updatePegawai" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="username" class="form-label">Nama Pegawai</label>
                                <input type="hidden" class="form-control" id="id_identitas" name="id_identitas" value="<?= $daftar['id_identitas'] ?>" required>
                                <input type="text" class="form-control" id="namapeg" name="namapeg" value="<?= $daftar['namapeg'] ?>" required autofocus>
                            </div>
                            <div class="col-md-12">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="hidden" class="form-control" id="nik_asli" name="nik_asli" value="<?= $daftar['nik'] ?>" required>
                                <input type="number" class="form-control" id="nik" name="nik" value="<?= $daftar['nik'] ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label for="tmt" class="form-label">TMT</label>
                                <input type="hidden" class="form-control" id="tmt" name="tmt" value="<?= $daftar['tmt'] ?>" required>
                                <input type="date" class="form-control" id="tmt" name="tmt" value="<?= $daftar['tmt'] ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $daftar['alamat'] ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label for="jabatan_peg" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan_peg" name="jabatan_peg" value="<?= $daftar['jabatan_peg'] ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label for="tmplahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" style="text-transform: uppercase;" id="tmplahir" value="<?= $daftar['tmplahir'] ?>" name="tmplahir" required></input>
                            </div>
                            <div class="col-md-12">
                                <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="tgllahir" class="form-control" id="tgllahir" name="tgllahir" value="<?= $daftar['tgllahir'] ?>" required></input>
                            </div>
                            <div class="col-md-12">
                                <label for="Statuspeg" class="form-label">Status Pegawai </label>
                                <select id="Statuspeg" class="form-control" name="Statuspeg" required>
                                    <option selected></option>
                                    <option value="Pegawai Tetap" <?= ($daftar['Statuspeg'] == "Pegawai Tetap") ? "selected" : "" ?>>Pegawai Tetap</option>
                                    <option value="Calon Pegawai" <?= ($daftar['Statuspeg'] == "Calon Pegawai") ? "selected" : "" ?>>Calon Pegawai</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="statuskeluarga" class="form-label">Status Menikah </label>
                                <select id="statuskeluarga" name="statuskeluarga" class="form-control" required>
                                    <option selected></option>
                                    <option value="Menikah" <?= ($daftar['statuskeluarga'] == "Menikah") ? "selected" : "" ?>>Menikah</option>
                                    <option value="Belum Menikah" <?= ($daftar['statuskeluarga'] == "Belum Menikah") ? "selected" : "" ?>>Belum Menikah</option>
                                    <option value="Cerai Hidup" <?= ($daftar['statuskeluarga'] == "Cerai Hidup") ? "selected" : "" ?>>Cerai Hidup</option>
                                    <option value="Cerai Mati" <?= ($daftar['statuskeluarga'] == "Cerai Mati") ? "selected" : "" ?>>Cerai Mati</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahKeluarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/DaftarPeg/saveKeluarga" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="nama_kel" class="form-label">Nama Keluarga</label>
                                <input type="hidden" class="form-control" id="id_identitas" name="id_identitas" value="<?= $daftar['id_identitas'] ?>" required>
                                <input type="text" class="form-control" id="nama_kel" name="nama_kel" required autofocus>
                            </div>
                            <div class="col-md-12">
                                <label for="tgllahir_kel" class="form-label">Tanggal Lahir Keluarga</label>
                                <input type="date" id="tgllahir_kel" class="form-control" id="tgllahir_kel" name="tgllahir_kel" required>
                            </div>
                            <div class="col-md-12">
                                <label for="status_kel" class="form-label">Status Keluarga</label>
                                <select id="status_kel" class="form-control" name="status_kel" required>
                                    <option selected></option>
                                    <option value="Istri">Istri</option>
                                    <option value="Suami">Suami</option>
                                    <option value="Anak">Anak</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="tertanggung" class="form-label">Keterangan</label>
                                <select id="keterangan" name="keterangan" class="form-control" required>
                                    <option selected></option>
                                    <option value="Pasangan">Pasangan</option>
                                    <option value="Anak">Anak</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="tertanggung" class="form-label">Status Tertanggung</label>
                                <select id="tertanggung" name="tertanggung" class="form-control" required>
                                    <option selected></option>
                                    <option value="Tertanggung">Tertanggung</option>
                                    <option value="Tidak Tertanggung">Tidak Tertanggung</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahPendidikanNonFormal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pendidikan Non Formal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/DaftarPeg/savePendidikanNonFormal" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="nama_pend_non" class="form-label">Nama Pendidikan Non Formal</label>
                                <input type="hidden" class="form-control" id="id_identitas" name="id_identitas" value="<?= $daftar['id_identitas'] ?>" required>
                                <input type="text" class="form-control" id="nama_pend_non" name="nama_pend_non" required autofocus>
                            </div>
                            <div class="col-md-12">
                                <label for="thn_lulus_non" class="form-label">Tahun Lulus</label>
                                <input type="number" maxlength="4" id="thn_lulus_non" class="form-control" id="thn_lulus_non" name="thn_lulus_non" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahPendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/DaftarPeg/savePendidikan" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="id_pend" class="form-label">Pendidikan</label>
                                <input type="hidden" class="form-control" id="id_identitas" name="id_identitas" value="<?= $daftar['id_identitas'] ?>" required>
                                <select id="id_pend" name="id_pend" class="form-control" required>
                                    <option selected></option>
                                    <?php foreach ($pendidikan_dd as $key) { ?>
                                        <option value="<?= $key['id_pend'] ?>"><?= $key['nama_pendidikan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="thn_lulus" class="form-label">Tahun Lulus</label>
                                <input type="text" class="form-control" id="thn_lulus" name="thn_lulus" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahPangkat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pangkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/DaftarPeg/savePangkat" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="id_pangkat" class="form-label">Pangkat</label>
                                <input type="hidden" class="form-control" id="id_identitas" name="id_identitas" value="<?= $daftar['id_identitas'] ?>" required>
                                <select id="id_pangkat" name="id_pangkat" class="form-control" required>
                                    <option selected></option>
                                    <?php foreach ($pangkat_dd as $key) { ?>
                                        <option value="<?= $key['id_pangkat'] ?>"><?= $key['nama_pangkat'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php foreach ($pangkat as $g) : ?>
                                <div class="col-md-12">
                                    <label for="thn_perolehan" class="form-label">Tahun Perolehan</label>
                                    <input type="text" class="form-control" id="thn_perolehan" name="thn_perolehan" value=" <?= $g['thn_perolehan'] ?>" required>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahJabatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/DaftarPeg/saveJabatan" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="id_jabatan" class="form-label">Jabatan</label>
                                <input type="hidden" class="form-control" id="id_identitas" name="id_identitas" value="<?= $daftar['id_identitas'] ?>" required>
                                <select id="id_jabatan" name="id_jabatan" class="form-control" required>
                                    <option selected></option>
                                    <?php foreach ($jabatan_dd as $key) { ?>
                                        <option value="<?= $key['id_jabatan'] ?>"><?= $key['nama_jabatan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="periode_mulai" class="form-label">Periode Mulai</label>
                                <input type="text" class="form-control" id="periode_mulai" name="periode_mulai" required>
                            </div>
                            <div class="col-md-12">
                                <label for="periode_selesai" class="form-label">Periode Selesai</label>
                                <input type="text" class="form-control" id="periode_selesai" name="periode_selesai" required>
                            </div>
                            <div class="col-md-12">
                                <label for="unit_kerja" class="form-label">Unit Kerja</label>
                                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- edit pendidikan formal -->
<div class="modal fade" id="editPendidikan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/daftarPeg/updatePendidikan" method="POST">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <label for="id_pend" class="form-label">Pendidikan</label>
                                <input type="hidden" class="form-control" id="id_identitas" name="id_identitas" value="<?= $daftar['id_identitas'] ?>" required>
                                <select id="id_pend" name="id_pend" class="form-control" required>
                                    <option selected></option>
                                    <option value=<?= ($p['nama_pendidikan'] == "SD") ? "selected" : "" ?>>SD</option>
                                    <option value=<?= ($p['nama_pendidikan'] == "SMP") ? "selected" : "" ?>>SMP</option>
                                    <option value=<?= ($p['nama_pendidikan'] == "SLTA") ? "selected" : "" ?>>SLTA</option>
                                    <option value="<?= $p['nama_pendidikan']; ?>">S1 Sistem Informasi</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="thn_lulus" class="form-label">Tahun Lulus</label>
                                <input type="text" class="form-control" id="thn_lulus" name="thn_lulus" value=" <?= $p['thn_lulus'] ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (count($user_linked) > 0) : ?>
    <div class="modal fade" id="editUsernamePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Username dan Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/DaftarPeg/saveUserPrimary" method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <?= csrf_field(); ?>
                                <div class="col-md-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="hidden" class="form-control" id="id_identitas" name="id_identitas" value="<?= $daftar['id_identitas'] ?>" required>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $user_linked[0]['id'] ?>" required>
                                    <input type="text" class="form-control" id="username" name="username" value="<?= $user_linked[0]['username'] ?>" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="password" class="form-label">Password</label><br>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <label style="color: red;"><small>*Biarkan kosong jika tidak ingin merubah password</small></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>



<?= $this->endSection(); ?>