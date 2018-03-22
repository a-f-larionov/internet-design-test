@extends('layouts.tree-comments')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="page-header">
                Комментарии
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <textarea class="form-control" id="newComment"></textarea>
            </div>
            <div class="form-group">
                <button type="button" onclick="sendComment(0,0,'');" class="btn btn-primary">Отправить коммент</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="comments">

            @foreach($list as $comment)

                <div class="row">
                    <div class="col-md-{{9-$comment['level']}} col-md-offset-{{$comment['level']-1}} ">
                        <p class="pull-right">
                            <small>{{$comment['created']}}</small>
                        </p>

                        <div>
                            {{$comment['text']}}
                        </div>
                        <small>
                            <div><a href=""
                                    onclick="sendComment(
                                    {{$comment['id']}},
                                    {{$comment['level']}},
                                            '{{$comment['rank']}}'
                                            );return false;">
                                    Ответить
                                </a>
                            </div>
                        </small>
                    </div>

                </div>
            @endforeach

        </div>
    </div>

@endsection