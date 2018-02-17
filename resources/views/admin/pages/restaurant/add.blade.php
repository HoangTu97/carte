@extends('admin.app')

@section('content')
    @include('admin.components.form_complex', [
        'formTitle'=>'Validation',
        'formData'=>$restaurantAdd,
        'formAction'=>'admin.restaurant.add',
        'formMethod'=>'post'
        ])
@endsection