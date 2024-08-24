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

            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Önemli Bilgiler</h6>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                <i class="fas fa-plus"></i> Yeni Bilgi
                            </button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="display">
                            <!-- Test title start -->
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Ad</th>
                                    <th scope="col">Açıklama</th>
                                    <th scope="col">Düzenle</th>
                                    <th scope="col">Sil</th>
                                    <th scope="col">Aktiflik</th>
                                </tr>
                            </thead>
                            <!-- Test title end -->
                            <tbody>
                                <!-- Test content start -->
                                @foreach ($test as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->explanation }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning edit-btn" data-id="{{ $data->id }}"
                                            data-name="{{ $data->name }}"
                                            data-activity="{{ $data->activity }}" data-explanation="{{$data->explanation}}"
                                            data-bs-toggle="modal" data-bs-target="#editModal">
                                            Düzenle
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning delete-btn" data-id="{{ $data->id }}"
                                            data-name="{{ $data->name }}"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            Sil
                                        </button>
                                    </td>
                                    <td>
                                        <form action="{{ route('test.updateActivity', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="activity" value="1"
                                                    onchange="this.form.submit()" {{ $data->activity ? 'checked' : '' }}>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Test content end-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
                // table kodu 
                let table = new DataTable('#example', {

                });
            </script>

            <!-- Add Modal Start -->
            @include('admin_panel.part.test_part.testadd')
            <!-- Add Modal End -->

            <!-- Edit Modal Start -->
            @include('admin_panel.part.test_part.testupdate')
            <!-- Edit Modal End -->

            <!-- Delete Modal Start -->
            @include('admin_panel.part.test_part.testdelete')
            <!-- Delete Modal End -->

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