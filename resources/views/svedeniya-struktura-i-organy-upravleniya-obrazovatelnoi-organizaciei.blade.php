@section('title', 'Структура и органы управления образовательной организацией')

@extends('layouts.main')

@section('content')
  <div class="page struktura-i-organy-upravleniya-obrazovatelnoj-organizaciej-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Структура и органы управления образовательной организацией</div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
      <div class="clear-both"></div>
      
      <div class="documents-wrapper">
        <div class="page-subtitle">Документы</div>
        <div class="documents">
          @foreach($documents as $doc)
            @include('document-list-item')
          @endforeach
        </div>
      </div>

    </div>
  </div>
@endsection