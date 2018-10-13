<div class="form-group">
    <label for="name">Nombre</label>
    <input name="name" class="form-control" type="text" value="{{ $entrada ? $entrada->name : old('name')}}" id="name">
</div>
<div class="form-group">
    <label for="slug">Slug</label>
    <input name="slug" class="form-control" type="text" value="{{$entrada ? $entrada->slug : old('slug')}}" id="slug">
</div>
<div class="form-group">
    <label for="excerpt">Extracto</label>
    <input class="form-control" type="text" name="excerpt" value="{{$entrada ? $entrada->excerpt : old('excerpt')}}" id="slug">
</div>
<div class="form-group">
    <label for="body">Cuerpo</label>
    <textarea class="form-control" name="body" cols="30" rows="10">{{$entrada ? $entrada->body : old('body')}}</textarea>
</div>
<div class="form-group">
    <button class="btn btn-sm btn-primary" type="submit">Guardar</button>
</div>
