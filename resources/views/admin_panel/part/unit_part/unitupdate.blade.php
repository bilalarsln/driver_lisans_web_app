<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Ünite Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('unitupdate') }}" method="POST">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Adı</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editTest_id" class="form-label">Ders</label>
                        <select class="form-select" id="editTest_id" name="test_id" required>
                            <option value="" disabled>Test Seçin</option>
                            @foreach($test as $test)
                            <option value="{{ $test->id }}">{{ $test->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>


            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var name = this.getAttribute('data-name');
                var test_id = this.getAttribute('data-test_id');

                document.getElementById('editId').value = id;
                document.getElementById('editName').value = name;
                document.getElementById('editTest_id').value = test_id;
            });
        });
    });
</script>