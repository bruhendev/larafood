@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="nome">Nome:</label>
    <input type="text" name="name" id="nome" placeholder="Nome" class="form-control" value="{{ $detail->name ?? old('name') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>