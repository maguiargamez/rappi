@section('title', __('T Sitios Turisticos'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4>
                                Visitas Sitios Turísticos </h4>
                        </div>
                        <div wire:poll.60s>
                            {{--							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>--}}
                        </div>
                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                        @endif
                        <div>
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar...">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                            <tr>
                                <td>#</td>
                                <th>Nombre</th>
                                <th>Region</th>
                                <th>Municipio</th>
                                <th>Visitas</th>
{{--                                <th>Acciones</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tSitiosTuristicos as $row)
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nombre }}</td>
                                    <td>{{ $row->region }}</td>
                                    <td>{{ $row->municipio }}</td>
                                    <td align="center">{{ number_format($row->sitio_turistico_visitas_count) }}</td>
{{--                                    <td width="90">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">


                                            </div>
                                        </div>
                                    </td>--}}
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
