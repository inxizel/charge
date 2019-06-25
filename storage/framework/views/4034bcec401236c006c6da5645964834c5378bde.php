<!doctype html>
<html lang="<?php echo e(\App::getLocale()); ?>">
<head>

    <?php echo $__env->make('layout::backend.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('style'); ?>
</head>
<body>
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href="<?php echo e(route('layout.index')); ?>"><span>[</span><?php echo e(env('APP_NAME')); ?><span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
        <div class="br-sideleft-menu">

            <label class="sidebar-label pd-x-15 mg-t-20"><?php echo app('translator')->getFromJson('global.all'); ?></label>
            <a href="<?php echo e(route('layout.index')); ?>" class="br-menu-link <?php echo e(request()->is('admin') ? 'active' : ''); ?>">
                <div class="br-menu-item">
                    <i class="fa fa-home tx-18" aria-hidden="true"></i>
                    <span class="menu-item-label"><?php echo app('translator')->getFromJson('global.dashboard'); ?></span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->


            <label class="sidebar-label pd-x-15 mg-t-20"><?php echo app('translator')->getFromJson('global.modules'); ?></label>
            <?php if (\Entrust::can('thecao-view')) : ?>
            <a href="<?php echo e(route('thecao.index')); ?>" class="br-menu-link <?php echo e(request()->is("admin/thecao*") ? 'active' : ''); ?>">
                <div class="br-menu-item">
                    <i class="fa fa-code tx-16" aria-hidden="true"></i>
                    <span class="menu-item-label"><?php echo e(App\Models\Module::getDisplayName('thecao')); ?></span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <?php endif; // Entrust::can ?>
            <label class="sidebar-label pd-x-15 mg-t-20"><?php echo app('translator')->getFromJson('global.managers'); ?></label>

            

            

            <?php if (\Entrust::can('module-view')) : ?>
            <a href="<?php echo e(route('module.index')); ?>" class="br-menu-link <?php echo e(request()->is("admin/module*") ? 'active' : ''); ?>">
                <div class="br-menu-item">
                    <i class="fa fa-tasks tx-16" aria-hidden="true"></i>
                    <span class="menu-item-label"><?php echo e(App\Models\Module::getDisplayName('module')); ?></span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <?php endif; // Entrust::can ?>

            <label class="sidebar-label pd-x-15 mg-t-20"><?php echo app('translator')->getFromJson('global.plugins'); ?></label>
            
            <?php if (\Entrust::can('user-view')) : ?>
            <a href="<?php echo e(route('user.index')); ?>" class="br-menu-link <?php echo e(request()->is("admin/user*") ? 'active' : ''); ?>">
                <div class="br-menu-item">
                    <i class="fa fa-user tx-22" aria-hidden="true"></i>
                    <span class="menu-item-label"><?php echo e(App\Models\Module::getDisplayName('user')); ?></span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <?php endif; // Entrust::can ?>
            <?php if (\Entrust::can('role-view')) : ?>
            <a href="<?php echo e(route('role.index')); ?>" class="br-menu-link <?php echo e(request()->is("admin/role*") ? 'active' : ''); ?>">
                <div class="br-menu-item">
                    <i class="fa fa-rocket tx-16" aria-hidden="true"></i>
                    <span class="menu-item-label"><?php echo e(App\Models\Module::getDisplayName('role')); ?></span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <?php endif; // Entrust::can ?>

          

           
            <label class="sidebar-label pd-x-15 mg-t-20"><?php echo app('translator')->getFromJson('global.modules'); ?></label>
            <?php if( isset($menu_mini_tools)): ?> <?php $__currentLoopData = $menu_mini_tools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_mini_tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/admin/<?php echo e($menu_mini_tool->name); ?>" class="br-menu-link <?php echo e(request()->is("admin/$menu_mini_tool->name*") ? 'active' : ''); ?>">
                    <div class="br-menu-item">
                        <i class="fa fa-code tx-16" aria-hidden="true"></i>
                        <span class="menu-item-label"><?php echo e(ucfirst($menu_mini_tool->display_name)); ?></span>
                    </div><!-- menu-item -->
                </a><!-- br-menu-link -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
    

        </div><!-- br-sideleft-menu -->

        <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <?php echo $__env->make('layout::backend.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layout::backend.contact', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="<?php echo e(route('layout.index')); ?>"><?php echo app('translator')->getFromJson('global.dashboard'); ?></a>
                

                <?php echo $__env->yieldContent('breadcrumb'); ?>
            </nav>
        </div><!-- br-pageheader -->

        <?php echo $__env->yieldContent('pageheader'); ?>

        <div class="br-pagebody">

            <!-- start you own content here -->
            <?php echo $__env->yieldContent('content'); ?>
        </div><!-- br-pagebody -->

        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2018. <?php echo e(env('APP_NAME')); ?>.</div>
                <div>@author  ThanhTung</div>
            </div>
            <div class="footer-right d-flex align-items-center">
            <span class="tx-uppercase mg-r-10">Share:</span>
            <a target="_blank" class="pd-x-5" href="https://www.facebook.com/th4nhtunq"><i class="fa fa-facebook tx-20"></i></a>
            <a target="_blank" class="pd-x-5" href="https://github.com/tungsoi"><i class="fa fa-github tx-20"></i></a>
            </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php echo $__env->make('layout::backend.script', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>
