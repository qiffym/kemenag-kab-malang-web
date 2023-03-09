@extends('layouts.submain')
@push('faq-active', 'active bg-success rounded')
@section('submain-layout')

<div class="row mb-4">
  <div class="display-3 text-center">
    Frequently Asked Questions
    <hr class="dropdown-divider">
  </div>
</div>

{{-- Accordion --}}
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
      @foreach ($faqs as $faq)
      <div class="accordion-item">
        <h2 class="accordion-header" id="{{ "panelsStayOpen-headingId".$faq->id }}">
          <button class="accordion-button" type="button" data-bs-toggle="collapse"
            data-bs-target="{{ "#panelsStayOpen-collapseId".$faq->id }}" aria-expanded="true"
            aria-controls="{{ "panelsStayOpen-collapseId".$faq->id }}">
            <span class="fs-5">{{ "#".$loop->iteration." ".$faq->question }}</span>
          </button>
        </h2>
        <div id="{{ "panelsStayOpen-collapseId".$faq->id }}"
          class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
          aria-labelledby="{{ "panelsStayOpen-headingId".$faq->id }}">
          <div class="accordion-body fs-5">
            {!! $faq->answer !!}
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>


@endsection