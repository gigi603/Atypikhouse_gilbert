{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'form-horizontal','role'=>'search'])  !!}
        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                <select id="select_category_home" name="category_id" class="form-control field-home">
                        <option id="" value="">Type d'hébergement</option>
                        @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected="selected" @endif>{{$category->category}}</option>
                        @endforeach
                </select>
                @if ($errors->has('category_id'))
                        <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                @endif
        </div>
        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}{{ $errors->has('end_date') ? ' has-error' : '' }}">
                <input type="text" class="form-control date-field-home" id="fromHome" placeholder="Date de départ" name="start_date" value="{{ old('start_date') }}" />
                <input type="text" class="form-control date-field-home" id="toHome" placeholder="Date de retour" name="end_date" value="{{ old('end_date') }}" />
                @if ($errors->has('start_date'))
                        <span class="help-block">
                                <strong>{{ $errors->first('start_date') }}</strong>
                        </span>
                @endif
                @if ($errors->has('end_date'))
                        <span class="help-block">
                                <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                @endif
        </div>
        <div class="form-group{{ $errors->has('nb_personnes') ? ' has-error' : '' }}">
                <select id="" name="nb_personnes" class="form-control field-home">
                        <option id="" value="">Nombre de personnes</option>
                        <option value="1" @if(old('nb_personnes') == "1") selected="selected" @endif>1</option>
                        <option value="2" @if(old('nb_personnes') == "2") selected="selected" @endif>2</option>
                        <option value="3" @if(old('nb_personnes') == "3") selected="selected" @endif>3</option>
                        <option value="4" @if(old('nb_personnes') == "4") selected="selected" @endif>4</option>
                        <option value="5" @if(old('nb_personnes') == "5") selected="selected" @endif>5</option>
                        <option value="6" @if(old('nb_personnes') == "6") selected="selected" @endif>6</option>
                        <option value="7" @if(old('nb_personnes') == "7") selected="selected" @endif>7</option>
                        <option value="8" @if(old('nb_personnes') == "8") selected="selected" @endif>8</option>
                        <option value="9" @if(old('nb_personnes') == "9") selected="selected" @endif>9</option>
                        <option value="10" @if(old('nb_personnes') == "10") selected="selected" @endif>10</option>
                        <option value="11" @if(old('nb_personnes') == "11") selected="selected" @endif>11</option>
                        <option value="12" @if(old('nb_personnes') == "12") selected="selected" @endif>12</option>
                        <option value="13" @if(old('nb_personnes') == "13") selected="selected" @endif>13</option>
                        <option value="14" @if(old('nb_personnes') == "14") selected="selected" @endif>14</option>
                        <option value="15" @if(old('nb_personnes') == "15") selected="selected" @endif>15</option>
                        <option value="16" @if(old('nb_personnes') == "16") selected="selected" @endif>16</option>
                </select>
                @if ($errors->has('nb_personnes'))
                        <span class="help-block">
                                <strong>{{ $errors->first('nb_personnes') }}</strong>
                        </span>
                @endif
        </div>
        {!! Form::submit('Rechercher',array('class'=>'btn btn-searchbar')) !!}
                
{!! Form::close() !!}
@section('script')
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/calendarHome.js') }}"></script>
@endsection