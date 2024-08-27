<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Soru Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('questionupdate') }}" method="POST">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->
                    <input type="hidden" name="id" id="editId">
                    <div class="mb-3">
                        <label for="question_text" class="form-label">Soru Metni</label>
                        <input type="text" class="form-control" id="editQuestion_text" name="question_text" required>
                    </div>
                    <div class="mb-3">
                        <label for="choice_1" class="form-label">Seçenek 1</label>
                        <input type="text" class="form-control" id="editChoice_1" name="choice_1" required>
                    </div>
                    <div class="mb-3">
                        <label for="choice_2" class="form-label">Seçenek 2</label>
                        <input type="text" class="form-control" id="editChoice_2" name="choice_2" required>
                    </div>
                    <div class="mb-3">
                        <label for="choice_3" class="form-label">Seçenek 3</label>
                        <input type="text" class="form-control" id="editChoice_3" name="choice_3" required>
                    </div>
                    <div class="mb-3">
                        <label for="choice_4" class="form-label">Seçenek 4</label>
                        <input type="text" class="form-control" id="editChoice_4" name="choice_4" required>
                    </div>
                    <div class="mb-3">
                        <label for="correct_answer" class="form-label">Doğru Cevap</label>
                        <input type="text" class="form-control" id="editCorrect_answer" name="correct_answer" required>
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
                var question_text = this.getAttribute('data-question_text');
                var choice_1 = this.getAttribute('data-choice_1');
                var choice_2 = this.getAttribute('data-choice_2');
                var choice_3 = this.getAttribute('data-choice_3');
                var choice_4 = this.getAttribute('data-choice_4');
                var correct_answer = this.getAttribute('data-correct_answer');

                document.getElementById('editId').value = id;
                document.getElementById('editQuestion_text').value = question_text;
                document.getElementById('editChoice_1').value = choice_1;
                document.getElementById('editChoice_2').value = choice_2;
                document.getElementById('editChoice_3').value = choice_3;
                document.getElementById('editChoice_4').value = choice_4;
                document.getElementById('editCorrect_answer').value = correct_answer;
            });
        });
    });
</script>