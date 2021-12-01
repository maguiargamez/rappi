@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
@endsection

<div>
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
