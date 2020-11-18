@foreach($childrens as $children)
<span class="border" style="margin-left: {{ 30*($children->depth) }}px;">
    {{ $children->name }}
    <a class="btn btn-outline-info btn-xs m-2" href="/admin/menu/{{ $children->id }}/edit">수정</a>
    <a class="btn btn-outline-info btn-xs" href="/admin/menu/create?parent_id={{ $children->id }}&depth={{ $children->depth }}">하위 추가</a>
</span>
<br/>

@if(isset($children->childrens) && count($children->childrens) > 0)
    @include('admin.menu.menusub',['childrens' => $children->childrens])
@endif
@endforeach
