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
                        <i class="fas fa-plus"></i> Yeni Soru Ekle
                    </button>
                </div>
            </div>
            <div class="row" style="min-height: 100vh;">

                <div class="row justify-content-center align-items-start p-3">
                    @foreach($questions as $data)
                    <div class="col-md-5 col-sm-11 col-lg-5">
                        <div class="bg-light rounded h-100 p-4 m-2 text-center">

                            <h5 class="mb-1">{{$data->question_text}}</h5>

                            <div class="row d-flex justify-content-end align-items-end">

                                <button type="button" class="btn btndark m-2 btn-square edit-btn " data-id="{{ $data->id }}"
                                    data-question_text="{{ $data->question_text }}" data-correct_answer="{{ $data->correct_answer }}"
                                    data-choice_1="{{ $data->choice_1 }}" data-choice_2="{{ $data->choice_2 }}" data-choice_3="{{ $data->choice_3 }}" data-choice_4="{{ $data->choice_4 }}"
                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <button type="button" class="btn btndark m-2 btn-square delete-btn" data-id="{{ $data->id }}"
                                    data-question_text="{{ $data->question_text }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
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
    @include('admin_panel.part.question_part.questionadd', ['testId' => $id])
    <!-- Add Modal End -->

    <!-- Edit Modal Start -->
    @include('admin_panel.part.question_part.questionupdate')
    <!-- Edit Modal End -->

    <!-- Delete Modal Start -->
    @include('admin_panel.part.question_part.questiondelete')
    <!-- Delete Modal End -->

</body>
@include('layouts.script')

</html>