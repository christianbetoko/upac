<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Admission</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Bonjour {{ $admission->first_name }} {{ $admission->last_name }},</h2>
    <p>Votre demande d'admission à l'Université Panafricaine du Congo (U.PA.C) a bien été reçue et est en cours de traitement.</p>
    <p><strong>Votre code d'identification unique est : <span style="color: #0d6efd;">{{ $admission->code }}</span></strong></p>
    <p>Vous trouverez en pièce jointe de ce mail votre carte d'admission contenant un QR Code officiel. Veuillez conserver précieusement ce document.</p>
    <br>
    <p>Cordialement,<br>Le Service des Admissions<br>U.PA.C</p>
</body>
</html>