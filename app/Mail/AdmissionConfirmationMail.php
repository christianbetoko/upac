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
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Importation propre du package QR Code

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

    public function attachments(): array
    {
        // 1. Génération du QR Code en PNG Base64 (DomPDF gère beaucoup mieux le PNG que le SVG)
        $qrcodeData = QrCode::format('png')
            ->size(120)
            ->errorCorrection('H')
            ->generate($this->admission->code);

        $qrcode = base64_encode($qrcodeData);

        // 2. Chargement de la vue du PDF et configuration du format carte
        $pdf = Pdf::loadView('pdf.admission-card', [
            'admission' => $this->admission,
            'qrcode'    => $qrcode
        ])->setPaper('a6', 'portrait');

        // 3. Récupération directe du contenu pour éviter les bugs de sérialisation en Queue
        $pdfContent = $pdf->output();

        return [
            Attachment::fromData(fn () => $pdfContent, 'Carte_Admission_UPAC.pdf')
                ->withMime('application/pdf'),
        ];
    }
}