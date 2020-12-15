<x-header title="Forgot Password"/>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 90vh;">
            <div class="col-sm-6 p-5 shadow">
                <form action="/forgot-password" method="post">
                    @csrf
                    <h2 class="text-center">Forgot Password</h2>
                    @if(Session::has('message'))
                        <div class="alert alert-success text-center">{{session('message')}}</div>
                    @endif
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="Email" name="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <button class="btn btn-default btn-block" id="forgotPassword" onclick="submitted(event)">Submit</button>
                </form>
            </div>
        </div>
    </div>
<x-footer/>