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

            <!-- Quick Info Start -->
            @include('admin_panel.part.quickInfo')
            <!-- Quick Info End -->


            <!-- Graphics Start -->
            @include('admin_panel.part.graphics')
            <!-- Graphics End -->

            <!-- Announcement Start -->
            @include('admin_panel.part.announcement',[
            'showViewAllLink' => true,
            'showAddButton' => false,
            'limitAnnouncements' => true,
            'announcementLimit' => 5
            ])
            <!-- Announcement End-->

            <!-- Warning -->
            <!-- You should use pro version code here -->

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