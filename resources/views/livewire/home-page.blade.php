<div>


    <!-- Body main wrapper start -->
    <main>

        <!-- banner area start -->
        <section class="rs-banner-area rs-banner-two rs-swiper">
            <span class="b-line-one"></span>
            <span class="b-line-two"></span>
            <span class="b-line-three"></span>
            <div class="rs-banner-slider-wrapper">
                <div class="swiper" data-clone-slides="false" data-loop="true" data-speed="1000" data-autoplay="true" data-dots-dynamic="true" data-center-mode="true" data-effect="fade" data-no-gap="true" data-auto-height="true" data-observer="true" data-observe-parents="true" data-delay="1000" data-item="1">
                    <div class="swiper-wrapper">
                        @if($slides->isNotEmpty())
                        @foreach($slides as $slide)
                        <div class="swiper-slide">
                            <div class="rs-banner-item-wrapper">
                                <div class="rs-banner-bg-thumb include-bg" data-background="{{asset('storage/'.$slide->image)}}">
                                </div>
                                <div class="rs-banner-wrapper">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-9 col-lg-10">
                                                <span class="rs-banner-subtitle">
                                      {{$slide->description}}
                                    </span>
                                                <h1 class="rs-banner-title">{{$slide->name}}
                                                </h1>
                                                <div class="rs-banner-btn">
                                                    <a class="rs-btn has-icon has-theme-red" href="{{$slide->link}}" target="_blank">
                                                        <span class="btn-text-wrap">
                                             <span class="text-default">En savoir plus</span>
                                                        <span class="text-hover">En savoir plus</span>
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

                        @endforeach
                        @endif
                        {{-- <div class="swiper-slide">
                            <div class="rs-banner-item-wrapper">
                                <div class="rs-banner-bg-thumb include-bg" data-background="assets/images/bg/banner-bg-thumb-07.webp">
                                </div>
                                <div class="rs-banner-wrapper">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-9 col-lg-10">
                                                <span class="rs-banner-subtitle">
                                       Welcome to Univet University
                                    </span>
                                                <h1 class="rs-banner-title">Excellence in Education Innovation for Life
                                                </h1>
                                                <div class="rs-banner-btn">
                                                    <a class="rs-btn has-icon has-theme-red" href="program.html">
                                                        <span class="btn-text-wrap">
                                             <span class="text-default">View All Programs</span>
                                                        <span class="text-hover">View All Programs</span>
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
                        </div> --}}
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="rs-banner-navigation">
                        <button class="swiper-button-prev rs-swiper-btn has-theme-red"><i
                        class="ri-arrow-left-s-line"></i></button>
                        <button class="swiper-button-next rs-swiper-btn has-theme-red"><i
                        class="ri-arrow-right-s-line"></i></button>
                    </div>
                    <!-- if we need pagination -->
                    <div class="rs-banner-pagination d-block d-md-none">
                        <div class="swiper-pagination rs-pagination has-theme-red"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner area end -->

        <!-- feature area start -->
        <div class="rs-feature-area rs-feature-two">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="rs-feature-wrapper ">
                            <div class="rs-feature-item">
                                
                            </div>
                            <div class="rs-feature-item">
                                <a href="{{ route('admission') }}" >
                                    Admission et inscription
                                </a>
                            </div>
                           <div class="rs-feature-item">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- feature area end -->

        
 <!-- campus life area start -->
        <section class="rs-campus-life-area  rs-campus-life-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="rs-campus-life-sec-wrapper">
                            <h2 class="section-title rs-split-text-enable split-in-left">Vie au Campus UPAC
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rs-campus-life-wrapper">
               <div class="rs-campus-life-thumb-large">
    <div class="swiper item-details-active">
        <div class="swiper-wrapper">
            @foreach($campusLifePhotos as $photo)
                <div class="swiper-slide">
                    <div class="rs-campus-life-bg-thumb include-bg" data-background="{{ asset('storage/' . $photo->image_path) }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="rs-campus-life-thumb-small">
    <div class="swiper item-details-nav">
        <div class="swiper-wrapper">
            @foreach($campusLifePhotos as $photo)
                <div class="swiper-slide">
                    <button class="custom-button">
                        <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}">
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>
            </div>
        </section>
        <!-- campus life area end -->
          <!-- blog area start -->
         <section class="rs-blog-area section-space rs-blog-one has-bg-primary">
            <div class="container">
                <div class="row align-items-center g-5 section-title-space">
                    <div class="col-xl-7 col-lg-7">
                        <div class="section-title-wrapper">
                            <span class="section-subtitle has-theme-red">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path
                              d="M5.21484 12.8949V16.6564C5.21484 16.6564 8.82175 15.1537 12.0198 15.1537C15.2178 15.1537 18.8255 16.6564 18.8255 16.6564V12.8424C18.8255 12.8424 15.3844 11.0225 11.9665 11.0225C8.55018 11.021 5.21484 12.8949 5.21484 12.8949Z">
                           </path>
                           <path
                              d="M22.6467 11.9993L24 11.2716L22.6467 10.5222V10.1666C22.6467 10.1666 23.0278 8.23413 20.862 9.24464C20.7517 9.30465 20.6924 9.36542 20.6684 9.42468L11.7367 4.47119L0 11.1884L4.43211 13.2019V12.5485C4.43211 12.5485 8.15079 10.4607 11.9625 10.4607C15.7734 10.4607 19.6092 12.4899 19.6092 12.4899V13.631L22.0563 12.3167V17.6377H21.2416V19.529L22.3248 18.7803L23.5274 19.529V17.637H22.6467V11.9993ZM22.0555 9.83803V10.1944L21.3413 9.79827C21.6017 9.62573 22.0555 9.38642 22.0555 9.83803ZM21.814 11.9251C21.737 11.9279 21.6603 11.9152 21.5883 11.8877C21.5164 11.8602 21.4507 11.8185 21.3952 11.7651C21.3398 11.7117 21.2956 11.6476 21.2655 11.5768C21.2353 11.5059 21.2198 11.4297 21.2197 11.3527C21.2197 11.2757 21.2351 11.1994 21.2652 11.1285C21.2953 11.0576 21.3393 10.9935 21.3947 10.94C21.4501 10.8865 21.5157 10.8447 21.5876 10.8172C21.6595 10.7896 21.7362 10.7768 21.8132 10.7795C21.9615 10.7848 22.102 10.8474 22.2051 10.9542C22.3082 11.0609 22.3659 11.2035 22.366 11.3519C22.3661 11.5003 22.3086 11.643 22.2056 11.7499C22.1027 11.8568 21.9623 11.9196 21.814 11.9251Z">
                           </path>
                        </svg>
                        Actualités
                     </span>
                            <h2 class="section-title rs-split-text-enable split-in-left">Lisez nos derniers articles et nouvelles
                            </h2>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5">
                        <div class="rs-event-btn d-flex justify-content-lg-end">
                            <a class="rs-btn has-icon has-bg-primary hover-red" href="{{route('blog')}}">
                                <span class="btn-text-wrap">
                           <span class="text-default">Voir tous les articles</span>
                                <span class="text-hover">Voir tous les articles</span>
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
                <div class="row">
                    <div class="col-xl-12">
                        <div class="rs-blog-wrapper">
                            @if($posts->isNotEmpty())
                            @foreach ($posts as $post)
                                <div class="rs-blog-item wow fadeIn" data-wow-delay=".3s" data-wow-duration="1s">
                                <div class="rs-blog-thumb">
                                    <a href="{{ route('single-post', [ 'subCategory' => $post->subCategory->slug, 'slug' => $post->slug]) }}">
                                        <img src="{{asset('storage/' . $post->image_cover)}}" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                <div class="rs-blog-content">
                                    <div class="rs-blog-meta">
                                        <span class="rs-blog-meta-item">
                                 <i class="ri-price-tag-3-line"></i> {{ $post->subCategory->name }}
                              </span>
                                        <span class="rs-blog-meta-item">
                                 <i class="ri-calendar-line"></i>{{ $post->published_at->diffForHumans() }}
                              </span>
                                    </div>
                                    <h5 class="rs-blog-title">
                                        <a href="{{ route('single-post', [ 'subCategory' => $post->subCategory->slug, 'slug' => $post->slug]) }}">{{ $post->title }}</a>
                                    </h5>
                                    <div class=" rs-blog-meta-author">
                                       {{--  <div class="rs-blog-meta-author-thumb">
                                            <img src="assets/images/user/user-thumb-01.webp" alt="image">
                                        </div> --}}
                                        <div class="rs-blog-meta-author-content">
                                            <a href="#"> {{ $post->author->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        <!-- blog area end -->
 <!-- event area start -->
       {{--  <section class="rs-event-area section-space rs-event-two rs-swiper">
            <div class="container">
                <div class="row align-items-center g-5 section-title-space">
                    <div class="col-xl-7 col-lg-7">
                        <div class="section-title-wrapper">
                            <span class="section-subtitle has-theme-red is-uppercase">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                           <path
                              d="M5.21484 12.8949V16.6564C5.21484 16.6564 8.82175 15.1537 12.0198 15.1537C15.2178 15.1537 18.8255 16.6564 18.8255 16.6564V12.8424C18.8255 12.8424 15.3844 11.0225 11.9665 11.0225C8.55018 11.021 5.21484 12.8949 5.21484 12.8949Z">
                           </path>
                           <path
                              d="M22.6467 11.9993L24 11.2716L22.6467 10.5222V10.1666C22.6467 10.1666 23.0278 8.23413 20.862 9.24464C20.7517 9.30465 20.6924 9.36542 20.6684 9.42468L11.7367 4.47119L0 11.1884L4.43211 13.2019V12.5485C4.43211 12.5485 8.15079 10.4607 11.9625 10.4607C15.7734 10.4607 19.6092 12.4899 19.6092 12.4899V13.631L22.0563 12.3167V17.6377H21.2416V19.529L22.3248 18.7803L23.5274 19.529V17.637H22.6467V11.9993ZM22.0555 9.83803V10.1944L21.3413 9.79827C21.6017 9.62573 22.0555 9.38642 22.0555 9.83803ZM21.814 11.9251C21.737 11.9279 21.6603 11.9152 21.5883 11.8877C21.5164 11.8602 21.4507 11.8185 21.3952 11.7651C21.3398 11.7117 21.2956 11.6476 21.2655 11.5768C21.2353 11.5059 21.2198 11.4297 21.2197 11.3527C21.2197 11.2757 21.2351 11.1994 21.2652 11.1285C21.2953 11.0576 21.3393 10.9935 21.3947 10.94C21.4501 10.8865 21.5157 10.8447 21.5876 10.8172C21.6595 10.7896 21.7362 10.7768 21.8132 10.7795C21.9615 10.7848 22.102 10.8474 22.2051 10.9542C22.3082 11.0609 22.3659 11.2035 22.366 11.3519C22.3661 11.5003 22.3086 11.643 22.2056 11.7499C22.1027 11.8568 21.9623 11.9196 21.814 11.9251Z">
                           </path>
                        </svg>
                        Upcoming Events
                     </span>
                            <h2 class="section-title rs-split-text-enable split-in-left">Join Our Latest Events
                            </h2>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5">
                        <div class="rs-event-more-btn d-flex justify-content-lg-end">
                            <a class="rs-btn has-icon has-bg-primary hover-red" href="event.html">
                                <span class="btn-text-wrap">
                           <span class="text-default">View More Events</span>
                                <span class="text-hover">View More Events</span>
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
                <div class="row">
                    <div class="rs-event-wrapper">
                        <div class="swiper" data-clone-slides="false" data-loop="true" data-speed="1500" data-autoplay="true" data-dots-dynamic="false" data-effect="false" data-delay="2000" data-item="3" data-item-xl="2" data-item-lg="2" data-item-md="2" data-item-sm="1" data-item-xs="1" data-margin="30">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="rs-event-item">
                                        <div class="rs-event-thumb">
                                            <a href="event-details.html"><img src="assets/images/event/event-thumb-05.webp" alt="image"></a>
                                            <div class="rs-event-tag">
                                                MIOT, USA
                                            </div>
                                        </div>
                                        <div class="rs-event-content">
                                            <div class="rs-event-meta">
                                                <span class="rs-event-meta-item">
                                       August 4, 2025
                                    </span>
                                                <span class="meta-divider"></span>
                                                <span class="rs-event-meta-item">
                                       09:00 AM - 03:40 PM
                                    </span>
                                            </div>
                                            <h5 class="rs-event-title"><a href="event-details.html">Academic Excellence &
                                                    Intellectual
                                                    Development.</a></h5>
                                            <div class="rs-event-btn">
                                                <a class="rs-btn is-transparent" href="event-details.html">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-event-item">
                                        <div class="rs-event-thumb">
                                            <a href="event-details.html"><img src="assets/images/event/event-thumb-06.webp" alt="image"></a>
                                            <div class="rs-event-tag">
                                                MIOT, USA
                                            </div>
                                        </div>
                                        <div class="rs-event-content">
                                            <div class="rs-event-meta">
                                                <span class="rs-event-meta-item">
                                       August 4, 2025
                                    </span>
                                                <span class="meta-divider"></span>
                                                <span class="rs-event-meta-item">
                                       09:00 AM - 03:40 PM
                                    </span>
                                            </div>
                                            <h5 class="rs-event-title"><a href="event-details.html">Innovative Research &
                                                    Scientific Advancement.</a></h5>
                                            <div class="rs-event-btn">
                                                <a class="rs-btn is-transparent" href="event-details.html">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-event-item">
                                        <div class="rs-event-thumb">
                                            <a href="event-details.html"><img src="assets/images/event/event-thumb-07.webp" alt="image"></a>
                                            <div class="rs-event-tag">
                                                MIOT, USA
                                            </div>
                                        </div>
                                        <div class="rs-event-content">
                                            <div class="rs-event-meta">
                                                <span class="rs-event-meta-item">
                                       August 4, 2025
                                    </span>
                                                <span class="meta-divider"></span>
                                                <span class="rs-event-meta-item">
                                       09:00 AM - 03:40 PM
                                    </span>
                                            </div>
                                            <h5 class="rs-event-title"><a href="event-details.html">Digital Transformation,
                                                    Technology & Future.</a></h5>
                                            <div class="rs-event-btn">
                                                <a class="rs-btn is-transparent" href="event-details.html">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="rs-event-item">
                                        <div class="rs-event-thumb">
                                            <a href="event-details.html"><img src="assets/images/event/event-thumb-08.webp" alt="image"></a>
                                            <div class="rs-event-tag">
                                                MIOT, USA
                                            </div>
                                        </div>
                                        <div class="rs-event-content">
                                            <div class="rs-event-meta">
                                                <span class="rs-event-meta-item">
                                       August 4, 2025
                                    </span>
                                                <span class="meta-divider"></span>
                                                <span class="rs-event-meta-item">
                                       09:00 AM - 03:40 PM
                                    </span>
                                            </div>
                                            <h5 class="rs-event-title"><a href="event-details.html">Future-Ready Skills & Workforce
                                                    Transformation.</a></h5>
                                            <div class="rs-event-btn">
                                                <a class="rs-btn is-transparent" href="event-details.html">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- if we need pagination -->
                            <div class="rs-event-pagination">
                                <div class="swiper-pagination rs-pagination has-before-none has-theme-red has-transparent">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- event area end -->
       
    </main>
    <!-- Body main wrapper end -->

</div>