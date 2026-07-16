 <!-- footer area start -->
    <footer class="rs-footer-area rs-footer-one has-theme-red">
        <div class="rs-footer-shape">
            <img src="{{asset('assets/images/shape/arrow-shape.webp')}}" alt="image">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="rs-footer-wrapper">
                        <div class="rs-footer-left">
                            <div class="rs-footer-widget footer-1-col-1">
                                <div class="rs-footer-widget-logo">
                                    <a href="{{route('home')}}"><img height="100" src="{{asset('storage/'. $enterprise->logo_without_bg)}}" alt="{{ $enterprise->name }}"></a>
                                </div>
                                <div class="rs-footer-widget-content">
                                     <div>
                                        <div class="rs-footer-content-item">
                                            <span></span>
                                            <a href="">{{ $enterprise->address }}</a>
                                        </div>
                                        
                                    </div>
                                    <div class="rs-footer-widget-contact-info">
                                        
                                        <div class="rs-footer-content-item">
                                            <span>Téléphone:</span>
                                            <a href="tel:{{ $enterprise->phone }}">{{ $enterprise->phone }}</a>
                                        </div>
                                        <div class="rs-footer-content-item">
                                            <span>Email:</span>
                                            <a href="mailto:{{ $enterprise->email }}">{{ $enterprise->email }}</a>
                                        </div>
                                    </div>
                                    <div class="rs-footer-app-badges">
                                        <a href="#">
                                            <img src="{{asset('assets/images/icon/icon-04.webp')}}" alt="Google Play">
                                        </a>
                                        <a href="#">
                                            <img src="{{asset('assets/images/icon/icon-05.webp')}}" alt="App Store">
                                        </a>
                                    </div>
                                    <div class="rs-footer-widget-social">
                                        <span class="rs-footer-social-title">Réseaux sociaux:</span>
                                        <div class="rs-footer-social theme-social has-radius-none has-medium has-theme-red">
@if($socials->isNotEmpty())
@foreach($socials as $social)
                                            <a href="{{ $social->url }}" target="_blank">

                                                <i class="{{ $social->icon }}"></i>
                                            </a>
                                                @endforeach
                                                @endif
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rs-footer-right">
                            <div class="rs-footer-widget-wrapper">
                                <div class="rs-footer-widget footer-1-col-2">
                                    <h5 class="rs-footer-widget-title">Notre Université​</h5>
                                    <div class="rs-footer-widget-link has-theme-red">
                                        <ul>
                                            <li><a href="{{route('home')}}">Accueil</a></li>
                                            <li><a href="{{route('faq')}}">Foire aux questions</a></li>
                                            <li><a href="{{route('contact')}}">Contact</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="rs-footer-widget footer-1-col-3">
                                    <h5 class="rs-footer-widget-title">Liens utiles</h5>
                                    <div class="rs-footer-widget-link has-theme-red">
                                        <ul>
                                            <li><a href="#">Annuaires</a></li>
                                            <li><a href="#">Registre des laureats</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="rs-footer-widget footer-1-col-4">
                                    <h5 class="rs-footer-widget-title">Newsletter</h5>
                                    <div class="rs-cta-input">
                                        <input id="email2" name="name" type="text" placeholder="Votre adresse mail">
                                        <button type="submit" class="rs-square-btn has-icon has-transparent is-white">
                                            <span class="icon-box">
                                 <svg class="icon-first" width="16" height="16" viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M12.0743 8.70831L0.916528 8.70831L0.916528 6.87526L12.0737 6.87461L7.15722 1.95816L8.45358 0.661793L15.5836 7.79179L8.45358 14.9218L7.15722 13.6254L12.0743 8.70831Z"
                                       fill="white"></path>
                                 </svg>

                                 <svg class="icon-second" width="16" height="16" viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M12.0743 8.70831L0.916528 8.70831L0.916528 6.87526L12.0737 6.87461L7.15722 1.95816L8.45358 0.661793L15.5836 7.79179L8.45358 14.9218L7.15722 13.6254L12.0743 8.70831Z"
                                       fill="white"></path>
                                 </svg>
                              </span>
                                        </button>
                                        <div class="rs-form-check">
                                            <input id="remeber" type="checkbox">
                                            <label for="remeber">Je suis d'accord avec la politique de confidentialité</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rs-footer-copyright-area rs-copyright-one">
                                <div class="rs-footer-copyright-wrapper">
                                    <div class="rs-footer-copyright-right">
                                        <div class="rs-footer-copyright-item">
                                            <div class="rs-footer-copyright has-theme-red">
                                                <p class="underline">Copyright © <span id="year">2026</span> Université Panafricaine du Congo.
                                                    {{-- Propulsé par <a target="_blank" href="https://christianbetoko.dev">CB Dev</a>  --}} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rs-footer-copyright-left">
                                        <div class="rs-footer-copyright-item">
                                            <div class="rs-footer-copyright-link has-theme-red">
                                                <a href="terms-conditions.html">Conditions d'utilisation</a>
                                            </div>
                                        </div>
                                        <div class="rs-footer-copyright-item">
                                            <div class="rs-footer-copyright-link has-theme-red">
                                                <a href="privacy-policy.html">Politique de confidentialité</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->
