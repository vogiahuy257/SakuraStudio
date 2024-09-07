<section id="hero">
   <div class="hero">
      <div class="bg">
         <img src="{{asset('image/hero/flower.svg')}}" alt="photo">
      </div>
     
      <div class="text">
         <h1 id="heroTitle">Enhance your life with Sakura Studio!</h1> <!-- Updated text content -->
         <p id="heroDescription">With unique design templates, you can create<br>limitless and amazing products.</p> <!-- Updated text content -->
 
         <div class="icon">
            <button id="flowerButton">🌸</button>
 
            <div class="letter">
               <!-- Check if user is logged in and show appropriate link -->
               @if(session('login') == 'true')
                  <a href="{{route('canvas.show')}}"><p id="createDesignHere">Create design here</p></a> <!-- Updated route name -->
               @else
                  <a href="{{route('login.show')}}"><p id="createDesignHere">Create design here</p></a> <!-- Updated route name -->
               @endif
            </div>
         </div>
 
         <div id="flower">
            <!-- Flower images with different classes for animation or effects -->
            <div class="flower2">
               <img src="{{asset('image/hero/bongbong2.png')}}" class="mot" alt="bb2" />
               <img src="{{asset('image/hero/bongbong2.png')}}" class="hai" alt="bb2" />
               <img src="{{asset('image/hero/bongbong2.png')}}" class="ba" alt="bb2" />
               <img src="{{asset('image/hero/bongbong2.png')}}" class="nam" alt="bb2" />
               <img src="{{asset('image/hero/bongbong2.png')}}" class="sau" alt="bb2" />
            </div>
      
            <div class="flower1">
               <img src="{{asset('image/hero/bongbong2.png')}}" class="bon" alt="bb2" />
               <img src="{{asset('image/hero/bongbong1.png')}}" class="one" alt="bb1" />
               <img src="{{asset('image/hero/bongbong1.png')}}" class="two" alt="bb1" />
               <img src="{{asset('image/hero/bongbong1.png')}}" class="three" alt="bb1" />
               <img src="{{asset('image/hero/bongbong1.png')}}" class="four" alt="bb1" />
               <img src="{{asset('image/hero/bongbong1.png')}}" class="five" alt="bb1" />
            </div>
         </div>
      </div>
   </div>
</section>
