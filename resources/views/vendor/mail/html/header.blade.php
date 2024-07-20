@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" target="_blank"  style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
<img src="{{ asset('assets/images/buyJetLogo.png') }}" width="100"  class="logo"  alt="{{ config('app.name') }}">
{{-- @else --}}
{{ $slot }}
{{-- @endif --}}
</a>
</td>
</tr>
