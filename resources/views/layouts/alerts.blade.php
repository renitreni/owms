<script>
    @if(Session::has('success'))
    swal("Success!", '{{ Session::get('success') }}', "success");
    @endif
    @if(Session::has('error'))
    swal("Error!", '{{ Session::get('error') }}', "error");
    @endif
    @if(Session::has('warning'))
    swal("Warning!", '{{ Session::get('warning') }}', "warning");
    @endif
</script>
