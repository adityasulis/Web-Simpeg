<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pegawai.xls");
?>

<html>

<body>

    <h4 style="display: inherit;">DAFTAR PEGAWAI PT BPR BKK WONOGIRI (Perseroda)</h4>
    <table border="1">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th colspan="8">PROFILE PEGAWAI</th>
                <th colspan="2">DATA KELUARGA</th>
                <th colspan="2">RIWAYAT PENDIDIKAN</th>
            </tr>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jabatan</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Status Pegawai</th>
                <th>Status Menikah</th>
                <th>Pendidikan Formal</th>
                <th>Pendidikan Non Formal</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($identitas as $iden) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $iden['namapeg']; ?></td>
                    <td><?= $iden['nik']; ?></td>
                    <td><?= $iden['jabatan_peg']; ?></td>
                    <td><?= $iden['tmplahir']; ?></td>
                    <td><?= $iden['tgllahir']; ?></td>
                    <td><?= $iden['alamat']; ?></td>
                    <td><?= $iden['Statuspeg']; ?></td>
                    <td><?= $iden['statuskeluarga']; ?></td>
                    <td>
                        <?php foreach ($sekolah as $sek) : ?>
                            <?= $sek['nama_pendidikan']; ?>/<?= $sek['thn_lulus']; ?> |
                        <?php endforeach ?>
                    </td>
                <?php endforeach ?>
                </tr>
        </tbody>
    </table>
</body>

</html>