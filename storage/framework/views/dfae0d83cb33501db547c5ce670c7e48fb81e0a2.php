<?php echo Form::open(['method'=>'GET','url'=>$url,'class'=>'form','role'=>'search']); ?>

    <?php echo Form::text('search', null,
            array('required',
                    'class'=>'form-control',
                    'placeholder'=>'Saisir une ville ...')); ?>

                    <div class="padding10">    
                        <select id="select_category_home" name="category_id" class="form-control">
                        <option id="" value="defaut" required autofocus>Choisissez votre type de bien</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo($category->id);?>"><?php echo($category->category);?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
    <?php echo Form::submit('Rechercher',
            array('class'=>'btn btn-searchbar')); ?>

<?php echo Form::close(); ?>