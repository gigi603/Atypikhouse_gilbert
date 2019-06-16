{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'form','role'=>'search'])  !!}
        <input type="text" class="form-control field-home" name="ville" placeholder="Où voulez-vous aller?" value=""/>
        <select id="select_category_home" name="category_id" class="form-control field-home">
                <option id="" value="" autofocus>Type d'hébergement</option>
                @foreach($categories as $category)
                        <option value="<?php echo($category->id);?>"><?php echo($category->category);?></option>
                @endforeach
        </select>
        <input type="text" class="form-control date-field-home" id="from" placeholder="Date de départ" name="start_date" value="" />
        <input type="text" class="form-control date-field-home" id="to" placeholder="Date de retour" name="end_date" value="" />
        <select id="" name="category_id" class="form-control field-home">
                <option id="" value="" autofocus>Nombre de personnes</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
        </select>
        @if (Auth::check())
                @if ($errors->any())
                <div class="alert alert-danger">Vous devez remplir tout les champs</div>
                @endif
                {!! Form::submit('Rechercher',array('class'=>'btn btn-searchbar')) !!}
        @else
                <a href= "{{ route('login') }}" class="btn btn-searchbar">Réserver</a>
        @endif 
        
{!! Form::close() !!}