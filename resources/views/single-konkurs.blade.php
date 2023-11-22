@section('title', $single_konkurs->title)

@extends('layouts.main')

@section('content')
  <div class="page single-konkurs-page single-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">{{ $single_konkurs->title }}</div>
        <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
      </div>
      <div class="single">
        <div class="konkursy-wrapper">
          <div class="item">
            <div class="image">
              <img src="{{ Storage::url($single_konkurs->image) }}" alt="">
            </div>
            <div class="content">
              <div class="title-wrapper">
                <div class="title">{{ $single_konkurs->title }}</div>
                <span class="date">{{ $single_konkurs->date_start }}</span>
                @if( $single_konkurs->date_stop )
                  <span class="date"> - {{ $single_konkurs->date_stop }}</span>
                @endif
              </div>
              @if( $single_konkurs->text )
                <div class="description-wrapper">
                  <div class="title">Описание</div>
                  <div class="text">{!! $single_konkurs->text !!}</div>
                </div>
              @endif
            </div>
          </div>
        </div>

        <div class="documents">
          @foreach($documents as $doc)
            @include('document-list-item')
          @endforeach
        </div>

        <div class="links text-bold">
          <a class="item" href="{{ $prev }}">Ранее</a>
          <a class="item font-bold" href="{{ route('home') }}">Главная</a>
          <a class="item font-bold" href="/konkursy">Конкурсы</a>
          <a class="item" href="{{ $next }}">Далее</a>     
        </div>

      </div>
    </div>
  </div>
@endsection