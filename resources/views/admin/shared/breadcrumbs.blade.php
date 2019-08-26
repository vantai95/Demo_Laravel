@if($breadcrumbs && $breadcrumbs['links'])
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
    @foreach($breadcrumbs['links'] as $link)
    <li class="breadcrumb-item active">
        <a href="{{ $link['href'] }}">{{ $link['text'] }}</a>
    </li>
    @endforeach
</ol>
@endif
