<?php $__env->startSection('breadcrumb'); ?>
    <a class="breadcrumb-item active" href="<?php echo e(route('user.index')); ?>"><?php echo e($display_name); ?></a>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="br-section-wrapper">
        
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-user-o" aria-hidden="true"></i> &nbsp;
            <?php echo app('translator')->getFromJson('global.list'); ?> <?php echo e($display_name); ?>

        </h6>
        <hr> <br>

        
        <div class="col-sm-2 col-md-2 pd-0 mg-b-20">
            <?php if (\Entrust::can('user-create')) : ?>
                <button class="btn btn-info btn-block" onclick="window.location='<?php echo e(route('user.create')); ?>'">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp;
                    <?php echo app('translator')->getFromJson('global.add'); ?>
                </button>
            <?php endif; // Entrust::can ?>
        </div>

        <div class="rounded table-responsive">
            <table class="table table-bordered mg-b-0" id="user_table">
                <thead>
                    <tr>
                        <th class="wd-5p"><?php echo app('translator')->getFromJson('global.order'); ?></th>
                        <th class="wd-20p"><?php echo app('translator')->getFromJson('global.name'); ?></th>
                        <th calss="wd-10p"><?php echo app('translator')->getFromJson('global.email'); ?></th>
                        <th class="wd-15p"><?php echo app('translator')->getFromJson('global.birthday'); ?></th>
                        <th class="wd-10p"><?php echo app('translator')->getFromJson('global.gender'); ?></th>
                        <th class="wd-10p"><?php echo app('translator')->getFromJson('global.type'); ?></th>
                        <th class="wd-10p"><?php echo app('translator')->getFromJson('global.status'); ?></th>
                        <th class="wd-20p"><?php echo app('translator')->getFromJson('global.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(mix('build/js/user/user.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout::backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>