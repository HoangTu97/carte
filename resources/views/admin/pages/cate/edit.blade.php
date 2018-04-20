@extends('admin.app')

@section('content')
    @include('admin.components.form_complex', [
        'formTitle'=>'Restaurant Edit',
        'formData'=>$restaurantEdit,
        'formAction'=>$formEditAction,
        'formMethod'=>'post',
        'formFunc'=>'Edit'
        ])
@endsection