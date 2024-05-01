<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8"/>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Jui Jitsu" name="description"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo.png')); ?>">

    <?php echo $__env->make('admin.includes.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('custom-css'); ?>

</head>

<body data-sidebar="dark" data-layout-mode="light">


<!-- Begin page -->
<div id="layout-wrapper">


    <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php echo $__env->make('admin.includes.right_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- JAVASCRIPT -->
<?php echo $__env->make('admin.includes.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('custom-script'); ?>
</body>


</html>
<?php /**PATH /home/apibeckdemo/public_html/jitsu/resources/views/admin/layout/app.blade.php ENDPATH**/ ?>