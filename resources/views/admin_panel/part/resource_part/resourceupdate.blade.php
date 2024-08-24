<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Kaynak Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('resourceupdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>

                    <!-- Ders Seçimi -->
                    <div class="mb-3">
                        <label for="editLesson_id" class="form-label">Ders</label>
                        <select class="form-select" id="editLesson_id" name="lesson_id" required>
                            <option value="" disabled>Ders Seçin</option>
                            @foreach($lesson as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dosya Yükleme -->
                    <div class="mb-3">
                        <label for="editResource" class="form-label">Dosya</label>
                        <input type="file" name="resource" accept=".pdf,.doc,.docx" class="form-control" id="editResource">
                        <small class="form-text text-muted">Dosyayı değiştirmek isterseniz yeni bir dosya seçin.</small>
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
                var title = this.getAttribute('data-title');
                var lesson_id = this.getAttribute('data-lesson_id');
                var resource = this.getAttribute('data-resource');

                document.getElementById('editId').value = id;

                document.getElementById('editTitle').value = title;
                document.getElementById('editLesson_id').value = lesson_id;
            });
        });
    });
</script>