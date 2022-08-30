require("./bootstrap");

// // ***************** AUTO HIDE NAVBAR ******************** START

// var navAnchor = document.querySelectorAll(".hidenavbar");
// for (let i = 0; i < navAnchor.length; i++) {
//     navAnchor[i].addEventListener("click", function () {
//         navIsClicked = true;
//     });
// }

// //Auto HIDE Navbar on anchor click

// var scrollTimer = -1;
// navIsClicked = false;

// // function hidenav() {
// //     navIsClicked = true;
// // }

// // AUTO HIDE NAVBAR

// document.addEventListener("DOMContentLoaded", function () {
//     el_autohide = document.querySelector(".autohide");

//     // add padding-top to bady (if necessary)
//     navbar_height = document.querySelector(".navbar").offsetHeight;
//     document.body.style.paddingTop = navbar_height + "px";

//     if (el_autohide) {
//         var last_scroll_top = 0;

//         window.addEventListener("scroll", function autohidenavbar() {
//             let scroll_top = window.scrollY;

//             if (scrollTimer != -1) {
//                 clearTimeout(scrollTimer);
//             }
//             if (navIsClicked) {
//                 el_autohide.classList.remove("scrolled-up");
//                 el_autohide.classList.add("scrolled-down");
//             } else if (scroll_top < last_scroll_top) {
//                 el_autohide.classList.remove("scrolled-down");
//                 el_autohide.classList.add("scrolled-up");
//             } else {
//                 el_autohide.classList.remove("scrolled-up");
//                 el_autohide.classList.add("scrolled-down");
//             }
//             last_scroll_top = scroll_top;

//             scrollTimer = window.setTimeout("scrollFinished()", 200);
//         });
//         // window.addEventListener
//     }
//     // if
// });

// // DOMContentLoaded  end
// function scrollFinished() {
//     navIsClicked = false;
// }

// // ***************** AUTO HIDE NAVBAR ******************** END

//Get Ancho Click
var isClicked = false;

function AnchorClicked() {
    isClicked = true;
}
function isClickedFalse() {
    isClicked = false;
}

document.querySelector("body").addEventListener(
    "click",
    function (e) {
        var anchor = e.target.closest("a");
        if (anchor !== null) {
            // console.log(anchor.textContent);
            AnchorClicked();
        }
    },
    false
);

//New Auto Hide from  https://www.w3schools.com/howto/howto_js_navbar_hide_scroll.asp

var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
    if (!isClicked) {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-50px";
        }
        prevScrollpos = currentScrollPos;
    } else {
        document.getElementById("navbar").style.top = "-50px";
        setTimeout(isClickedFalse, 500);
    }
};

//Change Main Image
change_image = function change_image(image) {
    var container = document.getElementById("main-image");
    container.src = image.src;
};
document.addEventListener("DOMContentLoaded", function (event) {});

//Projects Filter
var urlmenu = document.getElementById("type-filter");
urlmenu.onchange = function () {
    value = urlmenu.value;
    document.cookie = "selection =" + value;
    window.open(this.options[this.selectedIndex].value, "_self");
};


//Setting type like before using cookie


// window.onload = function () {
//     if (getCookie("selection")) {
//         document.getElementById("type-filter").value = getCookie("selection");
//     }
//     else {
//         document.getElementById("type-filter").value = "type";
//     }
//     select.onsubmit = function () {
//         document.cookie ="selection=" + document.getElementById("type-filter").value;
//         return false;
//     }
// }
// function getCookie(cname) {
//     var name = cname + "=";
//     var decodedCookie = decodeURIComponent(document.cookie);
//     var ca = decodedCookie.split(";");
//     for (var i = 0; i < ca.length; i++) {
//         var c = ca[i];
//         while (c.charAt(0) == " ") {
//             c = c.substring(1);
//         }
//         if (c.indexOf(name) == 0) {
//             return c.substring(name.length, c.length);
//         }
//     }
//     return "";
// }
// function linkClick(e) {
//     document.cookie
// }
// links = document.getElementsByTagName("a");
// for (i = 0; i < links.length; i++)
//     links[i].addEventListener("click", linkClick, false);

