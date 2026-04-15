<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Catacumbas - Comercialización</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <style>
    :root {
      --rojo: #dc2626;
      --rojo-hover: #b91c1c;
    }

    body {
      background-color: #000;
      color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }

    /* ── Navbar ── */
    .navbar {
      background-color: #0a0a0a;
      border-bottom: 1px solid #1f1f1f;
    }
    .navbar-brand {
      font-size: 1.4rem;
      font-weight: 800;
      letter-spacing: 2px;
      color: #fff !important;
    }
    .navbar .nav-link {
      color: rgba(255,255,255,.7);
      font-weight: 500;
      font-size: 0.9rem;
      letter-spacing: 0.5px;
      transition: color .2s;
    }
    .navbar .nav-link:hover,
    .navbar .nav-link.active {
      color: var(--rojo);
    }

    /* ── Hero ── */
    .section-hero {
      padding: 4.5rem 1rem 2.5rem;
      text-align: center;
      border-bottom: 1px solid #1a1a1a;
    }
    .section-hero h1 {
      font-size: 2.4rem;
      font-weight: 800;
      letter-spacing: 1px;
      color: #fff;
    }
    .section-hero p {
      color: #9ca3af;
      font-size: 0.97rem;
      max-width: 520px;
      margin: 0.6rem auto 0;
      line-height: 1.6;
    }

    /* ── Cards ── */
    .info-card {
      background-color: #111;
      border: 1px solid #222;
      border-radius: 10px;
      padding: 2.2rem 1.5rem;
      text-align: center;
      height: 100%;
      transition: border-color .25s, transform .2s;
    }
    .info-card:hover {
      border-color: var(--rojo);
      transform: translateY(-3px);
    }
    .info-card .icon-wrap {
      width: 54px;
      height: 54px;
      border-radius: 50%;
      background-color: #1a0505;
      border: 1px solid #3a0808;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.1rem;
    }
    .info-card .icon-wrap i {
      font-size: 1.3rem;
      color: var(--rojo);
    }
    .info-card h5 {
      font-weight: 700;
      font-size: 1rem;
      color: #fff;
      margin-bottom: 0.6rem;
    }
    .info-card p {
      font-size: 0.875rem;
      color: #9ca3af;
      line-height: 1.65;
      margin: 0;
    }

    /* ── FAQ title ── */
    .faq-title {
      font-size: 1.5rem;
      font-weight: 800;
      letter-spacing: 1px;
      border-left: 4px solid var(--rojo);
      padding-left: 12px;
      color: #fff;
    }

    /* ── Accordion ── */
    .accordion-item {
      background-color: #111;
      border: 1px solid #222;
      border-radius: 8px !important;
      margin-bottom: 0.5rem;
      overflow: hidden;
    }
    .accordion-button {
      background-color: #111;
      color: #fff;
      font-weight: 600;
      font-size: 0.92rem;
      border-radius: 8px !important;
      box-shadow: none !important;
    }
    .accordion-button:not(.collapsed) {
      background-color: #1a0505;
      color: var(--rojo);
      box-shadow: none !important;
    }
    .accordion-button::after {
      filter: invert(1);
    }
    .accordion-button:not(.collapsed)::after {
      filter: invert(0) sepia(1) saturate(5) hue-rotate(330deg);
    }
    .accordion-body {
      background-color: #0d0d0d;
      color: #9ca3af;
      font-size: 0.875rem;
      line-height: 1.7;
      border-top: 1px solid #1f1f1f;
    }
    .accordion-body a {
      color: var(--rojo);
      text-decoration: none;
    }
    .accordion-body a:hover {
      text-decoration: underline;
    }
    .accordion-body strong {
      color: #d1d5db;
    }

  </style>
</head>
<body>
    <x-navbar />


  <!-- Hero -->
  <section class="section-hero">
    <h1>Comercialización</h1>
    <p>Conocé nuestras formas de compra, envíos y medios de pago disponibles.</p>
  </section>

  <!-- Info Cards -->
  <section class="container py-5">
    <div class="row g-4">

      <div class="col-md-4">
        <div class="info-card">
          <div class="icon-wrap">
            <i class="fas fa-truck"></i>
          </div>
          <h5>Envíos</h5>
          <p>Enviamos desde Corrientes a cualquier punto de Argentina todos los días, a través de correo certificado para que tu consola llegue impecable.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-card">
          <div class="icon-wrap">
            <i class="fas fa-credit-card"></i>
          </div>
          <h5>Formas de Pago</h5>
          <p>Aceptamos tarjetas de débito y crédito vía Mercado Pago. Pagando por transferencia bancaria o efectivo obtenés un <strong style="color:#fff">10% de descuento</strong>.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-card">
          <div class="icon-wrap">
            <i class="fas fa-rotate"></i>
          </div>
          <h5>Garantía y Cambios</h5>
          <p>Ofrecemos 3 meses de garantía en consolas reacondicionadas y chipeadas. Los cambios se evalúan caso por caso dentro de los 10 días de recibido el paquete.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- FAQ -->
  <section class="container pb-5">
    <h2 class="faq-title mb-2">DESPEJA TUS DUDAS</h2>
    <p class="text-secondary mb-4" style="font-size:.875rem;">Encontrá las respuestas a las consultas más frecuentes a continuación.</p>

    <div class="accordion" id="acordeonCatacumbas">

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
            1. ¿Hacen envíos a todo el país?
          </button>
        </h2>
        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
          <div class="accordion-body">
            Sí, preparamos y despachamos paquetes todos los días. Hacemos envíos desde Corrientes a cualquier punto de Argentina a través de correo certificado para que tu consola llegue impecable.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
            2. ¿Los juegos y consolas usadas tienen garantía?
          </button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
          <div class="accordion-body">
            ¡Por supuesto! Todo nuestro hardware pasa por un riguroso proceso de limpieza y mantenimiento. Ofrecemos 3 meses de garantía en consolas reacondicionadas y chipeadas.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
            3. ¿Compran consolas o juegos retro usados?
          </button>
        </h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
          <div class="accordion-body">
            Sí, tomamos tus consolas viejas (funcionen o no) como parte de pago o las compramos directamente para nuestro taller de restauración.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
            4. ¿Cuáles son las formas de pago?
          </button>
        </h2>
        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
          <div class="accordion-body">
            Aceptamos tarjetas de débito y crédito a través de Mercado Pago. Además, si elegís abonar por transferencia bancaria o efectivo, tenés un <strong>10% de descuento</strong> sobre el total de tu compra.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
            5. ¿Dónde está mi compra?
          </button>
        </h2>
        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
          <div class="accordion-body">
            <p class="mb-3">Hay varias razones posibles por las que podés no haber recibido tu compra:</p>
            <ol class="ps-4 mb-3" style="line-height:1.8;">
              <li class="mb-2"><strong>Dirección de email incorrecta:</strong> Si escribiste mal tu mail al hacer el pedido, contactanos y lo arreglaremos de inmediato.</li>
              <li class="mb-2"><strong>Pago no acreditado:</strong> Verificá los movimientos de tu tarjeta o Mercado Pago para confirmar que el pago impactó correctamente.</li>
              <li class="mb-2"><strong>Retraso con el procesador de pago:</strong> Un cargo "pendiente" indica que tu banco está retrasando el procesamiento del pedido.</li>
              <li class="mb-2"><strong>Rebote de correo:</strong> Tu proveedor podría estar enviando nuestros correos a Spam. Revisá esa carpeta.</li>
            </ol>
            <p class="mb-0">Si no podés encontrar tu compra, <a href="/contacto">contactanos</a> y un miembro del equipo estará encantado de ayudarte.</p>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
            6. ¿Qué hago si mi cuenta tiene cargos fraudulentos?
          </button>
        </h2>
        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
          <div class="accordion-body">
            <p class="mb-3">¡No te preocupes! Si creés que tu cuenta fue comprometida, contactate con el soporte de Catacumbas indicando el número de orden de las compras no reconocidas.</p>
            <p class="mb-0">Si detectás cargos fraudulentos en tu método de pago, comunicate inmediatamente con tu banco y con nuestro equipo. Vamos a necesitar el comprobante o la información de pago para cancelar la transacción.</p>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
            7. ¿Puedo conectar consolas clásicas a mi Smart TV?
          </button>
        </h2>
        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
          <div class="accordion-body">
            ¡Sí, totalmente! Las consolas retro usan los clásicos cables de audio y video (rojo, blanco y amarillo). Si tu tele moderna no tiene esas entradas, vas a necesitar un adaptador de AV a HDMI. Consultanos al momento de la compra y te asesoramos para que viajes a tu infancia sin problemas de conexión.
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
            8. ¿Puedo obtener un reembolso por mi compra?
          </button>
        </h2>
        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#acordeonCatacumbas">
          <div class="accordion-body">
            <p class="mb-3">Nuestro equipo evaluará tu solicitud de cambio o reembolso con gusto. Dado que trabajamos con hardware retro de colección, las devoluciones se evalúan caso por caso según el estado físico del equipo. Podés ver todos los detalles en nuestros <a href="/terminos">Términos de servicio</a>.</p>
            <p class="mb-3">Al contactarnos, <strong>asegurate de incluir tu número de pedido</strong> y el comprobante de pago. Las consolas chipeadas a medida tienen políticas diferentes a los juegos o accesorios.</p>
            <p class="mb-3"><strong>¿Te equivocaste de producto?</strong> ¡Mandanos un WhatsApp urgente! Si nos avisás a tiempo, podemos corregir la orden antes de despacharla.</p>
            <p class="mb-0"><strong>NOTA:</strong> Todos nuestros equipos tienen 3 meses de garantía por fallas técnicas. Para reembolsos por arrepentimiento, contactanos dentro de los 10 días de haber recibido el paquete.</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <x-footer />
</body>
</html>