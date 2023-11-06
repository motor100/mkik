@section('title', 'Форма аттестации')

@extends('layouts.main')

@section('content')
<div class="page studentam-attestation-form-page">
  <div class="container">
    <div class="page-title">Форма аттестации</div>
    <div class="course">Курс {{ $id }}</div>
    <div class="attestation-forms">
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Фортепиано</a>
      </div>
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Инструменты народного оркестра</a>
      </div>
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Оркестровые духовые и ударные инструменты</a>
      </div>
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Оркестровые струнные инструменты</a>
      </div>
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Вокальное искусство</a>
      </div>
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Сольное и хоровое народное пение</a>
      </div>
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Хоровое дирижирование</a>
      </div>
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Теория музыки</a>
      </div>
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Народное художественное творчество</a>
      </div>
      <div class="attestation-forms-item">
        <a href="#" class="attestation-forms-item__link">Музыкальное искусство эстрады</a>
      </div>
    </div>
  </div>
</div>
@endsection