<?php $__env->startSection('title', 'Add image'); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Add image</div>
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
                <?php echo e(Form::open(array('url' => '/admin/dashboard/images/create'))); ?>

                <?php echo csrf_field(); ?>

                <div class="control">
                    <div class="sub-title">Url</div>
                    <?php echo e(Form::image(Input::old('path'), 'path', array('class' => 'form-control'))); ?>

                </div>

                <div class="login-button text-center">
                    <?php echo e(Form::submit('Save', array('class' => 'btn btn-primary'))); ?>

                </div>

                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>