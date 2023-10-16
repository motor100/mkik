<?php $page_title = "Афиша " . $year; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page afisha-archive-year-page archive-year-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
        <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
      </div>
      <div class="cnt">
        {!! $content !!}
      </div>
    </div>
  </div>
@endsection