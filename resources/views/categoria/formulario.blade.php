<div class="row">
    <label class="col-sm-2 col-form-label">{{ __('Categorias') }}</label>
    <div class="col-sm-7">
        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name"
                type="text" placeholder="{{ __('Categoria do Produto') }}"
                value="{{ isset($categoria) ? $categoria->name : old('name') }}" required="true" aria-required="true" />
            @if ($errors->has('name'))
                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
</div>
