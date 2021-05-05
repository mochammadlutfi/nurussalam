<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('img/logo/logo_ver.png') }}" class="logo" alt="Logo Pondok Pesantren Nurussalam">
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>
