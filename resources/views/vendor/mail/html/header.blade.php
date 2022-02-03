<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                {{--<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">--}}
                
                <img src="https://intranet.matematicas.ciencias.uchile.cl/img/logoBaner.png"  alt="Laravel Logo">
            @else
            <img src="https://intranet.matematicas.ciencias.uchile.cl/img/logoBaner.png"  alt="Laravel Logo">
                {{--{{ $slot }}--}}
            @endif
        </a>
    </td>
</tr>
