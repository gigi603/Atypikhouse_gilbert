{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'form','role'=>'search'])  !!}
    {!! Form::text('search', null,
            array(
                    'class'=>'form-control',
                    'placeholder'=>'Saisir une ville ...')) !!}
                    <div class="padding10"> 
                        <select id="select_category_home" name="category_id" class="form-control">
                        <option id="" value="" autofocus>Choisissez votre type de bien</option>
                        @foreach($categories as $category)
                                <option value="<?php echo($category->id);?>"><?php echo($category->category);?></option>
                        @endforeach
                        </select>
                    </div>
    {!! Form::submit('Rechercher',
            array('class'=>'btn btn-searchbar')) !!}
{!! Form::close() !!}