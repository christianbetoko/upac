 <!-- Body main wrapper start -->
    @section('title', $post->title . ' | Digital Akili')

@section('meta_tags')
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
    <meta property="og:image" content="{{ asset('storage/'.$post->image_cover) }}">
    <meta property="og:type" content="article">

    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 160) }}">
    <meta name="twitter:image" content="{{ asset('storage/'.$post->image_cover) }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
 
 <main class="bg-primary">

        <!-- breadcrumb area start -->
        <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative section-space">
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
                                            Actualités
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="rs-breadcrumb-title-wrapper">
                                <h1 class="rs-breadcrumb-title">{{ $post->title }}</h1>
                                <span class="rs-breadcrumb-line"></span>
                            </div>
                            <p class="rs-breadcrumb-desc">{{$post->subCategory->name}}</p>
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
                    <div class="col-xl-12 col-lg-12">
                        <div class="rs-postbox-details-wrapper">
                            <div class="rs-postbox-details-thumb mb-30">
                                <img src="{{ asset('storage/' . $post->image_cover) }}" alt="{{ $post->title }}">
                            </div>
                            <h3 class="rs-postbox-details-title">{{ $post->title }}</h3>
                            <div class="rs-postbox-details-content">
                                {!! $post->content !!}
                               {{--  <div class="rs-postbox-quote">
                                    <blockquote>
                                        <p>“Pellentesque sollicitudin congue dolor non aliquam. Morbi
                                            volutpat, nisi vel ultricies
                                            urnacondimentum, sapien neque lobortis tortor, quis efficitur mi ipsum eu metus.
                                            Praesent
                                            eleifend orci sit amet est vehicula”</p>
                                        <div class="rs-postbox-quote-info">
                                            <cite>Leslie Alexander</cite>
                                            <div class="rs-postbox-quote-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 26">
                                                    <path d="M15.4287 0.142578V15.5713L10.2861 25.8564H2.57129L7.71387 15.5713H0V0.142578H15.4287ZM35.999 0.142578V15.5713L30.8564 25.8564H23.1416L28.2842 15.5713H20.5703V0.142578H35.999ZM21.5703 14.5713H29.9023L24.7598 24.8564H30.2383L34.999 15.335V1.14258H21.5703V14.5713ZM1 14.5713H9.33203L4.18945 24.8564H9.66797L14.4287 15.335V1.14258H1V14.5713Z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore of magna
                                    aliqua. Ut enim ad minim sand veniam, made of owl the quis nostrud exercitation ullamco
                                    laboris nisi ut aliquip ex ea dolor commodo consequat aute irure and dolor in reprehenderit.
                                </p> --}}
                                <div class="rs-postbox-details-social">
                                    <div class="rs-postbox-details-tags tagcloud">
                                        
                                        <a href="#" id="shareBtn" data-title="{{ $post->title }}" data-url="{{ url()->current() }}">Partager <i class="ri-share-fill"></i> </a>
                                       
                                    </div>
                                    <div class="rs-postbox-social">
                                         
                                        <div class="rs-theme-social theme-social has-transparent">
                                            <a href="#">
                                                {{ $post->published_at->diffForHumans() }}
                                            </a>
                                            <a href="#">
                                               Par {{ $post->author->name }}
                                            </a>
                                          
                                        </div>
                                    </div>
                                </div>
                               {{--  <div class="rs-postbox-comment-form">
                                    <div class="rs-postbox-comments-title">
                                        <h3 class="rs-postbox-details-title">Leave a Comment</h3>
                                    </div>
                                    <form>
                                        <div class="row g-4">
                                            <div class="col-xl-6">
                                                <div class="rs-contact-input-box">
                                                    <div class="rs-contact-input">
                                                        <input id="name" name="name" type="text" placeholder="Your Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="rs-contact-input-box">
                                                    <div class="rs-contact-input">
                                                        <input id="email" name="email" type="email" placeholder="Your Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="rs-contact-input-box">
                                                    <div class="rs-contact-input">
                                                        <textarea id="message" name="message" placeholder="Write Message"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="rs-postbox-comment-btn">
                                                    <button type="submit" class="rs-btn">
                                                        Post Comment
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- rs-postbox area end -->

    </main>
    <!-- Body main wrapper end -->

    <script>
    document.getElementById('shareBtn').addEventListener('click', async function() {
        const title = this.getAttribute('data-title');
        const url = this.getAttribute('data-url');

        // 1. Essayer le partage natif (Mobile / Navigateurs récents)
        if (navigator.share) {
            try {
                await navigator.share({
                    title: title,
                    url: url
                });
            } catch (err) {
                console.log("Partage annulé ou erreur");
            }
        } 
        // 2. Fallback : Copier le lien si le partage natif n'existe pas
        else {
            try {
                await navigator.clipboard.writeText(url);
                
                // Feedback visuel sur le bouton
                const originalHTML = this.innerHTML;
                this.classList.replace('btn-primary', 'btn-success');
                this.innerHTML = '<i class="bi bi-check-lg"></i> Lien copié !';
                
                setTimeout(() => {
                    this.innerHTML = originalHTML;
                    this.classList.replace('btn-success', 'btn-primary');
                }, 2500);
            } catch (err) {
                alert("Impossible de copier le lien automatiquement. Voici l'URL : " + url);
            }
        }
    });
</script>