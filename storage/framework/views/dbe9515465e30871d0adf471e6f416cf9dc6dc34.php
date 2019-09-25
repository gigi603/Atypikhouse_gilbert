<?php if($breadcrumbs): ?>
    <ul class="breadcrumb">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!$breadcrumb->last): ?>
                <li><?php echo e($breadcrumb->title); ?></li>
            <?php else: ?>
                <li class="active"><?php echo e($breadcrumb->title); ?></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>