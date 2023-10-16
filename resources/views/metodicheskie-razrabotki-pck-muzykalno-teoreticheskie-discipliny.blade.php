<?php $page_title = "ПЦК Музыкально-теоретические дисциплины"; ?>

@extends('layouts.page_layout')

@section('content')
  <div class="page svedeniya-list svedeniya-pdf-list svedeniya-dokumenty-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="documents">
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/metodicheskie-razrabotki-pck-muzykalno-teoreticheskie-discipliny.pdf" target="_blank">ПЦК Музыкально-теоретические дисциплины</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/metodicheskie-razrabotki-pervaya-ledi-tanca.pdf" target="_blank">Первая леди танца</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/metodicheskie-razrabotki-shedevry-kinomuzyki-g-sviridova.pdf" target="_blank">Шедевры киномузыки Г.Свиридова</a>
        </div>
      </div>
    </div>
  </div>
@endsection