<?php $page_title = "Учредительные документы"; ?>

@extends('layouts.main')

@section('content')
  <div class="page svedeniya-pdf-list svedeniya-dokumenty-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title"><?php echo $page_title; ?></div>
      </div>
      <div class="documents">
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/ustav-4.pdf" target="_blank">Устав №4</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/ustav-5.pdf" target="_blank">Устав №5</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/prikaz-ministra-o-vnesenii-izmenenij-v-ustav-4.pdf" target="_blank">Приказ министра о внесении изменений в Устав №4</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/prikaz-ministra-o-vnesenii-izmenenij-v-ustav-5.pdf" target="_blank">Приказ министра о внесении изменений в Устав №5</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/licenziya-i-svidetelstvo-o-gosudarstvennoj-akkreditacii-s-prilozheniem.pdf" target="_blank">Лицензия и Свидетельство о государственной аккредитации с приложением</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/reshenie-uchreditelya-o-sozdanii-uchrezhdeniya.pdf" target="_blank">Решение учредителя о создании учреждения</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/reshenie-uchreditelya-o-naznachenii-rukovoditelya-uchrezhdeniya.pdf" target="_blank">Решение учредителя о назначении руководителя учреждения</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="/img/svedeniya/dokumenty/svidetelstvo-o-postanovke-na-uchet-v-ifns.pdf" target="_blank">Свидетельство о постановке на учет в ИФНС</a>
        </div>      
      </div>
    </div>
  </div>
@endsection