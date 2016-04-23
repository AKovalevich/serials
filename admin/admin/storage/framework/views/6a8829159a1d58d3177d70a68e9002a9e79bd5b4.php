<?php $__env->startSection('title', 'Admin login'); ?>
<?php $__env->startSection('body-class', 'login-page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="login-box">
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                        <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                        <h4 class="login-title">Admin</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="login-body">
                            <div class="progress hidden" id="login-progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Log In...
                                </div>
                            </div>
                            <?php echo e(Form::open(array('url' => 'auth/login'))); ?>

                                <?php echo csrf_field(); ?>

                                <div class="control">
                                    <?php echo e($errors->first('email')); ?>

                                    <?php echo e(Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email'))); ?>

                                </div>
                                <div class="control">
                                    <?php echo e($errors->first('password')); ?>

                                    <?php echo e(Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password'))); ?>

                                </div>
                                <div class="login-button text-center">
                                    <?php echo e(Form::submit('Login', array('class' => 'btn btn-primary'))); ?>

                                </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>