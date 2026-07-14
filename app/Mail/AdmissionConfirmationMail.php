<?php

namespace App\Mail;

use App\Models\Admission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class AdmissionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $admission;

    public function __construct(Admission $admission)
    {
        $this->admission = $admission;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de votre demande d\'admission - U.PA.C',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.admission-confirmation',
        );
    }

    // Dans app/Mail/AdmissionConfirmationMail.php :
public function attachments(): array
    {
        // Génération du QR Code sous forme de chaîne Base64 pour l'intégrer au PDF
        $qrcode = base64_encode(\QrCode::format('svg')->size(120)->errorCorrection('H')->generate($this->admission->code));

        // Chargement de la vue HTML de la carte et conversion en PDF
        $pdf = Pdf::loadView('pdf.admission-card', [
            'admission' => $this->admission,
            'qrcode'    => $qrcode
        ])->setPaper('a6', 'portrait'); // Format poche idéal pour une carte

        return [
            Attachment::fromData(fn () => $pdf->output(), 'Carte_Admission_UPAC.pdf')
                ->withMime('application/pdf'),
        ];
    }
}