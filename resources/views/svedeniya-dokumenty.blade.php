@section('title', 'Документы')

@extends('layouts.main')

@section('content')
  <div class="page subcategory-list svedeniya-dokumenty-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Документы</div>
      </div>

      <div class="svedeniya-links">
        @foreach($svedeniya_subcategories as $subcat)
          <div class="item">
            <a href="/svedeniya-ob-obrazovatelnoj-organizacii/dokumenty/{{ $subcat->slug }}" class="item__link">{{ $subcat->title }}</a>
          </div>
        @endforeach
      </div>

    </div>
  </div>
@endsection