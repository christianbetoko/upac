<!-- Affichage du QR Code généré via une API ultra-rapide (Pas besoin de package !) -->
<div class="qr-code">
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($admission->code) }}" width="110" height="110">
</div>