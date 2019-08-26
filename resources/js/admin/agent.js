function confirmChangeContact(event, element) {
    event.preventDefault();
    Swal.fire({
        title: 'Do you want choose agent is contact?',
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