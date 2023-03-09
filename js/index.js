{
  $(document).ready(function () {
    $("header .inner .signIn li.lang p").click(function () {
      $(this).siblings("div").toggleClass("dpb");
    });
  });
}
{
  $(document).ready(function () {
    $(".forwardingBanner03 .inner ul li").click(function () {
      $(this).siblings("li").removeClass("active");
      $(this).addClass("active");
    });
    $(".forwardingBanner03 .inner ul li").hover(function () {
      $(this).siblings("li").removeClass("active");
      $(this).addClass("active");
    });
  });
}
{
  //inquiry modal
  $(document).ready(function () {
    $(".modalBtn").click(function () {
      $(".modal1").css("display", "block");
    });
    $(".modalClose").click(function () {
      $(".modal1").css("display", "none");
    });
    // 외부영역 클릭 시 팝업 닫기
    $(document).mouseup(function (e) {
      var LayerPopup = $(".modal1");
      if (LayerPopup.has(e.target).length === 0) {
        LayerPopup.css("display", "none");
      }
    });
  });
}
{
  //footer modal1
  $(document).ready(function () {
    $(".modalBtn1").click(function () {
      $(".modal2").css("display", "block");
    });
    $(".modalClose").click(function () {
      $(".modal2").css("display", "none");
    });
    // 외부영역 클릭 시 팝업 닫기
    $(document).mouseup(function (e) {
      var LayerPopup = $(".modal2");
      if (LayerPopup.has(e.target).length === 0) {
        LayerPopup.css("display", "none");
      }
    });
  });
}
{
  //footer modal2
  $(document).ready(function () {
    $(".modalBtn2").click(function () {
      $(".modal3").css("display", "block");
    });
    $(".modalClose").click(function () {
      $(".modal3").css("display", "none");
    });
    // 외부영역 클릭 시 팝업 닫기
    $(document).mouseup(function (e) {
      var LayerPopup = $(".modal3");
      if (LayerPopup.has(e.target).length === 0) {
        LayerPopup.css("display", "none");
      }
    });
  });
}
{
  //mobile menu
  $(document).ready(function () {
    $(".mobile_btn").click(function () {
      $(".navMobile").css("display", "block");
    });
    $(".navMobile .close i").click(function () {
      $(".navMobile").css("display", "none");
    });
  });
}
{
  //top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".topBtn").show();
    } else {
      $(".topBtn").hide();
    }
  });
}
{
  //top button scroll
  $(document).ready(function () {
    $(".topBtn").click(function () {
      $("body, html").animate({ scrollTop: 0 }, 400);
      return false;
    });
  });
}
{
  //index API
  $(document).ready(function () {
    let i = 0;
    function f1() {
      setTimeout(function () {
        $(".slideIndex ul li").removeClass("on");
        $(".slideIndex ul li").siblings("li.01").addClass("on");
      }, 0);
      setTimeout(function () {
        $(".slideIndex ul li").removeClass("on");
        $(".slideIndex ul li").siblings("li.02").addClass("on");
      }, 2000);
      setTimeout(function () {
        $(".slideIndex ul li").removeClass("on");
        $(".slideIndex ul li").siblings("li.03").addClass("on");
      }, 4000);
      setTimeout(function () {
        $(".slideIndex ul li").removeClass("on");
        $(".slideIndex ul li").siblings("li.03").addClass("on");
      }, 6000);
    }
    function f() {
      f1();
      i += 1;
      setTimeout(function () {
        if (i < 100) {
          f();
        }
      }, 6000);
    }
    f();
  });
}

{
  //tab
  $(document).ready(function () {
    $("ul.tabs li").click(function () {
      var tab_id = $(this).attr("data-tab");
      $("ul.tabs li").removeClass("current");
      $(".tabContent").removeClass("current");
      $(this).addClass("current");
      $("#" + tab_id).addClass("current");
    });
  });
}

{
  //FAQ
  $(document).ready(function () {
    $(".faq li h2").click(function () {
      $(".faq li p").slideUp();
      $(".faq h2").removeClass("active");
      if (!$(this).next().is(":visible")) {
        $(this).next().slideDown();
        $(this).addClass("active");
      } else {
      }
    });
  });
}

{
  //more button
  $(document).ready(function () {
    $(".moreBtn1").click(function () {
      $(".faq2").addClass("dpb");
      $(this).addClass("dpn");
      $(".moreBtn2").addClass("dpb");
    });
  });
}
{
  //more button
  $(document).ready(function () {
    $(".moreBtn2").click(function () {
      $(".faq3").addClass("dpb");
      $(this).addClass("dpn");
      $(".moreBtn3").addClass("dpb");
    });
  });
}
{
  //more button
  $(document).ready(function () {
    $(".moreBtn3").click(function () {
      $(".faq4").addClass("dpb");
      $(this).addClass("dpn");
      $(".moreBtn").addClass("dpn");
    });
  });
}
{
  (function () {
    var w = window;
    if (w.ChannelIO) {
      return (window.console.error || window.console.log || function () {})(
        "ChannelIO script included twice."
      );
    }
    var ch = function () {
      ch.c(arguments);
    };
    ch.q = [];
    ch.c = function (args) {
      ch.q.push(args);
    };
    w.ChannelIO = ch;
    function l() {
      if (w.ChannelIOInitialized) {
        return;
      }
      w.ChannelIOInitialized = true;
      var s = document.createElement("script");
      s.type = "text/javascript";
      s.async = true;
      s.src = "https://cdn.channel.io/plugin/ch-plugin-web.js";
      s.charset = "UTF-8";
      var x = document.getElementsByTagName("script")[0];
      x.parentNode.insertBefore(s, x);
    }
    if (document.readyState === "complete") {
      l();
    } else if (window.attachEvent) {
      window.attachEvent("onload", l);
    } else {
      window.addEventListener("DOMContentLoaded", l, false);
      window.addEventListener("load", l, false);
    }
  })();
  ChannelIO("boot", {
    pluginKey: "f4a54b10-0a53-4435-8700-645d3c1408b1",
  });
}
