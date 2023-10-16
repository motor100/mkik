<?php $page_title = "Календарные учебные графики"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page svedeniya-pdf-list svedeniya-dokumenty-page">
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