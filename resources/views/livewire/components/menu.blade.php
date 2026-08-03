<ul class="multipage-menu">
                                  
                                      <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{route('home')}}">Accueil</a>
                                    </li>
                                    <!-- services menu -->
                                    <li class="menu-item-has-children rs-mega-menu">
                                        <a href="javascript:void(0)">L'université</a>
                                        <ul class="mega-menu mega-grid">
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Qui sommes nous?</a>
                                                <ul>
                                                    <li><a href="#">A propos</a></li>
                                                    <li><a href="#">Historique</a></li>
                                                    

                                                </ul>
                                            </li>
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Organisation</a>
                                                <ul>
                                                    <li><a href="#">Organisation administrative</a></li>
                                                    <li><a href="#">Stratégies pédagogiques</a></li>
                                                    
                                                    
                                                </ul>
                                            </li>
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Gouvernance</a>
                                                <ul>
                                                    <li><a href="#">La présidence</a></li>
                                                    <li><a href="#">Le Rectorat</a></li>
                                                    <li><a href="#">Le Secrétariat Général</a></li>
                                                    <li><a href="#">Les Services Académiques</a></li>
                                                    
                                                </ul>
                                            </li>
                                             <li class="rs-menu-item">
                                                <a href="#" class="title">Campus</a>
                                                <ul>
                                                    <li><a href="#">Bibliothèque (BU)</a></li>
                <li><a href="#">Salles Informatiques</a></li>
                <li><a href="#">Restaurant Universitaire</a></li>
                  <li><a href="#">Associations</a></li>
               
                <li><a href="#">Logement</a></li>
                                                    
                                                </ul>
                                            </li>
                                         
                                        </ul>
                                    </li>
                                       <li class="menu-item-has-children rs-mega-menu">
                                        <a href="javascript:void(0)">Formations</a>
                                        <ul class="mega-menu mega-grid">
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Cursus LMD</a>
                                                <ul>
                                                    <li><a href="#">Génie Informatique & IA</a></li>
                                                    <li><a href="#">Architecture</a></li>
                                                        <li><a href="#">Economie</a></li>
                                                            <li><a href="#">Droit</a></li>
                                                                <li><a href="#">Relations Internationales</a></li>
                                                                    <li><a href="#">Communication</a></li>
                                                                        <li><a href="#">Sciences de santé</a></li>
                                                                            <li><a href="#">Médecine</a></li>

                                                </ul>
                                            </li>
                                           
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Formations continues</a>
                                                                                      <ul>
                                                  <li><a href="#">Séminaires & Ateliers</a></li>
        <li><a href="#">Certifications </a></li>
        <li><a href="#">Formations Professionnelles Courtes</a></li>
        <li><a href="#">Cours de Langues</a></li>  
                                                   
                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                          {{--           <li class="menu-item-has-children">
                                        <a href="javascript:void(0)">Formations continues</a>
                                        <ul class="submenu last-children">
                                           
       
        <li><a href="#">Séminaires & Ateliers</a></li>
        <li><a href="#">Certifications </a></li>
        <li><a href="#">Formations Professionnelles Courtes</a></li>
        <li><a href="#">Cours de Langues</a></li>


                                        </ul>
                                    </li> --}}   
                                  {{--   <li class="menu-item-has-children rs-mega-menu">
                                        <a href="javascript:void(0)">Campus</a>
                                        <ul class="mega-menu mega-grid">
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Vie Etudiante</a>
                                                <ul>
                                                   <li><a href="#">Associations</a></li>
                <li><a href="#">Événements</a></li>
                <li><a href="#">Logement</a></li>
                                                    

                                                </ul>
                                            </li>
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Ressources et outils</a>
                                                <ul>
                                                    <li><a href="#">Bibliothèque (BU)</a></li>
                <li><a href="#">Salles Informatiques</a></li>
                <li><a href="#">Restaurant Universitaire</a></li>
                                                    
                                                    
                                                </ul>
                                            </li>
                                         
                                        </ul>
                                    </li> --}}
                                    <!-- blog menu -->
                                   
                                    <!-- contact menu -->
                                     

                                     <li class="menu-item-has-children">
                                        <a href="javascript:void(0)">Actualités</a>
                                        <ul class="submenu last-children">
                                             <li class="{{ request()->routeIs('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}">À la une (Toutes les infos)</a></li>
        <li><a href="#">Communiqués Officiels</a></li>
        <li><a href="#">Agenda & Événements</a></li>

                                        </ul>
                                    </li>
                                    
                                     <li class="menu-item-has-children">
                                        <a href="javascript:void(0)">Médias</a>
                                        <ul class="submenu last-children">
                                             <li class=""><a href="#">Galérie Photos</a></li>
                                             <li class=""><a href="#">Galérie Vidéos</a></li>
                                             <li class=""><a href="#">Ressources de marque</a></li>
                                             <li class=""><a href="#">Publications & Revues</a></li>
                                             <li class=""><a href="#">Podcast / Interviews</a></li>
       
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                        <a href="{{route('contact')}}">Contact</a>
                                    </li>
                                </ul>