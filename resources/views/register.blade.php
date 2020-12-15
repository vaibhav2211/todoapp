<x-header title="Register"/>
    <div class="container">
        <div class="row justify-content-center" style="height: 90vh;">
            <div class="col-sm-8 my-auto shadow rounded p-5 ">
                <form action="/register" method="post" enctype="multipart/form-data">
                    @csrf
                    <h1 class="text-center">Register</h1>
                    @if(Session::has('message'))
                        <div class="alert alert-success text-center">{{Session('message')}}</div>
                    @endif
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Profile Picture</label>
                        <input type="file" name="profile" class="form-control-file" accept="image/*" onchange="loadFile(event)">
                        @error('profile') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <img id="output"/>
                    <button class="btn btn-default btn-block mt-1" id="register" onclick="submitted(event)">submit</button>
                </form>
            </div>
        </div>
    </div>
<x-footer/>
