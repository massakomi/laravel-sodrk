<div class="row">
    <div class="col-xs-12 col-md-3 col-lg-12">
        <span class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <ul>
@foreach ($breadcrumbs as $item => $url)
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
    @if($loop->last)
                    <span itemprop="name">{{$item}}</span>
    @else
                    <a itemprop="item" href="{{$url}}"><span itemprop="name">{{$item}}</span></a>
                    <span class="sep">—</span>
    @endif

                    <meta itemprop="position" content="{{$loop->index}}">
                </li>
@endforeach

            </ul>
        </span>
    </div>
</div>

