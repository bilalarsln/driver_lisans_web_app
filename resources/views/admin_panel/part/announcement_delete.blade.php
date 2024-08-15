<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Duyuru Sil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteForm" action="{{ route('announcementdelete') }}" method="POST">
                    @csrf
                    <!-- @method('PUT') alanını kaldırıyoruz çünkü sadece POST kullanacağız -->
                    <input type="hidden" name="id" id="deleteId">
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Başlık</label>
                        <input type="text" class="form-control" id="deleteTitle" name="title" disabled>
                    </div>
                    <center>
                        <h6>Duyuruyu silmek istediğinizden emin misiniz?</h6>
                        <button type="submit" class="btn btn-primary">Sil</button>
                    </center>

                </form>


            </div>
        </div>
    </div>
</div>