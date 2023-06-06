
//menu active 
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

$(document).on('click','ul li',function(){
  $(this).addClass('active').siblings().removeClass('active')
});


let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" activee", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " activee";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
};


  /* Demo purposes only */
  $(".hover").mouseleave(
    function () {
      $(this).removeClass("hover");
    }
  );

// check box
$(document).ready(function() {
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Select/Deselect checkboxes
  var checkbox = $('table tbody input[type="checkbox"]');
  $("#selectAll").click(function() {
    if (this.checked) {
      checkbox.each(function() {
        this.checked = true;
      });
    } else {
      checkbox.each(function() {
        this.checked = false;
      });
    }
  });
  checkbox.click(function() {
    if (!this.checked) {
      $("#selectAll").prop("checked", false);
    }
  });
});


