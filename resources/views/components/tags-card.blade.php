@props(['postTags'])
@php
$tags = explode(',', $postTags);
@endphp

<li>
    <strong>Tags : </strong>
    @foreach ($tags as $tag)
        {{$tag}},
    @endforeach
</li>