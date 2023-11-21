@section('title', 'Рабочие программы и фонд оценочных средств')

@extends('layouts.main')

@section('content')
  <div class="page subcategory-list svedeniya-pdf-list svedeniya-dokumenty-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Рабочие программы и фонд оценочных средств</div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
@endsection