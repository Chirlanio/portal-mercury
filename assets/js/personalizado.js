window.sr = ScrollReveal({
    reset: true
});
sr.reveal('.anima-left', {
    duration: 1000,
    origin: 'left',
    distance: '40px'
});
sr.reveal('.anima-bottom', {
    duration: 1000,
    origin: 'bottom',
    distance: '40px'
});
sr.reveal('.anima-right', {
    duration: 1000,
    origin: 'right',
    distance: '40px'
});
sr.reveal('.anima-top', {
    duration: 1000,
    origin: 'top',
    distance: '40px'
});

$('#editarModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var sit_id = button.data('status_id');
    var status = button.data('situacao');
    var recebido = button.data('recebido');

    var modal = $(this);
    modal.find('.modal-title').text('ID: ' + id + ' - Status: ' + status);
    modal.find('#id').val(id);
    modal.find('#status_id').val(sit_id);
    modal.find('#situacao').val(status);
    modal.find('#recebido').val(recebido);
});