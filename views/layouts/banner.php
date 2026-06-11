<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PH50176</title>


    <style>
.slider{
    position:relative;
    width:100%;
    height:400px;
    overflow:hidden;
    border-radius:5px;
    background:#fff;
    box-shadow:0 2px 10px rgba(0,0,0,0.1);
}

.slides{
    width:100%;
    height:100%;
    position:relative;
}

.slide{
    position:absolute;
    width:100%;
    height:100%;
    object-fit:cover;
    opacity:0;
    transition:opacity 0.8s ease;
}

.slide.active{
    opacity:1;
}

/* Nút trái phải */

.prev,
.next{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    border:none;
    width:45px;
    height:45px;
    border-radius:50%;
    background:rgba(255,255,255,.8);
    cursor:pointer;
    font-size:20px;
    font-weight:bold;
}

.prev{
    left:15px;
}

.next{
    right:15px;
}

.prev:hover,
.next:hover{
    background:#fff;
}
    </style>

</head>
<body>

   <div class="slider">

    <div class="slides">

        <img src="assets/uploads/slide1.webp" class="slide active">

        <img src="assets/uploads/slide2.jpg" class="slide">

        <img src="assets/uploads/slide3.jpg" class="slide">

    </div>

    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>

</div>

   <script>
const slides = document.querySelectorAll(".slide");
const next = document.querySelector(".next");
const prev = document.querySelector(".prev");

let current = 0;

function showSlide(index){

    slides.forEach(slide=>{
        slide.classList.remove("active");
    });

    slides[index].classList.add("active");
}

next.addEventListener("click",()=>{

    current++;

    if(current >= slides.length){
        current = 0;
    }

    showSlide(current);
});

prev.addEventListener("click",()=>{

    current--;

    if(current < 0){
        current = slides.length - 1;
    }

    showSlide(current);
});

/* Tự động chạy */

setInterval(()=>{

    current++;

    if(current >= slides.length){
        current = 0;
    }

    showSlide(current);

},3000);
</script>
    </body>