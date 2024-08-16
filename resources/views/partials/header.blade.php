 <!-- Preloader -->
 <div class="preloader-bg"></div>
 <div id="preloader">
     <div id="preloader-status">
         <div class="preloader-position loader"> <span></span> </div>
     </div>
 </div>
 <!-- Progress scroll totop -->
 <div class="progress-wrap cursor-pointer">
     <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
         <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
     </svg>
 </div>
 <!-- Navbar -->

 <nav class="navbar navbar-expand-lg" id="navbar">
     <div class="container">
         <!-- Logo -->
         <div class="logo-wrapper">
             <a class="logo" href="index.html"> <img src="img/logo-light.png" class="logo-img" alt=""> </a>
             <!-- <a class="logo" href="index.html"><h2>Renta<span>x</span></h2></a> -->
         </div>
         <!-- Button -->
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
             aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span
                 class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span> </button>
         <!-- Menu -->
         <div class="collapse navbar-collapse" id="navbar">
             <ul class="navbar-nav ms-auto">
                 <li class="nav-item"><a class="nav-link
                 @if(request()->segment(1)=="car"||request()->segment(1)==null)
                        active
                  @endif
                  " href="{{route("front.index")}}">Cars</a></li>
                 <li class="nav-item"><a class="nav-link
                    @if (request()->segment(1)=="brand")
                        active
                    @endif
                    " href="{{route("front.brand.index")}}">Brands</a></li>
             </ul>
         </div>
     </div>

     <script>
        var oncekiScroll = 0;
        var navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function() {
            var mevcutScroll = document.documentElement.scrollTop;
            navbar.style.opacity = '0.8';
            // Aşağı kaydırma
            if (mevcutScroll > oncekiScroll)
            {
                navbar.style.top = "-200px";
            }
            // Yukarı kaydırma
            else
            {
                navbar.style.top = "-100px";
            }
            //En üst
            if (mevcutScroll<=100)
            {
                navbar.style.opacity = '1';
                navbar.style.top = "0px";
            }

            // Son scroll değerini güncelle
            oncekiScroll = mevcutScroll;
        });
    </script>
 </nav>
