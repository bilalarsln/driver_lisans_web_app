<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Yönetici hesabını Sil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteForm" action="{{ route('managerdelete') }}" method="POST">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->
                    <input type="hidden" name="id" id="deleteId">
                    <div class="mb-3">
                        <label for="deleteName" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="deleteName" name="name" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="deleteSurname" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="deleteSurname" name="surname" disabled>
                    </div>
                    <center>
                        <h6>Yönetici hesabını silmek istediğinizden emin misiniz?</h6>
                        <button type="submit" class="btn btn-primary">Sil</button>
                    </center>

                </form>


            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var name = this.getAttribute('data-name');
                var surname = this.getAttribute('data-surname');
                document.getElementById('deleteName').value = name;
                document.getElementById('deleteSurname').value = surname;
                document.getElementById('deleteId').value = id;
            });
        });
    });
</script>