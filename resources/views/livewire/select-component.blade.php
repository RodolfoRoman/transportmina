<div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Centro de costo Nv 1:</label>
            <select wire:model="costcenter" class="form-control">
                <option value=""> Seleccione </option>
                @foreach ($costcenters as $item)
                <option value="{{ $item->id }}">
                    {{ $item->descripcioncecos }}
                </option>
                @endforeach


            </select>
        </div>

        @error('txtcecos1')
        <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un centro de costo</div>
        @enderror
    </div>



</div>
<!-- fin línea-->
<!-- inicio línea-->
<div class="row">

    <div class="col-sm-4">
        <div class="form-group">
            <label>Centro de costo Nv 2:</label>
            <select class="form-control" wire:model="subCostcenter">



                @if($subCostcenters->count() == 0)
                <option value=""> Debe seleccionar un centro antes </option>
                @endif

                @foreach ($subCostcenters as $item)
                <option value="{{ $item->id }}">
                    {{ $item->subcentrocosto }}
                </option>
                @endforeach


            </select>
        </div>

        @error('txtcecos2')
        <div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Seleccione un centro de costo</div>
        @enderror
    </div>
</div>