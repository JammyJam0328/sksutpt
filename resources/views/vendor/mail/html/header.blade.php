<tr>
    <td class="header">
        <a href="{{ $url }}"
            style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('image/sksu1.png') }}"
                    class="logo"
                    alt="Laravel Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
