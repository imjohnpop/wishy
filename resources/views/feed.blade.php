<h1>Well this is the feed done in a horrible way. Peace out.</h1>

@foreach ($news as $new)
    <div>
        <h3>{{$new['name']}}</h3>
        <p>{{$new['description']}}</p>
    </div>
@endforeach