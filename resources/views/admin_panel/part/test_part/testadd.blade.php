<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Test Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="{{ route('testadd') }}" method="POST">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->

                    <div class="mb-3">
                        <label for="addName" class="form-label">Adı</label>
                        <input type="text" class="form-control" id="addName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="addExplanation" class="form-label">Konu</label>
                        <input type="text" class="form-control" id="addExplanation" name="explanation" required>
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
                document.getElementById('addName').value = name;
                document.getElementById('addExplanation').value = explanation;
                document.getElementById('addLesson_id').value = lesson_id;
            });
        });
    });
</script>