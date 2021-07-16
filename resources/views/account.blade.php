@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="card bg-dark">
            <div class="card-header">
                <div>
                    <span class="d-flex flex-fill justify-content-md-between">
                        <a href="#" class="">

                            @if (auth()->user()->avartar)
                                <img src=" {{ asset('/storage/images/' . auth()->user()->avartar) }} "
                                    class="user-image img-circle elevation-2" alt="User Image" style="width:100px">
                            @else
                                <img src=" {{ asset('/storage/images/defaultAvatar.png') }} "
                                    class="user-image img-circle elevation-2" alt="User Image" style="width:100px">
                            @endif
                        </a>

                        <div class="w-100">
                            <div class="mt-4">
                                <span class="d-flex justify-content-around">
                                    <span style="cursor: pointer;" class="text-secondary"> {{ $user[0]->posts->count() }} : <span
                                            class="text-info">posts</span> </span>
                                    <span style="cursor: pointer;" class="text-secondary">{{ $likesCounter }} : <span
                                            class="text-info">likes</span> </span>
                                    <rate></rate>
                                </span>

                            </div>

                        </div>

                    </span>
                </div>

            </div>

            <div id="app">
                <myaccount></myaccount>
            </div>



            <div class="card-footer">

                <a type="button" class="nav-link" data-toggle="collapse" data-target="#myAccountPostButtons"> <span
                        class="fas fa-bars"></span> </a>

                <div class="d-flex align-items-start">
                    <div id="myAccountPostButtons" class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-myPost-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-myPost" type="button" role="tab" aria-controls="v-pills-myPost"
                            aria-selected="true">my posts</button>
                        <button class="nav-link" id="v-pills-makePost-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-makePost" type="button" role="tab" aria-controls="v-pills-makePost"
                            aria-selected="false">make post</button>
                    </div>
                    <div class="tab-content w-100" id="v-pills-tabContent">
                        <div class="tab-pane fade show active mb-4" id="v-pills-myPost" role="tabpanel"
                            aria-labelledby="v-pills-myPost-tab"
                            style="background-image: linear-gradient(to right, #343a40 , #6c757d );">

                            <my-account-post-view></my-account-post-view>

                        </div>
                        <div class="tab-pane fade w-75" id="v-pills-makePost" role="tabpanel"
                            aria-labelledby="v-pills-makePost-tab">

                            <ul class="nav nav-tabs bg-dark" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    @if (auth()->user()->archtecture == '1')
                                        <button onclick="statusArchtecture()" class="nav-link text-secondary active"
                                            id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button"
                                            role="tab" aria-controls="post" aria-selected="true">archtecture</button>
                                    @endif
                                </li>
                                <li class="nav-item" role="presentation">
                                    @if (auth()->user()->houseBuilder == '1')
                                        <button onclick="statusEngineer()" class="nav-link text-secondary" id="post-tab"
                                            data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab"
                                            aria-controls="post" aria-selected="false">engineer</button>
                                    @endif
                                </li>
                                <li class="nav-item" role="presentation">
                                    @if (auth()->user()->seller == '1')
                                        <button onclick="statusSeller()" class="nav-link text-secondary" id="post-tab"
                                            data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab"
                                            aria-controls="post" aria-selected="false">seller</button>
                                    @endif
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="archtecture" role="tabpanel"
                                    aria-labelledby="archtecture-tab">

                                    <form method="post" action=" {{ route('makePost') }} " enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="archtecture" name="status" id="status">
                                        <div class="mt-2">
                                            <input onclick="pickedImage()" value="image" class="ml-4" type="radio"
                                                id="imageArch" name="picked" required> <label for="imageArch"
                                                class="text-secondary">image</label>

                                            <input onclick="pickedVideo()" value="video" class="ml-1" type="radio"
                                                id="videoArch" name="picked" required> <label for="videoArch"
                                                class="text-secondary">video</label>

                                            <span class="text-secondary ml-2">post : <span class="text-secondary"
                                                    id="pickedArch"> </span> </span>
                                        </div>

                                        <div class="text-secondary ml-5 mb-3">post as : <span class="text-secondary"
                                                id="statusValue">  </span> </div>

                                        <div class="input-group">
                                            <input id="file" type="file"
                                                class="form-control d-none @error('title') is-invalid @enderror"
                                                name="file">
                                            <label for="file" class="btn btn-sm btn-block btn-outline-secondary">what to
                                                post
                                                ?</label>
                                        </div>

                                        <div class="input-group">
                                            <input id="poster" type="file" class="form-control d-none" name="poster">
                                            <label for="poster" class="btn btn-sm btn-block btn-outline-secondary">poster
                                                for
                                                post
                                                ?</label>
                                        </div>

                                        <div class="mb-md-5">
                                        <input  name="cost" type="text"
                                                class="form-control bg-secondary" placeholder="amount cost (Tsh)"
                                                required>
                                        </div>

                                        <div class="mb-md-5">
                                            <textarea maxlength="" name="description" type="text"
                                                class="form-control bg-secondary" placeholder="post description"
                                                required></textarea>
                                            <div class="">
                                                <button onclick="submit()" type="submit"
                                                    class="btn btn-sm btn-secondary btn-block mt-2 mb-5">post</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>



    @endsection
