@extends("template")

@section("title")
    {{$detail->title}}
@endsection

@section("author")
    <div class="row">
        <div class="col-lg-9">
            <h3>Author: {{$detail->author}}</h3>
        </div>
        <div class="col-lg-3">
            <a href="/project" class="btn btn-primary">Donnate</a>
        </div>
    </div>
@endsection

@section("description")
    <br><br><br>
    <div class="flex-center position-ref ">
        <p class="description">{{$detail->description}}</p>
    </div>
@endsection
