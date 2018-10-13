<input name="user_id" class="form-control" type="hidden" value="{{ auth()->user()->id}}" id="name">

<div class="form-group">
    <label for="category_id">Categoria</label>
    <select class="form-control" name="category_id" id="">
        @foreach ($categories as $category)
            @if ($entrada)
                @if ($category->id == $entrada->category_id)
                    <option {{ (old("category_id") ? (old("category_id") == $category->id ? "selected":""): "selected") }} value="{{$category->id}}">{{$category->name}}</option>     
                @else
                    <option {{ (old("category_id") == $category->id ? "selected":"") }} value="{{$category->id}}">{{$category->name}}</option>     
                @endif
            @else
                <option {{ (old("category_id") == $category->id ? "selected":"") }} value="{{$category->id}}">{{$category->name}}</option>
            @endif
            
        @endforeach
    </select>
</div>

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

@section('scripts')
    <script src="{{asset('vendor/stringToSlug/jquery.stringToSlug.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#name, #slug").stringToSlug({
                callback: function(text){
                    $("#slug").val(text);
                }
            });
        });
    </script>
@endsection