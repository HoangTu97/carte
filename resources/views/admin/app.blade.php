@extends('admin.master')

@section('app')
<div>
    @include('admin.blocks.sidebar')

    <!-- #Main ============================ -->
    <div class="page-container">
        @include('admin.blocks.header')

        <!-- ### $App Screen Content ### -->
        @section('content') 
        @show 
        
        @include('admin.blocks.footer')
    </div>
</div>
@endsection