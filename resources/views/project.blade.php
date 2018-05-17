@extends("template")

@section("title")
    Liste des projets
@endsection

@section('liste')
    <div>
        <div class="content projectList">
            <table class="table-striped col-md-12 table-hover">
                @foreach($projects as $project)
                    <tr>
                        <td><img src="image/2.-Smart-Ideas.png" height="20%"></td><td><h2>{{$project->title}}</h2></td><td><h2>{{$project->author}}</h2></td><td><h3>{{$project->description}}</h3></td> <td><h5><a href="/project/{{$project->id}}">Détail</a></h5></td>
                    </tr>
                    @endforeach
            </table>
            <br>
        </div>
    </div>
@endsection
