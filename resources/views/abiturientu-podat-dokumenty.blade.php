<?php $page_title = "Подать документы"; ?>

@extends('layouts.page_layout')

@section('style')
  <link rel="stylesheet" href="{{ asset('/admin/css/air-datepicker.css') }}">
@endsection

@section('content')
  <div class="page podat-dokumenty-page">
    <div class="container">
      <div class="page-title"><?php echo $page_title; ?></div>
      <div class="required-text">Все поля обязательны для заполнения*</div>

      @if($errors->any())
        <div class="message-text">{{$errors->first()}}</div>
      @endif

      <form class="form" action="/abiturientu/podat-dokumenty-add" enctype="multipart/form-data" method="post">
        <div class="form-group">
          <div class="row">
            <div class="col-xl-4 col-md-6 ms-auto">
              <label for="surname" class="input-label">Фамилия</label>
              <input type="text" name="surname" id="surname" class="input-field letters-only" minlength="3" maxlength="100" required value="">
            </div>
            <div class="col-xl-4 col-md-6 me-auto">
              <label for="name" class="input-label">Имя</label>
              <input type="text" name="name" id="name" class="input-field letters-only" minlength="3" maxlength="100" required value="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xl-4 col-md-6 ms-auto">
              <label for="patronymic" class="input-label">Отчество</label>
              <input type="text" name="patronymic" id="patronymic" class="input-field letters-only" minlength="3" maxlength="100" required value="">
            </div>
            <div class="col-xl-4 col-md-6 me-auto">
              <label for="birth-date" class="input-label">Дата рождения</label>
              <input type="text" name="birth-date" id="birth-date" class="input-field datepicker-here" minlength="10" maxlength="10" readonly required value="">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-xl-4 col-md-6 ms-auto">
              <label for="phone" class="input-label">Телефон</label>
              <input type="text" name="phone" id="phone" class="input-field" minlength="16" maxlength="16" required value="">
            </div>
            <div class="col-xl-4 col-md-6 me-auto">
              <label for="email" class="input-label">Email</label>
              <input type="email" name="email" id="email" class="input-field" minlength="8" maxlength="40" required value="">
            </div>
          </div>
        </div>

        <div class="form-group middle-form-group">
          <div class="row">
            <div class="col-xl-8 mx-auto">
              <div class="label-text">Аттестат (pdf)</div>
              <input type="file" name="attestat" class="inputfile" id="input-attestat-file" required accept="application/pdf">
              <label class="custom-inputfile-label" for="input-attestat-file">Загрузить</label>
              <span class="pdf-file-text">Файл не выбран</span>
            </div>
          </div>
        </div>

        <div class="form-group middle-form-group">
          <div class="row">
            <div class="col-xl-8 mx-auto">
              <div class="label-text">Паспорт (pdf</div>
              <input type="file" name="passport" class="inputfile" id="input-passport-file" required accept="application/pdf">
              <label class="custom-inputfile-label" for="input-passport-file">Загрузить</label>
              <span class="pdf-file-text">Файл не выбран</span>
            </div>
          </div>
        </div>

        <div class="form-group last-form-group">
          <div class="row">
            <div class="col-xl-8 mx-auto">
              <input type="checkbox" name="processing" class="custom-checkbox" id="processing">
              <label for="processing" class="custom-checkbox-label">
                <span class="span-text">Я согласен(на) с <a href="/politika-konfidencialnosti" target="_blank">политикой</a> конфиденциальности</span>
              </label>
            </div>
            <div class="col-xl-8 mx-auto">
              <input type="checkbox" name="privacy" class="custom-checkbox" id="privacy">
              <label for="privacy" class="custom-checkbox-label">
                <span class="span-text">Я согласен(на) с <a href="/politika-konfidencialnosti" target="_blank">правилами</a> на обработку персональных данных</span>
              </label>
            </div>
          </div>
        </div>
        
        @csrf
        <button type="submit" class="submit-btn">Подать документы</button>
      </form>
      
    </div>
  </div>
@endsection

@section('script')
  <script src="{{ asset('/admin/js/air-datepicker.js') }}"></script>
  <script src="{{ asset('/admin/js/imask.js') }}"></script>
@endsection