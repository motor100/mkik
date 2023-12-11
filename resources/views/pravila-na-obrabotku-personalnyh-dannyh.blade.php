@section('title', 'Правила на обработку персональных данных')

@extends('layouts.main')

@section('content')
  <div class="page politika-konfidencialnosti-page">
    <div class="container">
      <div class="page-title-wrapper">
        <div class="page-title">Правила на обработку персональных данных</div>
        <span class="history-back" onclick="window.history.back()">&lt;&lt;&nbsp;Назад</span>
      </div>
      <div class="documents">
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="../../storage/uploads/pravila-na-obrabotku-personalnyh-dannyh/soglasie-na-obrabotku-personalnyh-dannyh.pdf" target="_blank">Согласие на обработку персональных  данных</a>
        </div>
        <div class="list-item">
          <img class="icon" src="/img/pdf-icon.svg" alt="">
          <a class="name" href="../../storage/uploads/pravila-na-obrabotku-personalnyh-dannyh/soglasie_zakonogo_predstavitela.pdf" target="_blank">Согласие законного представителя на обработку персональных данных</a>
        </div>
      </div>
    </div>
  </div>
@endsection