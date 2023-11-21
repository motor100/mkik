@section('title', 'Противодействие коррупции')

@extends('layouts.main')

@section('content')
  <div class="page subcategory-list protivodejstvie-korrupcii-page">
    <div class="container">
      <div class="page-title">Противодействие коррупции</div>

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