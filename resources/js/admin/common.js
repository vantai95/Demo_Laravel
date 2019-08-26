function confirmDelete(event, element) {
    event.preventDefault();
    Swal.fire({
        title: 'Do you want to delete?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#20a8d8',
        cancelButtonColor: '#f86c6b',
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.value) {
            $(element).parent('form').submit();
        }
    })
}

function getIframe() {
    let iframe = $("#iframe").val();
    $('#quick-view-product').modal('show');
    document.getElementById("div-that-holds-the-iframe").innerHTML = iframe;
}
