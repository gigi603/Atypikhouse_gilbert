<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>