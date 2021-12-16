<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New T Sitios Turistico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="slug"></label>
                <input wire:model="slug" type="text" class="form-control" id="slug" placeholder="Slug">@error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="region_id"><b>Región:</b></label>
                <input wire:model="region_id" type="text" class="form-control" id="region_id" placeholder="Region Id">@error('region_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="municipio_id"><b>Municipio:</b></label>
                <input wire:model="municipio_id" type="text" class="form-control" id="municipio_id" placeholder="Municipio Id">@error('municipio_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
            <div class="form-group">
                <label for="coordenadas"></label>
                <input wire:model="coordenadas" type="text" class="form-control" id="coordenadas" placeholder="Coordenadas">@error('coordenadas') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="activo"></label>
                <input wire:model="activo" type="text" class="form-control" id="activo" placeholder="Activo">@error('activo') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
