<?php $page_title = "Материально-техническое обеспечение и оснащенность образовательного процесса"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page materialno-tekhnicheskoe-obespechenie-page">
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