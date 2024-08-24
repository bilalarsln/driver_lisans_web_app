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
            <div class="d-flex justify-content-end align-items-end mb-4 me-5">
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fas fa-plus"></i> Yeni Şube
                    </button>
                </div>
            </div>
            <div class="row" style="min-height: 100vh;">

                <div class="row justify-content-center align-items-start p-3">
                    @foreach($substation as $data)
                    <div class="col-md-5 col-sm-11 col-lg-5">
                        <div class="bg-light rounded h-100 p-4 m-2 text-center">
                            <img class="img-fluid rounded-circle mx-auto mb-4" src="{{$data->substation_photo}}" style="width: 100px; height: 100px;">
                            <h5 class="mb-1">{{$data->substation_name}}</h5>

                            <div class="row d-flex justify-content-end align-items-end">

                                <button type="button" class="btn btndark m-2 btn-square edit-btn " data-id="{{ $data->id }}"
                                    data-substation_name="{{ $data->substation_name }}" data-phone="{{ $data->phone }}"
                                    data-address="{{ $data->address }}" data-substation_photo="{{ $data->substation_photo }}" data-maps="{{ $data->maps }}"
                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <button type="button" class="btn btndark m-2 btn-square delete-btn" data-id="{{ $data->id }}"
                                    data-substation_name="{{ $data->substation_name }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="fa fa-trash"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Footer Start -->
            @include('admin_panel.part.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        @include('component.backToTop')
    </div>
    <!-- Add Modal Start -->
    @include('admin_panel.part.substation_part.substation_add')
    <!-- Add Modal End -->

    <!-- Edit Modal Start -->
    @include('admin_panel.part.substation_part.substation_update')
    <!-- Edit Modal End -->

    <!-- Delete Modal Start -->
    @include('admin_panel.part.substation_part.substation_delete')
    <!-- Delete Modal End -->

</body>
@include('layouts.script')

</html>