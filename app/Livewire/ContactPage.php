<?php

namespace App\Livewire;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Enterprise;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
#[Title('Contact - U.PA.C')]
class ContactPage extends Component
{
     #[Validate('required|string|max:255')]
    public $first_name;

    #[Validate('required|string|max:255')]
    public $last_name;

    #[Validate('required|email|max:255')]
    public $email; 
    #[Validate('required|string|max:255')]
    public $message;
  #[Validate('required|boolean|accepted')]
    public $terms = false;

    public function envoyer(){
        
        $this->validate();
        // Enregistrer le message dans la base de données
     $message=   \App\Models\ContactMessage::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'message' => $this->message,
            'status' => 'new', // Ajouter le statut "new" pour les nouveaux messages
           
        ]);
 $enterprise=Enterprise::first();
        
      
// --- ENVOI DE L'EMAIL AVEC LA CARTE PDF EN PIÈCE JOINTE ---
        try {
            \Illuminate\Support\Facades\Mail::to($message->email)->send(new \App\Mail\MessageConfirmationMail($message));
        } catch (\Exception $e) {
            // Optionnel : Tu peux logger l'erreur si la configuration SMTP échoue temporairement
            \Log::error("Échec d'envoi de l'email de confirmation : " . $e->getMessage());
        }
         try {
            \Illuminate\Support\Facades\Mail::to($enterprise->email)->send(new \App\Mail\MessageToUPACMail($message));
        } catch (\Exception $e) {
            // Optionnel : Tu peux logger l'erreur si la configuration SMTP échoue temporairement
            \Log::error("Échec d'envoi de l'email à l'UPAC : " . $e->getMessage());
        }
        // Afficher un message de succès
       // $this->alert('success', 'Votre message a été envoyé avec succès !');
LivewireAlert::title('Message envoyé !')
        ->success()
        ->show();
        // Réinitialiser les champs du formulaire
  $this->reset(['first_name', 'last_name', 'email', 'message', 'terms']);
    }

    public function render()
    {
          Carbon::setLocale('fr');
          $enterprise=Enterprise::first();

        return view('livewire.contact-page', compact('enterprise'));
    }
}
