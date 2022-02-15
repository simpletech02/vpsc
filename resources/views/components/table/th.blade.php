@props(['sorting' => null])
<th scope="col"  @if($sorting) class="cursor" wire:click="changeSort('{{$sorting}}')" @endif>
    <span>
        {{$slot}}
        @if(($this->sorts[$sorting] ?? null) === 'asc')
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24"><path d="M5 15h14l-7-8z" stroke="currentColor" fill="currentColor"/></svg>
        @elseif(($this->sorts[$sorting] ?? null) === 'desc')
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24"><path d="M11.998 17l7-8h-14z" stroke="currentColor" fill="currentColor"/></svg>
        @elseif($sorting)
            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24"><path d="M8 16H4l6 6V2H8zm6-11v17h2V8h4l-6-6z" stroke="currentColor" fill="currentColor"/></svg>
        @endif
    </span>
</th>
