<div class="app-container">
<div class="row content-container">
<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <?php echo $__env->make('dashboard.blocks.top_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</nav>
<div class="side-menu sidebar-inverse">
    <?php echo $__env->make('dashboard.blocks.left_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<!-- Main Content -->
<div class="container-fluid">
    <div class="side-body padding-top">
        <?php echo $__env->yieldContent('dashboard_content'); ?>
    </div>
</div>
</div>
<footer class="app-footer">
    <div class="wrapper">
        <span class="pull-right">2.1 <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> © 2016 Copyright.
    </div>
</footer>
<div>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>