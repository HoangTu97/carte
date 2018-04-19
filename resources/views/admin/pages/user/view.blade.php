@extends('admin.app')

@section('content')
    @include('admin.components.view_info_user',[
        'viewdetailData'=>$dataViewDetail,
        'viewdetailRouteNameControl'=>'admin.user'
    ])
@endsection