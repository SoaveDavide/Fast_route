<?php
require '../header/header.php';
?>

<div class="logo-container">
    <img src="../image/fast_route_logo.webp" alt="Fast Route Logo">
</div>

<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Spedizioni Nazionali
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                Offriamo spedizioni rapide in tutta Italia con consegna garantita entro 24/48 ore. Servizi express disponibili per le principali città.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Spedizioni Internazionali
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                Con Fast Route puoi spedire pacchi in oltre 200 paesi con partner logistici affidabili. Scegli tra servizi economici o express.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Servizi Aggiuntivi
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                - Assicurazione sulla spedizione<br>
                - Consegna su appuntamento<br>
                - Tracking in tempo reale<br>
                - Imballaggio professionale
            </div>
        </div>
    </div>
</div>

<?php
require '../footer/footer.php';
?>
