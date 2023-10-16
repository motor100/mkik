@section('title', 'Конкурсы')

@extends('layouts.main')

@section('content')
  <div class="page konkursy-page">
    <div class="container">
      <div class="page-title">Конкурсы</div>
      @foreach($konkursy as $knks)
        <div class="konkursy-wrapper">
          <div class="item">
            <div class="image">
              <img src="{{ $knks->image }}" alt="">
            </div>
            <div class="content">
              <div class="title-wrapper">
                <div class="title">{{ $knks->title }}</div>
                <span class="date">{{ $knks->date_start }}</span>
                @if( $knks->date_stop )
                  <span class="place"> - {{ $knks->date_stop }}</span>
                @endif
              </div>
              <div class="more">
                <a href="/konkursy/{{ $knks->slug }}">Подробнее</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection