
<!--
* ВНИМАНИЕ:
 * данные код носит эксперименталный характер и цель разового тестирования,
 * не претендует на роль готового решения!
 * так что написан на коленке но быстро :)
 -->
<style>
    div {
        position: absolute;
        height: 10px;
    }
</style>

<div>
    График эвентов<br>
    <br>Серые  - не вошли в результат запроса
    <br>Зеленые - вошли в результат запроса
    <br>Рамка по середине - это начало и конец текущей недели

</div>
@foreach($coords as $coord)


    <div
            style="
                    left:{{$coord['x']}};
                    width: {{$coord['width']}};
                    top: {{$coord['top']}};
                    height: {{$coord['height']}};
                    background:{{$coord['color']}};
                    border:{{$coord['border']}};
                    opacity:{{$coord['opacity']}};
                    "
    >

    </div>

@endforeach