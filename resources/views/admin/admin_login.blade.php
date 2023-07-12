<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/admin/css/login.css')}}" />
</head>

<body>
    <div class="main_wrapper">
        <div class="login_card">
            <div class="d-flex justify-content-center">
                <i class="fa-solid fa-user"></i>
            </div>

            <h4>
                Login As Admin
            </h4>
            <form method="POST" action="{{route('admin.login')}}">
                @csrf
                <div class="input-group">
                    <span class="input-group-prepend">
                        <div class="input-group-text border-right-0">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                    </span>
                    <input class="form-control py-2 border-left-0 border" type="email" placeholder="Enter email"
                        id="email" name="email">
                </div>
                <div class="input-group">
                    <span class="input-group-prepend">
                        <div class="input-group-text border-right-0"><i class="fa-solid fa-lock"></i></div>
                    </span>
                    <input class="form-control py-2 border-left-0 border" type="password" placeholder="Enter password"
                        id="password" name="password">
                </div>
                <div class="form-check">
                    <input class="form-check-input mb-0" type="checkbox" value="" checked id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Save Login Information
                    </label>
                </div>
                <button type="submit" class="btn">
                    Sign In
                </button>
                <a href="#">
                    Forget password?
                </a>

            </form>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>