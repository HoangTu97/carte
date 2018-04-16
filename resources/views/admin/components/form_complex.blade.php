<div class="bgc-white p-20 bd">
    <h6 class="c-grey-900">{{ $formTitle }}</h6>
    <div class="mT-30">
        {{ Form::open(array('route'=>$formAction, 'method'=>$formMethod)) }}
            @foreach($formData as $row)
                {!! count($row)>1 ? '<div class="form-row">' : '' !!}
                    @foreach ($row as $dt)
                    <div class="form-group {{ isset($dt['size']) ? 'col-md-'.$dt['size'] : '' }}">
                        @if($dt['type'] != 'checkbox')
                            <label for="{{ $dt['id'] }}">{{ $dt['label'] }}</label>

                            @switch($dt['type'])
                                @case('input')
                                <input type="{{ $dt['inputType'] }}" class="form-control" id="{{ $dt['id'] }}" name="{{ $dt['id'] }}" placeholder="{{ $dt['placeholder'] or '' }}"> @break

                                @case('select')
                                <select id="{{ $dt['id'] }}" name="{{ $dt['id'] }}" class="form-control">
                                    @foreach($dt['options'] as $opt)
                                    <option {{ isset($opt['selected']) ? 'selected' : '' }}>{{ $opt['value'] }}</option>
                                    @endforeach
                                </select>@break
                                @case('textarea')
                                <textarea id="{{ $dt['id'] }}" name="{{ $dt['id'] }}" class="form-control" rows="5"></textarea>@break

                            @endswitch
                        @else
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <input type="checkbox" id="{{ $dt['id'] }}" name="{{ $dt['name'] }}" class="peer">
                                <label for="{{ $dt['id'] }}" class=" peers peer-greed js-sb ai-c">
                                    <span class="peer peer-greed">Call John for Dinner</span>
                                </label>
                            </div>
                        @endif
                    </div>
                    @endforeach
                {!! count($row)>1 ? '</div>' : '' !!}
            @endforeach
            <button type="submit" class="btn btn-primary btn-block">{{ $formFunc }}</button>
        {{ Form::close() }}
    </div>
</div>