<x-header title="Login"/>
    <div class="container">
        <div class="row justify-content-center"style="height:90vh;">
            <div class="col-sm-8 my-auto  shadow rounded p-5">
                <form action="/login" method="post">
                    @csrf
                    <h1 class="text-center">Login</h1>
                    @if(Session::has('message'))
                        <div class="alert alert-danger text-center">{{ Session('message') }}</div>
                    @endif
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
                    <button class="btn btn-default btn-block" id="login" onclick="submitted(event)">Submit</button>
                    <div class="text-center mt-2"><a href="/forgot-password" class="text-default">Forgot Password?</a></div>
                </form>
            </div>
        </div>
    </div>
<x-footer/>