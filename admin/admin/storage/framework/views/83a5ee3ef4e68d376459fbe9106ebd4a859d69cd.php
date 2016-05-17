<?php $__env->startSection('title', 'Admin | Dashboard'); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="page-title">
    <span class="title">Asset list</span>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">

                <div class="card-title">
                    <div class="title">Assets</div>
                    <div class="login-button text-center">
                        <a class="btn btn-primary" href="/admin/dashboard/assets/create">Create Asset</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Seasons</th>
                        <th>Episodes</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Seasons</th>
                        <th>Episodes</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($assets as $asset): ?>
                    <tr>
                        <td><?php echo e($asset->title); ?></td>
                        <td><?php echo e('Count seasons'); ?></td>
                        <td><?php echo e('Count episodes'); ?></td>
                        <td><?php echo e($asset->start_date); ?></td>
                        <td><?php echo e($asset->end_date); ?></td>
                        <td><a href="/admin/dashboard/assets/<?php echo e($asset->id); ?>/edit">Edit</a></td>
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