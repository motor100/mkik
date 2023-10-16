<?php $page_title = "Результаты вступительных испытаний"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page rezultaty-vstupitelnyh-ispytanij-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      
      @if(isset($text))
      <div class="text">
        {!! $text !!}
      </div>
      @endif
    </div>
  </div>
@endsection