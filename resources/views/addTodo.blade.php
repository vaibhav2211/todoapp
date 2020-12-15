<x-header title="Add Todo"/>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 90vh;">
            <div class="col-sm-8 shadow p-5">
                <form action="/add-todo" method="post">
                    @csrf
                    <h1 class="text-center">Add Todo</h1>
                    @if(Session::has('message'))
                        <div class="alert alert-success text-center">
                            {{ Session('message') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" style="resize: none" class="form-control @error('title') is-invalid @enderror">{{ old('desc') }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button class="btn btn-default btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
<x-footer/>