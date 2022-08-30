// ***************** AUTO HIDE NAVBAR ******************** START

var navAnchor = document.querySelectorAll(".hidenavbar");
for (let i = 0; i < navAnchor.length; i++) {
    navAnchor[i].addEventListener("click", function () {
        navIsClicked = true;
    });
}

//Auto HIDE Navbar on anchor click

var scrollTimer = -1;
navIsClicked = false;

// function hidenav() {
//     navIsClicked = true;
// }

// AUTO HIDE NAVBAR

document.addEventListener("DOMContentLoaded", function () {
    el_autohide = document.querySelector(".autohide");

    // add padding-top to bady (if necessary)
    navbar_height = document.querySelector(".navbar").offsetHeight;
    document.body.style.paddingTop = navbar_height + "px";

    if (el_autohide) {
        var last_scroll_top = 0;

        window.addEventListener("scroll", function autohidenavbar() {
            let scroll_top = window.scrollY;

            if (scrollTimer != -1) {
                clearTimeout(scrollTimer);
            }
            if (navIsClicked) {
                el_autohide.classList.remove("scrolled-up");
                el_autohide.classList.add("scrolled-down");
            } else if (scroll_top < last_scroll_top) {
                el_autohide.classList.remove("scrolled-down");
                el_autohide.classList.add("scrolled-up");
            } else {
                el_autohide.classList.remove("scrolled-up");
                el_autohide.classList.add("scrolled-down");
            }
            last_scroll_top = scroll_top;

            scrollTimer = window.setTimeout("scrollFinished()", 200);
        });
        // window.addEventListener
    }
    // if
});

// DOMContentLoaded  end
function scrollFinished() {
    navIsClicked = false;
}

// ***************** AUTO HIDE NAVBAR ******************** END
