@section('title', $single_kalendar->title)

@extends('layouts.main')

@section('content')
  <div class="page single-kalendar-studenta-page single-page">
    <div class="single-news-content">
      <div class="container">
        <div class="page-title-wrapper">
          <div class="page-title">{{ $single_kalendar->title }}</div>
          <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
        </div>
        <div class="info">
          @if($single_kalendar->date)
            <div class="date-wrapper">
              <span class="text-bold">Когда: </span>
              {{ $single_kalendar->date }}
            </div>
          @endif
          @if($single_kalendar->place)
            <div class="place-wrapper">
              <span class="text-bold">Где: </span>
              {{ $single_kalendar->place }}
            </div>
          @endif
        </div>
        <div class="images">
          <div class="row">
            <div class="col-md-9">
              <div class="images">
                <div class="single-image">
                  <img src="{{ $single_kalendar->image }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text">
          <div class="single-text">{!! $single_kalendar->text !!}</div>
        </div>
        <div class="links text-bold">
          <a class="item" href="{{ $prev }}">Предыдущее мероприятие</a>
          <a class="item font-bold" href="{{ route('home') }}">Главная</a>
          <a class="item font-bold" href="/kalendar-studenta-archive">Архив</a>
          <a class="item" href="{{ $next }}">Следующее мероприятие</a>     
        </div>
      </div>
    </div>
  </div>
@endsection