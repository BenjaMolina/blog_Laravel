{{-- <input name="user_id" class="form-control" type="hidden" value="{{ auth()->user()->id}}" id="name">

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
        <label >Estatus</label>
               
        @if($entrada)
            <label>
                <input {{ old('status') ? (old('status') == 'PUBLISHED' ? 'checked' : '') : ($entrada->status ==  'PUBLISHED' ? 'checked': '')}} type="radio" name="status" value="PUBLISHED"> Publicado
            </label>
            <label>
                <input {{ old('status') ? (old('status') == 'DRAFT' ? 'checked' : '') : ($entrada->status ==  'DRAFT' ? 'checked': '')}} type="radio" name="status" value="DRAFT"> Borrador
            </label>
        @else
            <label>
                <input {{ old('status') ? (old('status') == 'PUBLISHED' ? 'checked' : '') : ''}} type="radio" name="status" value="PUBLISHED"> Publicado
            </label>
            <label>
                <input {{ old('status') ? (old('status') == 'DRAFT' ? 'checked' : '') : ''}} type="radio" name="status" value="DRAFT"> Borrador
            </label>
            
        @endif
            
    </div>

<div class="form-group">
    <label for="file">Imagen</label>
    <input class="form-control" type="file" name="file">
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    @foreach ($tags as $tag)
        <label>
            @if($entrada)
                <input {{ old('tags') ? ( in_array($tag->id,old('tags')) ? 'checked' : '') : ($entrada->tags->contains($tag->id) ? 'checked': '')}} type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}}
            @else
                <input {{ old('tags') ? (in_array($tag->id,old('tags')) ? 'checked' : '') : '' }} type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}}
            @endif
            
        </label>
    @endforeach
    
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
</div> --}}

{{Form::input('hidden','user_id',auth()->user()->id)}}

<div class="form-group">
    {{Form::label('category_id', 'Categoria')}}
    {{Form::select('category_id', $categories, null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', $value=null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('slug','Slug') }}
    {{ Form::text('slug', $value=null, ['class' => 'form-control']) }}
</div>
 
<div class="form-group">
    {{ Form::label('status', 'Estatus') }}
    <label>
        {{ Form::radio('status', 'PUBLISHED') }} Publicado
    </label>        
    <label>
        {{ Form::radio('status', 'DRAFT') }} Borrador
    </label>        
</div>

<div class="form-group">
    <label for="file">Imagen</label>
    {{ Form::label('file', 'Imagen') }}
    {{ Form::file('file', ['class' => 'form-control']) }}
</div>


<div class="form-group">
    {{ Form::label('tags', 'Tags') }}
    <div>
        @foreach ($tags as $tag)
            <label>
                {{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}  
            </label>
        @endforeach  
    </div>
</div>

<div class="form-group">
    {{ Form::label('excerpt', 'Descripcion corta') }}
    {{ Form::text('excerpt', $value=null, ['class' => 'form-control']) }}
    
</div>

<div class="form-group">
    {{ Form::label('body','Cuerpo') }}
    {{ Form::textarea('body', $value=null,['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
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