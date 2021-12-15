@section('title', __('Sitios Turísticos Visitas'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fa fa-eye text-info"></i>
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
                        {{--						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">--}}
                        {{--						<i class="fa fa-plus"></i>  Agregar sitio turístico--}}
                        {{--						</div>--}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                            <tr>
                                <td>#</td>
                                <th>Fecha</th>
                                <th>Sitio turístico</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tSitiosTuristicos as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->fecha }}</td>
                                    <td>{{ $row->sitioturistico }}</td>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $tSitiosTuristicos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
