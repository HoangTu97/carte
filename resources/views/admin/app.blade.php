@extends('admin.master')

@section('app')
<div>
    @include('admin.blocks.sidebar')

    <!-- #Main ============================ -->
    <div class="page-container">
        @include('admin.blocks.header')

        <!-- ### $App Screen Content ### -->
        <main class="main-content bgc-grey-100">
            <div id="mainContent">
                @section('content') 
                @show 
            </div>
        </main>
        
        @include('admin.blocks.footer')
    </div>
</div>
@endsection