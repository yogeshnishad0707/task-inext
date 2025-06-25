@if (session()->has('success'))
    <script>
        swal({
            title: "SUCCESS!",
            text: "{{ session('success') }}",
            icon: "success",
            button: {
                confirm: {
                    text: "OK",
                    className: "btn btn-success",
                },
            },
        });
    </script>
@endif
@if (session()->has('update'))
    <script>
        swal({
            title: "UPDATED!",
            text: "{{ session('update') }}",
            icon: "info",
            button: {
                confirm: {
                    text: "OK",
                    className: "btn btn-info",
                },
            },
        });
    </script>
@endif
@if (session()->has('delete'))
    <script>
        swal({
            title: "DELETED!",
            text: "{{ session('delete') }}",
            icon: "error",
            button: {
                confirm: {
                    text: "OK",
                    className: "btn btn-danger",
                },
            },
        });
    </script>
@endif
@if (session()->has('error'))
    <script>
        swal({
            title: "ERROR!",
            text: "{{ session('error') }}",
            icon: "warning",
            button: {
                confirm: {
                    text: "OK",
                    className: "btn btn-warning",
                },
            },
        });
    </script>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><i class="fa fa-clone"></i> {{ $error }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach
@endif
