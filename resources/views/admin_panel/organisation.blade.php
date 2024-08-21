@include('layouts.head')

<body>
    <style>
        .drop-zone {
            max-width: 200px;
            height: 200px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 500;
            font-size: 20px;
            cursor: pointer;
            color: #cccccc;
            border: 4px dashed #009578;
            border-radius: 10px;
        }

        .drop-zone--over {
            border-style: solid;
        }

        .drop-zone__input {
            display: none;
        }

        .drop-zone__thumb {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
            background-color: #cccccc;
            background-size: cover;
            position: relative;
        }

        .drop-zone__thumb::after {
            content: attr(data-label);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 5px 0;
            color: #ffffff;
            background: rgba(0, 0, 0, 0.75);
            font-size: 14px;
            text-align: center;
        }
    </style>
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
                    <ul class="list-group list-group-horizontal w-100">
                        <li class="list-group-item" style="width: 40%;"><b>Özellik</b></li>
                        <li class="list-group-item" style="width: 50%;"><b>Değeri</b></li>
                        <li class="list-group-item text-center" style="width: 10%;"><b>İşlem</b></li>
                    </ul>
                    @foreach ($organisations as $organisation)
                    @foreach ($fieldNames as $key => $label)
                    <ul class="list-group list-group-horizontal w-100">
                        <li class="list-group-item" style="width: 40%;">{{ $label }}</li>
<<<<<<< HEAD
                        <li class="list-group-item d-flex align-items-center" style="width: 50%;">
                            @if ($key === 'logo')
                            <input type="text" class="form-control me-2" value="{{ $organisation->logo ? basename($organisation->logo) : 'Logo yüklenmedi' }}" readonly>
=======
                        <li class="list-group-item" style="width: 50%;">
                            @if($key == 'logo')
                            <div class="drop-zone" id="drop-zone">
                                <span class="drop-zone__prompt">Resmi buraya sürükleyin veya tıklayın</span>
                                <input type="file" id="file-input" class="drop-zone__input" hidden>
                            </div>
>>>>>>> b112a090f73c11b205b70b578529e992451f3344
                            @else
                            <input type="text" id="input-{{ $key }}" class="form-control" value="{{ $organisation->$key }}" readonly>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-center align-items-center p-0" style="width: 10%;">
                            @if ($key === 'logo')
                            <!-- Dosya yükleme ve kaydetme işlemleri için tek bir buton -->
                            <form action="/organisation/update/logo/{{ $organisation->id }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                                @csrf
                                @method('PUT')
                                <input type="file" name="logo" accept=".png,.jpg,.jpeg,.csv" class="form-control d-none" id="logo-file-{{ $organisation->id }}" onchange="this.form.submit()">
                                <label for="logo-file-{{ $organisation->id }}" class="btn btn-primary btn-sm mb-0">Düzenle</label>
                            </form>
                            @else
                            <button type="button" id="edit-btn-{{ $key }}" class="btn btn-primary btn-sm" onclick="enableEdit('{{ $key }}')">Düzenle</button>
                            <button type="button" id="save-btn-{{ $key }}" class="btn btn-success btn-sm d-none" onclick="saveEdit('{{ $key }}', '{{ $organisation->id }}')">Kaydet</button>
                            @endif
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
        document.addEventListener('DOMContentLoaded', function() {
            const dropZone = document.getElementById('drop-zone');
            const fileInput = document.getElementById('file-input');

            if (dropZone && fileInput) {
                setupLogoUpload(dropZone, fileInput);
            }

            setupEditButtons();
        });

        function setupLogoUpload(dropZone, fileInput) {
            const editBtn = document.getElementById('edit-btn-logo');
            const saveBtn = document.getElementById('save-btn-logo');

            dropZone.addEventListener('click', () => fileInput.click());

            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('drop-zone--over');
            });

            ['dragleave', 'dragend'].forEach(type => {
                dropZone.addEventListener(type, () => {
                    dropZone.classList.remove('drop-zone--over');
                });
            });

            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('drop-zone--over');

                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    updateThumbnail(dropZone, e.dataTransfer.files[0]);
                    showSaveButton(editBtn, saveBtn);
                }
            });

            fileInput.addEventListener('change', () => {
                if (fileInput.files.length) {
                    updateThumbnail(dropZone, fileInput.files[0]);
                    showSaveButton(editBtn, saveBtn);
                }
            });
        }

        function setupEditButtons() {
            document.querySelectorAll('[id^="edit-btn-"]').forEach(button => {
                button.addEventListener('click', function() {
                    const key = this.id.replace('edit-btn-', '');
                    enableEdit(key);
                });
            });
        }

        function enableEdit(key) {
            var input = document.getElementById('input-' + key);
            var saveBtn = document.getElementById('save-btn-' + key);
            var editBtn = document.getElementById('edit-btn-' + key);

            if (input && saveBtn && editBtn) {
                input.removeAttribute('readonly');
                input.focus();
                saveBtn.classList.remove('d-none');
                editBtn.classList.add('d-none');
            }
        }

        function showSaveButton(editBtn, saveBtn) {
            if (editBtn && saveBtn) {
                editBtn.classList.add('d-none');
                saveBtn.classList.remove('d-none');
            }
        }

        function saveEdit(key, id) {
            if (key === 'logo') {
                saveLogo(id);
            } else {
                saveOtherField(key, id);
            }
        }

        function saveLogo(id) {
            var fileInput = document.getElementById('file-input');
            var file = fileInput.files[0];

            if (!file) {
                return;
            }

            var formData = new FormData();
            formData.append('value', file); // 'logo' yerine 'value' kullanıyoruz
            formData.append('key', 'logo'); // key'i 'logo' olarak belirtiyoruz
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');
            formData.append('_enctype', 'multipart/form-data');
            submitForm('/organisation/update/' + id, formData);
        }

        function saveOtherField(key, id) {
            var input = document.getElementById('input-' + key);
            var value = input.value.trim();

            if (value === "") {
                return;
            }

            var formData = new FormData();
            formData.append('key', key);
            formData.append('value', value);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('_method', 'PUT');

            submitForm('/organisation/update/' + id, formData);
        }

        function submitForm(url, formData) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.enctype = 'multipart/form-data';
            form.action = url;
            form.style.display = 'none';

            for (var pair of formData.entries()) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = pair[0];
                input.value = pair[1];
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        }

        function updateThumbnail(dropZone, file) {
            let thumbnailElement = dropZone.querySelector('.drop-zone__thumb');

            if (dropZone.querySelector('.drop-zone__prompt')) {
                dropZone.querySelector('.drop-zone__prompt').remove();
            }

            if (!thumbnailElement) {
                thumbnailElement = document.createElement('div');
                thumbnailElement.classList.add('drop-zone__thumb');
                dropZone.appendChild(thumbnailElement);
            }

            thumbnailElement.dataset.label = file.name;

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                };
            } else {
                thumbnailElement.style.backgroundImage = null;
            }
        }
    </script>

</body>
@include('layouts.script')

</html>
