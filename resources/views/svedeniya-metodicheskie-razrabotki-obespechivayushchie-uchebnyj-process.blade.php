@section('title', 'Методические разработки, обеспечивающие учебный процесс')

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-list svedeniya-pdf-list svedeniya-dokumenty-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Методические разработки, обеспечивающие учебный процесс</div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection