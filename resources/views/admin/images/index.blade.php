@extends('admin.template.main')
@section('title','Crear Usuario')

@section('content')

    <div class="panel panel-default">
      <div class="row">
          @foreach($images as $image)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="/image/articles/{{$image->name}}" class="img-responsive">

                        </div>
                        <div class="panel-footer">{{$image->article->title}}</div>
                    </div>
                </div>
              @endforeach
      </div>
    </div>
    @endsection