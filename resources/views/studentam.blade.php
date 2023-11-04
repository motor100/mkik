@section('title', 'Студентам')

@extends('layouts.main')

@section('style')
@endsection

@section('content')
  <div class="page istoriya-page">
    <div class="container">
      <div class="page-title">Студентам</div>

      <div class="item">
        <a href="/studentam/raspisanie">Расписание</a>
      </div>

      <div class="text">
        {!! $text !!}
      </div>

      <div class="clear-both"></div>
    </div>
  </div>
@endsection

@section('script')
@endsection