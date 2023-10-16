<?php $page_title = "51.02.01 Народное художественное творчество"; ?>

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-list svedeniya-pdf-list svedeniya-dokumenty-page svedeniya-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="documents">
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/ogseh-03-psihologiya-obshcheniya.pdf" target="_blank">ОГСЭ. 03 Психология общения</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/ogseh-04-inostrannyj-yazyk-anglijskij.pdf" target="_blank">ОГСЭ.04 Иностранный язык (английский)</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/ogseh-04-inostrannyj-yazyk-nemeckij.pdf" target="_blank">ОГСЭ.04 Иностранный язык (немецкий)</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/ogseh-05-fizicheskaya-kultura.pdf" target="_blank">ОГСЭ.05 Физическая культура</a>
        </div>
      </div>
    </div>
  </div>
@endsection