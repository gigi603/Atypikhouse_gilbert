<url>
    <?php if(! empty($tag->url)): ?>
    <loc><?php echo e($tag->url); ?></loc>
    <?php endif; ?>

    <?php if(count($tag->alternates)): ?>
    <?php $__currentLoopData = $tag->alternates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alternate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <xhtml:link rel="alternate" hreflang="<?php echo e($alternate->locale); ?>" href="<?php echo e($alternate->url); ?>" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(! empty($tag->lastModificationDate)): ?>
    <lastmod><?php echo e($tag->lastModificationDate->format(DateTime::ATOM)); ?></lastmod>
    <?php endif; ?>

    <?php if(! empty($tag->changeFrequency)): ?>
    <changefreq><?php echo e($tag->changeFrequency); ?></changefreq>
    <?php endif; ?>

    <?php if(! empty($tag->priority)): ?>
    <priority><?php echo e($tag->priority); ?></priority>
    <?php endif; ?>
</url>
