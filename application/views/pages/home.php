<!DOCTYPE html>
<div class="container container-utama">
<div class="row content">
          <div class="col-md-12">

<h2><center>JURUSAN TEKNOLOGI PRODUKSI, INDUSTRI DAN INFORMASI</center></h2>
  <?php if (!$this->session->userdata('login')) : ?>
    <p><center>Silahkan login untuk detail lebih lanjut</p>

    	<!--<script type="text/javascript" src="http://localhost/layanan_jtpi-master/assets/js/jQuery-2.1.4.min.js"></script>
  <script type="text/javascript" src="http://localhost/layanan_jtpi-master/assets/js/jquery.cycle2.min.js"></script>




<!-- <div class="cycle-slideshow">
    <span class="cycle-prev">&#9001;</span> <!-- Untuk membuat tanda panah di kiri slider -->
    <!--<span class="cycle-next">&#9002;</span> <!-- Untuk membuat tanda panah di kanan slider -->
    <!--<span class="cycle-pager" style="padding-bottom:30px;"></span>  <!-- Untuk membuat tanda bulat atau link pada slider -->
    <!--<image src="http://localhost/layanan_jtpi-master/assets/image/slide1.jpg" alt="Gambar Pertama">
    <image src="http://localhost/layanan_jtpi-master/assets/image/slide2.jpg" alt="Gambar Kedua">
    <image src="http://localhost/layanan_jtpi-master/assets/image/slide3.jpg" alt="Gambar Ketiga">
    <image src="http://localhost/layanan_jtpi-master/assets/image/slide4.jpg" alt="Gambar Keempat">  
</div>-->

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
  animation: slide 6s infinite;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
.prev {
  left: 0;
  border-radius: 3px 0 0 3px;
}


/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-decoration-color: 
  text-align: center;
}


/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation: slide 6s infinite;
  animation-name: fade;
  animation-duration: none;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 50px}
}
</style>
</head>
<body>

<div class="slideshow-container">

<div class="mySlides fade">
  <img src="assets/image/slide1.jpg" alt="Gambar 1"style="width:100%">
  <div class="text">JURUSAN TEKNOLOGI PRODUKSI, INDUSTRI DAN INFORMASI</div>
</div>

<div class="mySlides fade">
  <img src="assets/image/slide2.jpg" alt="Gambar 2"style="width:100%">
  <div class="text">Gerbang Institut Teknologi Sumatera</div>
</div>

<div class="mySlides fade">
  <img src="assets/image/slide3.jpg" alt="Gambar 3"style="width:100%">
  <div class="text">Gedung Kuliah Umum</div>
</div>

<div class="mySlides fade">
  <img src="assets/image/slide4.jpg" alt="Gambar 4"style="width:100%">
  <div class="text">Asrama Itera</div>
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 
<?php endif; ?>
        </div>
      </div>
  </div>
