<!-- Edit Confirmation Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Bolo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="editForm">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Nome do Bolo</label>
                        <input type="text" class="form-control" id="edit_name" name="edit_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_url" class="form-label">URL da Imagem</label>
                        <input type="text" class="form-control" id="edit_url" name="edit_url" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>