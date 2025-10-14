@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__notice">
    <div class="todo__notice--OK">
        <h2>Todoを作成しました</h2>
    </div>
</div>

<div class="todo__content">
    <form class="form">
        <div class="form__item">
            <input type="text" name="content" placeholder="予定を記入してください">
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

            <tr class="table__row">
                <td class=table__item>
                    <div class="table__item-1">
                        <input class="table__item-text" type="text" name="content" value="test">
                    </div>
                </td>

                <td class="todo__item">
                    <form class="update">
                        <div class="update__button">
                            <button class="update__button-send" type="submit">更新</button>
                        </div>
                    </form>
                </td>

                <td class="todo__item">
                    <form class="delete">
                        <div class="delete__button">
                            <button class="delete__button-send" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>

            <tr class="table__row">
                <td class=table__item>
                    <div class="table__item-1">
                        <input class="table__item-text" type="text" name="content" value="test2">
                    </div>
                </td>

                <td class="todo__item">
                    <form class="update">
                        <div class="update__button">
                            <button class="update__button-send" type="submit">更新</button>
                        </div>
                    </form>
                </td>

                <td class="todo__item">
                    <form class="delete">
                        <div class="delete__button">
                            <button class="delete__button-send" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection