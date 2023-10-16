<?php $page_title = $single_afisha->title; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page single-afisha-page single-page">
    <div class="single-afisha-content">
      <div class="container">
        <div class="page-title-wrapper">
          <div class="page-title"><?php echo $page_title; ?></div>
          <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
        </div>
        <div class="info">
          @if($single_afisha->date)
            <div class="date-wrapper">
              <span class="text-bold">Когда: </span>
              {{ $single_afisha->date }}
            </div>
          @endif
          @if($single_afisha->place)
            <div class="place-wrapper">
              <span class="text-bold">Где: </span>
              {{ $single_afisha->place }}
            </div>
          @endif
          @if($single_afisha->address)
            <div class="address-wrapper">
              <span class="text-bold">Адрес: </span>
              {{ $single_afisha->address }}
            </div>
          @endif
          <div class="price-wrapper">
            <span class="text-bold">Стоимость: </span>
            @if($single_afisha->price)
              <span class="price">{{ $single_afisha->price }}р.</span>
            @else
              <span class="price">Вход свободный</span>
            @endif
          </div>
        </div>
        @if($single_afisha->image)
          <div class="single-image">
            <img src="{{ $single_afisha->image }}" alt="">
          </div>
        @endif
        <div class="text">
          <div class="single-text">{!! $single_afisha->text !!}</div>
        </div>
        <div class="links text-bold">
          <a class="item" href="{{ $prev }}">Предыдущее мероприятие</a>
          <a class="item font-bold" href="{{ route('home') }}">Главная</a>
          <a class="item font-bold" href="/afisha-archive">Архив</a>
          <a class="item" href="{{ $next }}">Следующее мероприятие</a>     
        </div>
      </div>
    </div>
  </div>
@endsection