        
        <?php $__env->startSection('title'); ?>
            Atypikhouse
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('body'); ?>
            <h1 class="text-center">Bienvenue sur Atypikhouse</h1>
        <?php $__env->stopSection(); ?>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>