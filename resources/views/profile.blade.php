<x-header title="Profile:{{$user->name}}"/>
    <div class="container my-2">
        <div class="row">
            <div class="col-sm-4 mt-5 justify-content-center d-none d-lg-flex">
                <img src="{{ asset("images/".$user->profile) }}" id="output" alt=" " style="height:300px;width:300px;border-radius:50%">
            </div>
            <div class="col-sm-4 justify-content-center d-sm-flex d-flex d-lg-none">
                <img src="{{ asset("images/".$user->profile) }}" id="outputsm" alt=" " style="height:200px;width:200px;border-radius:50%">
            </div>
            <div class="col-sm-6">
                <h1 class="text-center text-capitalize">{{ $user->name }}</h1>
                <form action="/profile" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(Session::has('message'))
                        <div class="alert alert-success text-center">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Profile Picture</label>
                        <input type="file" name="profile" class="form-control-file" onchange="loadFile(event)" accept="image/*">
                        @error('profile') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button class="btn btn-default btn-block" id="updateProfile" onclick="submitted(event)">Update</button>
                </form>
                <a href="/change-password" class="btn btn-default btn-block">Change password</a>
            </div>
        </div>
    </div>
<x-footer/>