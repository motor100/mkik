<?php $page_title = "ПЦК Фортепиано"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page svedeniya-pdf-list svedeniya-dokumenty-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="documents">
        <div class="subtitle">Заявления</div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/metodicheskie-razrabotki-pck-fortepiano.pdf" target="_blank">ПЦК Фортепиано</a>
        </div>
      </div>
    </div>
  </div>
@endsection