<script>
    @if(Session::has('success'))
        swal("Success!", '{{ Session::get('success') }}', "success");
    @endif
    @if(Session::has('errors'))
        swal("Error!", "@foreach ($errors->all() as $error) {{ $error }} \n @endforeach", "error");
    @endif
    @if(Session::has('warning'))
        swal("Warning!", '{{ Session::get('warning') }}', "warning");
    @endif
</script>
