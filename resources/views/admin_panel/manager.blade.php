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
                        <h6 class="mb-0">Kullanıcılar</h6>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                <i class="fas fa-plus"></i> Yeni Yönetici
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <!-- announcement title start -->
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">İsim</th>
                                    <th scope="col">Soyisim</th>
                                    <th scope="col">Telefon</th>
                                    <th scope="col">Düzenle</th>
                                    @if(Session::get('user_id') == 1)
                                    <th scope="col">Sil</th>
                                    @endif
                                </tr>
                            </thead>
                            <!-- announcement title end -->
                            <tbody>
                                <!-- announcement content start -->
                                @if(Session::get('user_id') == 1)

                                @foreach ($panel_user as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->surname }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning edit-btn" data-id="{{ $data->id }}"
                                            data-name="{{ $data->name }}" data-surname="{{ $data->surname }}"
                                            data-phone="{{ $data->phone }}" data-email="{{ $data->email }}" data-password="{{$data->password}}"
                                            data-bs-toggle="modal" data-bs-target="#editModal">
                                            Düzenle
                                        </button>
                                    </td>
                                    <td>
                                        @if($data->id !=1)
                                        <button type="button" class="btn btn-warning delete-btn" data-id="{{ $data->id }}"
                                            data-name="{{ $data->name }}" data-surname="{{ $data->surname }}"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            Sil
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>{{ $panel_user->name }}</td>
                                    <td>{{ $panel_user->surname }}</td>
                                    <td>{{ $panel_user->phone }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning edit-btn" data-id="{{ $panel_user->id }}"
                                            data-name="{{ $panel_user->name }}" data-surname="{{ $panel_user->surname }}"
                                            data-phone="{{ $panel_user->phone }}" data-email="{{ $panel_user->email }}" data-password="{{$panel_user->password}}"
                                            data-bs-toggle="modal" data-bs-target="#editModal">
                                            Düzenle
                                        </button>
                                    </td>

                                </tr>
                                @endif

                                <!-- announcement content end-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @include('admin_panel.part.manager_part.manager_add')
            @include('admin_panel.part.manager_part.manager_update')
            @include('admin_panel.part.manager_part.manager_delete')
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