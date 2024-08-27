<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Soruyu Sil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteForm" action="{{ route('questiondelete') }}" method="POST">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->
                    <input type="hidden" name="id" id="deleteId">
                    <div class="mb-3">
                        <label for="deleteQuestion_text" class="form-label">Soru</label>
                        <input type="text" class="form-control" id="deleteQuestion_text" name="question_text" disabled>
                    </div>
                    <center>
                        <h6>Soruyu silmek istediğinizden emin misiniz?</h6>
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
                var question_text = this.getAttribute('data-question_text');
                document.getElementById('deleteQuestion_text').value = question_text;
                document.getElementById('deleteId').value = id;
            });
        });
    });
</script>