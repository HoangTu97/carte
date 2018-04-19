@extends('admin.app')

@section('content')
    @include('admin.components.view_detail',[
        'viewdetailData'=>$dataViewDetail,
        'viewdetailRouteNameControl'=>'admin.cate'
    ])
@endsection