<!-- Modal -->
<script>
    window.addEventListener('closeModal', event=> {
        $('#updateModal').modal('hide')
    })
</script>
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Sitios Turístico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update()">
					<input type="hidden" wire:model="selected_id">
{{--            <div class="form-group">
                <label for="slug"></label>
                <input wire:model="slug" type="text" class="form-control" id="slug" placeholder="Slug">@error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>--}}
            <div class="form-group">
                <label for="region_id"><b>Región:</b></b></label>

{{--                <input wire:model="region_id" type="text" class="form-control" id="region_id" placeholder="Region Id">--}}

                <select wire:model="region_id" type="text" class="form-control" id="region_id" placeholder="Region Id">
                    @foreach($regiones as $key => $region)
                        <option value="{{$key}}">{{$region}}</option>
                    @endforeach
                </select>
                @error('region_id') <span class="error text-danger">{{ $message }}</span> @enderror


            </div>
            <div class="form-group">
                <label for="municipio_id"><b>Municipio:</b></label>
{{--                <input wire:model="municipio_id" type="text" class="form-control" id="municipio_id" placeholder="Municipio Id">--}}
                <select wire:model="municipio_id" type="text" class="form-control" id="municipio_id" placeholder="Municipio Id">
                    @foreach($municipios as $key => $municipio)
                        <option value="{{$key}}">{{$municipio}}</option>
                    @endforeach
                </select>

                @error('municipio_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nombre"><b>Sitio turístico:</b></label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="descripcion"><b>Descripción:</b></label>
                <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="como_llegar"><b>Como llegar:</b></label>
                <input wire:model="como_llegar" type="text" class="form-control" id="como_llegar" placeholder="Como Llegar">@error('como_llegar') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="lugares_relacionados"><b>Lugares relacionados:</b></label>
                <input wire:model="lugares_relacionados" type="text" class="form-control" id="lugares_relacionados" placeholder="Lugares Relacionados">@error('lugares_relacionados') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
{{--            <div class="form-group">
                <label for="coordenadas"></label>
                <input wire:model="coordenadas" type="text" class="form-control" id="coordenadas" placeholder="Coordenadas">@error('coordenadas') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="activo"></label>
                <input wire:model="activo" type="text" class="form-control" id="activo" placeholder="Activo">@error('activo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>--}}


            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
{{--                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>--}}
                <button type="submit"  class="btn btn-primary">Actualizar</button>
            </div>
           </form>
       </div>
    </div>
</div>
