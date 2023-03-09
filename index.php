<?php
    include 'header.php';
?>

<section class="visual">
    <div class="inner">
        <div class="textbox">
            <h2 data-aos="fade-up" data-aos-duration="800">
                더 넓은 세상으로의 시작<span class="br"></span>
                글로벌 크로스보더,<span class="br"></span>
            </h2>
            <h3 data-aos="fade-up" data-aos-duration="800">엑스루트</h3>
            <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                해외배송부터 풀필먼트까지 더 간편하고 빠른<span class="br"></span>
                글로벌 비지니스를 하나의 배송 플랫폼에서 시작해보세요
            </p>
            <ul>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="400"><a href="login.php">회원가입</a></li>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="600"><a href="/file/2022XROUTEServiceDescription.pdf" target="_blank">서비스 소개서 <i class="xi-angle-right-min"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="visualContent">
        <div class="bg"></div>
        <video
        muted
        autoplay
        loop
        playsinline
        width="1920"
        height="1080"
        src="/video/visual.mp4"
        ></video>
    </div>
</section>

<script>
    let mql = window.matchMedia("screen and (max-width: 1200px)");

    if (mql.matches) {
        $(".visualContent video").attr("src", "video/visualM.mp4");
        $(".visualContent video").attr("width", "100%");
        $(".visualContent video").attr("height", "auto");
    } else {
        $(".visualContent video").attr("src", "video/visual.mp4");
    }
</script>

<section class="indexBanner01">
    <article class="inner">
        <div class="textbox" data-aos="fade-up" data-aos-duration="800">
            <h2>해외배송<br/>어려울게 없습니다 <b class="geomanist">.</b></h2>
            <p>막막한 통관, 답답한 배송조회?<br/>이제 엑스루트로 전 세계의 고객을 쉽고 빠르게 만나보세요.</p>
        </div>
        <ul class="contents">
            <li data-aos="fade-up" data-aos-duration="800">
                <h2>주문과<br/>배송을 한번에</h2>
                <p>자사 쇼핑몰은 물론 국내외 유통 플랫폼을 API 로 연결해, 주문과 배송정보 등을 실시간으로 업데이트합니다. 엑스루트와 함께 전 세계 고객에게 배송해보세요.</p>
            </li>
            <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                <h2>최적의<br/>해외배송 서비스</h2>
                <p>전 세계를 아우르는 해외배송 네트워크로 다양한 제품을 전 세계 245 개 국가에 배송할 수 있습니다. 이제 더 다양한 국가의 고객과 만나보세요</p>
            </li>
            <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                <h2>판매에만<br/>집중하세요</h2>
                <p>해외배송뿐만아니라 재고의 보관, 주문 처리를 위한 포장부터 라벨링 작업까지 수행할 수 있습니다. 제품은 엑스루트에 맡기시고 판매에 더욱 집중하세요</p>
            </li>
        </ul>
    </article>
</section>

<section class="indexBanner05">
    <article class="inner">
        <div class="textbox" data-aos="fade-up" data-aos-duration="800">
            <h2>
                엑스루트를 통해<br/>
                전 세계 고객을<br/>
                만나보세요 <b class="geomanist">.</b>
            </h2>
            <p>
                글로벌 크로스보더부터 풀필먼트, 보세창고까지,<br/>
                이커머스에 특화된 다양하고 편리한 서비스를 경험해보세요.
            </p>
        </div>
        <ul>
            <li data-aos="fade-up" data-aos-duration="800">
                <div class="img"><img src="/imgs/indexBanner05Img01.jpg" alt=""></div>
                <h2 class="geomanist">E-COMMERCE</h2>
                <p>
                    이커머스에 특화된 글로벌 네트워크 구축을 통해<br/>
                    특송부터 FBA까지, 다양한 배송 상품을 이용해보세요.
                </p>
                <a href="crossborder.php">자세히 보기 <i class="xi-angle-right-min"></i></a>
            </li>
            <li data-aos="fade-up" data-aos-duration="800">
                <div class="img"><img src="/imgs/indexBanner05Img04.jpg" alt=""></div>
                <h2 class="geomanist">FORWARDING</h2>
                <p>
                    주문, 출고, 배송, 재고관리까지! 자체 개발한 첨단 물류 시스템으로<br/>
                    더욱 편리해진 풀필먼트 서비스를 만나보세요.
                </p>
                <a href="forwarding.php">자세히 보기 <i class="xi-angle-right-min"></i></a>
            </li>
            <li data-aos="fade-up" data-aos-duration="800">
                <div class="img"><img src="/imgs/indexBanner05Img02.jpg" alt=""></div>
                <h2 class="geomanist">FULFILLMENT</h2>
                <p>
                    주문, 출고, 배송, 재고관리까지! 자체 개발한 첨단 물류 시스템으로<br/>
                    더욱 편리해진 풀필먼트 서비스를 만나보세요.
                </p>
                <a href="fulfillment.php">자세히 보기 <i class="xi-angle-right-min"></i></a>
            </li>
            <li data-aos="fade-up" data-aos-duration="800">
                <div class="img"><img src="/imgs/indexBanner05Img03.jpg" alt=""></div>
                <h2 class="geomanist">BONDED WAREHOUSE</h2>
                <p>
                    수출입 화물 보수작업 공간과 화물 분할 반출입 보세화물에<br/>
                    최적화된 보세창고를 이용해보세요.
                </p>
                <a href="warehouse.php">자세히 보기 <i class="xi-angle-right-min"></i></a>
            </li>
        </ul>
    </article>
</section>

<section class="indexBanner03">
    <article class="inner">
        <div class="textbox" data-aos="fade-up" data-aos-duration="800">
            <h2>엑스루트<br/><span class="geomanist">ALL-IN-ONE API is</span> <b class="geomanist">.</b></h2>
            <p>
                이베이, 쇼피 등 글로벌 이커머스 배송이 더 쉬워집니다.<br/>
                API 연동을 통해 주문 수집부터 배송 트래킹까지 한번에 관리해보세요.
            </p>
        </div>
        <div class="content" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <img class="pc" src="/imgs/indexBanner03Content.png" alt="">
            <img class="mobile" src="/imgs/indexBanner03ContentMobile.png" alt="">
        </div>
    </article>
</section>

<section class="indexBanner06">
    <article class="inner">
        <div class="textbox" data-aos="fade-up" data-aos-duration="800">
            <h2>
                엑스루트에서<br/>
                디지털 물류를 <span class="mbr"></span>시작하세요 <b class="geomanist">.</b>
            </h2>
            <p>
                사용자에 최적화된 플랫폼을 제공합니다.<br/>
                주문 동기화부터 배송현황까지! 엑스루트의 다양한 기능을 경험해보세요.
            </p>
        </div>
        <div class="contents">
            <img src="/imgs/indexBanner06bigImg.png" alt="" data-aos="fade-up" data-aos-duration="800">
            <ul>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <div>
                        <img src="/imgs/fulfillmentBanner05Icon01.png" alt="">
                    </div>
                    <p>
                        사용자<br/>
                        관리 시스템
                    </p>
                </li>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                    <div>
                        <img src="/imgs/fulfillmentBanner05Icon02.png" alt="">
                    </div>
                    <p>
                        회원<br/>
                        관리 시스템
                    </p>
                </li>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                    <div>
                        <img src="/imgs/fulfillmentBanner05Icon03.png" alt="">
                    </div>
                    <p>
                        인증 / 보안<br/>
                        관리 시스템
                    </p>
                </li>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                    <div>
                        <img src="/imgs/fulfillmentBanner05Icon04.png" alt="">
                    </div>
                    <p>
                        매출 / 통계<br/>
                        기능
                    </p>
                </li>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                    <div>
                        <img src="/imgs/fulfillmentBanner05Icon05.png" alt="">
                    </div>
                    <p>
                        배송<br/>
                        관리 시스템
                    </p>
                </li>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="700">
                    <div>
                        <img src="/imgs/fulfillmentBanner05Icon06.png" alt="">
                    </div>
                    <p>
                        교환 / 반품등<br/>
                        CS관리 메뉴
                    </p>
                </li>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
                    <div>
                        <img src="/imgs/fulfillmentBanner05Icon07.png" alt="">
                    </div>
                    <p>
                        결제<br/>
                        관리 시스템
                    </p>
                </li>
                <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="900">
                    <div>
                        <img src="/imgs/fulfillmentBanner05Icon08.png" alt="">
                    </div>
                    <p>
                        BOX ID / 바코드<br/>
                        관리 시스템
                    </p>
                </li>
            </ul>
        </div>
    </article>
</section>

<section class="indexBanner02">
    <article class="inner">
        <div class="slideIndex" data-aos="fade-up" data-aos-duration="800">
            <h2 class="title" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">프로가 하면 다르니까 <b class="geomanist">.</b></h2>
            <ul class="img" data-aos="fade-up" data-aos-duration="800">
                <li class="01"><img src="/imgs/indexSlide01.png" alt=""></li>
                <li class="02"><img src="/imgs/indexSlide02.png" alt=""></li>
                <li class="03"><img src="/imgs/indexSlide03.png" alt=""></li>
            </ul>
            <ul class="text">
                <li class="textbox 01" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                    <h2 class="geomanist">200k+</h2>
                    <p>월 20만개 이상의 제품이 엑스루트를 통해 전 세계로 배송됩니다.</p>
                </li>
                <li class="textbox 02" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                    <h2 class="geomanist">110</h2>
                    <p>110개의 고객사가 엑스루트의 서비스를 이용하고 있습니다.</p>
                </li>
                <li class="textbox 03" data-aos="fade-up" data-aos-duration="800" data-aos-delay="800">
                    <h2 class="geomanist">245</h2>
                    <p>전 세계 245개국에 빠르고 편리한 해외배송 서비스를 제공합니다.</p>
                </li>
                <div class="progress-bar">
                    <div class="progress"></div>
                </div>
            </ul>
        </div>
    </article>
</section>

<section class="indexBanner04">
    <article class="inner">
        <h2 class="title geomanist" data-aos="fade-up" data-aos-duration="800">PARTNERS <b class="geomanist">.</b></h2>
        <ul class="companyList">
            <!-- <li><img src="/imgs/1.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li> -->
            <li><img src="/imgs/2.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/3.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/4.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/5.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/6.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/7.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/8.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/9.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/10.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/11.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/12.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/13.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/14.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/15.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/16.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/17.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/18.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/19.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
            <li><img src="/imgs/20.svg" alt="" data-aos="fade-up" data-aos-duration="800"></li>
        </ul>
    </article>
</section>

<section class="inquiryBanner inquiryBannerIndex">
  <article class="inner">
    <h2 data-aos="fade-up" data-aos-duration="800">
      나에게 맞는<br/>
      해외배송 상품을 알아보세요
    </h2>
    <a href="inquiry.php" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">문의하기</a>
  </article>
</section>

<?php
    include 'footer.php';
?>

<!-- <div class="indexPopup indexPopup1" id="indexPopup1" class="agree-popup-frame">
    <a href="/notice_view.php?bd=4&itm=&txt=&itm_cate=&itm_scate=&pg=1&seq=76" target="_blank">
        <img src="/imgs/popup01.png" alt="">
    </a>
    <div class="popupBtn">
        <a href="javascript:todayClose('indexPopup1', 1);" class="today-x-btn">오늘 하루 열지 않기</a>
        <a href="javascript:fadeOutPop('indexPopup1');" class="x-btn">닫기</a>
    </div>
</div> -->

<!-- <div class="indexPopup indexPopup2" id="indexPopup2" class="agree-popup-frame">
    <a href="http://seller.xroute.asia/loginpage/" target="_blank">
        <img src="/imgs/popup02.png" alt="">
    </a>
    <div class="popupBtn">
        <a href="javascript:todayClose('indexPopup2', 1);" class="today-x-btn">오늘 하루 열지 않기</a>
        <a href="javascript:fadeOutPop('indexPopup2');" class="x-btn">닫기</a>
    </div>
</div> -->

<script>
 // * today popup close
  todayOpen('indexPopup1');
  todayOpen('indexPopup2');
  // 창열기  
  function todayOpen(winName) {
    var blnCookie = getCookie(winName);
    var obj = eval("window." + winName);
    console.log(blnCookie);
    if (!blnCookie) {
      obj.style.display = "block";
    } else {
      obj.style.display = "none";
    }
  }
  //닫기
  function fadeOutPop(winName){
    var obj = eval("window." + winName);
    obj.style.display = "none";
  }
  // 창닫기  
  function todayClose(winName, expiredays) {
    setCookie(winName, "expire", expiredays);
    var obj = eval("window." + winName);
    obj.style.display = "none";
  }
  // 쿠키 가져오기  
  function getCookie(name) {
    var nameOfCookie = name + "=";
    var x = 0;
    while (x <= document.cookie.length) {
      var y = (x + nameOfCookie.length);
      if (document.cookie.substring(x, y) == nameOfCookie) {
        if ((endOfCookie = document.cookie.indexOf(";", y)) == -1)
          endOfCookie = document.cookie.length;
        return unescape(document.cookie.substring(y, endOfCookie));
      }
      x = document.cookie.indexOf(" ", x) + 1;
      if (x == 0)
        break;
    }
    return "";
  }

  // 24시간 기준 쿠키 설정하기  
  // 만료 후 클릭한 시간까지 쿠키 설정  
  function setCookie(name, value, expiredays) {
    var todayDate = new Date();
    todayDate.setDate(todayDate.getDate() + expiredays);
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
  }
</script>