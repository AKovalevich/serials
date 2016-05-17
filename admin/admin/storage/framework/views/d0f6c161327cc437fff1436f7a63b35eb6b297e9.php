<?php $__env->startSection('title', 'Admin | Dashboard'); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="page-title">
    <span class="title">Episodes list</span>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">

                <div class="card-title">
                    <div class="title">Episodes</div>
                    <div class="login-button text-center">
                        <a class="btn btn-primary" href="/admin/dashboard/episodes/create">Add episode</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="datatable table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Episode</th>
                        <th>Season</th>
                        <th>TV Show</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Episode</th>
                        <th>Season</th>
                        <th>TV Show</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach($episodes as $episode): ?>
                        <tr>
                            <td><?php echo e($episode->title); ?></td>
                            <td><?php echo e($episode->episode_number); ?></td>
                            <td><?php echo e($episode->season_number); ?></td>
                            <td><?php echo e($episode->asset_id); ?></td>
                            <td><a href="/admin/dashboard/episodes/<?php echo e($episode->id); ?>/edit">Edit</a></td>
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