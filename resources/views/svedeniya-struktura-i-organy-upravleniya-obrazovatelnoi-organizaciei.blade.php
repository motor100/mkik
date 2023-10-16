<?php $page_title = "Структура и органы управления образовательной организацией"; ?>

@extends('layouts.main')

@section('content')
  <div class="page struktura-i-organy-upravleniya-obrazovatelnoj-organizaciej-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection