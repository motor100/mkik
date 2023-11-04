@section('title', 'Программы подготовки специалистов среднего звена')

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-list svedeniya-pdf-list svedeniya-dokumenty-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Программы подготовки специалистов среднего звена</div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
@endsection