<tr>
    <td class="header">
        {{-- <a href="{{ $url }}" style="display: inline-block;"> --}}
        @if (trim($slot) === 'Laravel')
            {{-- <img src="https://pos-pintar.digitaldesa.id/storage/instance_logo/1717008479_Frame 527.png" class="logo" alt="Digides Logo">
 --}}
            <img src="https://media.licdn.com/dms/image/C4D0BAQEEMeqMAfU4Ig/company-logo_100_100/0/1630483320075?e=1725494400&v=beta&t=L6_aJx5BVkixyegKqGYbqD6XRz9xAGjoJmHpOCHLptE"
                class="logo" alt="Digides Logo">
        @else
            {{ $slot }}
        @endif
        {{-- </a> --}}
    </td>
</tr>
