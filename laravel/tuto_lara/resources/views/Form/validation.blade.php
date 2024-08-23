<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>


    <div class="row">
        <div class="col-5 offset-1 my-5">
            @if(session("message"))
                <div class="alert alert-success d-block">
                    {{session("message")}}
                </div>
            @endif
            <form action="{{route("validation")}}" class=" shadow-sm p-3 rounded " method="POST">
                @csrf
                <input type="text" name="name" value="{{old("name")}}" class="form-control my-1  @error("name") is-invalid @enderror " placeholder="Enter Name...">
                @error("name")
                    <small class=" d-block alert alert-warning">
                        {{$message}}
                    </small>
                @enderror
                <input type="email" name="email" value="{{old("email")}}" class="form-control my-1  @error("email") is-invalid @enderror" placeholder="Enter Email...">
                @error("email")
                    <small class=" d-block alert alert-warning">
                        {{$message}}
                    </small>
                @enderror
                <input type="password" name="password" value="{{old("password")}}" class="form-control my-1 @error("password") is-invalid @enderror" placeholder="Enter Password...">
                @error("password")
                    <small class=" d-block alert alert-warning">
                        {{$message}}
                    </small>
                @enderror
                <input type="password" name="passwordsec" value="{{old("passwordsec")}}" class="form-control my-1 @error("passwordsec") is-invalid @enderror" placeholder="Confirm Password...">
                @error("passwordsec")
                    <small class=" d-block alert alert-warning">
                        {{$message}}
                    </small>
                @enderror
                <textarea name="message" cols="30" rows="10" class="form-control my-1 @error("message") is-invalid @enderror" placeholder="Message">
                    {{old("message")}}
                </textarea>
                @error("message")
                    <small class=" d-block alert alert-warning">
                        {{$message}}
                    </small>
                @enderror
                <select name="language" class="form-control my-1 @error("language") is-invalid @enderror">
                    <option value="">Select language</option>
                    <option value="html" {{old("language") == "html" ? "selected":""}}>HTML</option>
                    <option value="css" {{old("language" )== "css" ? "selected":""}}>CSS</option>
                    <option value="js" {{old("language") == "js" ? "selected":""}}>JS</option>
                </select>
                @error("language")
                    <small class=" d-block alert alert-warning">
                        {{$message}}
                    </small>
                @enderror
                <input type="radio" name="gender" value="male" {{old("gender") == "male"? "checked":"" }} class="form-check-input my-1"> Male
                <input type="radio" name="gender" value="female" {{old("gender") == "female"? "checked":"" }} class="form-check-input my-1"> Female
                @error("gender")
                    <small class=" d-block alert alert-warning">
                        {{$message}}
                    </small>
                @enderror
                <div class="check">
                    <input type="checkbox" name="lvl" value="level_1" {{old("lvl") == "level_1" ? "checked" :""}} class="form-check-input my-1 "> level-1
                    <input type="checkbox" name="lvl" value="level_2" {{old("lvl") == "level_2" ? "checked" :""}} class="form-check-input my-1 "> level-2
                </div>
                @error("lvl")
                    <small class=" d-block alert alert-warning">
                        {{$message}}
                    </small>
                @enderror
                <input type="submit" value="Send" class="btn btn-sm btn-info my-1">
            </form>
        </div>
        <div class="col-5 offset-1">
            <div class="container">
                <ul>
                    {{-- <li>{{$validateData}}</li>  --}}
                    {{-- {{dd($validateData)}} --}}
                </ul>
            </div>
        </div>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
