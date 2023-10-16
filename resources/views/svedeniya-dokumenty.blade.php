@section('title', 'Документы')

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-list svedeniya-dokumenty-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Документы</div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection