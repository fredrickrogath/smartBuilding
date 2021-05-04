<aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src=""
             alt="SB"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light text-info">{{ ('smartBuilding') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" expandSidebar="true">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
