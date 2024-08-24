<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Kaynak Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="{{ route('resourceadd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->

                    <div class="mb-3">
                        <label for="addTitle" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="addTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="addLesson_id" class="form-label">Ders</label>
                        <select class="form-select" id="addLesson_id" name="lesson_id" required>
                            <option value="" disabled selected>Ders Seçin</option>
                            @foreach($lesson as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="addResource" class="form-label">Dosya</label>
                        <input type="file" name="resource" accept=".pdf,.doc,.docx" class="form-control" id="addResource" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addButtons = document.querySelectorAll('.add-btn');
        addButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                document.getElementById('addId').value = id;
                document.getElementById('addTitle').value = title;
                document.getElementById('addLesson_id').value = lesson_id;
                document.getElementById('addResource').value = resource;
            });
        });
    });
</script>