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
                        <li class="list-group-item" style="width: 40%;"><b>Özellik</b></li>
                        <li class="list-group-item" style="width: 50%;"><b>Değeri</b></li>
                        <li class="list-group-item text-center" style="width: 10%;">
                            <b>İşlem</b>
                        </li>
                    </ul>
                    @foreach ($organisations as $organisation)
                    @foreach ($fieldNames as $key => $label)
                    <ul class="list-group list-group-horizontal w-100 ">
                        <li class="list-group-item" style="width: 40%;">{{ $label }}</li>
                        <li class="list-group-item" style="width: 50%;">
                            <input type="text" id="input-{{ $key }}" class="form-control" value="{{ $organisation->$key }}" readonly>
                        </li>
                        <li class="list-group-item d-flex justify-content-center align-items-center p-0" style="width: 10%;">
                            <button type="button" id="edit-btn-{{ $key }}" class="btn btn-primary btn-sm" onclick="enableEdit('{{ $key }}')">
                                Düzenle
                            </button>
                            <button type="button" id="save-btn-{{ $key }}" class="btn btn-success btn-sm d-none" onclick="saveEdit('{{ $key }}', '{{ $organisation->id }}')">
                                Kaydet
                            </button>
                        </li>
                    </ul>
                    @endforeach
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

    <script>
        function enableEdit(key) {
            var input = document.getElementById('input-' + key);
            var saveBtn = document.getElementById('save-btn-' + key);
            var editBtn = document.getElementById('edit-btn-' + key);

            input.removeAttribute('readonly');
            input.focus();
            saveBtn.classList.remove('d-none');
            editBtn.classList.add('d-none');
        }

        function saveEdit(key, id) {
            var input = document.getElementById('input-' + key);
            var value = input.value.trim();

            if (value === "") {
                alert("Lütfen boş alanı doldurun.");
                input.focus();
                return;
            }

            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '/organisation/update/' + id;

            var csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';

            var methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';

            var keyInput = document.createElement('input');
            keyInput.type = 'hidden';
            keyInput.name = 'key';
            keyInput.value = key;

            var valueInput = document.createElement('input');
            valueInput.type = 'hidden';
            valueInput.name = 'value';
            valueInput.value = value;

            form.appendChild(csrfInput);
            form.appendChild(methodInput);
            form.appendChild(keyInput);
            form.appendChild(valueInput);

            document.body.appendChild(form);
            form.submit();
        }
    </script>

</body>
@include('layouts.script')

</html>