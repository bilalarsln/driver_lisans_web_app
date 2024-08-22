<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Şube Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('substationupdate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="editSubstation_name" class="form-label">Şube Adı</label>
                        <input type="text" class="form-control" id="editSubstation_name" name="substation_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPhone" class="form-label">Telefon Numarası</label>
                        <input type="text" class="form-control" id="editPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="editAddress" class="form-label">Adres</label>
                        <input type="text" class="form-control" id="editAddress" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="editMaps" class="form-label">Haritalar</label>
                        <input type="text" class="form-control" id="editMaps" name="maps" required>
                    </div>
                    <div class="mb-3">
                        <label for="editSubstation_photo" class="form-label">Fotoğraf</label>
                        <input type="text" class="form-control" id="editSubstation_photo" name="substation_photo" required>
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
                var substation_name = this.getAttribute('data-substation_name');
                var phone = this.getAttribute('data-phone');
                var address = this.getAttribute('data-address');
                var maps = this.getAttribute('data-maps');
                var substation_photo = this.getAttribute('data-substation_photo');

                document.getElementById('editId').value = id;
                document.getElementById('editSubstation_name').value = substation_name;
                document.getElementById('editAddress').value = address;
                document.getElementById('editPhone').value = phone;
                document.getElementById('editMaps').value = maps;
                document.getElementById('editSubstation_photo').value = substation_photo;
            });
        });
    });
</script>