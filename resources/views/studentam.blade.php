<?php $page_title = "Студентам"; ?>

@extends('layouts.page_layout')

@section('style')
@endsection

@section('content')
  <div class="page istoriya-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>

      <div class="item">
        <a href="/studentam/raspisanie">Расписание</a>
      </div>

      <div class="text">
        {!! $text !!}
      </div>

    </div>
  </div>
@endsection

@section('script')
@endsection