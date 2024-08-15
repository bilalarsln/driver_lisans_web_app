@include('layouts.head')

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        @include('component.loading')
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('admin_panel.part.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin_panel.part.navbar')
            <!-- Navbar End -->

            <!-- Announcement Start -->
            @include('admin_panel.part.announcement', ['showViewAllLink' => false, 'showAddButton' => true])
            <!-- Announcement End-->


            <!-- Footer Start -->
            @include('admin_panel.part.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        @include('component.backToTop')
    </div>

</body>
@include('layouts.script')

</html>