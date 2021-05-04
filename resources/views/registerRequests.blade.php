@extends('layouts.app')

@section('content')

    <div class="container-fluid col-md-6 pt-5 pb-5">

        <!-- register form for architecture -->
        @if ($accountType == 'archtecture')

            <div class="card">
                <div class="card-body register-card-body bg-dark elevation-3">

                    {{-- alert box for succcessfully sent request --}}
                    @if (session('message'))

                        <div class="alert alert-success alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong id="message"> {{ session('message') }} </strong>
                        </div>

                    @endif

                    <div class="d-flex flex-row mb-3 pl-3 elevation-2 pr-3">
                        <p class="login-box-msg mt-2 mr-2"
                            style="font-family: 'Times New Roman', Times, serif ; font-size: 20px">Register For New
                            Archtecture Membership</p>
                        <h2 class="mt-md-1 mt-4"><span class="fas fa-map text-info"></span></h2>
                    </div>

                    <form method="post" action="{{ route('registerRequests', 'archtecture') }}"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="input-group mb-3">
                            <input type="file" name="certificate" id="certificate"
                                class="form-control bg-dark d-none"
                                placeholder="upload certificate">

                                <label for="certificate" class="btn btn-outline-secondary @error('certificate') is-invalid @enderror">Upload certificate <span class="fas fa-id-card ml-1"></span></label>

                            @error('certificate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="tinNumber"
                                class="form-control bg-secondary @error('tinNumber') is-invalid @enderror"
                                value="{{ old('tinNumber') }}" placeholder="tinNumber">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-id-card"></span></div>
                            </div>
                            @error('tinNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="nationalId"
                                class="form-control bg-secondary @error('nationalId') is-invalid @enderror"
                                value="{{ old('nationalId') }}" placeholder="nationalId">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-id-card"></span></div>
                            </div>
                            @error('nationalId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

        @endif
        <!-- /register form for architecture -->

        <!-- register form for seller -->

        @if ($accountType == 'seller')

            <div class="card">
                <div class="card-body register-card-body bg-dark elevation-3">

                    {{-- alert box for success request sending --}}
                    @if (session('message'))

                        <div class="alert alert-success alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong id="message"> {{ session('message') }} </strong>
                        </div>

                    @endif

                    <div class="d-flex flex-row mb-3 pl-5 elevation-2">
                        <p class="login-box-msg mt-3 mr-2"
                            style="font-family: 'Times New Roman', Times, serif ; font-size: 20px">Register For New Seller
                            Membership</p>
                        <h2 class="mt-md-2 mt-4 mr-3"><span class="fas fa-shopping-cart text-info"></span></h2>
                    </div>

                    <form method="post" action="{{ route('registerRequests', 'seller') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="file" name="certificate" id="certificate"
                                class="form-control bg-dark d-none"
                                placeholder="upload certificate">

                                <label for="certificate" class="btn btn-outline-secondary @error('busnessLisence') is-invalid @enderror">Upload certificate <span class="fas fa-id-card ml-1"></span></label>

                            @error('certificate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="file" name="busnessLisence" id="busnessLisence"
                                class="form-control bg-dark d-none"
                                placeholder="upload busnessLisence">

                                <label for="busnessLisence" class="btn btn-outline-secondary @error('busnessLisence') is-invalid @enderror">Upload busnessLisence <span class="fas fa-id-card ml-1"></span></label>

                            @error('busnessLisence')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="shopName" class="form-control bg-secondary @error('shopName') is-invalid @enderror"
                                value="{{ old('shopName') }}" placeholder="shopName">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-shopping-cart"></span></div>
                            </div>
                            @error('shopName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="shopLocation"
                                class="form-control bg-secondary @error('shopLocation') is-invalid @enderror"
                                value="{{ old('shopLocation') }}" placeholder="shopLocation">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-location-arrow"></span></div>
                            </div>
                            @error('shopLocation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="tinNumber"
                                class="form-control bg-secondary @error('tinNumber') is-invalid @enderror"
                                value="{{ old('tinNumber') }}" placeholder="tinNumber">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-id-card"></span></div>
                            </div>
                            @error('tinNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="nationalId"
                                class="form-control bg-secondary @error('nationalId') is-invalid @enderror"
                                value="{{ old('nationalId') }}" placeholder="nationalId">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-id-card"></span></div>
                            </div>
                            @error('nationalId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <div class="col-4 mb-3">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

        @endif
        <!-- /register form for seller -->

        <!-- register form for house builder -->

        @if ($accountType == 'houseBuilder')

            <div class="card">
                <div class="card-body register-card-body bg-dark elevation-3">

                    {{-- alert box for success request sending --}}
                    @if (session('message'))

                        <div class="alert alert-success alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong id="message"> {{ session('message') }} </strong>
                        </div>

                    @endif

                    <div class="d-flex flex-row mb-3 pl-3 elevation-2 pr-3">
                        <p class="login-box-msg mt-2 mr-2"
                            style="font-family: 'Times New Roman', Times, serif ; font-size: 20px">Register For New
                            HouseBuilder Membership</p>
                        <h2 class="mt-md-1 mt-4"><span class="fas fa-building text-info"></span></h2>
                    </div>

                    <form method="post" action="{{ route('registerRequests', 'houseBuilder') }}"
                        enctype="multipart/form-data">
                        @csrf



                        <div class="input-group mb-3">
                            <input type="file" name="certificate" id="certificate"
                                class="form-control bg-dark d-none"
                                placeholder="upload certificate">

                                <label for="certificate" class="btn btn-outline-secondary @error('certificate') is-invalid @enderror">Upload certificate <span class="fas fa-id-card ml-1"></span></label>

                                @error('certificate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="tinNumber"
                                class="form-control bg-secondary @error('tinNumber') is-invalid @enderror"
                                value="{{ old('tinNumber') }}" placeholder="tinNumber">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-id-card"></span></div>
                            </div>
                            @error('tinNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="nationalId"
                                class="form-control bg-secondary @error('nationalId') is-invalid @enderror"
                                value="{{ old('nationalId') }}" placeholder="nationalId">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-id-card"></span></div>
                            </div>
                            @error('nationalId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

        @endif


        <!-- /register form for house builder -->

    <!-- /preview files uploading before uploading -->

    </div>

@endsection
