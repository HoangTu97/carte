@extends('admin.app')

@section('content')
    @include('admin.components.data_table', [
        'datatableTitle'=>'Users',
        'datatableMethod'=>'list',
        'datatableFields'=>$data['fields'], 
        'datatableValues'=>$data['values'],
        'datatableRouteNameControl'=>'admin.user'])
@endsection