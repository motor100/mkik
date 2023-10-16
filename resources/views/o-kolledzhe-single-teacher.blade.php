<?php $page_title = $single_teacher->title; ?>

@extends('layouts.main')

@section('content')
  <div class="page single-teacher-page">
    <div class="single-news-content">
      <div class="container">
        <div class="page-title-wrapper">
          <div class="page-title"><?php echo $page_title; ?></div>
          <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
        </div>
        <div class="post">{{ $single_teacher->post }}</div>
        <div class="row">
          <div class="col-md-3">
            <div class="photo">
              <img src="{{ $single_teacher->image }}" alt="">
            </div>
          </div>
          <div class="col-md-9">
            <div class="text">{!! $single_teacher->text !!}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection