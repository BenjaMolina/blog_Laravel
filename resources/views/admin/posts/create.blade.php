@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Crear Entrada
                    </div>                

                    <div class="panel-body">
                        {{-- <form action="{{ route('posts.store')}}" method="POST">
                            {!! csrf_field() !!}
                            @include('admin.posts.partials.form',[
                                'entrada' => null,
                                'categories' => $categories,
                                'tags' => $tags,
                            ])
                        </form> --}}
                        {{ Form::open([
                            'route' => ['posts.store'],
                            'method' => 'post'
                        ])}}
                            @include('admin.posts.partials.form')
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection