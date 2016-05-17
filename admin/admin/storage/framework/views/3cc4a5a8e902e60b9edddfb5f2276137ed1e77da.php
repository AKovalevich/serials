<?php $__env->startSection('title', 'Add episode'); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Add episode</div>
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
                <?php echo e(Form::open(array('url' => '/admin/dashboard/episodes/create'))); ?>

                <?php echo csrf_field(); ?>

                <div class="control">
                    <div class="sub-title">Season number</div>
                    <?php echo e(Form::number('season_number', Input::old('season_number'), array('class' => 'form-control'))); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Episode number</div>
                    <?php echo e(Form::number('episode_number', Input::old('episode_number'), array('class' => 'form-control'))); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Asset ID</div>
                    <?php echo e(Form::number('asset_id', Input::old('asset_id'), array('class' => 'form-control'))); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Title</div>
                    <?php echo e(Form::text('title', Input::old('title'), array('class' => 'form-control'))); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Description</div>
                    <?php echo e(Form::textarea('description', Input::old('description'), array('class' => 'form-control'))); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Image ID</div>
                    <?php echo e(Form::number('image_id', Input::old('asset_id'), array('class' => 'form-control'))); ?>

                </div>
                <div class="control">
                    <div class="sub-title">File ID</div>
                    <?php echo e(Form::number('file_id', Input::old('file_id'), array('class' => 'form-control'))); ?>

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