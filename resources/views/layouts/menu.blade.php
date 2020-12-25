                    <div class="f_link"> 
				      @foreach ($data as $text => $url)
				         @if($url)
				             <p><a href="{{ $url }}"{{ strpos('/'.$path, $url) === 0 ? ' class=cur' : '' }}><i></i>{{ $text }}</a></p>
				         @else
							 <p class="hd">{!! $head !!}</p>
				         @endif
				      @endforeach
					</div>