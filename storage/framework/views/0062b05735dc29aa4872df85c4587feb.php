<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo e(route('index')); ?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="30">
                                </span>
                    <span class="logo-lg">
                                    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="70">
                                </span>
                </a>

                <a href="<?php echo e(route('index')); ?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="30">
                                </span>
                    <span class="logo-lg">
                                    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="70">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                    id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">


            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo e(asset('assets/images/user_avatar.png')); ?>"
                         alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo e(auth()->user()->name); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <form method="POST" action="<?php echo e(route('logout_request')); ?>" id="logout-Form">
                        <?php echo csrf_field(); ?>
                        <a class="dropdown-item text-danger"    onclick="$('#logout-Form').submit()">
                            <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                            <span key="t-logout" onclick="$('#logout-Form').submit()">Logout</span>
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>
<?php /**PATH /home/apibeckdemo/public_html/jitsu/resources/views/admin/includes/header.blade.php ENDPATH**/ ?>