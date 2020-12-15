<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/mdb.min.css") }}">
</head>
<body>
    <div class="container-fluid m-0 p-0">
        <nav class="navbar navbar-dark default-color navbar-expand-lg">
            <a href="/" class="navbar-brand">Todo App</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="navbar-nav ml-auto">
                    @if(Session::has('isLogin'))
                        <li class="nav-tab @if($title=='Home') active @endif"><a href="/" class="nav-link">Home</a></li>
                        <li class="nav-tab @if($title=='Add Todo') active @endif"><a href="/add-todo" class="nav-link">Add Todo</a></li>
                        <li class="nav-tab @if(Str::contains($title,"Profile")) active @endif"><a href="/profile" class="nav-link">Profile</a></li>
                        <li class="nav-tab"><a href="/logout" class="nav-link">Logout</a></li>
                    @else
                        <li class="nav-tab @if($title=='Login') active @endif"><a href="/login" class="nav-link">Login</a></li>
                        <li class="nav-tab @if($title=='Register') active @endif"><a href="/register" class="nav-link">Register</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
