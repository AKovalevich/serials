<?php $__env->startSection('title', 'Admin | Dashboard'); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="page-title">
    <span class="title">Video list</span>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">

                <div class="card-title">
                    <div class="title">Videos</div>
                    <div class="login-button text-center">
                        <a class="btn btn-primary" href="/admin/dashboard/videos/create">Add Video</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Quality</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Quality</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($videos as $video): ?>
                    <tr>
                        <td><?php echo e($video->id); ?></td>
                        <td><?php echo e($video->quality); ?></td>
                        <td><a href="/admin/dashboard/videos/<?php echo e($video->id); ?>/edit">Edit</a></td>
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