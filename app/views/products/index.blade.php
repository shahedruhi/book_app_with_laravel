New Product

<br>

{{Form::open(array('url'=>'/products', 'files'=>true))}}
    title : {{Form::text('title')}}
    <br>
    image : {{Form::file('image')}}
    <br>

    {{Form::submit('submit')}}
{{Form::close()}}