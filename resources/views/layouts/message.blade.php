{{-- @if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach

@endif --}}

@if(session('deny') )

<div class="  alert alert-danger  ">

    {{session('deny')}}

</div>

@endif

@if(session('approved') )

<div class="alert alert-success   ">
    {{session('approved')}}
</div>

@endif

@if(session('pending') )

<div class="alert alert-warning  ">
    {{session('pending')}}
</div>

@endif
