@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" target="_blank"  style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
<img src="https://buyjet.ng/assets/images/logo_dark.png" width="200"  class="logo"  alt="">
{{-- @else --}}
{{ $slot }}
{{-- @endif --}}
</a>
</td>
</tr>
