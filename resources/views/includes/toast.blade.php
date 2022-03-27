@if(count($errors)>0)
    @php echo '<script>'; @endphp
    @foreach($errors->all() as $error)
        Swal.fire({
            icon: 'error',
            title: '{{$error}}',
            showConfirmButton: true
        });
    @endforeach
    @php echo '</script>'; @endphp
@endif

@php echo '<script>'; @endphp
@if(session('success'))
    Swal.fire({
        icon: 'success',
        title: '{{session('success')}}',
        showConfirmButton: true
    });
@elseif(session('danger'))
    Swal.fire({
        icon: 'error',
        title: '{{session('danger')}}',
        showConfirmButton: true
    });
@elseif(session('info'))
    Swal.fire({
        icon: 'info',
        title: '{{session('info')}}',
        showConfirmButton: true
    });
@endif
@php echo '</script>'; @endphp