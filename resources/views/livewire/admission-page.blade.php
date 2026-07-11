  <!-- Body main wrapper start -->
   <main class="bg-primary">

          <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative section-space" wire:ignore>
            <div class="rs-breadcrumb-bg-thumb include-bg" data-background="{{asset('assets/upacvue.jpg')}}">
            </div>
             <div class="rs-breadcrumb-shape">
                <img src="{{asset('assets/images/shape/arrow-shape-two.webp')}}" alt="image">
            </div>
            <div class="container-fluid g-0">
                <div class="row">
                    <div class="col-xl-6 col-lg-10">
                        <div class="rs-breadcrumb-wrapper">
                            <div class="rs-breadcrumb-menu">
                                <nav>
                                     <ul>
                                        <li class="rs-breadcumb-item">
                                            <a href="{{route('home')}}">
                                                Accueil
                                            </a>
                                            <span class="rs-breadcrumb-icon">
                                    <svg class="e-font-icon-svg e-fas-angle-double-right" viewBox="0 0 448 512"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path
                                          d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z">
                                       </path>
                                    </svg>
                                 </span>
                                        </li>
                                        <li class="rs-breadcumb-item">
                                            Admission et inscription
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="rs-breadcrumb-title-wrapper">
                                <h1 class="rs-breadcrumb-title">Admission et inscription</h1>
                                <span class="rs-breadcrumb-line"></span>
                            </div>
                            <p class="rs-breadcrumb-desc">Inscrivez-vous dès maintenant pour rejoindre notre communauté étudiante</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

        <!-- scholarship area start -->
        <section class="rs-scholarships-area bg-primary section-space-bottom">
            <div class="container">
               {{--  <div class="row">
                    <div class="col-xl-12">
                        <div class="rs-sec-wrapper mb-40">
                            <h3 class="section-title mb-20 has-theme-blue"> Postulez dès maintenant</h3>
                           

                            <p class="section-desc">Les coûts de nos programmes sont étudiés pour rester transparents, compétitifs et accessibles aux étudiants de tous horizons. Chaque programme académique comprend les frais de scolarité, les frais d'inscription et les ressources d'apprentissage essentielles, garantissant ainsi aux étudiants une formation de haute qualité et un accompagnement académique complet. Les coûts peuvent varier selon le type de programme, la charge de cours et le mode d'apprentissage (sur campus, hybride ou en ligne). Notre objectif est d'offrir une valeur exceptionnelle grâce à des installations modernes, un corps professoral expert et des programmes alignés sur les exigences du marché, afin que votre investissement dans l'éducation soit à la fois porteur de sens et tourné vers l'avenir.</p>
                        </div>
                    </div>
                </div> --}}
                <br>
                <div class="row g-5">
                    <div class="col-xl-8 col-lg-8">
                        <div class="rs-contact-three">
                            <div class="rs-contact-form-wrapper">
                               
                               <form wire:submit.prevent='envoyer' >
    
   
     <h5 class="form-title rs-split-text-enable split-in-left mb-20">
                                    Information personnelle
                                </h5>
    <div class="row justify-content-center mb-4">
    <div class="col-md-6 text-center">
        <label class="form-label fw-semibold text-dark d-block mb-3" style="font-size: 15px;">
            Photo d'identité / Profil <span class="text-danger">*</span>
        </label>
        
        <div class="mb-3 d-flex justify-content-center">
            <div style="width: 150px; height: 150px; border-radius: 50%; border: 3px solid #d1d5db; overflow: hidden; background-color: #f3f4f6;" class="d-flex align-items-center justify-content-center shadow-sm position-relative">
                @if ($photo)
                    <img src="{{ $photo->temporaryUrl() }}" alt="Aperçu" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                    <span class="text-muted" style="font-size: 13px;">Aucun aperçu</span>
                @endif

                {{-- <div wire:loading wire:target="photo" class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(255,255,255,0.8);">
                    <div class="spinner-border spinner-border-sm text-primary" role="status"></div>
                </div> --}}
            </div>
        </div>

        <div class="d-inline-block text-start w-100" style="max-width: 350px;">
            <input type="file" id="photo" wire:model="photo" accept="image/*" class="form-control @error('photo') is-invalid @enderror" style="font-size: 14px; border-radius: 6px;">
            @error('photo') 
                <div class="invalid-feedback text-center mt-1" style="font-size: 13px;">{{ $message }}</div> 
            @enderror
        </div>
        
        <div class="form-text text-muted mt-1" style="font-size: 12px;">
            Formats acceptés : JPG, PNG (Max. 2 Mo)
        </div>
    </div>
</div>
<hr class="mb-4">
                                <div class="row">
        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="first_name">Prénom<span>*</span></label>
                </div>
                <div class="rs-contact-input">
                    <input id="first_name" wire:model="first_name" type="text" placeholder="Votre prénom">
              
                </div>
                @error('first_name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="last_name">Nom<span>*</span></label>
                </div>
                <div class="rs-contact-input">
                    <input id="last_name" wire:model="last_name" type="text" placeholder="Votre nom">
                </div>
                @error('last_name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="middle_name">Postnom</label>
                </div>
                <div class="rs-contact-input">
                    <input id="middle_name" wire:model="middle_name" type="text" placeholder="Votre postnom">
                </div>
                @error('middle_name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="email">Adresse Email<span>*</span></label>
                </div>
                <div class="rs-contact-input">
                    <input id="email" wire:model="email" type="email" placeholder="Ex: nom@domaine.com">
                </div>
                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="phone">Téléphone<span>*</span></label>
                </div>
                <div class="rs-contact-input">
                    <input id="phone" wire:model="phone" type="text" placeholder="Ex: +243...">
                </div>
                @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="birth_date">Date de Naissance<span>*</span></label>
                </div>
                <div class="rs-contact-input">
                    <input id="rs-date" wire:model.live="birth_date" name="date" type="text" placeholder="Select Date*" autocomplete="off">
               
                </div>
                @error('birth_date') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6 mb-4">
    <label for="gender" class="form-label fw-semibold text-dark mb-2" style="font-size: 15px;">
        Genre (Sexe) <span class="text-danger">*</span>
    </label>
    <div class="position-relative">
        <select id="gender" 
                wire:model="gender" 
                class="form-select form-select-lg py-2.5 px-3 @error('gender') is-invalid @enderror"
                style="font-size: 15px; border-radius: 6px; border: 1px solid #d1d5db; background-color: #f9fafb; color: #374151; transition: all 0.2s ease;">
            <option value="">Sélectionner le genre</option>
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </select>
    </div>
    @error('gender') 
        <div class="invalid-feedback mt-1" style="font-size: 13px;">{{ $message }}</div> 
    @enderror
</div>
    </div>

    
    
    <div class="row">
        <div class="col-md-12" >
            <h5 class="form-title rs-split-text-enable split-in-left mt-20 mb-20">
        Informations scolaires
    </h5>
            <div class="row">
                
        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="school_name">École secondaire<span>*</span></label>
                </div>
                <div class="rs-contact-input">
                    <input id="school_name" wire:model="school_name" type="text" placeholder="Nom de l'école d'origine">
                </div>
                @error('school_name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>
         <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="school_name">Option<span>*</span></label>
                </div>
                <div class="rs-contact-input">
                    <input id="school_option" wire:model="school_option" type="text" placeholder="Option suivie à l'école secondaire">
                </div>
                @error('school_option') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="school_grad_year">Année Obtention (Diplôme)<span>*</span></label>
                </div>
                <div class="rs-contact-input">
                    <input id="school_grad_year" wire:model="school_grad_year" type="number" min="1960" max="3000" placeholder="Ex: 2022">
                </div>
                @error('school_grad_year') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="school_percentage">Pourcentage d'État (%)<span>*</span></label>
                </div>
                <div class="rs-contact-input">
                    <input id="school_percentage" wire:model="school_percentage" type="number" step="0.01" min="50" max="100" placeholder="Ex: 65">
                </div>
                @error('school_percentage') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-group mb-30">
        <label for="school_file">Attestation ou Diplôme d'État (Fichier PDF/Image)</label>
        <input type="file" id="school_file" wire:model="school_file" class="file-input">
        
        <div wire:loading wire:target="diploma_file" class="text-info small mt-1">
            Téléchargement du fichier en cours...
        </div>
        @error('school_file') <span class="text-danger small d-block">{{ $message }}</span> @enderror
    </div>
        </div>
        </div>
        <hr></hr>
        <div class="col-md-12" >
            <h5 class="form-title rs-split-text-enable split-in-left mt-20 mb-20">
        Informations académiques si applicable
    </h5>
            <div class="row">
            
        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="university_name">Université (Précédente)</label>
                </div>
                <div class="rs-contact-input">
                    <input id="university_name" wire:model="university_name" type="text" placeholder="Si applicable">
                </div>
                @error('university_name') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>
 <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="university_option">Filière</label>
                </div>
                <div class="rs-contact-input">
                    <input id="university_option" wire:model="university_option" type="text" placeholder="Nom de la filière suivie à l'université">
                </div>
                @error('university_option') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="university_grad_year">Année d'obtention</label>
                </div>
                <div class="rs-contact-input">
                    <input id="university_grad_year" wire:model="university_grad_year" type="number" min="1960" max="2026" placeholder="Ex: 2025">
                </div>
                @error('university_grad_year') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-6 mb-4">
    <label for="university_mention" class="form-label fw-semibold text-dark mb-2" style="font-size: 15px;">
        Mention obtenue
    </label>
    <div class="position-relative">
        <select id="university_mention" 
                wire:model="university_mention" 
                class="form-select form-select-lg py-2.5 px-3 @error('university_mention') is-invalid @enderror"
                style="font-size: 15px; border-radius: 6px; border: 1px solid #d1d5db; background-color: #f9fafb; color: #374151; transition: all 0.2s ease;">
            <option value="">Sélectionner la mention</option>
            <option value="Grande Distinction">Grande Distinction</option>
            <option value="Distinction">Distinction</option>
            <option value="Satisfaction">Satisfaction</option>
        </select>
    </div>
    @error('university_mention') 
        <div class="invalid-feedback mt-1" style="font-size: 13px;">{{ $message }}</div> 
    @enderror
</div>

        <div class="col-md-6">
            <div class="rs-contact-input-box">
                <div class="rs-contact-input-title">
                    <label for="university_percentage">Pourcentage (%)</label>
                </div>
                <div class="rs-contact-input">
                    <input id="university_percentage" wire:model="university_percentage" type="number" step="0.01" min="50" max="100" placeholder="Ex: 72">
                </div>
                @error('university_percentage') <span class="text-danger small">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-group mb-30">
        <label for="university_file">Attestation ou Diplôme (Fichier PDF/Image)</label>
        <input type="file" id="university_file" wire:model="university_file" class="file-input">
        
        <div wire:loading wire:target="university_file" class="text-info small mt-1">
            Téléchargement du fichier en cours...
        </div>
        @error('university_file') <span class="text-danger small d-block">{{ $message }}</span> @enderror
    </div>
        </div>
        </div>
    </div>

    <h5 class="form-title rs-split-text-enable split-in-left mt-20 mb-20">
        Programme d'Études Choisi
    </h5>
    
    <div class="row">
    <div class="col-md-6 mb-4">
        <label for="selected_program" class="form-label fw-semibold text-dark mb-2" style="font-size: 15px;">
            Programme / Filière <span class="text-danger">*</span>
        </label>
        <div class="position-relative">
            <select id="selected_program" 
                    wire:model.live="selected_program" 
                    class="form-select form-select-lg py-2.5 px-3 @error('selected_program') is-invalid @enderror"
                    style="font-size: 15px; border-radius: 6px; border: 1px solid #d1d5db; background-color: #f9fafb; color: #374151; transition: all 0.2s ease;">
               
                    <option value="">Sélectionnez une filière</option>
                @foreach ($this->departments as $department)
                    <option value="{{ $department->id }}" wire:key="dept-{{ $department->id }}">
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('selected_program') 
            <div class="invalid-feedback mt-1" style="font-size: 13px;">{{ $message }}</div> 
        @enderror
    </div>

    <div class="col-md-6 mb-4" wire:key="container-levels-{{ count($this->levels) }}">
        <label for="selected_level" class="form-label fw-semibold text-dark mb-2" style="font-size: 15px;">
            Niveau ciblé <span class="text-danger">*</span>
        </label>
        <div class="position-relative">
            <select id="selected_level" 
                    wire:model="selected_level" 
                    class="form-select form-select-lg py-2.5 px-3 @error('selected_level') is-invalid @enderror"
                    {{ count($this->levels) == 0 ? 'disabled' : '' }}
                    style="font-size: 15px; border-radius: 6px; border: 1px solid #d1d5db; background-color: {{ count($this->levels) == 0 ? '#f3f4f6' : '#f9fafb' }}; color: #374151; transition: all 0.2s ease;">
                <option value="">
                    {{ count($this->levels) == 0 ? 'Veuillez d\'abord choisir une filière' : 'Sélectionnez le niveau' }}
                </option>
                @foreach ($this->levels as $level)
                    <option value="{{ $level->id }}" wire:key="level-{{ $level->id }}">
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('selected_level') 
            <div class="invalid-feedback mt-1" style="font-size: 13px;">{{ $message }}</div> 
        @enderror
    </div>
</div>

    
    
    
    

    <div class="rs-contact-btn">
        <button type="submit" wire:loading.attr="disabled" class="rs-btn hover-yellow radius-6 w-100">
            <span wire:loading.remove wire:target="submitForm">Soumettre ma candidature</span>
            <span wire:loading wire:target="submitForm">Traitement en cours...</span>
        </button>
    </div>
</form>
                                <div id="form-messages"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4" wire:ignore>
                        <div class="rs-sidebar-sticky">
                            <div class="rs-cta-two">
                                <div class="rs-cta-bg-thumb include-bg" data-background="{{asset('assets/upacvue.jpg')}}">
                                </div>
                                <div class="rs-cta-content">
                                    <div class="rs-cta-icon">
                                        <img src="{{asset('storage/'.$enterprise->logo_without_bg)}}" alt="{{$enterprise->name}}">
                                    </div>
                                    <h6 class="rs-cta-title">Vous avez besoin d'aide ?</h6>
                                    <div class="rs-cta-contact">
                                        <a href="tel:{{$enterprise->phone}}" class="contact-phone">
                                            {{$enterprise->phone}}
                                        </a>

                                        <a href="mailto:{{$enterprise->email}}" class="contact-email">
                                            {{$enterprise->email}}
                                        </a>
                                    </div>
                                    <div class="rs-cta-btn">
                                        <a class="rs-btn has-icon has-bg-white hover-yellow" href="{{route('contact')}}">
                                            <span class="btn-text-wrap">
                                    <span class="text-default">Contacter maintenant</span>
                                            <span class="text-hover">Contacter maintenant</span>
                                            </span>
                                            <span class="icon-box has-rotate">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15">
                                       <path
                                          d="M10.5 7.5C10.5 8.32843 9.82843 9 9 9C8.17157 9 7.5 8.32843 7.5 7.5C7.5 6.67157 8.17157 6 9 6C9.82843 6 10.5 6.67157 10.5 7.5Z">
                                       </path>
                                       <path
                                          d="M10.5 13.5C10.5 14.3284 9.82843 15 9 15C8.17157 15 7.5 14.3284 7.5 13.5C7.5 12.6716 8.17157 12 9 12C9.82843 12 10.5 12.6716 10.5 13.5Z">
                                       </path>
                                       <path
                                          d="M3 7.5C3 8.32843 2.32843 9 1.5 9C0.671573 9 0 8.32843 0 7.5C0 6.67157 0.671573 6 1.5 6C2.32843 6 3 6.67157 3 7.5Z">
                                       </path>
                                       <path
                                          d="M18 7.5C18 8.32843 17.3284 9 16.5 9C15.6716 9 15 8.32843 15 7.5C15 6.67157 15.6716 6 16.5 6C17.3284 6 18 6.67157 18 7.5Z">
                                       </path>
                                       <path
                                          d="M10.5 1.5C10.5 2.32843 9.82843 3 9 3C8.17157 3 7.5 2.32843 7.5 1.5C7.5 0.671573 8.17157 0 9 0C9.82843 0 10.5 0.671573 10.5 1.5Z">
                                       </path>
                                    </svg>
                                 </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- scholarship area end -->
 
    </main>
    <!-- Body main wrapper end -->
    <script>
    document.addEventListener('livewire:navigated', () => {
        destroyNiceSelect();
    });

    document.addEventListener('DOMContentLoaded', () => {
        destroyNiceSelect();
    });

    function destroyNiceSelect() {
        if (typeof $.fn.niceSelect !== 'undefined') {
            // On détruit l'effet de nice-select uniquement sur nos deux sélecteurs d'admission
            $('#selected_program').niceSelect('destroy');
            $('#selected_level').niceSelect('destroy');
            $('#gender').niceSelect('destroy'); // Ajouté ici
            $('#university_mention').niceSelect('destroy'); // Ajouté ici
        }
    }
</script> 

