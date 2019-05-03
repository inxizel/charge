<?php $__env->startSection('breadcrumb'); ?>
    <a class="breadcrumb-item active" href="<?php echo e(route('module.index')); ?>"><?php echo e($display_name); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="br-section-wrapper">
        
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-folder-o" aria-hidden="true"></i> &nbsp;
            <?php echo app('translator')->getFromJson('global.list'); ?> <?php echo e($display_name); ?>

        </h6>
        <hr> <br>

        
        
            
                
                
            
        

        <div class="rounded table-responsive">
            <table class="table table-bordered mg-b-0" id="modules_table">
                <thead>
                    <tr>
                        <th class="wd-4p"><?php echo app('translator')->getFromJson('global.order'); ?></th>
                        <th class="wd-20p"><?php echo app('translator')->getFromJson('module.module_name'); ?></th>
                        <th class="wd-15p"><?php echo app('translator')->getFromJson('module.module_category'); ?></th>
                        <th class="wd-15p"><?php echo app('translator')->getFromJson('module.note'); ?></th>
                        <th class="wd-10p"><?php echo app('translator')->getFromJson('global.status'); ?></th>
                        <th class="wd-15p"><?php echo app('translator')->getFromJson('global.created_at'); ?></th>
                        <th class="wd-16p"><?php echo app('translator')->getFromJson('global.action'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(mix('build/js/module/module.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout::backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>