{{-------    {name}-Algorithm     ------}}
<div class="row">
    <div class="col-sm-1">
        <div class="form-check">
            <input class="form-check-input position-static" onclick="showParams('{{'algo-'.$name}}', 'flex')" type="checkbox" id="{{'algo-'.$name}}" value={{$name}} aria-label="...">
        </div>
    </div>
    <div class="col-sm-3">{{$name}}</div>
    <div class="col-sm-8">
        @for ($i = 0; $i < sizeof($params); $i++)
            {{$params[$i]}},
        @endfor
    </div>
</div>
<hr>
{{-------    name-Algorithm-Params     ------}}
<div class="row" id="{{'algo-'.$name.'-params'}}" style="display: none;">

    @for ($i = 0; $i < sizeof($params); $i+=2)
        <div class="col-sm-1"></div>
        <div class="col-sm-11">
            <div class="form-group row">
                <label for="{{str_replace(' ','%20', $params[$i])}}" class="col-sm-4 col-form-label">{{$params[$i]}}</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control parameter" name="{{$name.'-'.str_replace(' ','%20', $params[$i])}}" id="{{str_replace(' ','%20', $params[$i])}}" placeholder={{$defaults[$i]}}>
                </div>
                @if($i+1 < sizeof($params))
                    <label for="{{str_replace(' ','%20', $params[$i+1])}}" class="col-sm-4 col-form-label">{{$params[$i+1]}}</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control parameter" name="{{$name.'-'.str_replace(' ','%20', $params[$i+1])}}"  id="{{str_replace(' ','%20', $params[$i+1])}}" placeholder={{$defaults[$i+1]}}>
                    </div>
                @endif
            </div>
        </div>
    @endfor
</div>
<hr>