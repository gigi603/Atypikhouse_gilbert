<?php echo Form::open(['method'=>'GET','url'=>$url,'class'=>'form-horizontal','role'=>'search']); ?>

        <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                <select id="select_category_home" name="category_id" required class="form-control field-home">
                        <option id="" value="">Type d'annonce</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php if(old('category_id') == $category->id): ?> selected="selected" <?php endif; ?>><?php echo e($category->category); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('category_id')): ?>
                        <span class="help-block">
                                <strong><?php echo e($errors->first('category_id')); ?></strong>
                        </span>
                <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?><?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                <input type="text" class="form-control date-field-home" required id="fromHome" placeholder="Date de départ" name="start_date" value="<?php echo e(old('start_date')); ?>" />
                <input type="text" class="form-control date-field-home" required id="toHome" placeholder="Date de retour" name="end_date" value="<?php echo e(old('end_date')); ?>" />
                <?php if($errors->has('start_date')): ?>
                        <span class="help-block">
                                <strong><?php echo e($errors->first('start_date')); ?></strong>
                        </span>
                <?php endif; ?>
                <?php if($errors->has('end_date')): ?>
                        <span class="help-block">
                                <strong><?php echo e($errors->first('end_date')); ?></strong>
                        </span>
                <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('nb_personnes') ? ' has-error' : ''); ?>">
                <select id="" name="nb_personnes" required class="form-control field-home">
                        <option id="" value="">Nombre de personnes</option>
                        <option value="1" <?php if(old('nb_personnes') == "1"): ?> selected="selected" <?php endif; ?>>1</option>
                        <option value="2" <?php if(old('nb_personnes') == "2"): ?> selected="selected" <?php endif; ?>>2</option>
                        <option value="3" <?php if(old('nb_personnes') == "3"): ?> selected="selected" <?php endif; ?>>3</option>
                        <option value="4" <?php if(old('nb_personnes') == "4"): ?> selected="selected" <?php endif; ?>>4</option>
                        <option value="5" <?php if(old('nb_personnes') == "5"): ?> selected="selected" <?php endif; ?>>5</option>
                        <option value="6" <?php if(old('nb_personnes') == "6"): ?> selected="selected" <?php endif; ?>>6</option>
                        <option value="7" <?php if(old('nb_personnes') == "7"): ?> selected="selected" <?php endif; ?>>7</option>
                        <option value="8" <?php if(old('nb_personnes') == "8"): ?> selected="selected" <?php endif; ?>>8</option>
                        <option value="9" <?php if(old('nb_personnes') == "9"): ?> selected="selected" <?php endif; ?>>9</option>
                        <option value="10" <?php if(old('nb_personnes') == "10"): ?> selected="selected" <?php endif; ?>>10</option>
                        <option value="11" <?php if(old('nb_personnes') == "11"): ?> selected="selected" <?php endif; ?>>11</option>
                        <option value="12" <?php if(old('nb_personnes') == "12"): ?> selected="selected" <?php endif; ?>>12</option>
                        <option value="13" <?php if(old('nb_personnes') == "13"): ?> selected="selected" <?php endif; ?>>13</option>
                        <option value="14" <?php if(old('nb_personnes') == "14"): ?> selected="selected" <?php endif; ?>>14</option>
                        <option value="15" <?php if(old('nb_personnes') == "15"): ?> selected="selected" <?php endif; ?>>15</option>
                        <option value="16" <?php if(old('nb_personnes') == "16"): ?> selected="selected" <?php endif; ?>>16</option>
                </select>
                <?php if($errors->has('nb_personnes')): ?>
                        <span class="help-block">
                                <strong><?php echo e($errors->first('nb_personnes')); ?></strong>
                        </span>
                <?php endif; ?>
        </div>
        <?php echo Form::submit('Rechercher',array('class'=>'btn btn-searchbar')); ?>

                
<?php echo Form::close(); ?>

<?php $__env->startSection('script'); ?>
        <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/calendarHome.js')); ?>"></script>
<?php $__env->stopSection(); ?>