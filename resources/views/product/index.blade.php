@extends('layouts.app')

@section('header')
    {{ __('Gestión de Productos') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <h5 class="mb-3 mb-md-0">Listado de Productos</h5>
                        <a href="{{ route('products.create') }}" class="btn btn-light btn-sm">Nuevo Producto</a>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-3">{{ $message }}</div>
                @endif

                <div class="card-body">
                    <form method="GET" action="{{ route('products.index') }}">
                        <div class="row g-2 mb-4">
                            <div class="col-12 col-md-4">
                                <input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar producto..." value="{{ request('search') }}">
                            </div>
                            <div class="col-6 col-md-2">
                                <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Precio mínimo" value="{{ request('min_price') }}" step="0.01">
                            </div>
                            <div class="col-6 col-md-2">
                                <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Precio máximo" value="{{ request('max_price') }}" step="0.01">
                            </div>
                            <div class="col-6 col-md-2">
                                <input type="number" name="min_stock" class="form-control form-control-sm" placeholder="Stock mínimo" value="{{ request('min_stock') }}">
                            </div>
                            <div class="col-6 col-md-2">
                                <button type="submit" class="btn btn-primary btn-sm w-100">Filtrar</button>
                            </div>
                        </div>
                    </form>

                    <div class="d-none d-md-block">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th class="text-center" width="20%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                                        <td>
                                            <strong>{{ $product->Nombre_producto }}</strong>
                                            @if($product->Descripcion)
                                                <br><small class="text-muted">{{ Str::limit($product->Descripcion, 50) }}</small>
                                            @endif
                                        </td>
                                        <td class="text-success">${{ number_format($product->Precio_unitario, 2) }}</td>
                                        <td>
                                            <span class="badge bg-{{ $product->Stock > 10 ? 'success' : ($product->Stock > 0 ? 'warning' : 'danger') }}">{{ $product->Stock }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-primary btn-sm">Ver</a>
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-success btn-sm">Editar</a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Confirmar eliminación?')">Eliminar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-md-none">
                        @foreach ($products as $product)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title mb-1"><strong>{{ $product->Nombre_producto }}</strong></h5>
                                    <span class="text-success">${{ number_format($product->Precio_unitario, 2) }}</span>
                                </div>
                                
                                @if($product->Descripcion)
                                    <p class="card-text text-muted small mb-2">{{ Str::limit($product->Descripcion, 70) }}</p>
                                @endif
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-{{ $product->Stock > 10 ? 'success' : ($product->Stock > 0 ? 'warning' : 'danger') }}">Stock: {{ $product->Stock }}</span>
                                    
                                    <div class="btn-group">
                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Confirmar eliminación?')">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                {!! $products->appends(request()->query())->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection