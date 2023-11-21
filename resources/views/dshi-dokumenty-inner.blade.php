@section('title', $dshi_subcategory->title)

@extends('layouts.main')

@section('content')
  <div class="page dokumenty-page">
    <div class="container">
      <div class="page-title">{{ $dshi_subcategory->title }}</div>
      <div class="documents">
        @foreach($dshi_subcategory->documents as $doc)
          <div class="list-item">
            @switch( $doc->filetype )
              @case("pdf")
                <img class="icon" src="/img/pdf-icon.svg" alt="">
                <a class="name" href="{{ Storage::url($doc->file) }}" target="_blank">{{ $doc->title }}</a>
                @break
              @case("doc")
                <img class="icon" src="/img/word-icon.svg" alt="">
                <a class="name" href="{{ Storage::url($doc->file) }}" download>{{ $doc->title }}</a>
                @break
              @case("xls")
                <img class="icon" src="/img/excel-icon.svg" alt="">
                <a class="name" href="{{ Storage::url($doc->file) }}" download>{{ $doc->title }}</a>
                @break
            @endswitch

            @if($doc->sig_file)
              <a class="sig-file" href="{{ Storage::url($doc->sig_file) }}" download>
                <span class="sig-file-name">ЭЦП</span> 
                <img src="/img/sig-file-image.svg" class="sig-file-image" alt="">
              </a>
            @endif

            @if($doc->key_file)
              <a class="key-file" href="{{ Storage::url($doc->key_file) }}" download>
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