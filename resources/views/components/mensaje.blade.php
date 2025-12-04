@session('mensaje')
    <script>
        Swal.fire({
            title: "{{ session('mensaje') }}",
            icon: "success"
        });
    </script>
@endsession
