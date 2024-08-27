<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('questionadd', ['id' => $testId]) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Yeni Soru Ekle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Soru alanları -->
                    <div class="mb-3">
                        <label for="question_text" class="form-label">Soru Metni</label>
                        <input type="text" class="form-control" id="addQuestion_text" name="question_text" required>
                    </div>
                    <div class="mb-3">
                        <label for="choice_1" class="form-label">Seçenek 1</label>
                        <input type="text" class="form-control" id="addChoice_1" name="choice_1" required>
                    </div>
                    <div class="mb-3">
                        <label for="choice_2" class="form-label">Seçenek 2</label>
                        <input type="text" class="form-control" id="addChoice_2" name="choice_2" required>
                    </div>
                    <div class="mb-3">
                        <label for="choice_3" class="form-label">Seçenek 3</label>
                        <input type="text" class="form-control" id="addChoice_3" name="choice_3" required>
                    </div>
                    <div class="mb-3">
                        <label for="choice_4" class="form-label">Seçenek 4</label>
                        <input type="text" class="form-control" id="addChoice_4" name="choice_4" required>
                    </div>
                    <div class="mb-3">
                        <label for="correct_answer" class="form-label">Doğru Cevap</label>
                        <input type="text" class="form-control" id="addCorrect_answer" name="correct_answer" required>
                    </div>
                    <!-- Gizli input ile test_id gönder -->
                    <input type="hidden" id="addTest_id" name="test_id" value="{{ $testId }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var addButtons = document.querySelectorAll('.add-btn');
        addButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                document.getElementById('addId').value = id;
                document.getElementById('addQuestion_text').value = question_text;
                document.getElementById('addChoice_1').value = choice_1;
                document.getElementById('addChoice_2').value = choice_2;
                document.getElementById('addChoice_3').value = choice_3;
                document.getElementById('addChoice_4').value = choice_4;
                document.getElementById('addCorrect_answer').value = correct_answer;
                document.getElementById('addTest_id').value = test_id;
            });
        });
    });
</script>