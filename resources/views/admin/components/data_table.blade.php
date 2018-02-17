<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <h4 class="c-grey-900 mB-20">{{ $datatableTitle }}</h4>
            <table id="dataTable" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        @foreach($datatableFields as $field)
                        <th>{{ $field }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        @foreach($datatableFields as $field)
                        <th>{{ $field }}</th>
                        @endforeach
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($datatableValues as $v)
                    <tr>
                        @foreach($datatableFields as $f)
                        <td>{{ $v[$f] }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>