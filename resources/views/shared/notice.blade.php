<div id="notice">
    @foreach ($notices as $notice)
    <div class="notice-group">
        <h3>{{$notice->title}}</h3>
        <a href="{{$notice->url}}" style="background-color: #{{$notice->button_color}}">바로가기</a>
    </div>
    @endforeach
</div>
