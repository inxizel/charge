<?php $__env->startSection('breadcrumb'); ?>
    <a class="breadcrumb-item active" href="<?php echo e(route('role.index')); ?>"><?php echo e($display_name); ?></a>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="br-section-wrapper">
        
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-flag-o" aria-hidden="true"></i> &nbsp;
            <?php echo app('translator')->getFromJson('global.list'); ?> <?php echo e($display_name); ?>

        </h6>
        <hr> <br>

        
        <div class="col-sm-2 col-md-2 pd-0">
            <?php if (\Entrust::can('role-create')) : ?>
            <button class="btn btn-info btn-block mg-b-20" onclick="window.location='<?php echo e(route('role.create')); ?>'">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;
                <?php echo app('translator')->getFromJson('global.add'); ?>
            </button>
            <?php endif; // Entrust::can ?>
        </div>

        <br>

        <div class="rounded table-responsive">
            <table class="table table-bordered mg-b-0" id="role_table">
                <thead>
                <tr>
                    <th class="wd-5p"><?php echo app('translator')->getFromJson('global.order'); ?></th>
                    <th class="wd-25p"><?php echo app('translator')->getFromJson('global.name'); ?></th>
                    <th class="wd-30p"><?php echo app('translator')->getFromJson('global.description'); ?></th>
                    <th class="wd-25p"><?php echo app('translator')->getFromJson('global.status'); ?></th>
                    <th class="wd-15p"><?php echo app('translator')->getFromJson('global.action'); ?></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(mix('build/js/role/role.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout::backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>