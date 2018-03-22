@foreach($list as $row)

    <a href="{{$row['url']}}" target="_blank">{{$row['title']}}</a>
    <br>

@endforeach