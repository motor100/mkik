<?php $page_title = "Противодействие коррупции"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page protivodejstvie-korrupcii-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection