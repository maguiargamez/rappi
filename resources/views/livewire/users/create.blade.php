<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
               <form>
            <div class="form-group">
                <label for="name"><b>Nombre:</b></label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nombre">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="email"><b>Correo electrónico:</b></label>
                <input wire:model="email" type="text" class="form-control" id="email" placeholder="Correo electrónico">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password"><b>Contraseña:</b></label>
                <input wire:model="password" type="password" class="form-control" id="password" placeholder="Contraseña">@error('password') <span class="error text-danger">{{ $message }}</span> @enderror
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
