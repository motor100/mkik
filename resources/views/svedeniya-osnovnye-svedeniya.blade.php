<?php $page_title = "Основные сведения"; ?>

@extends('layouts.page_layout')

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