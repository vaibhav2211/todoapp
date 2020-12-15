<x-header title="Change Password"/>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 90vh;">
            <div class="col-sm-6 p-5 shadow">
                <h2 class="text-center">Change Password</h2>
                <form action="/change-password" method="post">
                    @csrf
                    @if(Session::has('message'))
                        <div class="alert alert-success text-center">{{session('message')}}</div>
                    @endif
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password') <span class="text-danger">{{ $message }} </span>@enderror
                    </div>
                    <button class="btn btn-default btn-block" id="changePass" onclick="submitted(event)">Change Password</button>
                </form>
            </div>
        </div>
    </div>
<x-footer/>