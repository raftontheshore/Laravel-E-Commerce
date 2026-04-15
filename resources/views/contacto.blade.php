<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <title>Contacto - Catacumbas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style>
        @font-face {
            font-family: 'SystemFont';
            src: url('{{ asset('fonts/system-font-from-windows-3-1.otf') }}') format('opentype');
            font-display: swap;
        }

        html, body {
            background-color: #111 !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #ddd;
        }

        /* ── Page layout ──────────────────────────────────────── */
        .contact-wrapper {
            flex: 1;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 48px 16px 64px;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            width: 100%;
            max-width: 1000px;
            align-items: start;
        }

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ── Shared card base ─────────────────────────────────── */
        .contact-card {
            background: #161616;
            border: 1px solid #262626;
            border-radius: 14px;
            overflow: hidden;
        }

        /* ── Card header ──────────────────────────────────────── */
        .card-header-bar {
            background: #1a1a1a;
            border-bottom: 1px solid #262626;
            padding: 18px 28px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .card-header-bar span {
            font-family: 'SystemFont', monospace;
            font-size: 14px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: #c0392b;
        }

        /* ── Info card body ───────────────────────────────────── */
        .info-body {
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 12px;
            padding: 20px;
            background: #1a1a1a;
            border: 1px solid #222;
            border-radius: 10px;
            transition: border-color 0.15s, background 0.15s;
        }
        .info-item:hover {
            background: #1f1f1f;
            border-color: #2e2e2e;
        }

        .info-icon {
            width: 38px;
            height: 38px;
            background: #222;
            border: 1px solid #2e2e2e;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .info-icon i {
            font-size: 15px;
            color: #c0392b;
        }

        .info-text {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }
        .info-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #555;
            text-align: center;
        }
        .info-value {
            font-size: 13px;
            color: #bbb;
            line-height: 1.6;
            text-align: center;
        }
        .info-value a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.15s;
        }
        .info-value a:hover {
            color: #c0392b;
        }

        /* ── Form card body ───────────────────────────────────── */
        .form-body {
            padding: 28px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 14px;
        }

        .form-field {
            margin-bottom: 14px;
        }
        .form-field:last-of-type {
            margin-bottom: 0;
        }

        .form-field label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: #555;
            margin-bottom: 6px;
        }

        .input-wrap {
            display: flex;
            align-items: center;
            background: #1c1c1c;
            border: 1px solid #2e2e2e;
            border-radius: 8px;
            padding: 0 12px;
            gap: 10px;
            transition: border-color 0.15s;
        }
        .input-wrap:focus-within {
            border-color: #c0392b;
        }
        .input-wrap i {
            color: #444;
            font-size: 13px;
            flex-shrink: 0;
        }
        .input-wrap input,
        .input-wrap textarea {
            background: transparent;
            border: none;
            outline: none;
            color: #ddd;
            font-size: 14px;
            padding: 12px 0;
            width: 100%;
            resize: none;
        }
        .input-wrap input::placeholder,
        .input-wrap textarea::placeholder {
            color: #3a3a3a;
        }
        .input-wrap textarea {
            padding: 12px 0;
            min-height: 110px;
        }

        /* ── Submit button ────────────────────────────────────── */
        .btn-contact-submit {
            width: 100%;
            background: #c0392b;
            border: none;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.15s;
            letter-spacing: 0.5px;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-contact-submit:hover {
            background: #e74c3c;
        }

        /* ── Success / error alert ────────────────────────────── */
        .alert-dark {
            background: #1c1c1c;
            border: 1px solid #2a2a2a;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 13px;
            color: #bbb;
            margin-bottom: 20px;
        }
        .alert-dark.success { border-color: #1a3a1a; color: #4caf50; }
        .alert-dark.error   { border-color: #3a1a1a; color: #e74c3c; }
    </style>
</head>
<body>
    <x-navbar/>

    <div class="contact-wrapper">
        <div class="contact-grid">

            {{-- ── Left column: info ── --}}
            <div class="contact-card">
                <div class="card-header-bar">
                    <span>Encontranos</span>
                </div>

                <div class="info-body">

                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-telephone"></i></div>
                        <div class="info-text">
                            <span class="info-label">Teléfono</span>
                            <span class="info-value">
                                <a href="tel:+5493794000000">+54 379 4246721</a>
                            </span>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-envelope"></i></div>
                        <div class="info-text">
                            <span class="info-label">Email</span>
                            <span class="info-value">
                               <p> info@catacumbas.com </p>
                            </span>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-geo-alt"></i></div>
                        <div class="info-text">
                            <span class="info-label">Ubicación</span>
                            <span class="info-value">
                                123 Calle Y, Corrientes, Argentina
                            </span>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-clock"></i></div>
                        <div class="info-text">
                            <span class="info-label">Horario de atención</span>
                            <span class="info-value">
                                Lunes a Viernes<br>
                                09:00 a 18:00 hs
                            </span>
                        </div>
                    </div>

                </div>

                {{-- Social links footer --}}
                <div style="padding: 16px 20px; border-top: 1px solid #1e1e1e; display: flex; gap: 10px; justify-content: center;">
                    <a href="https://www.instagram.com/" target="_blank" style="display:flex;align-items:center;gap:6px;font-size:12px;color:#555;text-decoration:none;padding:7px 12px;background:#1a1a1a;border:1px solid #222;border-radius:6px;transition:color 0.15s,border-color 0.15s;"
                       onmouseover="this.style.color='#c0392b';this.style.borderColor='#c0392b'"
                       onmouseout="this.style.color='#555';this.style.borderColor='#222'">
                        <i class="bi bi-instagram"></i> @catacumbas
                    </a>
                    <a href="https://www.facebook.com/" target="_blank" style="display:flex;align-items:center;gap:6px;font-size:12px;color:#555;text-decoration:none;padding:7px 12px;background:#1a1a1a;border:1px solid #222;border-radius:6px;transition:color 0.15s,border-color 0.15s;"
                       onmouseover="this.style.color='#c0392b';this.style.borderColor='#c0392b'"
                       onmouseout="this.style.color='#555';this.style.borderColor='#222'">
                        <i class="bi bi-facebook"></i> Catacumbas
                    </a>
                </div>
            </div>

            {{-- ── Right column: form ── --}}
            <div class="contact-card">
                <div class="card-header-bar">
                    <span>Escribinos</span>
                </div>

                <div class="form-body">

                    @if(session('success'))
                        <div class="alert-dark success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert-dark error">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('/contacto') }}" method="POST">
                        @csrf

                        <div class="form-row">
                            <div class="form-field">
                                <label for="nombre">Nombre</label>
                                <div class="input-wrap">
                                    <i class="bi bi-person"></i>
                                    <input type="text" id="nombre" name="nombre"
                                           placeholder="Tu nombre"
                                           value="{{ old('nombre') }}" required>
                                </div>
                            </div>
                            <div class="form-field">
                                <label for="apellido">Apellido</label>
                                <div class="input-wrap">
                                    <i class="bi bi-person"></i>
                                    <input type="text" id="apellido" name="apellido"
                                           placeholder="Tu apellido"
                                           value="{{ old('apellido') }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-field">
                            <label for="email">Correo electrónico</label>
                            <div class="input-wrap">
                                <i class="bi bi-envelope"></i>
                                <input type="email" id="email" name="email"
                                       placeholder="tucorreo@ejemplo.com"
                                       value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-field">
                            <label for="asunto">Asunto</label>
                            <div class="input-wrap">
                                <i class="bi bi-chat-left-text"></i>
                                <input type="text" id="asunto" name="asunto"
                                       placeholder="¿En qué te podemos ayudar?"
                                       value="{{ old('asunto') }}">
                            </div>
                        </div>

                        <div class="form-field">
                            <label for="mensaje">Mensaje</label>
                            <div class="input-wrap" style="align-items: flex-start; padding-top: 2px;">
                                <i class="bi bi-pencil" style="margin-top: 14px;"></i>
                                <textarea id="mensaje" name="mensaje"
                                          placeholder="Escribí tu consulta acá..." required>{{ old('mensaje') }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn-contact-submit">
                            <i class="bi bi-send">
</body>                                
