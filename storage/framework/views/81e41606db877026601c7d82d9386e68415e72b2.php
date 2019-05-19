<?php $__env->startSection('content'); ?>
<div id="step1">
    <div class="form-group">
        <label for="name" class="col-md-4 control-label">Ville</label>
        <div class="col-md-6">
            <select id="name" type="text" name="ville_id" class="form-control">
                <option id="" value="defaut" selected="selected" required autofocus>Choisissez votre ville</option>
                <?php $__currentLoopData = $villes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ville): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo($ville->id);?>"><?php echo($ville->ville_nom);?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
</div>