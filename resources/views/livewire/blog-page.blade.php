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
                                            Blog
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="rs-breadcrumb-title-wrapper">
                                <h1 class="rs-breadcrumb-title">Blog</h1>
                                <span class="rs-breadcrumb-line"></span>
                            </div>
                            <p class="rs-breadcrumb-desc">Découvrez nos dernières actualités et publications</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb area end -->

       <!-- postbox area start -->
<section class="rs-postbox-area section-space">
    <div class="container">
        <div class="row g-5">
            <!-- Zone des articles de blog -->
            <div class="col-xl-8 col-lg-8 rs-blog-two has-theme-green">
                <div class="row g-5">
                    @forelse($posts as $post)
                        <div class="col-xl-6 col-lg-6 col-md-6" {{-- wire:key="post-{{ $post->id }}" --}}>
                            <div class="rs-blog-item">
                                <div class="rs-blog-thumb">
                                    <a href="{{ route('single-post', [ 'subCategory' => $post->subCategory->slug, 'slug' => $post->slug]) }}">
                                        <img src="{{ $post->image_cover ? asset('storage/' . $post->image_cover) : asset('assets/image_covers/blog/blog-thumb-01.webp') }}" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="rs-blog-content">
                                    <div class="rs-blog-meta">
                                        @if($post->subCategory)
                                            <span class="rs-blog-meta-item">
                                                <i class="ri-price-tag-3-line"></i>{{ $post->subCategory->name }}
                                            </span>
                                        @endif
                                        <span class="rs-blog-meta-item">
                                            <i class="ri-calendar-line"></i>{{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                    <h5 class="rs-blog-title">
                                        <a href="{{ route('single-post', [ 'subCategory' => $post->subCategory->slug, 'slug' => $post->slug]) }}">
                                            {{ Str::limit($post->title, 60) }}
                                        </a>
                                    </h5>
                                    @if($post->author)
                                        <div class="rs-blog-meta-author">
                                            {{-- <div class="rs-blog-meta-author-thumb">
                                                <img src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('assets/image_covers/user/user-thumb-01.webp') }}" alt="{{ $post->author->name }}">
                                            </div> --}}
                                            <div class="rs-blog-meta-author-content">
                                                <a href="#">{{ $post->author->name }}</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">Aucun article trouvé.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination automatique Bootstrap via Livewire -->
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="pagination-wrapper mt-40">
                            <div class="common-pagination text-start">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-4">
                <div class="rs-sidebar-wrapper rs-sidebar-sticky">
                    
                    <!-- Widget Recherche -->
                    <div class="sidebar-widget mb-30">
                        <h5 class="sidebar-widget-title">Recherche</h5>
                        <div class="sidebar-search">
                            <div class="sidebar-search-input">
                                <input type="text" wire:model.live.debounce.300ms="searchTerm" placeholder="Rechercher un article...">
                                <button type="button">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M16.9995 17L13.1328 13.1333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Widget Catégories (Modèles SubCategory du contrôleur) -->
                    <div class="sidebar-widget widget-categories mb-30">
                        <h5 class="sidebar-widget-title">Catégories</h5>
                        <div class="sidebar-widget-content">
                            <div class="list">
                                <ul>
                                    {{-- Option pour réinitialiser le filtre --}}
                                    <li>
                                        <a href="#" wire:click.prevent="$set('selected_category', [])" class="{{ empty($selected_category) ? 'text-success fw-bold' : '' }}">
                                            Toutes les catégories
                                        </a>
                                    </li>
                                    @foreach($categories as $category)
                                        <li>
                                            {{-- Gestion de la sélection par tableau : remplace ou ajoute selon votre logique (ici, sélection unique simplifiée) --}}
                                            <a href="#" wire:click.prevent="$set('selected_category', [{{ $category->id }}])" 
                                               class="{{ in_array($category->id, $selected_category) ? 'text-success fw-bold' : '' }}">
                                                {{ $category->name }}
                                                <span>({{ $category->posts_count ?? $category->posts()->where('status', 'published')->count() }})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Widget Articles Récents -->
                    <div class="sidebar-widget">
                        <h5 class="sidebar-widget-title">Articles Récents</h5>
                        <div class="sidebar-widget-content">
                            <div class="sidebar-blog-item-wrapper">
                                @foreach($recent_posts as $recent)
                                    <div class="sidebar-blog-item">
                                        <div class="sidebar-blog-thumb">
                                            <a href="{{ route('single-post', [ 'subCategory' => $recent->subCategory->slug, 'slug' => $recent->slug]) }}">
                                                <img src="{{ $recent->image_cover ? asset('storage/' . $recent->image_cover) : asset('assets/image_covers/blog/sidebar/sidebar-thumb-01.webp') }}" alt="{{ $recent->title }}">
                                            </a>
                                        </div>
                                        <div class="sidebar-blog-content">
                                            <div class="sidebar-blog-meta">
                                                <i class="ri-calendar-line"></i>
                                                <span>{{ \Carbon\Carbon::parse($recent->published_at)->translatedFormat('d M, Y') }}</span>
                                            </div>
                                            <h6 class="sidebar-blog-title">
                                                <a href="{{ route('single-post', [ 'subCategory' => $recent->subCategory->slug, 'slug' => $recent->slug]) }}">{{ Str::limit($recent->title, 45) }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Fin Sidebar -->

        </div>
    </div>
</section>
<!-- postbox area end -->

    </main>
    <!-- Body main wrapper end -->