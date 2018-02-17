<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20">
            <h4 class="c-grey-900 mB-20">{{ $datatableTitle }}</h4>
            {{--
            <p>Add
                <code class="highlighter-rouge">.table-hover</code> to enable a hover state on table rows within a
                <code class="highlighter-rouge">&lt;tbody&gt;</code>.</p>
            --}}
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        @foreach($datatableFields as $field)
                        @if($field == 'id')
                        <th scope="col">{{ '#' }}</th>
                        @else
                        <th scope="col">{{ $field }}</th>
                        @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($datatableValues as $v)
                    <tr>
                        @foreach($datatableFields as $f)
                        @if($f == 'id')
                        <th scope="row">{{ $v[$f] }}</th>
                        @else
                        <td>{{ $v[$f] }}</td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>