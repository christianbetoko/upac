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
                                         
                                        </ul>
                                    </li>
                                       <li class="menu-item-has-children rs-mega-menu">
                                        <a href="javascript:void(0)">Cursus LMD</a>
                                        <ul class="mega-menu mega-grid">
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Faculté des Sciences et Technologies</a>
                                                <ul>
                                                    <li><a href="#">Département de Génie Informatique</a></li>
                                                    <li><a href="#">Département de Génie Civil & Architecture</a></li>
                                                    

                                                </ul>
                                            </li>
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Faculté des Sciences Humaines</a>
                                                <ul>
                                                    <li><a href="#">Département de Droit</a></li>
                                                    <li><a href="#">Département d'Économie & Gestion</a></li>
                                                    
                                                    
                                                </ul>
                                            </li>
                                            <li class="rs-menu-item">
                                                <a href="#" class="title">Faculté des Sciences de la Santé</a>
                                                <ul>
                                                    <li><a href="#">Sciences Infirmières </a></li>
                                                    <li><a href="#">Technique de Laboratoire de Prothèse Dentaire </a></li>
                                                    <li><a href="#">Santé Communautaire </a></li>
                                                   
                                                    
                                                </ul>
                                            </li>
                                         <li class="rs-menu-item">
                                                <a href="#" class="title">Faculté des SCiences de l'Information et de la Communication</a>
                                                <ul>
                                                    
                                                   
                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="javascript:void(0)">Formations continues</a>
                                        <ul class="submenu last-children">
                                           
       
        <li><a href="#">Séminaires & Ateliers</a></li>
        <li><a href="#">Certifications </a></li>
        <li><a href="#">Formations Professionnelles Courtes</a></li>
        <li><a href="#">Cours de Langues</a></li>


                                        </ul>
                                    </li>   
                                    <li class="menu-item-has-children rs-mega-menu">
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
                                    </li>
                                    <!-- blog menu -->
                                   
                                    <!-- contact menu -->
                                     

                                     <li class="menu-item-has-children">
                                        <a href="javascript:void(0)">Actualités</a>
                                        <ul class="submenu last-children">
                                             <li class="{{ request()->routeIs('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}">À la une (Toutes les infos)</a></li>
        <li><a href="#">Communiqués Officiels</a></li>
        <li><a href="#">Agenda & Événements</a></li>
        <li><a href="#">Retour en images (Médias)</a></li>
                                        </ul>
                                    </li>
                                   
                                </ul>