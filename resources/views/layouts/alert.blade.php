@if($errors->any())
    <div class="row">
        <div>
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        </div>
    </div>
@endif


