@section('title', 'Стипендии и иные виды материальной поддержки')

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-list svedeniya-pdf-list svedeniya-dokumenty-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Стипендии и иные виды материальной поддержки</div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection