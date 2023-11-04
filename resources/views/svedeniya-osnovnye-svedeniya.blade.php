@section('title', 'Основные сведения')

@extends('layouts.main')

@section('content')
  <div class="page osnovnye-svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Основные сведения</div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
@endsection