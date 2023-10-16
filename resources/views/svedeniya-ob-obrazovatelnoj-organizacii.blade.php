<?php $page_title = "Сведения об образовательной организации"; ?>

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-list svedeniya-ob-obrazovatelnoj-organizacii-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="svedeniya-links">
        @if (isset($categories))
          @foreach($categories as $cat)
            <div class="item">
              <a href="/svedeniya-ob-obrazovatelnoj-organizacii/{{ $cat->slug }}" class="item__link">{{ $cat->title }}</a>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection