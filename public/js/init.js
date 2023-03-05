/*
 * Copyright (c) 2022 Marketify
 * Author: Marketify
 * This file is made for CURRENT TEMPLATE
 */

jQuery(document).ready(function () {
  "use strict";

  // here all ready functions

  sirah_tm_modalbox();
  sirah_tm_counter();
  sirah_tm_trigger_menu();
  sirah_tm_modalbox_news();
  sirah_tm_modalbox_portfolio();
  sirah_tm_cursor();
  sirah_tm_imgtosvg();
  sirah_tm_popup();
  sirah_tm_data_images();
  sirah_tm_contact_form();
  sirah_tm_owl_carousel();
  sirah_tm_down();
  sirah_tm_nav_bg();
  myAccordion();
  sirah_tm_placeholder_image();

  jQuery(window).load("body", function () {
    sirah_tm_my_load();
    setTimeout(function () {
      sirah_tm_portfolio_masonry();
    }, 500);
  });
});

// -----------------------------------------------------
// ---------------   FUNCTIONS    ----------------------
// -----------------------------------------------------

// -----------------------------------------------------
// --------------------   COUNTER    -------------------
// -----------------------------------------------------

function sirah_tm_counter() {
  "use strict";

  $(".counter_item").each(function () {
    var el = $(this);
    el.waypoint({
      handler: function () {
        if (!el.hasClass("stop")) {
          el.addClass("stop").countTo({
            refreshInterval: 50,
            formatter: function (value, options) {
              return value
                .toFixed(options.decimals)
                .replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
            },
          });
        }
      },
      offset: "95%",
    });
  });
}

// -----------------------------------------------------
// --------------------   MODALBOX    ------------------
// -----------------------------------------------------

function sirah_tm_modalbox() {
  "use strict";

  jQuery(".sirah_tm_all_wrap").prepend(
    '<div class="sirah_tm_modalbox"><div class="box_inner"><div class="close"><a href="#"><i class="icon-cancel"></i></a></div><div class="description_wrap"></div></div></div>'
  );
}

// -----------------------------------------------------
// ---------------   TRIGGER MENU    -------------------
// -----------------------------------------------------

function sirah_tm_trigger_menu() {
  "use strict";

  var hamburger = jQuery(".trigger .hamburger");
  var mobileMenu = jQuery(".sirah_tm_mobile_menu .dropdown");
  var mobileMenuList = jQuery(
    ".sirah_tm_mobile_menu .dropdown .dropdown_inner ul li a"
  );

  hamburger.on("click", function () {
    var element = jQuery(this);

    if (element.hasClass("is-active")) {
      element.removeClass("is-active");
      mobileMenu.slideUp();
    } else {
      element.addClass("is-active");
      mobileMenu.slideDown();
    }
    return false;
  });

  mobileMenuList.on("click", function () {
    jQuery(".trigger .hamburger").removeClass("is-active");
    mobileMenu.slideUp();
    return false;
  });
}

// -------------------------------------------------
// -------------  MODALBOX NEWS  -------------------
// -------------------------------------------------

function sirah_tm_modalbox_news() {
  "use strict";

  var modalBox = jQuery(".sirah_tm_modalbox");
  var button = jQuery(
    ".sirah_tm_news .sirah_tm_full_link,.sirah_tm_news .details .title a"
  );
  var closePopup = modalBox.find(".close");

  button.on("click", function () {
    var element = jQuery(this);
    var parent = element.closest(".list_inner");
    var content = parent.find(".news_hidden_details").html();
    var image = element
      .closest(".list_inner")
      .find(".image .main")
      .data("img-url");
    var date = parent.find(".date").html();
    var title = parent.find(".title a").text();
    modalBox.addClass("opened");
    modalBox.find(".description_wrap").html(content);
    modalBox
      .find(".news_popup_informations")
      .prepend(
        '<div class="image"><img src="assets/img/thumbs/4-2.jpg" alt="" /><div class="main" data-img-url="' +
          image +
          '"></div></div>'
      );
    modalBox
      .find(".news_popup_informations .image")
      .after(
        '<div class="details"><div class="date">' +
          date +
          '</div><div class="title"><h3>' +
          title +
          "</h3><div><div>"
      );
    sirah_tm_data_images();
    sirah_tm_imgtosvg();
    return false;
  });
  closePopup.on("click", function () {
    modalBox.removeClass("opened");
    modalBox.find(".description_wrap").html("");
    return false;
  });
}

// -------------------------------------------------
// -------------  MODALBOX PORTFOLIO  --------------
// -------------------------------------------------

function sirah_tm_modalbox_portfolio() {
  "use strict";

  var modalBox = jQuery(".sirah_tm_modalbox");
  var button = jQuery(".sirah_tm_portfolio .popup_link");
  var closePopup = modalBox.find(".close");

  button.off().on("click", function () {
    var element = jQuery(this);
    var parent = element.closest(".list_inner");
    var content = parent.find(".hidden_content").html();
    var image = parent.find(".image .main").data("img-url");
    var title = parent.find(".details h3").text();
    modalBox.addClass("opened");
    modalBox.find(".description_wrap").html(content);
    modalBox
      .find(".popup_details")
      .prepend(
        '<div class="top_image"><img src="assets/img/thumbs/4-2.jpg" alt="" /><div class="main" data-img-url="' +
          image +
          '"></div></div>'
      );
    modalBox
      .find(".popup_details .top_image")
      .after('<div class="portfolio_main_title"><h3>' + title + "</h3><div>");
    sirah_tm_data_images();
    return false;
  });
  closePopup.on("click", function () {
    modalBox.removeClass("opened");
    modalBox.find(".description_wrap").html("");
    return false;
  });
}

// -----------------------------------------------------
// ---------------   PRELOADER   -----------------------
// -----------------------------------------------------

function sirah_tm_preloader() {
  "use strict";

  var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(
    navigator.userAgent
  )
    ? true
    : false;
  var preloader = $("#preloader");

  if (!isMobile) {
    setTimeout(function () {
      preloader.addClass("preloaded");
    }, 1000);
    setTimeout(function () {
      preloader.remove();
    }, 2000);
  } else {
    preloader.remove();
  }
}

// -----------------------------------------------------
// -----------------   MY LOAD    ----------------------
// -----------------------------------------------------

function sirah_tm_my_load() {
  "use strict";

  var speed = 500;
  setTimeout(function () {
    sirah_tm_preloader();
  }, speed);
}

// -----------------------------------------------------
// ------------------   CURSOR    ----------------------
// -----------------------------------------------------

function sirah_tm_cursor() {
  "use strict";

  var myCursor = jQuery(".mouse-cursor");

  if (myCursor.length) {
    if ($("body")) {
      const e = document.querySelector(".cursor-inner"),
        t = document.querySelector(".cursor-outer");
      let n,
        i = 0,
        o = !1;
      (window.onmousemove = function (s) {
        o ||
          (t.style.transform =
            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
          (e.style.transform =
            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
          (n = s.clientY),
          (i = s.clientX);
      }),
        $("body").on(
          "mouseenter",
          "a, .sirah_tm_testimonials .avatars ul li, .cursor-pointer",
          function () {
            e.classList.add("cursor-hover"), t.classList.add("cursor-hover");
          }
        ),
        $("body").on(
          "mouseleave",
          "a, .sirah_tm_testimonials .avatars ul li, .cursor-pointer",
          function () {
            ($(this).is("a") && $(this).closest(".cursor-pointer").length) ||
              (e.classList.remove("cursor-hover"),
              t.classList.remove("cursor-hover"));
          }
        ),
        (e.style.visibility = "visible"),
        (t.style.visibility = "visible");
    }
  }
}

// -----------------------------------------------------
// ---------------    IMAGE TO SVG    ------------------
// -----------------------------------------------------

function sirah_tm_imgtosvg() {
  "use strict";

  jQuery("img.svg").each(function () {
    var jQueryimg = jQuery(this);
    var imgClass = jQueryimg.attr("class");
    var imgURL = jQueryimg.attr("src");

    jQuery.get(
      imgURL,
      function (data) {
        // Get the SVG tag, ignore the rest
        var jQuerysvg = jQuery(data).find("svg");

        // Add replaced image's classes to the new SVG
        if (typeof imgClass !== "undefined") {
          jQuerysvg = jQuerysvg.attr("class", imgClass + " replaced-svg");
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        jQuerysvg = jQuerysvg.removeAttr("xmlns:a");

        // Replace image with new SVG
        jQueryimg.replaceWith(jQuerysvg);
      },
      "xml"
    );
  });
}

// -----------------------------------------------------
// --------------------   POPUP    ---------------------
// -----------------------------------------------------

function sirah_tm_popup() {
  "use strict";

  jQuery(".gallery_zoom").each(function () {
    // the containers for all your galleries
    jQuery(this).magnificPopup({
      delegate: "a.zoom", // the selector for gallery item
      type: "image",
      gallery: {
        enabled: true,
      },
      removalDelay: 300,
      mainClass: "mfp-fade",
    });
  });
  jQuery(".popup-youtube, .popup-vimeo").each(function () {
    // the containers for all your galleries
    jQuery(this).magnificPopup({
      disableOn: 700,
      type: "iframe",
      mainClass: "mfp-fade",
      removalDelay: 160,
      preloader: false,
      fixedContentPos: true,
    });
  });

  jQuery(".soundcloude_link").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });
}

// -----------------------------------------------------
// ---------------   DATA IMAGES    --------------------
// -----------------------------------------------------

function sirah_tm_data_images() {
  "use strict";

  var data = jQuery("*[data-img-url]");

  data.each(function () {
    var element = jQuery(this);
    var url = element.data("img-url");
    element.css({ backgroundImage: "url(" + url + ")" });
  });
}

// -----------------------------------------------------
// ----------------    CONTACT FORM    -----------------
// -----------------------------------------------------

function sirah_tm_contact_form() {
  "use strict";

  jQuery(".contact_form #send_message").on("click", function () {
    var name = jQuery(".contact_form #name").val();
    var email = jQuery(".contact_form #email").val();
    var message = jQuery(".contact_form #message").val();
    var subject = jQuery(".contact_form #subject").val();
    var success = jQuery(".contact_form .returnmessage").data("success");

    jQuery(".contact_form .returnmessage").empty(); //To empty previous error/success message.
    //checking for blank fields
    if (name === "" || email === "" || message === "") {
      jQuery(".contact_form .empty_notice")
        .slideDown(500)
        .delay(2000)
        .slideUp(500);
    } else {
      // Returns successful data submission message when the entered information is stored in database.
      jQuery.post(
        "modal/contact.php",
        {
          ajax_name: name,
          ajax_email: email,
          ajax_message: message,
          ajax_subject: subject,
        },
        function (data) {
          jQuery(".contact_form .returnmessage").append(data); //Append returned message to message paragraph

          if (
            jQuery(".contact_form .returnmessage span.contact_error").length
          ) {
            jQuery(".contact_form .returnmessage")
              .slideDown(500)
              .delay(2000)
              .slideUp(500);
          } else {
            jQuery(".contact_form .returnmessage").append(
              "<span class='contact_success'>" + success + "</span>"
            );
            jQuery(".contact_form .returnmessage")
              .slideDown(500)
              .delay(4000)
              .slideUp(500);
          }

          if (data === "") {
            jQuery("#contact_form")[0].reset(); //To reset form fields on success
          }
        }
      );
    }
    return false;
  });
}

// -----------------------------------------------------
// ----------------    OWL CAROUSEL    -----------------
// -----------------------------------------------------

function sirah_tm_owl_carousel() {
  "use strict";

  var carousel = jQuery(".sirah_tm_testimonials .owl-carousel");

  var rtlMode = false;

  if (jQuery("body").hasClass("rtl")) {
    rtlMode = "true";
  }

  carousel.each(function () {
    var element = jQuery(this);

    element.owlCarousel({
      loop: true,
      items: 1,
      lazyLoad: false,
      margin: 30,
      autoplay: true,
      autoplayTimeout: 7000,
      rtl: rtlMode,
      dots: true,
      nav: false,
      navSpeed: false,
      animateIn: "fadeIn",
      animateOut: "fadeOut",
    });

    element
      .parent()
      .find(".next_button")
      .click(function () {
        element.trigger("next.owl.carousel");
        return false;
      });
    // Go to the previous item
    element
      .parent()
      .find(".prev_button")
      .click(function () {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        element.trigger("prev.owl.carousel");
        return false;
      });
  });

  var carousel2 = jQuery(".sirah_tm_partner .owl-carousel");

  carousel2.owlCarousel({
    loop: true,
    items: 4,
    lazyLoad: false,
    margin: 50,
    autoplay: true,
    autoplayTimeout: 7000,
    dots: true,
    nav: false,
    navSpeed: true,
    responsive: {
      0: { items: 2 },
      480: { items: 3 },
      768: { items: 4 },
    },
  });
}

// -------------------------------------------------
// -----------------  GRID MASONRY  ----------------
// -------------------------------------------------

$(".grid").masonry({
  itemSelector: ".grid-item",
});

// ------------------------------------------------
// -------------------  ANCHOR --------------------
// ------------------------------------------------

jQuery(".anchor_nav").onePageNav();

// -----------------------------------------------------
// -----------------    DOWN    ------------------------
// -----------------------------------------------------

function sirah_tm_down() {
  "use strict";

  var header = jQuery(".sirah_tm_header").height();

  jQuery(".anchor").on("click", function () {
    if ($.attr(this, "href") !== "#") {
      $("html, body").animate(
        {
          scrollTop: $($.attr(this, "href")).offset().top - header - 30,
        },
        800
      );
    }

    return false;
  });
}

// -----------------------------------------------------
// --------------------    WOW JS    -------------------
// -----------------------------------------------------

new WOW().init();

// -----------------------------------------------------
// ------------    WAIT FOR IMAGES   -------------------
// -----------------------------------------------------

$(".portfolio_list")
  .waitForImages()
  .done(function () {
    "use strict";
    sirah_tm_portfolio_masonry();
  });

function sirah_tm_portfolio_masonry() {
  "use strict";

  $(".grid").masonry({
    itemSelector: ".grid-item",
  });
}

// -------------------------------------------------
// -------------   TOPBAR BG SCROLL  ---------------
// -------------------------------------------------

function sirah_tm_nav_bg() {
  "use strict";

  jQuery(window).on("scroll", function () {
    var menu = jQuery(".sirah_tm_header");
    var progress = jQuery(".progressbar");
    var WinOffset = jQuery(window).scrollTop();

    if (WinOffset >= 100) {
      menu.addClass("animate");
      progress.addClass("animate");
    } else {
      menu.removeClass("animate");
      progress.removeClass("animate");
    }
  });
}

// -----------------------------------------------------
// --------------------   ACCORDION    -----------------
// -----------------------------------------------------

function myAccordion() {
  "use strict";

  var button = jQuery(".accordion_wrap .accordion_header");

  button.on("click", function () {
    var element = jQuery(this);
    var li = element.closest(".accordion");
    if (li.hasClass("active")) {
      li.removeClass("active").find(".accordion_content").slideUp();
    } else {
      li.siblings(".active")
        .removeClass("active")
        .find(".accordion_content")
        .slideUp();
      li.addClass("active").find(".accordion_content").slideDown();
    }

    return false;
  });
}

// -----------------------------------------------------
// -----   PORTFOLIO PLACEHOLDER IMAGE    --------------
// -----------------------------------------------------

function sirah_tm_placeholder_image() {
  "use strict";

  jQuery(".sirah_tm_portfolio ul li:nth-of-type(5n) .image").prepend(
    '<img src="assets/img/thumbs/1-1.jpg" alt="" />'
  );
  jQuery(".sirah_tm_portfolio ul li:nth-of-type(5n+3) .image").prepend(
    '<img src="assets/img/thumbs/1-1.jpg" alt="" />'
  );
  jQuery(".sirah_tm_portfolio ul li:nth-of-type(5n+4) .image").prepend(
    '<img src="assets/img/thumbs/1-1.jpg" alt="" />'
  );
  jQuery(".sirah_tm_portfolio ul li:nth-of-type(5n+1) .image").prepend(
    '<img src="assets/img/thumbs/95-55.jpg" alt="" />'
  );
  jQuery(".sirah_tm_portfolio ul li:nth-of-type(5n+2) .image").prepend(
    '<img src="assets/img/thumbs/95-55.jpg" alt="" />'
  );
}
