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
                    @foreach ($questions as $question)
                    <p>{{ $question->question_text}}</p>
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