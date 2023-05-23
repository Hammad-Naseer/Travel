 
@if($errors ->any() > 0)
<div class="alert alert-danger">
    <ul class="pl-15">
        @foreach($errors ->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif        


@if(Session::has('message'))
<div class="alert alert-success">{{Session::get('message')}}</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger">{{Session::get('error')}}</div>
@endif
