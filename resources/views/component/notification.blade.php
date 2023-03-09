<!-- Notification -->
<div class="container-md">

    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ $message }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<script>
    $('body').on('click','.close',function(){
        $(this).closest('.alert').hide();
    });
</script>

<!-- Notification -->