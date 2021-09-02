<nav class="navbar navbar-expand-md sticky-top" style="background-color: #009879; width: 100%;">
    <div class="container-fluid ">
        <a class="navbar-brand" href="/"><img src="/img/logo-kop/logodowo.png" alt=""></a>
        <ul class="nav d-grid gap-2 d-md-flex justify-content-md-end">
            <?php if (logged_in()) : ?>
                <li class="nav-item">
                    <a href="<?= base_url('/User/index'); ?>" class="btn btn-outline-light btn-sm" role="button" aria-disabled="true">
                        <i class="fas fa-fw fa-user"></i>
                        Akun</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a href="/login" class="btn btn-outline-light btn-sm" role="button" aria-disabled="true">
                        <i class="fas fa-fw fa-sign-in-alt"></i> Login</a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</nav>