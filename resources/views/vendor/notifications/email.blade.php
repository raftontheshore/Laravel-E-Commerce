@component('mail::message')

{{-- HEADER --}}
<div style="text-align: center; padding: 24px 0 28px; border-bottom: 3px solid #c0392b; margin-bottom: 28px;">
    <p style="font-family: 'Courier New', monospace; font-size: 24px; letter-spacing: 6px; color: #c0392b; margin: 0; text-transform: uppercase; font-weight: bold;">
        ☠ CATACUMBAS
    </p>
    <p style="font-size: 11px; color: #999999; margin: 6px 0 0; letter-spacing: 3px; text-transform: uppercase;">
        Retro Gaming Store
    </p>
</div>

{{-- SALUDO --}}
@if (! empty($greeting))
<p style="font-size: 18px; color: #1a1a1a; font-weight: 700; margin-bottom: 12px;">
    {{ $greeting }}
</p>
@else
<p style="font-size: 18px; color: #1a1a1a; font-weight: 700; margin-bottom: 12px;">
    @if ($level === 'error') ¡Ups! @else ¡Hola! @endif
</p>
@endif

{{-- LÍNEAS DE INTRODUCCIÓN --}}
@foreach ($introLines as $line)
<p style="color: #555555; font-size: 14px; line-height: 1.8; margin-bottom: 12px;">
    @if (str_contains($line, 'password reset request'))
        Recibimos una solicitud para restablecer la contraseña de tu cuenta.
    @elseif (str_contains($line, 'expire in'))
        Este link expirará en 60 minutos.
    @elseif (str_contains($line, 'did not request a password reset'))
        Si no solicitaste restablecer tu contraseña, podés ignorar este email.
    @elseif (str_contains($line, 'did not request'))
        Si no solicitaste esto, podés ignorar este email.
    @else
        {{ $line }}
    @endif
</p>
@endforeach

{{-- BOTÓN --}}
@isset($actionText)
<div style="text-align: center; margin: 32px 0;">
    <a href="{{ $actionUrl }}"
       style="background-color: #c0392b; color: #ffffff; padding: 14px 32px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; display: inline-block;">
        @if ($actionText === 'Reset Password')
            Restablecer Contraseña
        @elseif ($actionText === 'Verify Email Address')
            Verificar Email
        @else
            {{ $actionText }}
        @endif
    </a>
</div>
@endisset

{{-- LÍNEAS DE CIERRE --}}
@foreach ($outroLines as $line)
<p style="color: #555555; font-size: 14px; line-height: 1.8; margin-bottom: 12px;">
    @if (str_contains($line, 'expire in'))
        Este link expirará en 60 minutos.
    @elseif (str_contains($line, 'did not request a password reset'))
        Si no solicitaste restablecer tu contraseña, podés ignorar este email.
    @elseif (str_contains($line, 'did not request'))
        Si no solicitaste esto, podés ignorar este email.
    @else
        {{ $line }}
    @endif
</p>
@endforeach

<div style="border-top: 1px solid #eeeeee; margin: 28px 0 20px;"></div>

{{-- FIRMA --}}
<p style="color: #999999; font-size: 13px; margin-bottom: 2px;">Saludos,</p>
<p style="font-family: 'Courier New', monospace; color: #c0392b; font-size: 15px; font-weight: bold; letter-spacing: 3px; margin: 0;">
    ☠ CATACUMBAS
</p>

{{-- LINK DE RESPALDO --}}
@isset($actionText)
<div style="background: #f8f8f8; border: 1px solid #eeeeee; border-radius: 8px; padding: 16px; margin-top: 28px;">
    <p style="color: #999999; font-size: 11px; margin: 0 0 6px; text-transform: uppercase; letter-spacing: 1px;">
        ¿El botón no funciona? Copiá este link:
    </p>
    <a href="{{ $actionUrl }}"
       style="color: #c0392b; font-size: 11px; word-break: break-all; text-decoration: none;">
        {{ $actionUrl }}
    </a>
</div>
@endisset

{{-- FOOTER --}}
<div style="text-align: center; margin-top: 32px; padding-top: 20px; border-top: 1px solid #eeeeee;">
    <p style="color: #bbbbbb; font-size: 11px; margin: 4px 0 0;">
        Si no solicitaste esto, podés ignorar este email.
    </p>
</div>

@endcomponent