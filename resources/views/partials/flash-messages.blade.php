@if (session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title:  session('success') ,
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: 'swal-toast-large', 
            }
        });
    });
</script>
@endif

@if (session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: session('error') ,
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: 'swal-toast-large',
            }
        });
    });
</script>
@endif

@if (session('warning'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'warning',
            title: session('warning'),
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: 'swal-toast-large',
            }
        });
    });
</script>
@endif

@if (session('info'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'info',
            title: session('info'),
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: 'swal-toast-large',
            }
        });
    });
</script>
@endif

@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{$error->$message}}',
            html: `<ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>`,
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                popup: 'swal-toast-large',
            }
        });
    });
</script>
@endif