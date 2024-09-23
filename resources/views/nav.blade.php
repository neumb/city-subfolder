@inject('nav', 'navigation')
<nav class="nav nav-underline">
    @foreach ($nav as $item)
      <a @class([
            "nav-link",
            "active" => $item->isActive
        ])
        href="{{ $item->url }}">{{ $item->name }}</a>
    @endforeach
</nav>
