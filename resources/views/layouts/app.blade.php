<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ 'smartBuilding' }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/lodash/4.17.4/lodash.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue2-filters/dist/vue2-filters.min.js"></script>

    <!--Moment.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @yield('third_party_stylesheets')

    @stack('page_css')

    <style>
        body {
            font-family: 'Nunito';
        }

    </style>

    <link href="{{ asset('css/styleLogin.css') }}" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed bg-dark">
    <div id="app" class="wrapper">
        <!-- Main Header -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light sticky-top">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="" role="button">
                        <timer></timer>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav d-md-none d-inline" style="position:absolute; right:60px; top:0px;">
                <li class="nav-link">
                    <a type="button" class="nav-link" data-toggle="collapse" data-target="#sideBarHomePage"> <span
                            class="fas fa-bars"></span> </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">

                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span class="d-none d-md-inline mr-2 text-secondary">{{ Auth::user()->firstName }}
                            {{ Auth::user()->lastName }}</span>

                        @if (auth()->user()->avartar)
                            <img src=" {{ asset('/storage/images/' . auth()->user()->avartar) }} "
                                class="user-image img-circle elevation-2" alt="User Image">
                        @else
                            <img src=" {{ asset('/storage/images/defaultAvatar.png') }} "
                                class="user-image img-circle elevation-2" alt="User Image">
                        @endif

                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <!-- User image -->
                        <li class="user-header bg-dark">
                            @if (auth()->user()->avartar)
                                <img src=" {{ asset('/storage/images/' . auth()->user()->avartar) }} "
                                    class="user-image img-circle elevation-2" alt="User Image">
                            @else
                                <img src=" {{ asset('/storage/images/defaultAvatar.png') }} "
                                    class="user-image img-circle elevation-2" alt="User Image">
                            @endif

                            <p class="text-secondary">
                                {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
                                <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer sticky-top bg-secondary">
                            <a href="#" class="btn btn-outline-dark btn-flat">Profile</a>
                            <a href="#" class="btn btn-outline-dark btn-flat float-right"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-dark">
            <section class="content">
                @yield('content')
            </section>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer text-center bg-dark fixed-bottom">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2021 <a href=" {{ route('home') }} "
                    class="text-info">smartBuilding</a>.</strong> All rights
            reserved.
        </footer>
    </div>

    <script src="{{ mix('js/app.js') }}" defer></script>

    @yield('third_party_scripts')

    @stack('page_scripts')

    <!-- changing acctive states of nav-links on sidebar -->
    <script>
        $(document).ready(function() {
            $(".nav .nav-link").on("click", function() {
                $(".nav").find(".active").removeClass("active");
                $(this).addClass("active");
            });
        });

    </script>


</body>


<script>
    // MESSAGE CODES
    Vue.component('message-box', {
        template: `

        <div>

<div class="container">

    <div class="card bg-dark">
        <div class="card-header d-flex justify-content-center ">
            <div class="flex flex-column">
                <div class="text-secondary">
                    welcome <span class="text-info mx-1">
                        {{ auth()->user()->firstName . ' ' . auth()->user()->middleName . ' ' . auth()->user()->lastName }}
                    </span> to message box
                </div>

                <div class="text-center">
                    <span class="text-secondary"> you currently have </span>
                    <span class="text-info"> 0 </span>
                    <span class="text-secondary">new messages</span>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div>

                <div v-for=" message in myMessages" :key="message.id" class="">

                    @{{ message }}

                </div>

            </div>

        </div>
    </div>

</div>




</div>

          `,

        data: function() {
            return {
                myMessages: [],

            }
        },

        mounted() {

            this.liveRequestsInformation();

        },

        methods: {

            liveRequestsInformation: function() {
                setInterval(() => {

                    this.getAllRequests();

                }, 1000);
            },

            getAllRequests: function() {

                axios.get('/request/requestsCounter/')
                    .then((response) => {

                        console.log(response.data);

                        myMessages = response.data;

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            getAllRequests: function() {

                axios.get('/request/getAllRequests/')
                    .then((response) => {

                        console.log(response.data);

                        myMessages = response.data;

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            // whatToEdit: function(value) {
            //     this.column = value;

            //     if (value == 'profile picture') {
            //         document.getElementById('verify').style.display = 'none';
            //         document.getElementById('inputText1').style.display = 'none';
            //         document.getElementById('inputText2').style.display = 'none';
            //         document.getElementById('editProfile1').style.display = 'block';
            //         document.getElementById('editProfile2').style.display = 'block';
            //     }

            //     if (value != 'profile picture') {
            //         document.getElementById('verify').style.display = 'block';
            //         document.getElementById('inputText1').style.display = 'block';
            //         document.getElementById('inputText2').style.display = 'block';
            //         document.getElementById('editProfile1').style.display = 'none';
            //         document.getElementById('editProfile2').style.display = 'none';
            //     }
            // },

            getPosts: function() {
                axios.get('/posts')
                    .then((response) => {
                        this.chunkedPosts = _.chunk(_.toArray(response.data), 3)
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },


        }
    })

    // END OF MESSAGES CODES


    // EDIT PROFILE CODES
    Vue.component('edit-profile', {
        template: `
     <div>

        <div class="card-body">
            <div class="d-flex justify-content-around">
                <div class="d-flex flex-column">
                    <a v-on:click="whatToEdit( 'first name' )" href="#" class="text-info">first name</a>
                    <a v-on:click="whatToEdit( 'middle name' )" href="#" class="text-info">middle name</a>
                    <a v-on:click="whatToEdit( 'last name' )" href="#" class="text-info">last name</a>
                </div>

                <div class="d-flex flex-column">
                    <a v-on:click="whatToEdit( 'profile picture' )" href="#" class="text-info">profile picture</a>
                    <a v-on:click="whatToEdit( 'email contact' )" href="#" class="text-info">email contact</a>
                    <a v-on:click="whatToEdit( 'mobile contact +255' )" href="#" class="text-info">mobile contact</a>
                </div>

                <div class="d-flex flex-column">
                    <a v-on:click="whatToEdit( 'region' )" href="#" class="text-info">region</a>
                    <a v-on:click="whatToEdit( 'district' )" href="#" class="text-info">district</a>
                    <a v-on:click="whatToEdit( 'street' )" href="#" class="text-info">street</a>
                </div>
            </div>
        </div>

        <div class="card-footer">
             <div class="d-flex justify-content-center flex-column offset-md-3 offset-1">

                <span id="verify" class="text-secondary my-4 font-weight-bold text-center"> @{{ column }} : @{{ verify }} </span>

                <div class="input-group d-flex justify-content-center">

                    <div class="input-group d-flex justify-content-center">
                    <div class="mb-3 mt-2" style="display:none" id="editProfile1">
                        <img id="previewImg" src="" alt="profile Image" style="width: 100px ; height:auto ; overflow:hidden" class="img-circle">
                    </div>

                    <div class="input-group mb-3" style="display:none" id="editProfile2">
                        <input type="file" name="image" class="form-control" ref="file" id="image" placeholder="upload image"
                            onchange="previewFile(this)" style="display:none">

                            <label for="image" class="btn btn-block btn-outline-secondary">Upload profile photo <span class="fas fa-user"></span></label>

                            <button v-on:click=" editProfilePicture() " class="btn btn-sm btn-outline-info float-right" type="button">change</button>

                    </div>
                    </div>

                  <div class="d-flex flex-row">
                    <input id="inputText1" v-model="verify" class="form-control bg-secondary text-center mr-2" type="text" style="height:30px" placeholder="enter change">
                    <button v-on:click="editProfileText()" id="inputText2" class="btn btn-sm btn-outline-info" type="button">change</button>
                  </div>
                </div>

             </div>
        </div>


    </div>

          `,

        data: function() {
            return {
                verify: '',
                column: 'what to edit ?',
                value: '',
                file: '',
            }
        },

        mounted() {

            this.getPosts();
        },

        methods: {

            editProfileText: function() {
                axios.get('/editProfile/editProfileText/' + this.column + '/' + this.verify)
                    .then((response) => {
                        if (response.status == 200) {
                            this.verify = '';
                            this.column = 'what to edit ?';

                            swal("updated successfully !", {
                                button: false,
                                timer: 3000,
                            });
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            editProfilePicture: function() {
                this.file = this.$refs.file.files[0];

                let formData = new FormData();
                formData.append('profilePicture', this.file);

                axios.post('/editProfile/editProfilePicture/', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {

                        swal("updated successfully !", {
                            button: false,
                            timer: 3000,
                        });

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            whatToEdit: function(value) {
                this.column = value;

                if (value == 'profile picture') {
                    document.getElementById('verify').style.display = 'none';
                    document.getElementById('inputText1').style.display = 'none';
                    document.getElementById('inputText2').style.display = 'none';
                    document.getElementById('editProfile1').style.display = 'block';
                    document.getElementById('editProfile2').style.display = 'block';
                }

                if (value != 'profile picture') {
                    document.getElementById('verify').style.display = 'block';
                    document.getElementById('inputText1').style.display = 'block';
                    document.getElementById('inputText2').style.display = 'block';
                    document.getElementById('editProfile1').style.display = 'none';
                    document.getElementById('editProfile2').style.display = 'none';
                }
            },

            getPosts: function() {
                axios.get('/posts')
                    .then((response) => {
                        this.chunkedPosts = _.chunk(_.toArray(response.data), 3)
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            openPost: function(id) {
                return this.postId = id;
            },

        }
    })

    // END OF EDIT PROFILE CODES



    // POST MY ACCOUNT POSTS CODES
    Vue.component('my-account-post-view', {
        template: `
 <div>

 <div v-for="posts in chunkedPosts" class="d-flex flex-md-row flex-column justify-content-md-between mr-md-2">


    <div v-for="post in posts" :key="post.id" class="mr-md-1 col-md-4 pb-5 mb-5" style="height:230px">
        <!--background covered from seen-->

        <div class="">

            <div class="d-flex flex-column elevation-5"
             style="height:200px ; width:100% ; position:absolute; left:0 ; right:0; cursor:pointer; background-color:black; overflow:hidden">

               <video onclick="this.paused ? this.play() : this.pause();" class="video" loop="" v-if=" post . mediaType == 'video' " width="100%" height="100%" :poster=" path + post.poster " posterWidth="100%" posterHeight="100%":src="path + post.post" ></video>

               <img class="mt-2" v-if=" post . mediaType == 'image' " :src=" path + post.post" width="100%" height="auto" />

               <span class="text-muted font-weight-bold d-none" style="position:absolute ; top:0; right:2px"> @{{ post . mediaType }} </span>

           </div>
        </div>

        <div id="overlay" class="col-md-9">
             <span id="close" class="fas fa-times" onclick="off()"
               style="position: absolute ; top:1px ; right:1px ; cursor: pointer;">
             </span>

             <div class=" text-secondary">

             </div>
        </div>

        <div style="position:absolute; bottom:0 ; left:0 ; top:175px ;"
            class="col-12">

            <div class="mt-4 text-cyan text-center" style="font-size: 14px"> @{{ post . description }} </div>

            <div class="d-flex flex-row mr-2 elevation-1 justify-content-center">

                <button v-on:click=" deletePost( post . id ); " style="color:black" class="btn btn-sm mr-1" id="like"><span class="fas fa-trash-alt">
                            {{ 'delete' }} </span> </button>



            </div>
        </div>

    </div>

  </div>


</div>

      `,

        data: function() {
            return {
                chunkedPosts: [],
                postId: '',
                path: '/storage/uploads/',
            }
        },

        mounted() {

            this.livePostInformation();

        },

        methods: {

            livePostInformation: function() {
                setInterval(() => {

                    this.getPosts();

                }, 1000);
            },

            deletePost: function(postId) {

                axios.patch('/posts/deletePost/' + postId)
                    .then((response) => {

                        this.chunkedPosts = _.chunk(_.toArray(response.data), 3)
                        // console.log(this.chunkedPosts)

                    })
                    .catch(function(error) {
                        console.log(error);
                    })

            },

            getPosts: function() {
                axios.get('/posts/forSpecificUser')
                    .then((response) => {

                        this.chunkedPosts = _.chunk(_.toArray(response.data), 3)
                        // console.log(this.chunkedPosts)

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            openPost: function(id) {
                return this.postId = id;
            },

        }
    })

    // END OF MY ACCOUNT POSTS VIEW


    //MY RATING CODE
    Vue.component('rate', {
        template: `
 <div>

    <span style="cursor: pointer;" class="text-secondary mr-md-5">
        3.5 : <span id="div1" class="fa" style="color:#ffc107"></span>
                                </span>

</div>

      `,

        data: function() {
            return {

            }
        },

        mounted() {

            this.startInterval();

        },

        methods: {

            startInterval: function() {
                setInterval(() => {

                    this.ratestar();

                }, 3000);
            },

            ratestar: function() {
                var a;
                a = document.getElementById("div1");
                a.innerHTML = "&#xf006;";
                setTimeout(function() {
                    a.innerHTML = "&#xf123;";
                }, 1000);
                setTimeout(function() {
                    a.innerHTML = "&#xf005;";
                }, 2000);
            },

        }
    })

    // END OF MY RATING CODE




    //MY ACCOUNT POSTING CODE
    Vue.component('myaccount', {
        template: `
 <div>



            <div class="card-body">
                <div class="d-flex flex-column">
                    <span class="d-flex justify-content-between">
                        <span class="d-flex flex-column">
                            <span class="text-info">full name</span>
                            <span class="text-secondary"> @{{ user . firstName }} @{{ user . middleName }} @{{ user . lastName }}
                                 </span>
                        </span>
                        <span class="d-flex flex-column">
                            <span class="text-info">archtecture</span>
                            <span v-if=" user.archtecture === '1' "
                                    class="text-secondary">yes</span>
                            <span v-if=" user.archtecture === '0' "
                                    class="text-secondary">no</span>
                        </span>
                        <span class="d-flex flex-column">
                            <span class="text-info">engineer</span>
                            <span v-if=" user.houseBuilder === '1' "
                                    class="text-secondary">yes</span>
                            <span v-if=" user.houseBuilder === '0' "
                                    class="text-secondary">no</span>
                        </span>
                        <span class="d-flex flex-column">
                            <span class="text-info">seller</span>
                            <span v-if=" user.seller === '1' "
                                    class="text-secondary">yes</span>
                            <span v-if=" user.seller === '0' "
                                    class="text-secondary">no</span>
                        </span>
                    </span>

                    <span class="my-4">

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="email">
                                    <button class="accordion-button collapsed btn-sm btn-dark text-secondary" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        email contact
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse bg-dark"
                                    aria-labelledby="email" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-secondary"> @{{ user . email }} </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-dark">
                                <h2 class="accordion-header" id="mobileContact">
                                    <button class="accordion-button collapsed btn-sm btn-dark text-secondary" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        mobile contact
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse bg-dark"
                                    aria-labelledby="mobileContact" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-secondary"> +255-@{{ user . phone }} </div>
                                </div>
                            </div>

                        </div>

                    </span>

                </div>
            </div>


</div>

      `,

        data: function() {
            return {
                user: [],
                picked: '',
                status: '',
                description: '',
                fileName: '',
                userStatus: '',
                first: false,
            }
        },

        mounted() {

            this.getUserStatus();
            this.getUser();

        },

        methods: {

            startIntervalUserInfo: function() {
                setInterval(() => {

                    this.getUserStatus();
                    this.getUser();

                }, 1000);
            },

            getUser: function() {
                axios.get('/userInfo')
                    .then((response) => {
                        this.user = response.data[0];
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            handleFileUpload() {
                this.file = this.$refs.file.files[0];
            },

            getUserStatus: function() {
                axios.get('/posts/getUserStatus')
                    .then((response) => {
                        this.userStatus = response.data;
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            archtecture: function() {
                this.status = 'archtecture';
            },

            seller: function() {
                this.status = 'seller';
            },

            houseBuilder: function() {
                this.status = 'houseBuilder';
            },

            startInterval: function() {
                setInterval(() => {

                    this.ratestar();

                }, 3000);
            },

            ratestar: function() {
                var a;
                a = document.getElementById("div1");
                a.innerHTML = "&#xf006;";
                setTimeout(function() {
                    a.innerHTML = "&#xf123;";
                }, 1000);
                setTimeout(function() {
                    a.innerHTML = "&#xf005;";
                }, 2000);
            },

        }
    })

    // END OF MY ACCOUNT POSTING CODE


    // POST PAGE VIEW CODES
    Vue.component('post-view', {
        template: `
 <div>

    <div class="col-12">
            <span class="float-left col-md-10 elevation-3 shadow-lg text-center pt-3" style="background-image: linear-gradient(to left, #6c757d , #343a40)">

                <div>
    <div v-for="posts in chunkedPosts" class="d-flex flex-md-row flex-column justify-content-md-between mr-md-2">


    <div v-for="post in posts" :key="post.id" class="mr-md-1 col-md-4 pb-5 mb-5" style="height:230px">
        <!--background covered from seen-->

        <div v-on:click="openPost(post.post)" class="d-flex flex-column elevation-5"
            style="height:200px ; width:100% ; position:absolute; left:0 ; right:0; cursor:pointer; background-color:black; overflow:hidden;">

            <video id="videoElement" onclick="this.paused ? this.play() : this.pause();" class="video" loop="" v-if=" post . mediaType == 'video' " width="100%" height="100%" :poster=" path + post.poster " posterWidth="100%" posterHeight="100%":src="path + post.post"></video>

            <img class="mt-2" v-if=" post . mediaType == 'image'" :src=" path + post.post" width="100%" height="auto" />

            <span class="text-muted font-weight-bold" style="position:absolute ; top:0; right:2px"> @{{ post . mediaType }} </span>

        </div>



        <div id="overlayForUserAccount" class="col-md-9">
             <span id="close" class="fas fa-times" v-on:click=" limitLivedataToFalse(); " onclick="offUserSearch() ; hideRequestForm();"
               style="position: absolute ; top:0 ; right:20px ; cursor: pointer; z-index:1">
             </span>


    <div class="container">


        <div class="card bg-dark">
            <div class="card-header">
                <div>
                    <span class="d-flex flex-fill justify-content-md-between">
                        <a href="#" class="">
                            <img v-if=" user.avartar " :src=" 'storage/images/' + user.avartar "
                                class="user-image img-circle elevation-2" alt="User Image" style="width:100px">

                                <img v-else :src=" 'storage/images/' + 'defaultAvatar.png' "
                                class="user-image img-circle elevation-2" alt="User Image" style="width:100px">
                        </a>

                        <div class="w-100">
                            <div class="mb-3">
                                <span class="d-flex justify-content-around mb-2">
                                    <span v-if=" user.posts " style="cursor: pointer;" class="text-secondary"> @{{ user . posts . length }} : <span
                                            class="text-info">posts</span> </span>
                                    <span style="cursor: pointer;" class="text-secondary"> @{{ userLikes }} : <span
                                            class="text-info">likes</span> </span>
                                    <rate></rate>
                                </span>

                                <span v-if=" limitRatings == 0 " v-on:mouseover=" rate(); " class="d-flex justify-content-center mt-2 text-secondary" style="cursor: pointer;">
                                    <i id="stopRating1" class="fa fa-star" data-index="0"></i>
                                    <i id="stopRating2" class="fa fa-star" data-index="1"></i>
                                    <i id="stopRating3" class="fa fa-star" data-index="2"></i>
                                    <i id="stopRating4" class="fa fa-star" data-index="3"></i>
                                    <i id="stopRating5" class="fa fa-star" data-index="4"></i>
                                </span>
                            </div>

                            <span class="d-flex justify-content-center mx-md-5 mx-3 mt-2">
                                <span onclick="showRequestForm();" class="btn btn-block btn-sm btn-outline-secondary"> <span
                                        class="spinner-grow spinner-grow-sm mr-2"></span> request service </span>
                            </span>
                        </div>

                    </span>
                </div>

            </div>


            <div class="card-body">
                <div class="d-flex flex-column">
                    <span class="d-flex justify-content-between">
                        <span class="d-flex flex-column">
                            <span class="text-info">full name</span>
                            <span class="text-secondary"> @{{ user . firstName }} @{{ user . middleName }} @{{ user . lastName }}
                                 </span>
                        </span>
                        <span class="d-flex flex-column">
                            <span class="text-info">archtecture</span>
                            <span v-if=" user.archtecture === '1' "
                                    class="text-secondary">yes</span>
                            <span v-if=" user.archtecture === '0' "
                                    class="text-secondary">no</span>
                        </span>
                        <span class="d-flex flex-column">
                            <span class="text-info">engineer</span>
                            <span v-if=" user.houseBuilder === '1' "
                                    class="text-secondary">yes</span>
                            <span v-if=" user.houseBuilder === '0' "
                                    class="text-secondary">no</span>
                        </span>
                        <span class="d-flex flex-column">
                            <span class="text-info">seller</span>
                            <span v-if=" user.seller === '1' "
                                    class="text-secondary">yes</span>
                            <span v-if=" user.seller === '0' "
                                    class="text-secondary">no</span>
                        </span>
                    </span>

                    <span class="my-4">

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="email">
                                    <button class="accordion-button collapsed btn-sm btn-dark text-secondary" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        email contact
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse bg-dark"
                                    aria-labelledby="email" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-secondary"> @{{ user . email }} </div>
                                </div>
                            </div>
                            <div class="accordion-item bg-dark">
                                <h2 class="accordion-header" id="mobileContact">
                                    <button class="accordion-button collapsed btn-sm btn-dark text-secondary" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        mobile contact
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse bg-dark"
                                    aria-labelledby="mobileContact" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body text-secondary"> +255-@{{ user . phone }} </div>
                                </div>
                            </div>

                        </div>

                    </span>

                </div>
            </div>

            <div class="card-footer">

              <div class="">

                <div class="d-flex flex-column my-4 col-md-6 col-10 offset-md-1" style="position:fixed; top:350px;">

                    <div class="d-flex flex-row mr-2 mt-5">
                    <textarea id="myRequest" v-model="myRequest" rows="4" cols="4" class="form-control bg-secondary text-center mr-3" style="height:120px ; display:none; " placeholder="please put your request and your contacts"></textarea>
                    <button id="requestButton" onclick="hideRequestForm();" v-on:click=" sendRequest( user.id ) " class="btn btn-sm btn-outline-info" style="display:none;" type="button">send</button>
                    </div>

                 </div>

            </div>

            </div>


        </div>
    </div>


        </div>




        <div id="overlay" class="col-md-9">
             <span id="close" class="fas fa-times" onclick="off();"
               style="position: absolute ; top:0 ; right:5px ; cursor: pointer;">
             </span>

             <div class="d-flex flex-column elevation-5"
            style="height:auto ; width:100% ; position:absolute; left:0; right:0; cursor:pointer; background-color:black; z-index: -2">

            <div class="d-flex justify-content-center" style="">
                <div id="videoPost" class="d-flex justify-content-center"> <video onclick="this.paused ? this.play() : this.pause();" class="video" loop="" v-if=" postInDetail . mediaType == 'video' " width="100%" height="100%" :poster=" path + postInDetail.poster " posterWidth="100%" posterHeight="100%":src="path + postInDetail.post"></video> </div>

                <div id="imagePost" class=""> <img class="mt-2" v-if=" postInDetail.mediaType == 'image'" :src=" path + postInDetail.post" width="100%" height="auto" /> </div>
            </div>

            <span class="text-muted font-weight-bold" style="position:absolute ; top:0; left:2px"> @{{ postInDetail . mediaType }} </span>

            </div>

            <div id="postDetails" class="mb-5 pb-5" style="height:100%">

                    <div class="mt-3 d-flex flex-row justify-content-between">
                    <p class="text-secondary ml-1"> posted <span class="text-primary"> @{{ formatDate(postInDetail . created_at) }} </span> by <a onclick="onUserSearch();" v-on:click=" searchUser( postInDetail ) ; " style="cursor:pointer" class="text-primary"> @{{ postInDetail . sender_name }} </a> </p>
                    <p v-if=" postInDetail " class=" text-primary "> <span class="text-secondary"> received </span> @{{ postInDetail . likes . length }} : <span class="text-secondary mr-md-3 mr-3"> @{{ (postInDetail . likes . length) | pluralize('like') }} </span> </p>
                    </div>

                    <div onclick="makeComment();" class="col-12 mr-3" style="cursor:pointer"> <a class="text-muted">make a comment ? </a> </div>

                    <div class="d-flex flex-column my-4 col-md-6 offset-md-1" style="position:fixed; top:350px;">
                    <span id="commentScreen" style="display:none ; background-color: rgba(0, 0, 0, 0.1)" class="my-3 mr-3 text-muted"> @{{ myComment }} </span>

                    <div class="d-flex flex-row mr-2">
                    <textarea v-model="myComment" id="putComment" rows="4" class="form-control bg-secondary text-center mr-3" style="height:30px ; display:none;" placeholder="type a comment"></textarea>
                    <button id="addComent" v-on:click=" sendPost() " onclick="hideComment();" class="btn btn-sm btn-outline-info" style="display:none;" type="button">send</button>
                    </div>
                    </div>


                <div v-for="getMyComment in getMyComments" class="my-3">

                   <div v-if=" getMyComment . comment_id == '0' " class="d-flex flex-column">

                    <div class="d-flex flex-row">
                        <p class="mr-3"> <p class="mr-1 text-secondary"> commented by </p> <p class="text-primary"> @{{ getMyComment . sender_name }} </p> </p>
                        <p class="ml-3 text-primary"> @{{ formatDate(getMyComment . created_at) }} </p>
                    </div>

                    <div class=" text-left ml-4 font-weight-bold text-secondary ">
                         @{{ getMyComment . body }}
                    </div>

                    <div class="text-right mr-5">
                        <a v-on:click=" deleteCommentAndReply( getMyComment. id ) " v-if=" getMyComment.user_id == userId " class="text-secondary" style="cursor:pointer;"> delete </a>
                        <a v-on:click=" holdMyCommentIdFunction(getMyComment.id) "  onclick="makeCommentReply();"class="text-secondary ml-2" style="cursor:pointer;"> reply </a>

                        <div class="d-flex flex-column my-4 col-md-6 offset-md-1" style="position:fixed; top:350px;">
                        <span id="commentReplyScreen" style="display:none ; background-color: rgba(0, 0, 0, 0.1)" class="my-3 mr-3 text-muted text-center"> @{{ myCommentReply }} </span>

                        <div class="d-flex flex-row mr-2">
                            <textarea v-model="myCommentReply" id="putCommentReply" rows="4" class="form-control bg-secondary text-center mr-3" style="height:30px ; display:none;" placeholder="type a reply"></textarea>
                            <button id="addComentReply" v-on:click=" sendCommentReply( getMyComment.id ) " onclick="hideCommentReply();" class="btn btn-sm btn-outline-info" style="display:none;" type="button"> send </button>
                        </div>
                        </div>

                    </div>

                   </div>



                          <div v-for="getMyCommentreply in getMyComment.replies" class="my-3 ml-4">

                             <div class="d-flex flex-column">

                                 <div class="d-flex flex-row">
                                       <p class="mr-3"> <p class="mr-1 text-secondary"> commented by </p> <p class="text-primary"> @{{ getMyCommentreply . sender_name }} </p> </p>
                                       <p class="ml-3 text-primary"> @{{ formatDate(getMyCommentreply . created_at) }} </p>
                                 </div>

                                 <div class=" text-left ml-4 font-weight-bold text-secondary ">
                                       @{{ getMyCommentreply . body }}
                                 </div>

                                 <div class="text-right mr-5">

                                       <a v-on:click=" deleteCommentAndReply( getMyCommentreply. id ) " v-if=" getMyCommentreply.user_id == userId " class="text-secondary" style="cursor:pointer;"> delete </a>

                                </div>

                             </div>

                          </div>


                </div>

                <p class="text-info mt-5 pt-5 mb-5 pb-5">smartBuilding</p>

        </div>

        </div>

        <div style="position:absolute; bottom:0 ; left:0 ; top:175px ;"
            class="col-12">
            <div class="mt-4 text-cyan text-center" style="font-size: 14px ; text-overflow: ellipsis ; white-space: nowrap ; overflow: hidden;"> @{{ post . description }} </div>
            <div class="d-flex flex-row mr-2 elevation-1 justify-content-center">
                <button v-on:click="likePost( post . id );" style="color:black" class="btn btn-sm" id="like"><span class="fas fa-hand-holding-heart">
                             {{ 'like' }} </span> </button>

                            <button v-on:click="unlikePost( post . id );" style="color:black" class="btn btn-sm" id="unlike"><span class="fas fa-heart-broken">
                            {{ 'unlike' }} </span> </button>

                            <a href="#" class="btn btn-sm text-primary"> @{{ post . likes . length }} <span v-if=" post.likes.length > 1 || post.likes.length == 0 " class="font-weight-bold ml-1" style="color:black"> @{{ ': likes' }} </span> <span v-if=" post.likes.length == 1 "class="font-weight-bold" style="color:black"> @{{ ': like' }} </span> </a>

                            <button v-on:click=" postInDetailFunction( post . id ) ; getMyCommentFunction( post . id ) ;" style="color:black" onclick="on()" class="btn btn-sm font-weight-bold" id="comment">
                            {{ 'more' }} </button>
            </div>
        </div>

    </div>

  </div>

</div>

<div class="pt-3 text-info"> {{ 'smartBuilding' }} </div>
</span>
<div class="float-right bg-dark col-md-2 col-5">

    <div class="pl-sm-3 d-md-inline collapse" style="position:fixed; top:70px" id="sideBarHomePage">

<div class="d-flex flex-md-row flex-column mt-sm-1 mr-md-3" style="width:55%">
    <input v-model="search" style="height:35px; width:140px" type="text" name="search" placeholder="Search posts..."
        class="form-control bg-secondary border-dark text-center rounded">
    <button v-on:click=" searchPost() " class="btn btn-secondary btn-sm ml-md-1" style="width:40px"><i
            class="fas fa-search"></i></button>
</div>


<div class="mt-3">
<div class="mb-2">
    <span>
        <a v-on:click="postCategory( 'region' )" href="#">Around me</a>
    </span>
</div>

<div class="mb-2">
    <span>
        <a v-on:click="postCategory( 'archtecture' )" href="#" ><span class="fas fa-map mr-1"></span>Architecture posts</a>
    </span>
</div>

<div class="mb-2">
    <span>
        <a v-on:click="postCategory( 'houseBuilder' )" href="#" ><span class="fas fa-building mr-1"></span>Engineer posts</a>
    </span>
</div>

<div class="mb-2">
    <span>
        <a v-on:click="postCategory( 'seller' )" href="#" ><span class="fas fa-shopping-cart mr-1"></span>Material seller posts</a>
    </span>
</div>

</div>
</div>

</div>
</div>

</div>

      `,

        data: function() {
            return {
                chunkedPosts: [],
                chunkedPostsForSearchedUser: [],
                postId: '',
                path: '/storage/uploads/',
                search: '',
                searchPostIsOn: false,
                userId: '',
                postInDetail: '',
                postCategoryIsOn: false,
                postCategoryHistoryValue: '',
                postSearchHistoryValue: '',
                myComment: '',
                getMyComments: [],
                postIdForComment: '0',
                myCommentReply: '',
                holdMyCommentId: '',
                user: [],
                userLikes: '',
                idForTheRatedUser: '',
                limitRatings: '',
                myRequest: '',
                limitLivedata: false,
            }
        },

        mounted() {

            this.liveUserInfo();

        },

        methods: {

            liveUserInfo: function() {
                setInterval(() => {

                    this.getPosts();
                    this.getMyCommentFunction(this.postIdForComment);
                    this.liveAuthenticatedUserId();

                    this.idForTheRatedUser = this.user.id;

                    if (this.user.id && this.limitLivedata == false) {

                        this.limitUserRating(this.user.id);
                    }
                    console.log(this.limitLivedata);

                }, 1000);
            },

            formatDate: function(time) {

                return moment(time).fromNow();

            },

            limitLivedataToFalse: function() {

                if( this.limitLivedata == true ){

                    this.limitLivedata = false;

                document.getElementById("stopRating1").style.display = "block";
                document.getElementById("stopRating2").style.display = "block";
                document.getElementById("stopRating3").style.display = "block";
                document.getElementById("stopRating4").style.display = "block";
                document.getElementById("stopRating5").style.display = "block";
                
                }

            },

            sendRequest: function(userId) {

                let formData = new FormData();

                formData.append('service_provider_id', userId);

                formData.append('body', this.myRequest);

                axios.post('/request/makeRequest/', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {

                        this.myRequest = '';
                        console.log(response.data);


                    })
                    .catch(function(error) {
                        console.log(error);
                    })

            },

            getPostsForSearchedUser: function(userId) {

                axios.get('/posts/getPostsForSearchedUser/' + userId)
                    .then((response) => {

                        this.chunkedPostsForSearchedUser = _.chunk(_.toArray(response.data), 3)


                    })
                    .catch(function(error) {
                        console.log(error);
                    })

            },

            limitUserRating: function(rated_user_id) {

                axios.get('/posts/limitUserRating/' + rated_user_id)
                    .then((response) => {

                        this.limitRatings = response.data.length;

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            rate: function() {

                var rateIndex = -1;

                let VUEthis = this;

                $('.fa-star').on('click', function() {
                    rateIndex = parseInt($(this).data('index'));

                    var currentIndex = parseInt($(this).data('index'));

                    starRate(rateIndex);

                    for (var i = 0; i <= currentIndex; i++)
                        $('.fa-star:eq(' + i + ')').css('color', '#ffc107');

                })

                $('.fa-star').mouseover(function() {
                    resetStarColors();
                    console.log('in');

                    var currentIndex = parseInt($(this).data('index'));

                    for (var i = 0; i <= currentIndex; i++)
                        $('.fa-star:eq(' + i + ')').css('color', '#ffc107');

                })

                $('.fa-star').mouseleave(function() {
                    resetStarColors();
                    console.log('out');

                    if (rateIndex != -1) {
                        for (var i = 0; i <= rateIndex; i++)
                            $('.fa-star:eq(' + i + ')').css('color', '#ffc107');
                    }
                })

                function resetStarColors() {
                    $('.fa-star').css('color', '#6c757d');
                }

                function starRate(index) {

                    VUEthis.limitLivedata = true;

                    let _token = $('meta[name="csrf-token"]').attr('content');
                    index = index + 1;
                    $.ajax({
                        url: '/account/rate',
                        type: "POST",
                        data: {
                            'index': index,
                            _token: _token,
                            'idForTheRatedUser': VUEthis.user.id,
                        },
                        success: function(data) {

                            console.log(data);

                            document.getElementById("stopRating1").style.display = "none";
                            document.getElementById("stopRating2").style.display = "none";
                            document.getElementById("stopRating3").style.display = "none";
                            document.getElementById("stopRating4").style.display = "none";
                            document.getElementById("stopRating5").style.display = "none";
                        }
                    });
                }

            },

            searchUser: function(postDetail) {

                this.limitUserRating(postDetail.user_id);

                this.getPostsForSearchedUser(postDetail.user_id);

                axios.get('/account/postUserLikesCounter/' + postDetail.user_id)
                    .then((response) => {

                        this.userLikes = response.data;

                    })
                    .catch(function(error) {
                        console.log(error);
                    })

                axios.get('/account/searchUser/' + postDetail.user_id)
                    .then((response) => {

                        this.user = response.data[0];

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            liveAuthenticatedUserId: function() {

                axios.get('/posts/liveAuthenticatedUserId')
                    .then((response) => {

                        this.userId = response.data;

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            deleteCommentAndReply: function(commentOrReplyId) {

                axios.patch('/posts/deleteCommentAndReply/' + commentOrReplyId)
                    .then((response) => {

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            holdMyCommentIdFunction: function(commentId) {

                this.holdMyCommentId = commentId;

            },

            getMyCommentFunction: function(post_id) {

                this.postIdForComment = post_id;

                axios.get('/posts/getMyComment/' + post_id)
                    .then((response) => {

                        this.getMyComments = response.data;

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            sendCommentReply: function(getMyCommentId) {

                if (this.myCommentReply == '') {
                    return;
                }

                let formData = new FormData();

                formData.append('comment_id', this.holdMyCommentId);

                formData.append('myComment', this.myCommentReply);

                formData.append('post_id', this.postIdForComment);

                axios.post('/posts/makeCommentReply/', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {

                        console.log(response.data);

                        this.myCommentReply = '';

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            sendPost: function() {

                if (this.myComment == '') {
                    return;
                }

                let formData = new FormData();

                formData.append('post_id', this.postInDetail.id);

                formData.append('myComment', this.myComment);

                axios.post('/posts/makeComment/', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {

                        console.log(response.data);

                        this.myComment = '';

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            postInDetailFunction: function(post_id) {

                axios.get('/posts/postInDetail/' + post_id)
                    .then((response) => {

                        this.postInDetail = response.data[0];

                    })
                    .catch(function(error) {
                        console.log(error);
                    })

            },

            unlikePost: function(post_id) {

                let formData = new FormData();

                formData.append('post_id', post_id)

                axios.post('/posts/unlikePost/', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {
                        console.log(response.data);

                        if (this.postCategoryIsOn == true) {

                            this.postCategory(this.postCategoryHistoryValue);

                            console.log('category history');
                        }

                        if (this.searchPostIsOn == true) {

                            this.postSearchHistory();

                            console.log('search history');
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            likePost: function(post_id) {
                let formData = new FormData();

                formData.append('post_id', post_id)

                axios.post('/posts/likePost/', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then((response) => {
                        console.log(response.data);

                        if (this.postCategoryIsOn == true) {

                            this.postCategory(this.postCategoryHistoryValue);

                            console.log('category history');
                        }

                        if (this.searchPostIsOn == true) {

                            this.postSearchHistory();

                            console.log('search history');
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            searchPost: function() {

                this.searchPostIsOn = true;

                this.postCategoryIsOn = false;

                this.postSearchHistoryValue = this.search;

                if (this.search == '') {
                    return;
                }

                axios.get('/posts/searchPost/' + this.search)
                    .then((response) => {

                        this.chunkedPosts = _.chunk(_.toArray(response.data), 3)

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            postSearchHistory: function() {

                axios.get('/posts/searchPost/' + this.postSearchHistoryValue)
                    .then((response) => {

                        this.chunkedPosts = _.chunk(_.toArray(response.data), 3)

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            postCategory: function(filter) {

                this.postCategoryIsOn = true;

                this.searchPostIsOn = false;

                this.postCategoryHistoryValue = filter;

                console.log(this.postCategoryHistoryValue);

                axios.get('/posts/postCategory/' + filter)
                    .then((response) => {

                        console.log(this.postCategoryHistoryValue);

                        console.log(response.data);

                        this.chunkedPosts = _.chunk(_.toArray(response.data), 3)

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            postCategoryHistory: function(historyValue) {

                axios.get('/posts/postCategory/' + historyValue)
                    .then((response) => {

                        console.log(response.data);

                        this.chunkedPosts = _.chunk(_.toArray(response.data), 3)

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            getPosts: function() {

                axios.get('/posts')
                    .then((response) => {

                        if (this.postCategoryIsOn == false && this.searchPostIsOn == false) {

                            this.chunkedPosts = _.chunk(_.toArray(response.data), 3)

                        }

                    })
                    .catch(function(error) {
                        console.log(error);
                    })

            },

            openPost: function(id) {
                return this.postId = id;
            },

        }
    })

    // END OF POST PAGE VIEW


    // TIMER VIEW CODE
    Vue.component('timer', {
        template: `
 <div>

    <span> @{{ time }} </span>

</div>

      `,

        data: function() {
            return {
                time: '',
            }
        },

        mounted() {

            this.startInterval();

        },

        methods: {

            startInterval: function() {
                setInterval(() => {

                    this.timer();

                }, 1000);
            },

            timer: function() {
                this.time = moment().format('MMMM Do YYYY, h:mm:ss a');
            },

        }
    })

    // END TIME VIEW CODE


    // MANAGEMENT PAGE VIEW CODES
    Vue.component('manageview', {
        template: `
      <div>


        <div class="card-header bg-dark" style="position:fixed;right:0 ; left:0 ; top:55px;">

                {{-- search box --}}

                <div class="ml-5 mr-4 d-flex flex-row justify-content-md-between justify-content-between">

                <div class="d-md-block d-none font-weight-bold ml-5">

                  <div id="counters" class="ml-5">

                <span style="cursor:pointer" class="text-info mr-1"><a v-on:click="userSearch('customer');"
                        class="text-secondary">{{ 'users : ' }}</a>
                    @{{ userCount . countCustomer }} </span>
                <span style="cursor:pointer" class="text-info mr-1"><a v-on:click="userSearch('archtecture');"
                        class="text-secondary">{{ 'architectures : ' }}</a>
                    @{{ userCount . countArchtecture }} </span>
                <span style="cursor:pointer" class="text-info mr-1"><a v-on:click="userSearch('seller');"
                        class="text-secondary">{{ 'sellers : ' }}</a>
                    @{{ userCount . countSeller }} </span>
                <span style="cursor:pointer" class="text-info mr-1"><a v-on:click="userSearch('houseBuilder');"
                        class="text-secondary">{{ 'houseBuilders : ' }}</a>
                    @{{ userCount . countHouseBuilder }} </span>
                <span style="cursor:pointer" class="text-info mr-1"><a v-on:click="userSearch('block');" class="text-secondary">{{ 'blocked : ' }}</a>
                    @{{ userCount . countBlock }} </span>

                   </div>
                </div>


                <div class="ml-md-5 mt-md-0 mt-2">

                     <span onclick="table2On()" class="fas fa-bell" id="notification" data-toggle="tooltip" data-placement="top" title="new requests !">
                         <span class="text-secondary"> :
                            </span> <span class="text-info"> @{{ notificationCounter }}
                         </span>
                    </span>

                    <span onclick="table2Off()" class="fas fa-times ml-md-5 ml-2" style="cursor: pointer; display :none;" id="notificationClose" data-toggle="tooltip" data-placement="top" title="close !"></span>

                </div>

                        <div class="d-flex flex-row">
                            <input type="text" v-model="search.filter" class="mr-2 form-control bg-secondary border-dark text-center rounded" style="width:160px"
                             placeholder="Search customers...">
                            <button v-on:click="userSearch(search.filter)" class="btn btn-secondary btn-sm mb-1 mt-1"><i class="fas fa-search"></i></button>
                        </div>


                </div>

            </div>

        < class="card-body mt-5">

<div id="table" class="table-responsive-sm mt-5">


    <table class="table table-dark table-hover table-sm table-borderless text-center">
        <thead class="text-secondary">
            <tr>
                <th>First name</th>
                <th id="middleName">Middle name</th>
                <th>Last name</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <tr v-for="user in users" :key="user.id">
                <td> @{{ user . firstName }} </td>
                <td id="middleName"> @{{ user . middleName }} </td>
                <td> @{{ user . lastName }} </td>
                <td>

                    <button v-if="user.block === '0'" class="btn btn-outline-primary btn-sm"
                        v-on:click="block(user.id)">block</button>

                        <button v-if="user.block === '1'" class="btn btn-outline-primary btn-sm"
                            v-on:click="unblock(user.id);">unblock</button>

                </td>
                <td>
                    <button v-on:click="deleteUser(user.id)" class="btn" id="delete"><span class="fas fa-trash-alt"></span></button>
                </td>
            </tr>

        </tbody>

    </table>

</div>


<div class="my-5" style="">

<div id="table2" class="table-responsive-sm" style="display: none">


<span class="d-flex justify-content-center my-1 text-secondary"> Archtectures Requests </span>

<table class="table table-dark table-hover table-sm table-borderless">

<thead class="text-secondary">
    <tr>
        <th>tin number</th>
        <th>nation ID</th>
        <th>certificate</th>
        <th>time</th>
        <th>action</th>
    </tr>
</thead>

<tbody>
    <tr v-for="request in registerRequests.archtectureRequests">

        <td> @{{ request . tinNumber }} </td>
        <td> @{{ request . nationalId }} </td>
        <td id="certificate" v-on:click="getDocument( request . certificate )" onclick="openCertificate()"> @{{ request . certificate }} </td>
        <td> @{{ formatDate(request . created_at) }}</td>
        <td> <button v-on:click=" acceptRequestArchtecture( request . id ) " class="btn btn-sm btn-outline-info">accept</button> </td>

    </tr>

</tbody>

</table>


<span class="d-flex justify-content-center my-1 text-secondary"> Engineers Requests </span>

<table class="table table-dark table-hover table-sm table-borderless">

<thead class="text-secondary">
    <tr>
        <th>tin number</th>
        <th>nation ID</th>
        <th>certificate</th>
        <th>time</th>
        <th>action</th>
    </tr>
</thead>

<tbody>
    <tr v-for="request in registerRequests.builderRequests">

        <td> @{{ request . tinNumber }} </td>
        <td> @{{ request . nationalId }} </td>
        <td id="certificate" v-on:click="getDocument( request . certificate )" onclick="openCertificate()"> @{{ request . certificate }} </td>
        <td> @{{ formatDate(request . created_at) }}</td>
        <td> <button v-on:click=" acceptRequestBuilder( request . id ) " class="btn btn-sm btn-outline-info">accept</button> </td>

    </tr>

</tbody>

</table>


<span class="d-flex justify-content-center my-1 text-secondary"> Sellers Requests </span>

<table class="table table-dark table-hover table-sm table-borderless">

<thead class="text-secondary">
<tr>
    <th>shop name</th>
    <th>shop location</th>
    <th>tin number</th>
    <th>nation ID</th>
    <th>business lisence</th>
    <th>certificate</th>
    <th>time</th>
    <th>action</th>
</tr>
</thead>

<tbody>

<tr v-for="request in registerRequests.sellerRequests">

    <td> @{{ request . shopName }} </td>
    <td> @{{ request . shopLocation }} </td>
    <td> @{{ request . tinNumber }} </td>
    <td> @{{ request . nationalId }} </td>
    <td id="busnessLisence" v-on:click="getDocument( request . busnessLisence )" onclick="openCertificate()"> @{{ request . busnessLisence }} </td>
    <td id="certificate" v-on:click="getDocument( request . certificate )" onclick="openCertificate()"> @{{ request . certificate }} </td>
    <td> @{{ formatDate(request . created_at) }}</td>
    <td> <button v-on:click=" acceptRequestSeller( request . id ) " class="btn btn-sm btn-outline-info">accept</button> </td>

</tr>

</tbody>

</table>

</div>


</div>

<div id="openCertificate" class="col-md-11 mt-5 mb-5 pb-5" onclick="openCertificate">
             <span id="closeCertificate" class="fas fa-times fa-lg" onclick="closeCertificate()" data-toggle="tooltip" data-placement="top" title="close !"
               style="position: absolute ; top:3px ; right:2px ; cursor: pointer;">
             </span>


             <embed :src=" documentUrl " width="100%" height="100%"></embed>

             </div>


</div>


     </div>
      `,

        data: function() {
            return {

                users: [],
                userCount: [],
                search: {},
                notificationCounter: '',
                userSachi: false,
                registerRequests: [],
                documentName: '',
                documentUrl: '',
            }
        },

        mounted() {
            this.getUsers();
            this.countUsers();
            this.notification();
            this.startInterval();
            this.registerRequestsView();
        },

        methods: {

            startInterval: function() {
                setInterval(() => {
                    this.countUsers();
                    this.notification();
                    this.registerRequestsView();
                }, 1000);
            },

            formatDate: function(time) {
                return moment(time).fromNow();
            },

            getDocument: function(name) {

                this.documentName = name;
                this.documentUrl = '/storage/documents/' + name;
            },

            acceptRequestArchtecture: function(acceptRequestId) {
                axios.patch('/manageAccounts/acceptRequest/archtecture/' + acceptRequestId)
                    .then((response) => {
                        console.log();
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            acceptRequestBuilder: function(acceptRequestId) {
                axios.patch('/manageAccounts/acceptRequest/builder/' + acceptRequestId)
                    .then((response) => {
                        console.log();
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            acceptRequestSeller: function(acceptRequestId) {
                axios.patch('/manageAccounts/acceptRequest/seller/' + acceptRequestId)
                    .then((response) => {
                        console.log();
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            registerRequestsView: function() {
                axios.get('/manageAccounts/registerRequests')
                    .then((response) => {
                        this.registerRequests = response.data[0];
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            getUsers: function() {
                axios.get('/manageAccounts/view')
                    .then((response) => {
                        this.users = response.data[0].data.data;
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            countUsers: function() {
                axios.get('/manageAccounts/count')
                    .then((response) => {
                        this.userCount = response.data[0];
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            notification: function() {
                axios.get('/manageAccounts/notificationCounter')
                    .then((response) => {
                        this.notificationCounter = response.data[0].totalNotification;
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            userSearch: function(filter) {

                if (!!filter == false) {
                    this.getUsers();

                    return;
                } else {
                    axios.get('/manageAccounts/search/' + filter)
                        .then((response) => {

                            this.userSachi = true;

                            this.users = response.data;
                        })
                        .catch(function(error) {
                            console.log(error);
                        })
                }
            },

            searchHistory: function() {
                axios.get('/manageAccounts/search/' + this.search.filter)
                    .then((response) => {
                        if (!!(this.search.filter) == false) {
                            this.getUsers();
                        } else {
                            this.users = response.data;
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            blockHistory: function() {
                axios.get('/manageAccounts/blockHistory/' + 'block')
                    .then((response) => {
                        this.users = response.data;
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            deleteUser: function(id) {
                axios.delete('/manageAccounts/delete/' + id)
                    .then((response) => {

                        if (!!(this.search.filter) == true) {
                            this.countUsers();
                            this.searchHistory();
                        } else {
                            this.getUsers();
                            this.countUsers();
                        }

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            block: function(id) {
                axios.patch('/manageAccounts/block/' + id)
                    .then((response) => {
                        if (response.status == 200) {

                            if (typeof(this.search.filter) == 'undefined') {

                                this.getUsers();
                                this.countUsers();

                            } else if (!!(this.search.filter) == true) {

                                this.countUsers();
                                this.searchHistory();

                            }
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            },

            unblock: function(id) {

                axios.patch('/manageAccounts/block/' + id)
                    .then((response) => {

                        if (!!(this.search.filter) == false && (this.userCount.countBlock) > 0 && this
                            .userSachi == true) {

                            this.blockHistory();
                            this.countUsers();
                            console.log('1');

                            this.userSachi = false;
                        } else if (!!(this.search.filter) == true && (this.userCount.countBlock) > 0) {

                            this.countUsers();
                            this.searchHistory();
                            console.log('2');
                        } else if (!!(this.search.filter) == false && (this.userCount.countBlock) >
                            0) {

                            this.countUsers();
                            this.getUsers();
                            console.log('3');
                        } else {

                            this.getUsers();
                            this.countUsers();
                            console.log('4');
                        }

                    })
                    .catch(function(error) {
                        console.log(error);
                    })
            }

        }
    })
    // END OF MANAGEMENT VIEW PAGE CODES

    const app = new Vue({
        el: '#app',

    });

</script>

<script src="{{ asset('js/style.js') }}" defer></script>

<script>
    $("[type=file]").on("change", function() {

        // Name of file and placeholder
        var file = this.files[0].name;

        var dflt = $(this).attr("placeholder");

        if ($(this).val() != "") {

            $(this).next().text(file);

        } else {

            $(this).next().text(dflt);

        }

    });

</script>

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

</html>
