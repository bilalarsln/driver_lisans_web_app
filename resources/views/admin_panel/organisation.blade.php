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

            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <ul class="list-group list-group-horizontal w-100 ">
                        <li class="list-group-item" style="width: 40%;">Özellik</li>
                        <li class="list-group-item" style="width: 50%;">Değeri</li>
                        <li class="list-group-item text-center" style="width: 10%;">
                            İşlem
                        </li>
                    </ul>
                    @foreach ($organisations as $data)
                    @foreach ($fieldNames as $key => $label)

                    <ul class="list-group list-group-horizontal w-100 ">

                        <li class="list-group-item" style="width: 40%;">{{ $label }}</li>
                        <li class="list-group-item" style="width: 50%;">{{ $data->$key }}</li>
                        <li class="list-group-item d-flex justify-content-center align-items-center p-0" style="width: 10%;">
                            <button type="button" class="btn btn-primary btn-sm" data-{{$key}}="{{ $data->$key}}"
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                Düzenle
                            </button>
                        </li>
                    </ul>
                    @endforeach
                    @endforeach
                </div>
            </div>
            @include('admin_panel.part.organisation_update')

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