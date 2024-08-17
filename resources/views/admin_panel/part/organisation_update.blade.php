<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Duyuru Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('managerupdate') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="editName" class="form-label">İsim</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="editPhone" class="form-label">Telefon 1</label>
                        <input type="number" class="form-control" id="editPhone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPhoneSecond" class="form-label">Telefon 2</label>
                        <input type="number" class="form-control" id="editPhoneSecond" name="phoneSecond" required>
                    </div>
                    <div class="mb-3">
                        <label for="editorganisation_phone" class="form-label">Kurum Numarası</label>
                        <input type="number" class="form-control" id="editorganisation_phone" name="organisation_phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="editMail" class="form-label">Mail</label>
                        <input type="email" class="form-control" id="editMail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="editaddress" class="form-label">Adres</label>
                        <input type="text" class="form-control" id="editaddress" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="editName" class="form-label">İsim</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editName" class="form-label">İsim</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editName" class="form-label">İsim</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPassword" class="form-label">Parola</label>
                        <input type="password" class="form-control" id="editPassword" name="password" required>
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
                var surname = this.getAttribute('data-surname');
                var phone = this.getAttribute('data-phone');
                var email = this.getAttribute('data-email');
                var password = this.getAttribute('data-password');

                document.getElementById('editId').value = id;
                document.getElementById('editName').value = name;
                document.getElementById('editSurname').value = surname;
                document.getElementById('editPhone').value = phone;
                document.getElementById('editMail').value = email;
                document.getElementById('editPassword').value = password;

            });
        });
    });
</script>