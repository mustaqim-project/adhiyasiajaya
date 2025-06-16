 <!-- Footer -->
 <footer class="footer-section no-print">
     <div class="container mx-auto px-4">
         <div class="footer-content">
             <div>
                 <div class="flex items-center space-x-3 mb-4">
                     <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center">
                         <span class="text-white font-bold text-xl">AAJ</span>
                     </div>
                     <div>
                         <h4 style="color: white; margin-bottom: 0;">PT ADHYA ASIA JAYA</h4>
                         <p class="text-sm text-gray-300">We Serve You Better</p>
                     </div>
                 </div>
                 <p class="text-gray-300 mb-4">{{ @$footerInfo->description }}</p>
                 <div class="flex space-x-3">
                     @foreach ($socialLinks as $link)
                         <a href="{{ $link->url }}" class="social-btn {{ $link->class ?? '' }}"
                             aria-label="Go to Mazhub Media Social" alt="Mazhub Media Social">
                             <i class="{{ $link->icon }}"></i>
                         </a>
                     @endforeach
                 </div>

             </div>

             <div>
                 <h4>{{ @$footerGridOneTitle->value }}</h4>

                 <ul>
                     @foreach ($footerGridOne as $gridOne)
                         <li>
                             <a href="{{ $gridOne->url }}">{{ $gridOne->name }}</a>
                         </li>
                     @endforeach
                 </ul>
             </div>

             <div>
                 <h4>{{ @$footerGridTwoTitle->value }}</h4>
                 <ul>
                     @foreach ($footerGridTwo as $gridTwo)
                         <li>
                             <a href="{{ $gridTwo->url }}">{{ $gridTwo->name }}</a>
                         </li>
                     @endforeach
                 </ul>
             </div>

             <div>
                 <h4>Contact Info</h4>
                 <ul>
                     <li><i class="fas fa-map-marker-alt mr-2"></i> {{ @$contact->address }}</li>
                     <li><i class="fas fa-phone mr-2"></i>{{ @$contact->phone }}</li>
                     <li><i class="fas fa-envelope mr-2"></i><a href="mailto:{{ @$contact->email }}">{{ @$contact->email }}</a></li>
                     <li><i class="fas fa-globe mr-2"></i>www.adhyaasia.com</li>
                 </ul>
             </div>
         </div>

         <div class="footer-bottom">
             <p>{{ @$footerInfo->copyright }}</p>
         </div>
     </div>
 </footer>
