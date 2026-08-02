<main>
    <!-- breadcrumb area start -->
    <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative section-space" wire:ignore>
        <div class="rs-breadcrumb-bg-thumb include-bg" data-background="{{ asset('assets/upacvue.jpg') }}"></div>
        <div class="rs-breadcrumb-shape">
            <img src="{{ asset('assets/images/shape/arrow-shape-two.webp') }}" alt="image">
        </div>
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-xl-6 col-lg-10">
                    <div class="rs-breadcrumb-wrapper">
                        <div class="rs-breadcrumb-menu">
                            <nav>
                                <ul>
                                    <li class="rs-breadcumb-item">
                                        <a href="{{ route('home') }}">Accueil</a>
                                        <span class="rs-breadcrumb-icon">
                                            <svg class="e-font-icon-svg e-fas-angle-double-right" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rs-breadcumb-item">Foire aux Questions (FAQ)</li>
                                </ul>
                            </nav>
                        </div>
                        <div class="rs-breadcrumb-title-wrapper">
                            <h1 class="rs-breadcrumb-title">Foire aux Questions (FAQ)</h1>
                            <span class="rs-breadcrumb-line"></span>
                        </div>
                        <p class="rs-breadcrumb-desc">Questions fréquentes et réponses détaillées</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- faq area start -->
    <section class="rs-faq-area section-space bg-primary rs-faq-two">
        <div class="container">
            <div class="row g-5">
                <!-- Navigation des catégories -->
                <div class="col-xl-3 col-lg-4">
                    <div class="rs-faq-tab-wrapper">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            @foreach ($categories as $category)
                                <li class="nav-item" role="presentation" wire:key="cat-tab-{{ $category->id }}">
                                    <button 
                                        class="nav-link {{ $activeCategoryId === $category->id ? 'active' : '' }}" 
                                        type="button" 
                                        wire:click="selectCategory({{ $category->id }})"
                                    >
                                        @if($category->icon)
                                            <span class="rs-faq-tab-icon">
                                                <i class="{{ $category->icon }}"></i>
                                            </span>
                                        @endif
                                        {{ $category->name }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Contenu des FAQs -->
                <div class="col-xl-9 col-lg-8">
                    <div class="rs-faq-tab-content-wrapper">
                        <div class="tab-content rs-faq-tab-anim">
                            @php
                                $currentCategory = $categories->firstWhere('id', $activeCategoryId);
                            @endphp

                            @if($currentCategory && $currentCategory->faqs->isNotEmpty())
                                <div class="rs-accordion-three" wire:key="faq-list-cat-{{ $currentCategory->id }}">
                                    <div class="accordion-wrapper">
                                        <div class="accordion" id="accordion-faq-{{ $currentCategory->id }}">
                                            @foreach ($currentCategory->faqs as $faq)
                                                <div class="rs-accordion-item {{ $loop->first ? 'active' : '' }}" wire:key="faq-item-{{ $faq->id }}">
                                                    <h5 class="accordion-header" id="heading-{{ $faq->id }}">
                                                        <button 
                                                            class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" 
                                                            type="button" 
                                                            data-bs-toggle="collapse" 
                                                            data-bs-target="#collapse-{{ $faq->id }}" 
                                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}" 
                                                            aria-controls="collapse-{{ $faq->id }}"
                                                        >
                                                            <span class="accordion-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 15">
                                                                    <path d="M0.0175781 9.56403V8.72934C2.97994 8.56955 4.53369 10.3852 4.98798 11.3026V0.54895H5.89635V11.3026C7.11473 9.10081 9.47347 8.55811 10.907 8.73049V9.55706C7.3714 9.19949 5.90086 12.8809 5.89635 14.4554H4.99641C4.46504 9.88737 1.14729 9.38262 0.0175781 9.56403Z"></path>
                                                                </svg>
                                                            </span>
                                                            {{ $faq->question }}
                                                        </button>
                                                    </h5>
                                                    <div 
                                                        id="collapse-{{ $faq->id }}" 
                                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" 
                                                        data-bs-parent="#accordion-faq-{{ $currentCategory->id }}"
                                                    >
                                                        <div class="accordion-body">
                                                            {!! $faq->answer !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="p-4 text-center text-white">
                                    <p>Aucune question disponible dans cette catégorie pour le moment.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq area end -->
</main>