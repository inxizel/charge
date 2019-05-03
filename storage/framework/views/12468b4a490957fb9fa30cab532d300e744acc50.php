<?php $__env->startSection('breadcrumb'); ?>
    <a class="breadcrumb-item" href="<?php echo e(route('user.index')); ?>"><?php echo e($display_name); ?></a>
    <a class="breadcrumb-item active" href="<?php echo e(route('user.create')); ?>"><?php echo app('translator')->getFromJson('global.edit'); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="br-section-wrapper">
        
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-edit" aria-hidden="true"></i> &nbsp;
            <?php echo app('translator')->getFromJson('global.edit'); ?> <?php echo e($display_name); ?>

        </h6>
        <hr> <br>

        
        <form action="<?php echo e(route('user.update', $user->id)); ?>" method="patch" enctype="multipart/form-data" id="frm_edit_user">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="user_id" id="user_id" value="<?php echo e($user->id); ?>">

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('user.name'); ?></label>
                <input value="<?php echo e($user->name); ?>" type="text" name="name" id="name" class="form-control" placeholder="<?php echo app('translator')->getFromJson('user.please_enter_name'); ?>" >
            </div>

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('user.birthday'); ?></label>
                <input value="<?php echo e($user->birthday); ?>" type="text" name="birthday" id="birthday" class="form-control" placeholder="<?php echo app('translator')->getFromJson('user.please_enter_birthday'); ?>" >
            </div>

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('user.email'); ?></label>
                <input disabled="" readonly value="<?php echo e($user->email); ?>" type="text" name="" id="" class="form-control" placeholder="<?php echo app('translator')->getFromJson('user.please_enter_email'); ?>" >
            </div>

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('user.mobile'); ?></label>
                <input value="<?php echo e($user->mobile); ?>" type="text" name="mobile" id="mobile" class="form-control" placeholder="<?php echo app('translator')->getFromJson('user.please_enter_mobile'); ?>" >
            </div>

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('user.gender'); ?></label>
                <select class="form-control" name="gender" id="gender">
                    <option value="1" <?php if($user->gender == 1): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('user.male'); ?></option>
                    <option value="0" <?php if($user->gender == 0): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('user.female'); ?></option>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('user.type'); ?></label>
                <select class="form-control" name="type" id="type">
                    <option value="0" <?php if($user->type == 0): ?> selected <?php endif; ?>>User</option>
                    <option value="1" <?php if($user->type == 1): ?> selected <?php endif; ?>>Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('user.status'); ?></label>
                <select class="form-control" name="status" id="status">
                    <option value="1" <?php if($user->status == 1): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('global.active'); ?></option>
                    <option value="0" <?php if($user->status == 0): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('global.deactive'); ?></option>
                </select>
            </div>

            <div class="col-sm-1 col-md-1 pd-0">
                <button type="submit" class="btn btn-info btn-block mg-b-20" id="btn-update"><?php echo app('translator')->getFromJson('global.save_icon'); ?> &nbsp;<?php echo app('translator')->getFromJson('global.save'); ?></button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(mix('build/js/user/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout::backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>