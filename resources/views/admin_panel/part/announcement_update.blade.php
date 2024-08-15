<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Duyuru Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('announcementupdate') }}" method="POST">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="editContent" class="form-label">İçerik</label>
                        <input type="text" class="form-control" id="editContent" name="content" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDate" class="form-label">Tarih</label>
                        <input type="date" class="form-control" id="editDate" name="due_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="editType" class="form-label">Tür</label>
                        <input type="text" class="form-control" id="editType" name="type" required>
                    </div>
                    <div class="mb-3">
                        <label for="editActivity" class="form-label">Aktiflik</label>
                        <input type="text" class="form-control" id="editActivity" name="activity" required>
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
                var content = this.getAttribute('data-content');
                var date = this.getAttribute('data-date');
                var type = this.getAttribute('data-type');
                var activity = this.getAttribute('data-activity');

                document.getElementById('editId').value = id;
                document.getElementById('editTitle').value = title;
                document.getElementById('editDate').value = date;
                document.getElementById('editContent').value = content;
                document.getElementById('editType').value = type;
                document.getElementById('editActivity').value = activity;
            });
        });
    });
</script>