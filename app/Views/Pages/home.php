<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="bg-home" id="hero">
    <div class="container">
        <div class="text-light d-flex flex-column h-100 justify-content-center">
            <h1 style="text-align: center;">SISTEM INFORMASI KEPEGAWAIAN PT BPR BKK WONOGIRI (Perseroda)</h1>
        </div>
    </div>
</section>

<footer class="sticky-footer" style="background-color: #009879;">
    <div class="runtext text-center my-auto text-white" style="height: 6vh;width: 100%;">
        <marquee width="76%" scrollamount="5" direction="left" height="100px" style="padding-top:6px;padding-bottom:5px;">
            Visi : Menjadi bank yang sehat, besar, mandiri dan mampu bersaing. <tr>|</tr>

            Misi : Menjalankan Usaha sebagai Bank Perkreditan Rakyat, sesuai dengan ketentuan perundang – undangan yang berlaku;
            Membantu dan mendorong pertumbuhan perekonomian dan Pembangunan Daerah disegala bidang;
            Sebagai Mitra Usaha Masyarakat dalam meningkatkan taraf hidup melalui layanan jasa BPR yang profesional;
            Mengupayakan Sumber Pendapatan Asli Daerah
        </marquee>
    </div>
</footer>

<footer class="sticky-footer bg-dark">
    <div class="container my-auto">
        <div class="copyright text-center my-auto text-white mt-0">
            <p style="padding-top:15px">&copy; <?= date('Y'); ?> - PT BPR BKK Wonogiri (Perseroda)</p>
        </div>
    </div>
</footer>



<?= $this->endSection(); ?>