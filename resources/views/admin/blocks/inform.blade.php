@if (count($errors) > 0)
    <div class="col-lg-12 alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                   {!! $error !!} 
                </li>
            @endforeach
        </ul>
    </div>
@endif