<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ 'smartBuilding' }} | Registration Page</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ribeye+Marrow&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>

<body class="hold-transition register-page bg-dark">
    <div class="col-md-5 col-12"> {{-- register-box --}}
        <div class="login-logo elevation-2 sticky-top">
            <a href="{{ url('/') }}" class="text-white elevation-5" style="font-family: 'Ribeye Marrow', cursive;">
                <h1 class="shadow-lg"><b>{{ 'smartBuilding' }}</b></h1>
            </a>
        </div>

        <div class="card">
            <div class="card-body register-card-body bg-dark elevation-4">

                <form method="post" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="text-center mb-3 mt-2">
                        <img id="previewImg" src="" alt="profile Image" style="width: 100px" class="img-circle">
                    </div>

                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control" id="image" placeholder="upload image"
                            onchange="previewFile(this)" style="display:none">

                            <label for="image" class="btn btn-outline-secondary @error('image') is-invalid @enderror">Upload profile photo <span class="fas fa-user"></span></label>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="fname" class="form-control bg-secondary @error('fname') is-invalid @enderror"
                            value="{{ old('fname') }}" placeholder="first name">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="mname" class="form-control bg-secondary @error('mname') is-invalid @enderror"
                            value="{{ old('mname') }}" placeholder="middle name">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                        @error('mname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="lname" class="form-control bg-secondary @error('lname') is-invalid @enderror"
                            value="{{ old('lname') }}" placeholder="last name">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                        @error('lname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control bg-secondary @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="form-control bg-secondary @error('phone') is-invalid @enderror" placeholder="phone">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-phone"></span></div>
                        </div>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3 elevation-2 d-flex flex-row">
                        <label for="gender" class="mr-5 mt-2 ml-3">select gender</label>
                        <select name="gender" id="gender" class="btn btn-outline-dark text-white elevation-3 ml-3">
                            <option value="none">not specific</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                    </div>

                    <div class="input-group mb-3 elevation-2">
                        <label for="region" class="mr-5 mt-2 ml-4">select region</label>
                        <select name="region" id="region" class="btn btn-outline-dark text-white elevation-3 ml-3">
                            <option value="dodoma">dodoma</option>
                            <option value="kilimanjaro">kilimanjaro</option>
                            <option value="mwanza">mwanza</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="district" class="form-control bg-secondary @error('district') is-invalid @enderror"
                            value="{{ old('district') }}" placeholder="district name">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-location-arrow"></span></div>
                        </div>
                        @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="street" class="form-control bg-secondary @error('street') is-invalid @enderror"
                            value="{{ old('street') }}" placeholder="street name">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-location-arrow"></span></div>
                        </div>
                        @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control bg-secondary @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control bg-secondary"
                            placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-0">
                    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                </p>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->

        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <script src="{{ mix('js/app.js') }}" defer></script>

    {{-- jquery for preview an image before uploading --}}

    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }

    </script>

</body>

</html>
