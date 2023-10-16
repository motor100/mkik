<?php $page_title = "Календарь студента " . $year; ?>

@extends('layouts.main')

@section('content')
  <div class="page kalendar-studenta-archive-year-page archive-year-page">
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