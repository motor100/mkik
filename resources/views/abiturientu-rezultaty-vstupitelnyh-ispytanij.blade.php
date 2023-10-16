@section('title', 'Результаты вступительных испытаний')

@extends('layouts.main')

@section('content')
  <div class="page rezultaty-vstupitelnyh-ispytanij-page">
    <div class="container">
      <div class="page-title">Результаты вступительных испытаний</div>
      
      @if(isset($text))
      <div class="text">
        {!! $text !!}
      </div>
      @endif
    </div>
  </div>
@endsection