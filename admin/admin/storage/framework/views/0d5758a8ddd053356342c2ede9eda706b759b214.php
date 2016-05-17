<?php $__env->startSection('title', 'Create tag'); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Create tag</div>
                </div>
            </div>
            <div class="card-body">

                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php echo e(Form::open(array('url' => '/admin/dashboard/tags/' . $tag->id . '/edit'))); ?>

                    <?php echo csrf_field(); ?>

                    <div class="control">
                        <div class="sub-title">Name</div>
                        <?php echo e(Form::text('name', $tag->name, array('class' => 'form-control'))); ?>

                    </div>
                    
                    <div class="login-button text-center">
                        <?php echo e(Form::submit('Create', array('class' => 'btn btn-primary'))); ?>

                    </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>