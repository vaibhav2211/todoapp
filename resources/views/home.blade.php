<x-header title="Home"/>
    <div class="container mt-1">
        @if(!$todos->isEmpty())
            <h1 class="text-center">Available Todos</h1>
            @foreach($todos as $todo)
            <div class="row justify-content-center mt-2">
                <div class="col-sm-8">
                    <div class="card p-3 @if($todo->completed) bg-success text-white @endif" >
                        <div class="card-title"><h4>{{ $todo->title }}</h4></div>

                            <div class="card-text">{{ $todo->description }}</div>
                            <div class="d-flex justify-content-between">
                            @if(!$todo->completed)<a href="/complete/{{ $todo->id }}" class="btn btn-sm btn-success float-right">✔</a>@endif
                            <a href="/delete/{{ $todo->id }}" class="btn btn-sm btn-danger float-right">✖</a>
                            </div>
                    </div>  
                </div>
            </div>
            @endforeach
            <div class="d-flex mt-3 justify-content-center">
                {{ $todos->links() }}
            </div>
        @else
            <div class="text-center mt-5">
                <h1>No Todos Available</h1>
                <a href="/add-todo" class="btn btn-lg btn-default">Add Todo</a>
            </div>
        @endif
    </div>
<x-footer/>