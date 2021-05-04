<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/styleLogout.css') }}" rel="stylesheet">

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="bg-dark" style="font-family: 'Times New Roman', Times, serif">

    <div class="container-fluid" id="app">
        <div class="fixed-top">
            <div class="bg-default">

                {{-- header top --}}
                <div class="d-flex flex-row justify-content-between bg-dark col-12 col-md-9" style="height:60px">
                    <div class="d-flex flex-row ml-3 mt-1">
                        <a href=" {{ url('/') }} " class="">
                            <h6 class="text-info">smart</h6>
                        </a> <a href="{{ url('/') }}" class="pt-2">
                            <h5 class="text-muted">Building</h5>
                        </a>
                    </div>

                    <div class="mt-4">
                        <a href="" class="text-secondary d-md-block d-none">
                            <timer></timer>
                        </a>
                    </div>

                    <div class="mt-1 d-flex mt-3">
                        <a href=" {{ route('login') }} "
                            class="mr-2 mb-1 mt-md-2 mt-3 font-weight-bold text-secondary">Login</a>
                        <a href=" {{ route('register') }} "
                            class="mr-md-5 mb-1 font-weight-bold text-secondary mr-2 mt-md-2 mt-3">Register</a>
                        <button type="button" class="btn btn-outline-secondary mb-1" data-toggle="collapse"
                            data-target="#sideBar"> <span class="fas fa-bars"></span> </button>
                    </div>
                </div>
            </div>

            {{-- end of hearder --}}
        </div>

        <div class="col-12 bg-white">
            <span class="bg-dark float-left col-md-9 shadow-lg text-center mt-1 pt-5" style="min-height:640px">

                {{-- all posts here --}}
                <div>

                    <div id="posts-data" style="background-image: linear-gradient(to right, #6c757d , #343a40)">

                        <div>
                            <post-view></post-view>
                        </div>

                    </div>

                    <p class="mt-5 text-info"> {{ 'smartBuilding' }} </p> {{-- for bringing posts more upwards --}}

                </div>

                {{-- end of all posts here --}}

                {{-- the last part of the page ('footer') --}}
                <div class="elevation-5 mt-2 p-3 fixed-bottom bg-dark">
                    <div class="text-center mr-md-4">
                        <div class="float-right d-none d-sm-block">
                            <b>Version</b> 1.0
                        </div>
                        <strong>Copyright &copy; 2021 <a href=" {{ url('/') }} "
                                class="text-info">smartBuilding</a>.</strong> All rights
                        reserved.
                    </div>
                </div>
                {{-- end of the last part of the page ('footer') --}}

            </span>

        </div>

    </div>

    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/style.js') }}" defer></script>



    <script>
        Vue.component('post-view', {
            template: `
 <div>

    <div v-for="posts in chunkedPosts" class="d-flex flex-md-row flex-column justify-content-md-between mr-md-2">


    <div v-for="post in posts" :key="post.id" class="mr-md-1 col-md-4 pb-5 mb-5" style="height:230px">
        <!--background covered from seen-->

        <div v-on:click="openPost(post.post)" class="d-flex flex-column elevation-5"
            style="height:200px ; width:100% ; position:absolute; left:0 ; right:0; cursor:pointer; background-color:black; overflow: hidden;">

            <video onclick="this.paused ? this.play() : this.pause();" class="video" loop="" v-if=" post . mediaType == 'video' " width="100%" height="100%" :poster=" path + post.poster " posterWidth="100%" posterHeight="100%":src="path + post.post"></video>

            <img class="mt-2" v-if=" post . mediaType == 'image'" :src=" path + post.post" width="100%" height="auto" />

            <span class="text-muted font-weight-bold" style="position:absolute ; top:0; right:2px"> @{{ post . mediaType }} </span>

        </div>

        <div id="overlay" class="col-md-9">
            <span id="close" class="fas fa-times" onclick="off()"
               style="position: absolute ; top:0 ; right:5px ; cursor: pointer; z-index:2">
             </span>

             <div class="d-flex flex-column elevation-5"
            style="height:auto ; width:100% ; position:absolute; left:0; right:0; cursor:pointer; background-color:black;">

            <div class="d-flex justify-content-center" style="">
                <div id="videoPost" class="d-flex justify-content-center"> <video onclick="this.paused ? this.play() : this.pause();" class="video" loop="" v-if=" postInDetail . mediaType == 'video' " width="100%" height="100%" :poster=" path + postInDetail.poster " posterWidth="100%" posterHeight="100%":src="path + postInDetail.post"></video> </div>

                <div id="imagePost" class=""> <img class="mt-2" v-if=" postInDetail.mediaType == 'image'" :src=" path + postInDetail.post" width="100%" height="auto" /> </div>
            </div>

            <span class="text-muted font-weight-bold" style="position:absolute ; top:0; left:2px"> @{{ postInDetail . mediaType }} </span>

            </div>

            <div id="postDetails" class="mb-5 pb-5" style="height:100% ;">

                    <div class="mt-3 d-flex flex-row justify-content-between">
                    <p class="text-secondary ml-1"> posted <span class="text-primary"> @{{ formatDate(postInDetail . created_at) }} </span> by <a onclick="onUserSearch();" v-on:click=" searchUser( postInDetail ) " style="cursor:pointer" class="text-primary"> @{{ postInDetail . sender_name }} </a> </p>
                    <p v-if=" postInDetail " class=" text-primary "> <span class="text-secondary"> received </span> @{{ postInDetail . likes . length }} : <span class="text-secondary mr-md-3 mr-3"> @{{ (postInDetail . likes . length) | pluralize('like') }} </span> </p>
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


                             </div>

                          </div>


                </div>

                <p class="text-info mt-5 pt-5 mb-5 pb-5">smartBuilding</p>

        </div>

        </div>

        <div style="position:absolute; bottom:0 ; left:0 ; top:175px ;"
            class="col-12">
            <div class="mt-4 text-cyan" style="font-size: 14px ; text-overflow: ellipsis ; white-space: nowrap ; overflow: hidden;"> @{{ post . description }} </div>
            <div class="d-flex flex-row mr-2 justify-content-center elevation-1">

                            <a href="/register" style="color:black ; width:150px" class="btn btn-sm" id="unlike">
                            <marquee behavior="scroll" direction="left" scrollamount="2"> {{ 'please register to have full access to smartBuilding' }} </marquee> </span> </a>

                            <button v-on:click=" postInDetailFunction( post . id ) ; getMyCommentFunction( post . id ) ;" style="color:black" onclick="on()" class="btn btn-sm font-weight-bold" id="comment">
                            {{ 'more' }} </button>
            </div>
        </div>

    </div>

  </div>



  <span class="float-right bg-dark col-md-3 col-8">

<div class="pl-2 collapse" style="position:fixed; top:9%" id="sideBar">

        <div class="d-flex flex-row mt-1">
            <input v-model="search" style="height:33px; width:150px" type="text" name="search"
                placeholder="Search posts..." class="form-control bg-secondary border-dark text-center rounded">
            <button v-on:click=" searchPost( search ) " class="btn btn-secondary btn-sm mb-1 ml-md-1 ml-1" style="width:25%"><i
                    class="fas fa-search"></i></button>
        </div>


    <div class="mt-3 text-left">

        <div class="mb-2">
            <span>
                <a v-on:click="postCategory( 'archtecture' )" href="#"><span class="fas fa-map mr-1"></span> Architecture posts</a>
            </span>
        </div>

        <div class="mb-2">
            <span>
                <a v-on:click="postCategory( 'houseBuilder' )" href="#"><span class="fas fa-building mr-1"></span>House builder posts</a>
            </span>
        </div>

        <div class="mb-2">
            <span>
                <a v-on:click="postCategory( 'seller' )" href="#"><span class="fas fa-shopping-cart mr-1"></span>Material seller posts</a>
            </span>
        </div>

    </div>
</div>

</span>

</div>

      `,

            data: function() {
                return {
                    chunkedPosts: [],
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

                    }, 1000);
                },

                formatDate: function(time) {

                    return moment(time).fromNow();

                },

                searchUser: function(postDetail) {

                    axios.get('/account/searchUser/' + postDetail.user_id)
                        .then((response) => {

                            console.log(response.data);

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

                postInDetailFunction: function(post_id) {

                    axios.get('/posts/postInDetail/' + post_id)
                        .then((response) => {

                            this.postInDetail = response.data[0];

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


        const app = new Vue({
            el: '#app',

        });

    </script>

</body>

</html>
