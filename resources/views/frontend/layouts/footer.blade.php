 <!-- footer start -->
 <footer class="footer">
     <div class="footer_top">
         <div class="container">
             <div class="row">
                 <div class="col-xl-3 col-md-6 col-lg-3">
                     <div class="footer_widget">
                         <h3 class="footer_title">
                             {{ @$footerGridOneTitle->value }}
                         </h3>
                         <ul>
                             @foreach ($footerGridOne as $gridOne)
                                 <li>
                                     <a href="{{ $gridOne->url }}">{{ $gridOne->name }}</a>
                                 </li>
                             @endforeach
                         </ul>

                     </div>
                 </div>
                 <div class="col-xl-2 col-md-6 col-lg-2">
                     <div class="footer_widget">
                         <h3 class="footer_title">
                            {{ @$footerGridTwoTitle->value }}
                        </h3>
                         <ul>
                            @foreach ($footerGridTwo as $gridTwo)
                            <li>
                                <a href="{{ $gridTwo->url }}">{{ $gridTwo->name }}</a>
                            </li>
                        @endforeach
                         </ul>
                     </div>
                 </div>
                 <div class="col-xl-3 col-md-6 col-lg-3">
                     <div class="footer_widget">
                         <h3 class="footer_title">
                            {{ @$footerGridThreeTitle->value }}
                        </h3>
                         <ul>
                            @foreach ($footerGridThree as $gridThree)
                            <li>
                                <a href="{{ $gridThree->url }}">{{ $gridThree->name }}</a>
                            </li>
                        @endforeach
                         </ul>
                     </div>
                 </div>
                 <div class="col-xl-4 col-md-6 col-lg-4">
                     <div class="footer_widget">
                         <h3 class="footer_title">
                             Get More Information !
                         </h3>

                         <form action="#" class="newsletter_form">
                             <input type="email" placeholder="Enter your email" name="email" required>
                             <button type="submit" class="newsletter-button">Get Info!</button>
                         </form>

                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="copy-right_text">
         <div class="container">
             <div class="footer_border"></div>
             <div class="row">
                 <div class="col-xl-12">
                     <p class="copy_right text-center">
                         {{ @$footerInfo->copyright }}</p>
                     </p>
                 </div>
             </div>
         </div>
     </div>
 </footer>



