<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Şube Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="{{ route('substationadd') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="addSubstation_name" class="form-label">Şube Adı</label>
                        <input type="text" class="form-control" id="addSubstation_name" name="substation_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="addPhone" class="form-label">Telefon Numarası</label>
                        <input type="text" class="form-control" id="addPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="addAddress" class="form-label">Adres</label>
                        <input type="text" class="form-control" id="addAddress" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="addMaps" class="form-label">Haritalar</label>
                        <input type="text" class="form-control" id="addMaps" name="maps" required>
                    </div>
                    <div class="mb-3">
                        <label for="addSubstation_photo" class="form-label">Fotoğraf</label>
                        <input type="file" name="substation_photo" accept=".png,.jpg,.jpeg,.csv" class="form-control" id="addSubstation_photo">
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
                document.getElementById('addSubstation_name').value = substation_name;
                document.getElementById('addAddress').value = address;
                document.getElementById('addPhone').value = phone;
                document.getElementById('addMaps').value = maps;
                document.getElementById('addSubstation_photo').value = substation_photo;

            });
        });
    });
</script>