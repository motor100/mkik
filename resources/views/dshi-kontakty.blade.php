<?php $page_title = "Контакты"; ?>

@extends('layouts.page_layout')

@section('style')
@endsection

@section('content')
  <div class="page dshi-kontakty-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="text">
        {!! $text !!}
      </div>
    </div>
  </div>
@endsection

@section('script')
@endsection