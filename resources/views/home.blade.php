@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <h1>cek list buku <a href="{{ route('listbuku') }}">klik</a></h1>

            
    </div>
</div>
@endsection
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n){
      showSlides(slideIndex += n);
    }

    function showSlides(n){
       var i;
       var slides = document.getElementsByClassName("slide");
       if (n > slides.length)
       {
        slideIndex = 1;
       }
       if (n < 1)
       {
        slideIndex = slides.length
       }
       for (i = 0; i < slides.length; i++)
       {
        slides[i].style.display = "none";
       }
       slides[slideIndex-1].style.display = "block";
    }
</script>
<style>
    .slides{
    width: 100%;
    position: relative;
}
.slides .slide{
    display: none;
}

.slides .slide img{
    display: block;
    margin-left: auto;
    margin-right: auto;
    animation-name: fade;
    animation-duration: 1.5s;
    max-width: 100%;
    height: auto;
    margin-top: 27px;
    margin-left: 140px;
}
.slides .navigation{
    position: absolute;
    top: 50%;
    left:50%;
    transform: translate(-50%, -50%);
    display: flex;
    justify-content: space-between;
    width: 100%;
}
.slides .navigation .prev, .slides .navigation .next{
    cursor: pointer;
    font-weight: bold;
    font-size: 20px;
    color: black;
    padding-top: 5px;
    padding-bottom: 5px;
    position: relative;
    top:13px;
    margin-top: -10px;
    margin-left: 160px;
    margin-right: 140px;
    padding-left: 10px;
    padding-right: 10px;
    background-color: #f4f5f8;
    user-select: none;
    height: 35px;
    transition: 0.6s ease;
    border-radius: 100%;
}


@keyframes fade{
    from{opacity: 0.3}
    to {opacity: 1}
}
</style>
