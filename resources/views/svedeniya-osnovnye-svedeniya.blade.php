<?php $page_title = "Основные сведения"; ?>

@extends('layouts.main')

@section('content')
  <div class="page osnovnye-svedeniya-page">
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