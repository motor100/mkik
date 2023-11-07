@section('title', 'Форма аттестации')

@extends('layouts.main')

@section('content')
<div class="page studentam-attestation-form-page">
  <div class="container">
    <div class="page-title">Форма аттестации</div>
    <div class="course">Курс {{ $id }}</div>
    <div class="attestation-forms documents">
      @foreach($attestation_forms as $af)
        <div class="attestation-forms-item">
          <a href="{{ Storage::url($af->file) }}" class="attestation-forms-item__link">{{ $af->learning_direction->title }}</a>
          @if($af->sig_file)
            <a class="sig-file" href="{{ Storage::url($af->sig_file) }}" download>
              <span class="sig-file-name">ЭЦП</span> 
              <img src="/img/sig-file-image.svg" class="sig-file-image" alt="">
            </a>
          @endif
          @if($af->key_file)
            <a class="key-file" href="{{ Storage::url($af->key_file) }}" download>
              <span class="sig-file-name">Ключ</span> 
              <img src="/img/key-file-image.svg" class="key-file-image" alt="">
            </a>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection