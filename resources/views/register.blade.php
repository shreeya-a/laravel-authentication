<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <h1 style="text-align: center;">Sign up</h1>

    <div class="container">

    @if(Session::has('fail'))
    <span>{{Session::get('fail')}}</span>
    @endif
    @if(Session::has('success'))
    <span>{{Session::get('success')}}</span>
    @endif

    <form action="{{route('signupUser')}}" method="post">
        @csrf
            <input type="text" name="name" id="" class="form-control " placeholder="Enter your name">
            <span>@error('name') {{$message}}  @enderror</span>
            <input type="email" name="email" id="" class="form-control " placeholder="Enter your email">
            <span>@error('email') {{$message}}  @enderror</span>
            <input type="password" name="password" class="form-control " id="" placeholder="Enter password">
            <span>@error('password') {{$message}}  @enderror</span>
            <br>
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</body>

</html>