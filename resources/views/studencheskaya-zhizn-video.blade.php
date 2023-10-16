@section('title', 'Видео')

@extends('layouts.main')

@section('style')
@endsection

@section('content')
  <div class="page video-page">
    <div class="container">
      <div class="page-title">Видео</div>
      <div class="videos-wrapper">
        @foreach($videos as $vd)
          <div class="item">
            <div class="image">
              <a href="{{ $vd->video }}" target="_blank">
                <img src="{{ $vd->image }}" alt="">
              </a>              
            </div>
            <div class="title">{{ $vd->short_title }}<br>
            {{ $vd->date }}
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('script')
@endsection