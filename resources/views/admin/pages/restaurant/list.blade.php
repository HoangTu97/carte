@extends('admin.app')

@section('content')
    
    @include('admin.components.data_table', [
        'datatableTitle'=>'Restaurants',
        'datatableMethod'=>'list',
        'datatableFields'=>$restaurants['fields'], 
        'datatableValues'=>$restaurants['values'],
        'datatableRouteNameControl'=>'admin.restaurant'])

@endsection