window.onscroll = function() {showArrowOnScrollingDown()};

function showArrowOnScrollingDown() {
  if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
    document.getElementById("downArrow").classList.add("show-arrow");
  }
  else {
    document.getElementById("downArrow").classList.remove("show-arrow");
  }
} 

/* var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navBar").style.top = "0";
  } else {
    document.getElementById("navBar").style.top = "-80px";
  }
  prevScrollpos = currentScrollPos;
}; */


(function(){

  let doc = document.documentElement;
  let w = window;

  let prevScroll = w.scrollY || doc.scrollTop;
  let curScroll;
  let direction = 0;
  let prevDirection = 0;

  let header = document.getElementById('navBar');

  let checkScroll = setInterval(function() { /*setInterval Error*/
    /*
    ** Find the direction of scroll
    ** 0 - initial, 1 - up, 2 - down
    */

    curScroll = w.scrollY || doc.scrollTop;
    if (curScroll > prevScroll) { 
      //scrolled up
      direction = 2;
    }
    else if (curScroll < prevScroll) { 
      //scrolled down
      direction = 1;
    }

    if (direction !== prevDirection) {
      toggleHeader(direction, curScroll);
    }
    
    prevScroll = curScroll;
  },1500);

  let toggleHeader = function(direction, curScroll) {
    if (direction === 2 && curScroll > 52) { 
      header.classList.add('hide-navbar');
      prevDirection = direction;
    }
    else if (direction === 1) {
      header.classList.remove('hide-navbar');
      prevDirection = direction;
    }
  };
  
  window.addEventListener('scroll', checkScroll);

})();

