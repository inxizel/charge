<?php $__env->startSection('breadcrumb'); ?>
    <a class="breadcrumb-item" href="<?php echo e(route('module.index')); ?>"><?php echo e($display_name); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="br-section-wrapper">
        
        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-18 mg-b-10">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp;
            <?php echo app('translator')->getFromJson('global.edit'); ?> <?php echo e($display_name); ?>

        </h6>
        <hr> <br>

        
        <form action="<?php echo e(route('module.update', $module->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="_method" value="PATCH">

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('module.module_name'); ?></label>
                <input value="<?php echo e($module->display_name); ?>" type="text" name="display_name" id="display_name" class="form-control" placeholder="<?php echo app('translator')->getFromJson('global.please_enter_content'); ?>" required="">
            </div>

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('module.note'); ?></label>
                <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="<?php echo app('translator')->getFromJson('global.please_enter_content'); ?>"><?php echo e($module->note); ?></textarea>
            </div>

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('module.module_category'); ?></label>
                <select name="module_category_id" id="module_category_id" class="form-control">
                    <?php if($module_cates): ?> <?php $__currentLoopData = $module_cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module_cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($module_cate->id); ?>" <?php if($module->module_category_id == $module_cate->id): ?> selected <?php endif; ?>>  <?php echo e($module_cate->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="" class="tx-bold"><?php echo app('translator')->getFromJson('global.status'); ?></label>
                <select name="status" id="status" class="form-control">
                    <option value="1" <?php if($module->status == 1): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('global.active'); ?></option>
                    <option value="0" <?php if($module->status == 0): ?> selected <?php endif; ?>><?php echo app('translator')->getFromJson('global.deactive'); ?></option>
                </select>
            </div>

            <div class="col-sm-1 col-md-1 pd-0">
                <button type="submit" class="btn btn-info btn-block mg-b-20"><?php echo app('translator')->getFromJson('global.save_icon'); ?>
                     &nbsp;<?php echo app('translator')->getFromJson('global.save'); ?></button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout::backend.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>