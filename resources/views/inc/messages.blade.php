
    @if(session('success'))
    <div class="alert aler-success">
        {{session('success')}}

</div>
@else(session('error'))
        {{session('error')}}

    @endif
