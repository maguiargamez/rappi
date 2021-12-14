@extends('layouts.app')
@section('title', __('Inicio'))
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header"><h5><span class="text-center fa fa-home"></span> @yield('title')</h5></div>
                    <div class="card-body">

                        @livewire('sitio-turistico-visita-top-home')

                        @livewire('sitio-turistico-visita-home')

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
