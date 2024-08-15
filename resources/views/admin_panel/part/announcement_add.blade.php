<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Duyuru Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="{{ route('announcementadd') }}" method="POST">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->

                    <div class="mb-3">
                        <label for="addTitle" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="addTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="addContent" class="form-label">İçerik</label>
                        <input type="text" class="form-control" id="addContent" name="content" required>
                    </div>
                    <div class="mb-3">
                        <label for="addDate" class="form-label">Tarih</label>
                        <input type="date" class="form-control" id="addDate" name="due_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="addType" class="form-label">Tür</label>
                        <input type="text" class="form-control" id="addType" name="type" required>
                    </div>
                    <div class="mb-3">
                        <label for="addActivity" class="form-label">Aktiflik</label>
                        <input type="text" class="form-control" id="addActivity" name="activity" required>
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
                document.getElementById('addDate').value = date;
                document.getElementById('addContent').value = content;
                document.getElementById('addType').value = type;
                document.getElementById('addActivity').value = activity;
            });
        });
    });
</script>