@extends('layouts.submain')

{{-- Jika Ada Category --}}
@if (request('category'))
@section('submain-layout')

{{-- <form action="/unit" method="get">
  @if (request('category'))
  <input type="hidden" name="category" value="{{ request('category') }}">
@endif
</form> --}}
{{ Breadcrumbs::render('layanan') }}

<div class="row justify-content-between text-center text-md-start">
  <div class="col">
    <div class="display-4">{{ $subtitle }}</div>
  </div>
  <div class="col-md-4 mt-3">
    <select class="form-select" id="layananMenu">
      <option selected value="null">--Pilih Layanan Lainnya--</option>
      <option value="{{ url('/layanan?category=pendma') }}">Pendidikan Madrasah</option>
      <option value="{{ url('/layanan?category=pais') }}">Pendidikan Agama Islam</option>
      <option value="{{ url('/layanan?category=pontren') }}">Pondok Pesantren</option>
      <option value="{{ url('/layanan?category=pakri') }}">Pendidikan Agama Kristen</option>
      <option value="{{ url('/layanan?category=pakat') }}">Pendidikan Agama Katolik</option>
      <option value="{{ url('/layanan?category=pahin') }}">Pendidikan Agama Hindu</option>
      <option value="{{ url('/layanan?category=pabud') }}">Pendidikan Agama Buddha</option>
      <option value="{{ url('/layanan?category=haji') }}">Haji & Umroh</option>
    </select>
  </div>
</div>
<hr class="dropdown-divider">
<div class="row">
  <div class="col-lg-8">
    <div class="list-group list-group-flush lead">
      @foreach ($layanans as $post)
      <a href="/layanan/read/{{ $post->slug }}"
        class="list-group-item list-group-item-action list-group-item-success">{{ $loop->iteration . '. '. $post->title }}</a>
      @endforeach
    </div>
  </div>
</div>



<script type="text/javascript">
  const urlMenu = document.getElementById('layananMenu');
  urlMenu.onchange = function() {
    const userOption =this.options[this.selectedIndex];
    if(userOption.value != "null") {
      window.open(userOption.value, "_self");
    }
  }
</script>
@endsection






















{{-- Jika tidak ada Category --}}
@else
@php
$home = url('/');
header("Location: $home");
@endphp
@endif