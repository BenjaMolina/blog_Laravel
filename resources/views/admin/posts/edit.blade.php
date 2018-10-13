@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar Entrada
                    </div>                

                    <div class="panel-body">                                                   
                        <form action="{{route('posts.update',$post->id)}}" method="post">
                            {!! csrf_field()!!}
                            {!! method_field('PUT')!!}
                            @include('admin.posts.partials.form',   [
                                'entrada' => $post,
                                'categories' => $categories,
                                'tags' => $tags,
                                ]
                            )
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection