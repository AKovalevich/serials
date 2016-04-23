<?php $__env->startSection('title', 'Admin | Dashboard'); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="page-title">
    <span class="title">Genre list</span>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">

                <div class="card-title">
                    <div class="title">Genres</div>
                    <div class="login-button text-center">
                        <a class="btn btn-primary" href="/admin/dashboard/genres/create">Create genre</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($genres as $genre): ?>
                    <tr>
                        <td><?php echo e($genre->name); ?></td>
                        <td><a href="/admin/dashboard/genres/<?php echo e($genre->id); ?>/edit">Edit</a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>