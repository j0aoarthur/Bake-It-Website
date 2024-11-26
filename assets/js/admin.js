document.addEventListener('DOMContentLoaded', function () {
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var deleteInput = deleteModal.querySelector('#delete_id');
        deleteInput.value = id;
    });

    var editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var name = button.getAttribute('data-name');
        var url = button.getAttribute('data-url');
        var editInput = editModal.querySelector('#edit_id');
        var editName = editModal.querySelector('#edit_name');
        var editUrl = editModal.querySelector('#edit_url');
        editInput.value = id;
        editName.value = name;
        editUrl.value = url;
    });
});