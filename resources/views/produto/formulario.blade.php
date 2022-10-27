{{-- Nome --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Nome do Produto') }}</label>
    <div>
        <input type="text" id="name" name="name" value="{{ isset($produto) ? $produto->name : old('name') }}"
            class="form-control @error('name') is-invalid @enderror" placeholder="Nome do Produto" required>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Descricao --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Descricao do Produto') }}</label>
    <div>
        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
            placeholder="Escreva uma descrição curta sobre o produto" required>{{ isset($produto) ? $produto->description : old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


{{-- Preço --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Preço do Produto') }}</label>
    <div>
        <input type="text" id="price" name="price"
            value="{{ isset($produto) ? $produto->price : old('price') }}"
            class="form-control @error('price') is-invalid @enderror" required>
        @error('price')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Quantidade --}}

<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Quantidade do Produto') }}</label>
    <div>
        <input type="number" id="quantity" name="quantity" min="1" max="800"
            value="{{ isset($produto) ? $produto->quantity : old('quantity') }}"
            class="form-control @error('quantity') is-invalid @enderror" required>
        @error('quantity')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


{{-- Categoria --}}
<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Categoria') }}</label>
    <div>
        <select id="categoria_id" name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror"
            required>
            <option value="">--- Selecione uma Categoria ---</option>
            @isset($categorias)
                @foreach ($categorias as $categoria)
                    <option @if (isset($produto) && $produto->categoria_id == $categoria->id) selected @endif value="{{ $categoria->id }}">
                        {{ $categoria->name }}
                    </option>
                @endforeach
            @endisset
        </select>
        @error('categoria_id')
            <span class="invalid-feedback" role="alert">
                <i class="fi-circle-cross"></i><strong> {{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

{{-- Imagem --}}
<div class="row">
    <div class="col-sm-2 col-form-label">
        <label class="@if (!isset($produto)) required @endif" for="image">Imagens</label>
        <input type="file" name="image" class="form-control" accept="image/*"
            @if (!isset($produto)) required @endif>
    </div>
</div>
