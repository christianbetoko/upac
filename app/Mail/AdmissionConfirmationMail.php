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
    // Plus besoin de générer le QR Code en PHP ici !
    $pdf = Pdf::loadView('pdf.admission-card', [
        'admission' => $this->admission,
    ])->setPaper('a6', 'portrait');

    return [
        Attachment::fromData(fn () => $pdf->output(), 'Carte_Admission_UPAC.pdf')
            ->withMime('application/pdf'),
    ];
}
}