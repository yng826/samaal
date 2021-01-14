<button class="question-pop__close-btn layer-popup__close-btn" type="button">닫기</button>
<div class="manager-pop__title">
    <h3>Representative</h3>
</div>

@php
    debug($business)
@endphp
<div class="manager-pop__list">
    <dl>
        <dt>Representative</dt>
        <dd>{{ $business->name }}</dd>
    </dl>
    <dl>
        <dt>Tel</dt>
        <dd><a href="tel:{{ $business->tel }}">{{$business->tel_view}}</a></dd>
    </dl>
    <dl>
        <dt>E-mail</dt>
        <dd><a href="mailto:{{$business->email}}">{{$business->email}}</a></dd>
    </dl>
</div>
