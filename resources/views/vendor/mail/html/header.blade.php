@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" target="_blank"  style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
<img src="https://buyjet.ng/assets/images/logo_dark.svg" width="100"  class="logo"  alt="{{ config('app.name') }}">
{{-- @else --}}
{{ $slot }}
{{-- @endif --}}
</a>
</td>
</tr>
