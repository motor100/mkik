@section('title', 'Корзина')

@extends('layouts.main')

@section('style')
@endsection

@section('content')
  <div class="page istoriya-page">
    <div class="container">
      <div class="page-title">Корзина</div>
      <div class="text">
        {!! $text !!}
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
@endsection

@section('script')
@endsection