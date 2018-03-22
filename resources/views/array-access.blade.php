Результат кода записи в БД:
<br>
@foreach($all as $row)

    <br>id: {{$row['id']}}
    <br>name: {{$row['name']}}
    <br>flats: {{$row['flats']}}
    <br>

@endforeach