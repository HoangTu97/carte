@extends('admin.app')

@section('content')
    @include('admin.components.form_complex', [
        'formTitle'=>'Restaurant Add',
        'formData'=>$restaurantAdd,
        'formAction'=>'admin.restaurant.add',
        'formMethod'=>'post',
        'formFunc'=>'Add'
        ])
@endsection