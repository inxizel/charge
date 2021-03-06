<!doctype html>
<html lang="<?php echo e(\App::getLocale()); ?>">
<head>

    <?php echo $__env->make('layout::backend.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <link rel="stylesheet" href="<?php echo e(asset('bower_components/particles.js/demo/css/style.css')); ?>">
</head>
<body>
<div id="particles-js"></div>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-80p" id="div-login-form">
    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> <?php echo e(env('APP_NAME')); ?> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-40 tx-14"> <?php echo e(env('APP_DESCRIPTION')); ?> </div>

        <?php echo Form::open(['route' => 'user.login']); ?>

        <div class="form-group">
            <?php echo Form::label('email', trans('global.email'), ['class' => 'form-control-label tx-14 mg-b-5 tx-bold']); ?>

            <?php echo Form::text('email', '', ['class' => 'form-control', 'placeholder' => trans('global.please_enter_email')]); ?>


            <?php if( $errors->has('email')): ?>
                <?php echo Form::label('error', $errors->first('email'), ['class' => 'form-control-label tx-12 mg-b-5 mg-t-5 tx-bold tx-span-error']); ?>

            <?php endif; ?>
        </div>

        <div class="form-group">
            <?php echo Form::label('password', trans('global.password'), ['class' => 'form-control-label tx-14 mg-b-5 tx-bold']); ?>

            <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => trans('global.please_enter_password')]); ?>


            <?php if( $errors->has('password')): ?>
                <?php echo Form::label('error', $errors->first('password'), ['class' => 'form-control-label tx-12 mg-b-5 mg-t-5 tx-bold tx-span-error']); ?>

            <?php endif; ?>
        </div>

        <div class="form-group">
            <a href="<?php echo e(route('layout.index')); ?>" class="tx-info tx-12 d-block mg-t-10"> <?php echo app('translator')->getFromJson('global.forgot_password'); ?> </a>
        </div>

        <div class="form-group">
            <?php echo Form::submit( trans('global.sign_in'), ['class' => 'form-control btn btn-info btn-block']); ?>

        </div>
        <?php echo Form::close(); ?>

    </div><!-- login-wrapper -->
</div><!-- d-flex -->

<?php echo $__env->make('layout::backend.script', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="<?php echo e(asset('bower_components/particles.js/particles.min.js')); ?>"></script>
<script src="<?php echo e(asset('bower_components/particles.js/demo/js/app.js')); ?>"></script>
<script src="<?php echo e(asset('bower_components/particles.js/demo/js/lib/stats.js')); ?>"></script>
</body>
</html>
