@if ($paginator->hasPages())
    <div class="pagination" role="navigation">

   <table>
      <tbody>
         <tr>
            <td class="col1">


        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
             
        @else
            <span>
                <a href="{{ $paginator->previousPageUrl() }}" class="btn_prev" rel="prev" aria-label="@lang('pagination.previous')"></a>
            </span>
        @endif
            </td>
            <td class="col2">

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="disabled" aria-disabled="true"><span>{{ $element }}</span></span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="current" aria-current="page">{{ $page }}</span>
                    @else
                        <span><a href="{{ $url }}">{{ $page }}</a></span>
                    @endif
                    @if (!$loop->last)
                        <span class="pag_sep">.</span>
                    @endif                    
                @endforeach
            @endif

        @endforeach
            </td>
            <td class="col3">

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <span>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn_next" aria-label="@lang('pagination.next')"></a>
            </span>
        @else
            <span class="disabled" aria-disabled="true" class="btn_next" aria-label="@lang('pagination.next')">
                
            </span>
        @endif
               
            </td>
         </tr>
      </tbody>
   </table>
    </div>
@endif
