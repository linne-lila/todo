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
    <div class="section__title">
        <h2>新規作成</h2>
    </div>

    <form class="form" action="/todos" method="post">
        @csrf
        <div class="form__item">
            <input class="form__item-text" type="text" name="content" value="{{ old('content') }}">

            <select class="create-form__item-select" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form__button">
            <button class="form__button-send" type="submit">作成</button>
        </div>
    </form>

    <div class="section__title">
        <h2>Todo検索</h2>
    </div>

    <form class="search-form" action="/todos/search" method="get">
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
            <select class="search-form__item-select" name="category_id">
                <option value="">カテゴリ</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
            </select>
        </div>

        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
    </form>

    <div class="table">
        <table class="table__inner">
            <tr class="table__row">
                <th class="tabel__title">
                    <span class="todo-table__header-span">Todo</span>
                    <span class="todo-table__header-span">カテゴリ</span>
                </th>
            </tr>

            @foreach($todos as $todo)
            <tr class="table__row">
                <td class=table__item>
                    <form class="update" action="/todos/update" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="table__item-1">
                            <input class="table__item-text" type="text" name="content" value="{{$todo['content']}}">
                            <input type="hidden" name="id" value="{{$todo['id']}}">
                        </div>

                        <div class="update-form__item">
                            <p class="update-form__itme-p">{{ $todo['category']['name'] }}</p>
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