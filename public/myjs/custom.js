function checkDelete(event) {
    event.preventDefault();
    const confirmed = confirm("Are you sure delete this item?");
    if (confirmed) {
        event.target.closest('form').submit();
    }
}