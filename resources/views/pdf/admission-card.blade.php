<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Carte d'Admission</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; margin: 0; padding: 0; background-color: #f8f9fa; }
        .card { width: 100%; max-width: 350px; background: #ffffff; border: 2px solid #0d6efd; border-radius: 10px; padding: 15px; text-align: center; margin: auto; }
        .header { background-color: #0d6efd; color: white; padding: 10px; border-radius: 6px; font-weight: bold; font-size: 14px; text-transform: uppercase; margin-bottom: 15px; }
        .photo { width: 90px; height: 90px; border-radius: 50%; object-fit: cover; border: 2px solid #ddd; margin-bottom: 10px; }
        .name { font-size: 16px; font-weight: bold; color: #212529; margin: 5px 0; }
        .details { font-size: 11px; color: #6c757d; margin-bottom: 15px; }
        .code-box { background: #e9ecef; border-radius: 4px; padding: 5px; font-weight: bold; font-size: 13px; color: #0d6efd; letter-spacing: 1px; margin-bottom: 15px; }
        .qr-code { margin-top: 10px; }
        .footer { font-size: 9px; color: #adb5bd; margin-top: 15px; border-top: 1px dashed #dee2e6; padding-top: 5px; }
    </style>
</head>
<body>

<div class="card">
    <div class="header">Université Panafricaine du Congo</div>
    
    <!-- Photo de profil -->
    @if($admission->photo)
        <img class="photo" src="{{ public_path('storage/' . $admission->photo) }}" alt="Photo">
    @endif

    <div class="name">{{ $admission->first_name }} {{ $admission->last_name }}</div>
    
    <div class="details">
        Filière : {{ $admission->department->name ?? 'N/A' }}<br>
        Niveau : {{ $admission->level->name ?? 'N/A' }}<br>
        Tél : {{ $admission->phone }}
    </div>

    <div class="code-box">Code : {{ $admission->code }}</div>

    <!-- Affichage du QR Code généré en Base64 -->
    <div class="qr-code">
        <img src="data:image/svg+xml;base64,{{ $qrcode }}" width="110" height="110">
    </div>

    <div class="footer">
        Généré automatiquement le {{ date('d/m/Y à H:i') }}
    </div>
</div>

</body>
</html>