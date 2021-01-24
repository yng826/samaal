<div id="notice" class="main-modal">
    @foreach ($notices as $notice)
    <div class="notice-group main-modal__wrap">
        <h3 class="main-modal__title">{{$notice->title}}</h3>
        <a href="{{$notice->url}}" style="background-color: #{{$notice->button_color}}" class="main-modal__link">바로가기</a>
    </div>
    @endforeach
    <button type="button" class="main-modal__close">닫기</button>
</div>
