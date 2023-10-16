@section('title', 'Афиша')

@extends('layouts.main')

@section('content')
  <div class="page afisha-archive-year-page archive-year-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Афиша</div>
        <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
      </div>
      <div class="cnt">
        {!! $content !!}
      </div>
    </div>
  </div>
@endsection