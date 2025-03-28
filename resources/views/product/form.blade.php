<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="nombre_producto" class="form-label">{{ __('Nombre Producto') }}</label>
            <input type="text" name="Nombre_producto" class="form-control @error('Nombre_producto') is-invalid @enderror" value="{{ old('Nombre_producto', $product?->Nombre_producto) }}" id="nombre_producto" placeholder="Nombre Producto">
            {!! $errors->first('Nombre_producto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="Descripcion" class="form-control @error('Descripcion') is-invalid @enderror" value="{{ old('Descripcion', $product?->Descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('Descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio_unitario" class="form-label">{{ __('Precio Unitario') }}</label>
            <input type="text" name="Precio_unitario" class="form-control @error('Precio_unitario') is-invalid @enderror" value="{{ old('Precio_unitario', $product?->Precio_unitario) }}" id="precio_unitario" placeholder="Precio Unitario">
            {!! $errors->first('Precio_unitario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="stock" class="form-label">{{ __('Stock') }}</label>
            <input type="text" name="Stock" class="form-control @error('Stock') is-invalid @enderror" value="{{ old('Stock', $product?->Stock) }}" id="stock" placeholder="Stock">
            {!! $errors->first('Stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>