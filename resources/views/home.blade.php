@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
@endsection

@section('content')

    <h1 class="bd-title" id="content">Visitas</h1>

    <div class="bd-example">
        <table class="table table-striped table-hover">
            <?php $i=1; ?>
            <tr>
                <th width="15px">#</th>
                <th>Sitio turístico</th>
                <th width="25px">Visitas</th>
            </tr>
            @foreach($sitios as $sitio)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $sitio->nombre }}</td>
                    <td>{{ $sitio->sitio_turistico_visitas_count }}</td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </table>
    </div>


@endsection
