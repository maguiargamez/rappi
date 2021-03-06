<h5>Sitios turísticos con mas visitas en la RA</h5>
</br>
<hr>

<div class="row w-100">
    <div class="col-md-12">
        <div class="card border-default mx-sm-0 p-0">
            <div class="text-default text-center mt-3"><h4>Total de Visitas</h4></div>
            <div class="text-default text-center mt-2"><h1>{{ number_format($total_visitas) }}</h1></div>
        </div>
    </div>
    <hr>
    @foreach($sitioss as $row)
        <div class="col-md-3">
            <div class="card border-{{ $colors[$loop->iteration] }} mx-sm-1 p-3">
                <div class="card border-{{ $colors[$loop->iteration] }} text-{{ $colors[$loop->iteration] }} p-3" >{{ $row->nombre }}</div>
                <div class="text-{{ $colors[$loop->iteration] }} text-center mt-3"><h4>Visitas</h4></div>
                <div class="text-{{ $colors[$loop->iteration] }} text-center mt-2"><h1>{{ number_format($row->sitio_turistico_visitas_count) }}</h1></div>
            </div>
        </div>
    @endforeach
</div>
</div>
