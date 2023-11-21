@section('title', 'Образование')

@extends('layouts.main')

@section('content')
  <div class="page subcategory-list dshi-obrazovanie-page">
    <div class="container">
      <div class="page-title">Образование</div>

      <div class="svedeniya-links">
        @foreach($svedeniya_subcategories as $subcat)
          <div class="item">
            <a href="/dshi/dokumenty/{{ $subcat->slug }}" class="item__link">{{ $subcat->title }}</a>
          </div>
        @endforeach
      </div>

    </div>
  </div>
@endsection