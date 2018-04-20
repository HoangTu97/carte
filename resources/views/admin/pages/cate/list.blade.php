@extends('admin.app')

@section('content')
    
    @include('admin.components.data_table', [
        'datatableTitle'=>'Category',
        'datatableMethod'=>'list',
        'datatableFields'=>$cate['fields'], 
        'datatableValues'=>$cate['values'],
        'datatableRouteNameControl'=>'admin.cate'])

@endsection