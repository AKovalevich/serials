<?php $__env->startSection('title', 'Create asset'); ?>

<?php $__env->startSection('dashboard_content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Create asset</div>
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
                <?php echo e(Form::open(array('url' => '/admin/dashboard/assets/create'))); ?>

                <?php echo csrf_field(); ?>

                <div class="control">
                    <div class="sub-title">Title</div>
                    <?php echo e(Form::text('title', Input::old('title'), array('class' => 'form-control'))); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Original title</div>
                    <?php echo e(Form::text('original_title', Input::old('email'), array('class' => 'form-control'))); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Description</div>
                    <?php echo e(Form::textarea('plot', Input::old('plot'), ['class' => 'form-control'])); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Plot</div>
                    <?php echo e(Form::textarea('description', Input::old('description'), ['class' => 'form-control'])); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Body</div>
                    <?php echo e(Form::textarea('body', Input::old('body'), ['class' => 'form-control'])); ?>

                </div>
                <div class="control">
                    <div class="sub-title">Start date</div>
                    <?php echo e(Form::text('start_date', Input::old('start_date'), array('class' => 'form-control'))); ?>

                </div>
                <div class="control">
                    <div class="sub-title">End date</div>
                    <?php echo e(Form::text('end_date', Input::old('end_date'), array('class' => 'form-control'))); ?>

                </div>
                <div class="">
                    <div class="sub-title">Tags</div>
                    <?php echo e(Form::select('tags', $tags, null, array('multiple'=>'multiple', 'name'=>'tags[]'))); ?>

                </div>
                <div class="">
                    <div class="sub-title">Genres</div>
                    <?php echo e(Form::select('genres', $genres, null, array('multiple'=>'multiple', 'name'=>'genres[]'))); ?>

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