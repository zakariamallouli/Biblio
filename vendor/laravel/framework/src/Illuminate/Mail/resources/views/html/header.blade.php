<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')

<img src="">
<img src="{{ asset('images/libraria-logo-v3.png') }}" class="logo" alt="Libraria Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
