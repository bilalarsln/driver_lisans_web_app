<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Yönetici Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="{{ route('manageradd') }}" method="POST">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->

                    <div class="mb-3">
                        <label for="addName" class="form-label">İsim</label>
                        <input type="text" class="form-control" id="addName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="addSurname" class="form-label">Soyisim</label>
                        <input type="text" class="form-control" id="addSurname" name="surname" required>
                    </div>
                    <div class="mb-3">
                        <label for="addPhone" class="form-label">Telefon</label>
                        <input type="number" class="form-control" id="addPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="addMail" class="form-label">Mail</label>
                        <input type="email" class="form-control" id="addMail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="addPassword" class="form-label">Parola</label>
                        <input type="password" class="form-control" id="addPassword" name="password" required>
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
                document.getElementById('addSurname').value = surname;
                document.getElementById('addPhone').value = phone;
                document.getElementById('addMail').value = email;
                document.getElementById('addPassword').value = password;
            });
        });
    });
</script>