$(document).on('click', '.action-btn', function () {
    const postId = $(this).data('id');
    const action = $(this).data('action');
    const url = action === 'approve'
    ? `/admin/post/approve/${postId}`
    : `/admin/post/reject/${postId}`;
    const method = action === 'approve' ? 'POST' : 'DELETE';

    $.ajax({
        url: url,
        type: method,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content') 
    },
        success: function (response) {
            alert(response.message);
            location.reload();
        },
        error: function (xhr) {
            const message = xhr.responseJSON?.message || 'Something went wrong!';
            alert(message);
        },
    });
});


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


