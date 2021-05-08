<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link bg-dark">
        <i class="nav-icon fas fa-home text-info"></i>
        <p class="text-info">Home</p>
    </a>
</li>

<!-- Adding icons to the links using the .nav-icon class with font-awesome or any other icon font library -->


<li class="nav-item has-treeview active menu-open">
    <a href="#" class="nav-link">

        <p class="text-info">
            {{ auth()->user()->email }}
        </p>
    </a>
    <ul class="nav nav-treeview">

        {{-- if user is an adminstrator --}}

        @if (auth()->user()->adminstrator == 1)

            <li class="nav-item active menu-open">
                <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon text-info"></i>
                    <p class="font-weight-bolder text-info" style="font-family: monospace">Adminstrator
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href=" {{ route('manageAccounts') }} " class="nav-link">
                            <i class="fas fa-tasks nav-icon"></i> {{-- manage icon --}}
                            <p style="font-family: 'Times New Roman', Times, serif">Manage Accounts</p>
                        </a>
                    </li>

                </ul>
            </li>

        @endif

        {{-- if user is normal customer --}}

        @if (auth()->user()->customer == 1 && auth()->user()->block == 0)

            <li class="nav-item active menu-open">
                <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon text-info"></i>
                    <p class="font-weight-bolder text-info" style="font-family: monospace">Customer
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-plus nav-icon"></i> {{-- !register icon --}}
                            <p style="font-family: 'Times New Roman', Times, serif">Register As
                                <i class="right fas fa-angle-left"></i> {{-- !dropdown icon --}}
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href=" {{ route('registerRequests', /*Crypt::encrypt(*/ 'archtecture' /*)*/) }} "
                                    class="nav-link">
                                    <i class="fas fa-map nav-icon"></i>
                                    <p style="font-family: 'Times New Roman', Times, serif">archtecture</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="  {{ route('registerRequests', /*Crypt::encrypt(*/ 'seller' /*)*/) }}  "
                                    class="nav-link">
                                    <i class="fas fa-shopping-cart nav-icon"></i>
                                    <p style="font-family: 'Times New Roman', Times, serif">seller</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="  {{ route('registerRequests', /*Crypt::encrypt(*/ 'houseBuilder' /*)*/) }}  "
                                    class="nav-link">
                                    <i class="fas fa-building nav-icon"></i>
                                    <p style="font-family: 'Times New Roman', Times, serif">houseBuilder</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    @if (auth()->user()->archtecture == 1 || auth()->user()->houseBuilder == 1 || auth()->user()->seller == 1 && auth()->user()->block == 0)

                    <li class="nav-item">
                        <a href=" {{ route('requests') }} " class="nav-link">
                            <i class="fas fa-sms nav-icon"></i>
                            <p style="font-family: 'Times New Roman', Times, serif">Requests
                                @if ( $newRequestsCounter )

                                <span class="text-info"> {{ $newRequestsCounter }} </span> <span class="text-danger"> New </span>

                                @endif
                        </p>
                        </a>
                    </li>

                    @endif

                    <li class="nav-item">
                        <a href=" {{ route('editProfile') }} " class="nav-link">
                            <i class="material-icons mr-2" style="font-size:20px">border_color</i>
                            <p style="font-family: 'Times New Roman', Times, serif">Edit Profile</p>
                        </a>
                    </li>

                </ul>
            </li>

        @endif

        {{-- if user is archtecture --}}

        @if (auth()->user()->archtecture == 1 || auth()->user()->houseBuilder == 1 || auth()->user()->seller == 1 && auth()->user()->block == 0)

            <li class="nav-item active menu-open">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon text-info"></i>
                    <p class="font-weight-bolder text-info" style="font-family: monospace">My Account
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href=" {{ route('account' , auth()->user()->id ) }} " class="nav-link">
                            <i class="fas fa-user fa-lg mr-2"></i>
                            <p style="font-family: 'Times New Roman', Times, serif">Services</p>
                        </a>
                    </li>

                </ul>
            </li>

        @endif


    </ul>
