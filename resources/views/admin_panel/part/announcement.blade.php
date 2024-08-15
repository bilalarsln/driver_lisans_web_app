<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Duyurular</h6>
            <a href="">Tümünü Gör</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <!-- announcement title start -->
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Duyuru</th>
                        <th scope="col">Tarih</th>
                        <th scope="col">Tür</th>
                        <th scope="col">Düzenle</th>
                        <th scope="col">Sil</th>
                        <th scope="col">Aktiflik</th>
                    </tr>
                </thead>
                <!-- announcement title end -->
                <tbody>
                    <!-- announcement content start -->
                    @foreach ($announcement as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->due_date }}</td>
                        <td>{{ $data->type }}</td>
                        <td>
                            <button type="button" class="btn btn-warning edit-btn" data-id="{{ $data->id }}"
                                data-title="{{ $data->title }}" data-date="{{ $data->due_date }}"
                                data-type="{{ $data->type }}" data-activity="{{ $data->activity }}"
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                Düzenle
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning delete-btn" data-id="{{ $data->id }}"
                                data-title="{{ $data->title }}"
                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Sil
                            </button>
                        </td>
                        <td>{{ $data->activity }}</td>
                    </tr>
                    @endforeach
                    <!-- announcement content end-->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Modal Start -->
@include('admin_panel.part.announcement_update')
<!-- Edit Modal End -->

<!-- Delete Modal Start -->
@include('admin_panel.part.announcement_delete')
<!-- Delete Modal End -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var title = this.getAttribute('data-title');
                var date = this.getAttribute('data-date');
                var type = this.getAttribute('data-type');
                var activity = this.getAttribute('data-activity');

                document.getElementById('editId').value = id;
                document.getElementById('editTitle').value = title;
                document.getElementById('editDate').value = date;
                document.getElementById('editType').value = type;
                document.getElementById('editActivity').value = activity;
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var title = this.getAttribute('data-title');
                document.getElementById('deleteTitle').value = title;
                document.getElementById('deleteId').value = id;
            });
        });
    });
</script>