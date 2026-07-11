<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Enterprise;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Level;
use App\Models\Admission; // Assure-toi que ce modèle existe
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

#[Title('Admission - U.PA.C')]
class AdmissionPage extends Component
{
    use WithFileUploads;

    // 1. Informations Personnelles & Photo
    #[Validate('nullable|image|max:10240')] 
    public $photo;

    #[Validate('required|string|max:255')]
    public $first_name;

    #[Validate('required|string|max:255')]
    public $last_name;

    #[Validate('nullable|string|max:255')]
    public $middle_name;

    #[Validate('required|string|max:50')] // M ou F
    public $gender;

    #[Validate('required|email|max:255')]
    public $email;

    #[Validate('required|numeric')]
    public $phone;

    #[Validate('required|date')]
    public $birth_date; // Attention à la coquille de ta migration 'bith_date' (sans 'r') lors de l'insertion

    // 2. Informations Scolaires (Secondaires - Requis)
    #[Validate('required|string|max:255')]
    public $school_name;

    #[Validate('required|string|max:255')]
    public $school_option;

    #[Validate('required|string|max:4')] // Ex: 2024
    public $school_grad_year;

    #[Validate('required|numeric|min:50|max:100')]
    public $school_percentage;

    #[Validate('nullable|file|mimes:pdf,jpg,jpeg,png|max:10240')]
    public $school_file;

    // 3. Informations Universitaires Antérieures (Optionnelles - Nullable)
    #[Validate('nullable|string|max:255')]
    public $university_name;

    #[Validate('nullable|string|max:255')]
    public $university_option;

    #[Validate('nullable|string|max:4')]
    public $university_grad_year;

    #[Validate('nullable|string|max:255')]
    public $university_mention;

    #[Validate('nullable|numeric|min:50|max:100')]
    public $university_percentage;

    #[Validate('nullable|file|mimes:pdf,jpg,jpeg,png|max:10240')]
    public $university_file;

    // 4. Choix Académiques U.PA.C
    #[Validate('required|string|max:255')]
    public $selected_program;
   
    #[Validate('required|string|max:255')]
    public $selected_level;


    #[Computed()]
    public function departments(){
        return Department::where('status', true)->get();
    } 
  
    #[Computed()]
    public function levels(){
        return Level::where('department_id', $this->selected_program)->where('status', true)->get();
    }  

    public function updatedSelectedProgram(){
        $this->selected_level = null;
    }  

    /**
     * Traitement de la soumission du formulaire
     */
    public function envoyer()
    {
         function generateRandomCodeWithUPAC($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            $UPACPosition = rand(0, $length - 4); // Position aléatoire pour "UPAC"

            // Ajout de "UPAC" à la position aléatoire
            $randomString .= substr($characters, rand(0, strlen($characters) - 1), $UPACPosition);
            $randomString .= 'UPAC';
            $randomString .= substr($characters, rand(0, strlen($characters) - 1), $length - $UPACPosition - 4);

            // On mélange les caractères pour rendre le code plus aléatoire
            $randomString = str_shuffle($randomString);

            return $randomString;
        }

        // 1. Validation globale de tous les champs selon les attributs #[Validate]
        $this->validate();

        // 2. Traitement des fichiers (Uploads)
        $photoPath = $this->photo->store('admissions/photos', 'public');
        
        // Fichier école secondaire (optionnel mais recommandé)
        $schoolFilePath = $this->school_file ? $this->school_file->store('admissions/documents_scolaires', 'public') : null;
        
        // Fichier université antérieure (optionnel)
        $universityFilePath = $this->university_file ? $this->university_file->store('admissions/documents_universitaires', 'public') : null;
// --- PARSAGE ET REFORMATAGE DE LA DATE POUR MYSQL ---
    try {
        // Convertit 'November 4, 1990' en '1990-11-04'
        $formattedBirthDate = \Carbon\Carbon::parse($this->birth_date)->format('Y-m-d');
    } catch (\Exception $e) {
        // En cas d'échec de parsing, on ajoute une erreur de validation manuelle
        $this->addError('birth_date', 'Le format de la date de naissance est invalide.');
        return;
    }
        // 3. Création de l'enregistrement en base de données
        Admission::create([
            // Perso
            'code'                  => generateRandomCodeWithUPAC(10),
            'first_name'            => $this->first_name,
            'last_name'             => $this->last_name,
            'middle_name'           => $this->middle_name,
            'email'                 => $this->email,
            'phone'                 => $this->phone,
            'gender'                => $this->gender,
            'birth_date'             => $formattedBirthDate, // Mappé sur la colonne de ta table 'birth_date'
            'photo'            => $photoPath, // Pense à rajouter cette colonne dans ta migration si elle manque ou utilise un des champs file

            // École secondaire
            'school_name'           => $this->school_name,
            'school_option'         => $this->school_option,
            'school_grad_year'      => $this->school_grad_year,
            'school_percentage'     => $this->school_percentage,
            'school_file'           => $schoolFilePath,

            // Université antérieure
            'university_name'       => $this->university_name,
            'university_option'     => $this->university_option,
            'university_grad_year'  => $this->university_grad_year,
            'university_mention'    => $this->university_mention,
            'university_percentage' => $this->university_percentage,
            'university_file'       => $universityFilePath,

            // Choix Académiques U.PA.C
            'department_id'         => $this->selected_program,
            'level_id'              => $this->selected_level,
            
            // Suivi
            'status'                => 'pending',
        ]);

        // 4. Notification Flash de succès
        // Reset the form after sending the message
        LivewireAlert::title('Votre dossier d\'admission a été enregistré avec succès !')
        ->success()
        ->show();
       // session()->flash('success', 'Votre dossier d\'admission complet a été enregistré avec succès !');

        // 5. Réinitialisation complète du formulaire
        $this->reset([
            'photo', 'first_name', 'last_name', 'middle_name', 'gender', 'email', 'phone', 'birth_date',
            'school_name', 'school_option', 'school_grad_year', 'school_percentage', 'school_file',
            'university_name', 'university_option', 'university_grad_year', 'university_mention', 'university_percentage', 'university_file',
            'selected_program', 'selected_level'
        ]);
    }

    public function render()
    {
        Carbon::setLocale('fr');
        $enterprise = Enterprise::first();
        return view('livewire.admission-page', compact('enterprise'));
    }
}