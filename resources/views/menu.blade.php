                    <div class="l_links"> 
				      @foreach ($data as $text => $url)
				         @if($url)
				             <a href="{{ $url }}"{{ strpos('/'.$path, $url) === 0 ? ' class=cur' : '' }}><i></i>{!! $text !!}</a>
				         @else
							 <p class="l_head">{{ $text }}</p>
				         @endif
				      @endforeach
					</div>