<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20  table-responsive">
            <h4 class="c-grey-900 mB-20">{{ $datatableTitle }}</h4>
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        @foreach($datatableFields as $field)
                        <th>{{ strtoupper($field) }}</th>
                        @endforeach
                        <th>OPTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        @foreach($datatableFields as $field)
                        <th>{{ strtoupper($field) }}</th>
                        @endforeach
                        <th>OPTION</th>
                    </tr>
                </tfoot>

                <tbody  style="width:100%">
                    @foreach($datatableValues as $v)
                    <tr>
                        @foreach($datatableFields as $f)
                        <td>
                            @switch($f)
                                @case('name')
                                @case('nom')
                                @case('username') <a href="{{ route($datatableRouteNameControl.'.view',['id'=>$v['id']]) }}">{!! $v[$f] !!}</a> @break

                                @default {!! $v[$f] !!} @break
                            @endswitch
                        </td>
                        @endforeach
                        <td>
                            <a href="{{ route($datatableRouteNameControl.'.edit',['id'=>$v['id']]) }}">edit</a><br/><br/>
                            <a href="{{ route($datatableRouteNameControl.'.delete',['id'=>$v['id']]) }}">delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>