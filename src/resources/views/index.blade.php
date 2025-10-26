@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__notice">
    @if(session('Message'))
    <div class="todo__notice--OK">
        {{session('Message')}}
    </div>
    @endif

    <div class="todo__notice--NG">
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </div>
</div>

<div class="todo__content">
    <form class="form" action="/todos" method="post">
        @csrf
        <div class="form__item">
            <input class="form__item-text" type="text" name="content" placeholder="予定を記入してください">
        </div>

        <div class="form__button">
            <button class="form__button-send" type="submit">作成</button>
        </div>
    </form>

    <div class="table">
        <table class="table__inner">
            <tr class="table__row">
                <th class="tabel__title">Todo</th>
            </tr>

            @foreach($todos as $todo)
            <tr class="table__row">
                <td class=table__item>
                    <form class="update" action="/todos/update" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="table__item-1">
                            <input class="table__item-text" type="text" name="Content" value="{{$todo['content']}}">
                            <input type="hidden" name="id" value="{{$todo['id']}}">
                        </div>
                    
                        <div class="update__button">
                            <button class="update__button-send" type="submit">更新</button>
                        </div>
                    </form>
                </td>

                <td class="todo__item">
                    <form class="delete" action="/todos/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="delete__button">
                            <input type="hidden" name="id" value="{{$todo['id']}}">
                            <button class="delete__button-send" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection