<h1>News</h1>

@foreach($news as $new)

    <br>News : {{ $new['title'] }}

    <br>Announces:

    @foreach($new->announces as $announce)

        <br>{{$announce['text']}}

    @endforeach

    @if($new->getMainItem())

        <br>Main news item: {{$new->getMainItem()->id }}

    @endif

@endforeach

<br>{{date('Y-m-d', $created)}}
