<?php
    include 'header.php';
?>

<section class="inquiry">
    <div class="textbox">
      <h2 data-aos="fade-up" data-aos-duration="800">견적문의 <b class="geomanist">.</b></h2>
      <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">쉽고 빠른 국제 배송, XROUTE와 함께하세요</p>
    </div>
    <form name="faq" action="process.php" method="post" onsubmit="return chkForm();">
      <div class="block" id="servicediv" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
        <p class="inquiry_p"><span>01</span>어떤 서비스를 문의하고 싶으신가요?</p>
        <ul class="select_service">
          <li>
            <input type="radio" name="service" id="inquiryCrossborder" value="크로스보더" >
            <label  for="inquiryCrossborder" class="inquiryCrossborder">
              이커머스
              <b>E-COMMERCE</b>
            </label>
          </li>
          <li>
            <input type="radio" name="service" id="inquiryForwarding" value="포워딩" >
            <label for="inquiryForwarding" class="inquiryForwarding">
              포워딩
              <b>FORWARDING</b>
            </label>
          </li>
          <li>
            <input type="radio" name="service" id="inquiryFulfillment" value="풀필먼트" >
            <label for="inquiryFulfillment" class="inquiryFulfillment">
              풀필먼트
              <b>FULFILLMENT</b>
            </label>
          </li>
          <li>
            <input type="radio" name="service" id="inquiryWarehouse" value="보세창고" >
            <label for="inquiryWarehouse" class="inquiryWarehouse">
              보세창고
              <b>BONDED WAREHOUSE</b>
            </label>
          </li>
        </ul>
      </div>
      <div class="block" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
        <p class="inquiry_p"><span>02</span>담당자의 정보를 알려주세요.</p>
        <ul class="select_info">
          <li>
            <label for="company">회사명</label>
            <input type="text" name="company" id="company" placeholder="회사명 입력" >
          </li>
          <li>
            <label for="manager">담당자명</label>
            <input type="text" name="manager" id="manager" placeholder="담당자명 입력" >
          </li>
          <li>
            <label for="tel">연락처</label>
            <input type="tel" name="tel" id="tel" placeholder="연락처 입력" >
          </li>
          <li>
            <label for="email">이메일</label>
            <input type="email" name="email" id="email" placeholder="이메일 입력" >
          </li>
        </ul>
      </div>
      <div class="block" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
        <label class="inquiry_p" for=""><span>03</span>엑스루트를 알게 된 경로를 알려주세요.</label>
        <select name="channel" id="channel">
          <option value="">유입경로 선택</option>
          <option value="키워드 검색">키워드 검색</option>
          <option value="커뮤니티">커뮤니티</option>
          <option value="보도자료">보도자료</option>
          <option value="지인소개">지인소개</option>
          <option value="블로그">블로그</option>
          <option value="SNS">SNS</option>
          <option value="광고배너">광고배너</option>
          <option value="기타">기타</option>
        </select>
      </div>
      <div class="block" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
        <label class="inquiry_p" for="inquiryContent"><span>04</span>문의주시는 내용에 대해 알려주세요.</label>
        <textarea name="inquiryContent" id="inquiryContent" cols="30" rows="10" placeholder="문의내용 입력"></textarea>
        <input type="checkbox" name="agree" id="private" >
        <label for="private" class="private">
        <span class="modalBtn">개인정보 수집 및 이용</span>에 동의합니다.</label>
      </div>
      <div class="block">
        <input type="submit" value="문의하기">
      </div>
    </form>

    <div class="modal modal1">

      <div class="modalContents">
        <i class="xi-close modalClose"></i>  
        <h2>개인정보처리방침</h2>
        <p>
          엑스루트(이하 ‘회사’라 한다)는 개인정보 보호법 제30조에 따라 정보주체의
          개인정보를 보호하고 이와 관련한 고충을 신속하고 원활하게 처리할 수 있도록 하기
          위하여 다음과 같이 개인정보 처리지침을 수립․공개합니다.
        </p>

        <strong>제1조 (개인정보의 수집 항목과 수집 및 처리목적)</strong>
        <p>
          회사는 다음의 목적을 위하여 개인정보를 처리합니다. 처리하고 있는 개인정보는
          다음의 목적 이외의 용도로는 이용되지 않으며, 이용 목적이 변경되는 경우에는
          개인정보보호법 제18조에 따라 별도의 동의를 받는 등 필요한 조치를 이행할
          예정입니다.
        </p>
        <p>
          1. 홈페이지 회원 가입 및 관리<br />회원 가입의사 확인, 회원제 서비스 제공에
          따른 본인 식별․인증, 회원자격 유지․관리, 제한적 본인확인제 시행에 따른
          본인확인, 서비스 부정이용 방지, 만 14세 미만 아동의 개인정보처리시
          법정대리인의 동의여부 확인, 각종 고지․통지, 고충처리 등을 목적으로 개인정보를
          처리합니다.
        </p>
        <p>2. 배송 서비스 제공</p>
        <table>
          <thead>
            <tr style="background-color: #c8c8c8">
              <td style="width: 20%">구분</td>
              <td style="width: 50%">수집 항목</td>
              <td style="width: 20%">수집 및 처리 목적</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>배송서비스</td>
              <td>[필수] 보내는 분/받는 분의 이름, 전화번호, 주소</td>
              <td rowspan="2">
                - 배송 서비스 제공 계약<br />
                - 물품 배송<br />
                - 배송비 결제<br />
                - 배송 사고 처리 및 배상<br />
              </td>
            </tr>
            <tr>
              <td>국제 배송 예약</td>
              <td>
                필수] 보내는 분/받는 분의 이름<br />
                연락처(휴대폰번호 또는 전화번호)<br />
                ,주소, 개인통관고유부호,<br />
                (세관 통관 절차 상에 필요한 정보)
              </td>
            </tr>
          </tbody>
        </table>
        <br />

        <p>3. 상담</p>

        <table>
          <thead>
            <tr style="background-color: #c8c8c8">
              <td style="width: 20%">구분</td>
              <td style="width: 30%">수집 항목</td>
              <td style="width: 40%">수집 및 이용 목적</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>이메일 상담</td>
              <td rowspan="2">이름, 연락처, 이메일</td>
              <td rowspan="2">
                - 고객상담 / 제안 시 본인 확인<br />
                - 사실 관계 확인을 위한 연락 및 통지<br />
                - 처리 내용 안내<br />
              </td>
            </tr>
            <tr>
              <td>1:1 문의하기(채팅상담)</td>
            </tr>
          </tbody>
        </table>
        <br />
        <p>4. 기타</p>
        <p>
          서비스 이용 과정에서 접속 IP주소, 서비스 이용 일시, 서비스 이용 기록,
          부정이용기록 등의 정보가 자동으로 생성되어 수집될 수 있습니다.
        </p>

        <strong>제2조 (개인정보의 처리 및 보유기간)</strong>
        <p>
          ① 회사는 법령에 따른 개인정보 보유․이용기간 또는 정보주체로부터 개인정보를
          수집시에 동의받은 개인정보 보유․이용기간 내에서 개인정보를 처리․보유합니다.
        </p>
        <p>② 각각의 개인정보 처리 및 보유 기간은 다음과 같습니다.</p>
        <ul style="list-style: none">
          <li>
            1. 홈페이지 회원 가입 및 관리 : 사업자/단체 홈페이지 탈퇴시까지<br />다만,
            다음의 사유에 해당하는 경우에는 해당 사유 종료시까지
            <ul>
              <li>
                1) 관계 법령 위반에 따른 수사․조사 등이 진행중인 경우에는 해당 수사․조사
                종료시까지
              </li>
              <li>
                2) 홈페이지 이용에 따른 채권․채무관계 잔존시에는 해당 채권․채무관계
                정산시까지
              </li>
            </ul>
          </li>
          <br />
          <li>
            2. 재화 또는 서비스 제공 : 재화․서비스 공급완료 및 요금결제․정산
            완료시까지<br />다만, 다음의 사유에 해당하는 경우에는 해당 기간 종료시까지
            <ul>
              <li>
                1) 「전자상거래 등에서의 소비자 보호에 관한 법률」에 따른 표시․광고,
                계약내용 및 이행 등 거래에 관한 기록
                <ul>
                  <li>- 표시․광고에 관한 기록 : 6월</li>
                  <li>- 계약 또는 청약철회, 대금결제, 재화 등의 공급기록 : 5년</li>
                  <li>- 소비자 불만 또는 분쟁처리에 관한 기록 : 3년</li>
                </ul>
              </li>
              <li>
                2) 「통신비밀보호법」제41조에 따른 통신사실확인자료 보관
                <ul>
                  <li>
                    - 가입자 전기통신일시, 개시․종료시간, 상대방 가입자번호, 사용도수,
                    발신기지국 위치추적자료 : 1년
                  </li>
                  <li>- 컴퓨터통신, 인터넷 로그기록자료, 접속지 추적자료 : 3개월</li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>

        <strong>제3조 (개인정보의 제3자 제공)</strong>
        <p>
          ① 회사는 정보주체의 개인정보를 제1조(개인정보의 수집 항목 및 처리목적)에서
          명시한 범위 내에서만 처리하며, 정보주체의 동의, 법률의 특별한 규정 등 개인정보
          보호법 제17조에 해당하는 경우에만 개인정보를 제3자에게 제공합니다.
        </p>

        <strong>제4조(개인정보처리의 위탁)</strong>
        <p>
          ① 회사는 원활한 개인정보 업무처리를 위하여 다음과 같이 개인정보 처리업무를
          위탁하고 있습니다.
        </p>

        <table>
          <thead>
            <tr style="background-color: #c8c8c8">
              <td style="width: 20%">위탁 업무 내용</td>
              <td style="width: 40%">위탁 업체</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td rowspan="12">국제 배송 업무 위탁 처리</td>
              <td>FEDEX</td>
            </tr>
            <tr>
              <td>UPS</td>
            </tr>
            <tr>
              <td>QXPRESS</td>
            </tr>
            <tr>
              <td>KSE EXPRESS SERVICE</td>
            </tr>
            <tr>
              <td>SHIPTTER</td>
            </tr>
            <tr>
              <td>용성종합물류</td>
            </tr>
            <!-- <tr>
              <td>DHL</td>
            </tr> -->
            <tr>
              <td>KOREA POST</td>
            </tr>
            <tr>
              <td>GEM PLATFORM</td>
            </tr>
            <tr>
              <td>SHIPGATE</td>
            </tr>
            <tr>
              <td>HLOGISTICS</td>
            </tr>
            <tr>
              <td>PNP LINE (US)</td>
            </tr>
            <tr>
              <td>간편 결제 서비스</td>
              <td>세틀뱅크</td>
            </tr>
            <tr>
              <td>배송 추적</td>
              <td>AFTER SHIP</td>
            </tr>
            <tr>
              <td>OMS 관리</td>
              <td>포보셀</td>
            </tr>
          </tbody>
        </table>
        <br />
        <p>
          ② 회사는 위탁계약 체결시 개인정보 보호법 제25조에 따라 위탁업무 수행목적 외
          개인정보 처리금지, 기술적․관리적 보호조치, 재위탁 제한, 수탁자에 대한
          관리․감독, 손해배상 등 책임에 관한 사항을 계약서 등 문서에 명시하고, 수탁자가
          개인정보를 안전하게 처리하는지를 감독하고 있습니다.
        </p>
        <p>
          ③ 위탁업무의 내용이나 수탁자가 변경될 경우에는 지체없이 본 개인정보 처리방침을
          통하여 공개하도록 하겠습니다.
        </p>

        <strong>제5조(이용자 및 법정대리인의 권리와 그 행사방법)</strong>
        <p>
          ① 정보주체는 회사에 대해 언제든지 다음 각 호의 개인정보 보호 관련 권리를
          행사할 수 있습니다.
        </p>
        <ul style="list-style: none">
          <li>1. 개인정보 열람요구</li>
          <li>2. 오류 등이 있을 경우 정정 요구</li>
          <li>3. 삭제요구</li>
          <li>4. 처리정지 요구</li>
        </ul>
        <p>
          ② 제1항에 따른 권리 행사는 회사에 대해 서면, 전화, 전자우편, 모사전송(FAX)
          등을 통하여 하실 수 있으며 회사는 이에 대해 지체없이 조치하겠습니다.
        </p>
        <p>
          ③ 정보주체가 개인정보의 오류 등에 대한 정정 또는 삭제를 요구한 경우에는 회사는
          정정 또는 삭제를 완료할 때까지 당해 개인정보를 이용하거나 제공하지 않습니다.
        </p>
        <p>
          ④ 제1항에 따른 권리 행사는 정보주체의 법정대리인이나 위임을 받은 자 등
          대리인을 통하여 하실 수 있습니다. 이 경우 개인정보 보호법 시행규칙 별지 제11호
          서식에 따른 위임장을 제출하셔야 합니다.
        </p>
        <p>
          ⑤ 정보주체는 개인정보 보호법 등 관계법령을 위반하여 회사가 처리하고 있는
          정보주체 본인이나 타인의 개인정보 및 사생활을 침해하여서는 아니됩니다.
        </p>

        <strong>제6조(개인정보의 파기)</strong><br />
        <p>
          ① 회사는 개인정보 보유기간의 경과, 처리목적 달성 등 개인정보가 불필요하게
          되었을 때에는 지체없이 해당 개인정보를 파기합니다.
        </p>
        <p>
          ② 정보주체로부터 동의받은 개인정보 보유기간이 경과하거나 처리목적이
          달성되었음에도 불구하고 다른 법령에 따라 개인정보를 계속 보존하여야 하는
          경우에는, 해당 개인정보를 별도의 데이터베이스(DB)로 옮기거나 보관장소를
          달리하여 보존합니다.
        </p>
        <p>③ 개인정보 파기의 절차 및 방법은 다음과 같습니다.</p>

        <p>
          1. 파기절차<br />
          회사는 파기 사유가 발생한 개인정보를 선정하고, 회사의 개인정보 보호책임자의
          승인을 받아 개인정보를 파기합니다.
        </p>
        <p>
          2. 파기방법<br />
          회사는 전자적 파일 형태로 기록․저장된 개인정보는 기록을 재생할 수 없도록
          로우레밸포멧(Low Level Format) 등의 방법을 이용하여 파기하며, 종이 문서에
          기록․저장된 개인정보는 분쇄기로 분쇄하거나 소각하여 파기합니다.
        </p>

        <strong>제7조(개인정보의 안전성 확보조치)</strong>
        <p>회사는 개인정보의 안전성 확보를 위해 다음과 같은 조치를 취하고 있습니다.</p>
        <p>1. 관리적 조치 : 내부관리계획 수립․시행, 정기적 직원 교육 등</p>
        <p>
          2. 기술적 조치 : 개인정보처리시스템 등의 접근권한 관리, 접근통제시스템 설치,
          고유식별정보등의 암호화, 보안프로그램 설치
        </p>
        <p>3. 물리적 조치 : 전산실, 자료보관실 등의 접근통제</p>

        <strong>제8조(개인정보 자동 수집 장치의 설치∙운영 및 거부에 관한 사항)</strong>
        <p>
          ① 회사는 이용자에게 개별적인 맞춤서비스를 제공하기 위해 이용정보를 저장하고
          수시로 불러오는 ‘쿠키(cookie)’를 사용합니다.
        </p>
        <p>
          ② 쿠키는 웹사이트를 운영하는데 이용되는 서버(http)가 이용자의 컴퓨터
          브라우저에게 보내는 소량의 정보이며 이용자들의 PC 컴퓨터내의 하드디스크에
          저장되기도 합니다.
        </p>
        <p></p>
        <p>
          가. 쿠키의 사용목적: 이용자가 방문한 각 서비스와 웹 사이트들에 대한 방문 및
          이용형태, 인기 검색어, 보안접속 여부, 등을 파악하여 이용자에게 최적화된 정보
          제공을 위해사용됩니다.
        </p>
        <p>
          나. 쿠키의 설치∙운영 및 거부 : 웹브라우저 상단의 도구&gt;인터넷
          옵션&gt;개인정보 메뉴의 옵션 설정을 통해 쿠키 저장을 거부 할 수 있습니다.
        </p>
        <p>
          다. 쿠키 저장을 거부할 경우 맞춤형 서비스 이용에 어려움이 발생할 수 있습니다.
        </p>

        <strong>제9조(개인정보 보호책임자)</strong>
        <p>
          ① 회사는 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련한
          정보주체의 불만처리 및 피해구제 등을 위하여 아래와 같이 개인정보 보호책임자를
          지정하고 있습니다.
        </p>
        <ul style="list-style: none">
          <li>
            ▶ 개인정보 보호책임자
            <ul>
              <li>성명 : 이상희</li>
              <li>직책 : 선임</li>
              <li>
                &lt;연락처 : 전화번호 02-6956-6603&gt;, &lt;이메일 :
                info@xroute.co.kr&gt;, &lt;팩스번호 : 070-8233-6603&gt;
              </li>
              <li>※ 개인정보 보호 담당부서로 연결됩니다.</li>
            </ul>
          </li>
        </ul>
        <ul style="list-style: none">
          <li>
            ▶ 개인정보 보호 담당부서
            <ul>
              <li>부서명 : 엑스루트 팀</li>
              <li>담당자 : 이상희</li>
              <li>
                &lt;연락처 : 전화번호 02-6956-6603&gt;, &lt;이메일 :
                info@xroute.co.kr&gt;, &lt;팩스번호 : 070-8233-6603&gt;
              </li>
            </ul>
          </li>
        </ul>
        <p>
          ② 정보주체께서는 회사의 서비스(또는 사업)을 이용하시면서 발생한 모든 개인정보
          보호 관련 문의, 불만처리, 피해구제 등에 관한 사항을 개인정보 보호책임자 및
          담당부서로 문의하실 수 있습니다. 회사는 정보주체의 문의에 대해 지체없이 답변
          및 처리해드릴 것입니다.
        </p>

        <strong>제10조(개인정보 열람청구)</strong>
        <p>
          정보주체는 개인정보 보호법 제35조에 따른 개인정보의 열람 청구를 아래의 부서에
          할 수 있습니다. 회사는 정보주체의 개인정보 열람청구가 신속하게 처리되도록
          노력하겠습니다.
        </p>
        <ul style="list-style: none">
          <li>
            ▶ 개인정보 열람청구 접수․처리 부서
            <ul>
              <li>부서명 : 엑스루트팀</li>
              <li>담당자 : 이상희</li>
              <li>
                &lt;연락처 : 전화번호 02-6956-6603&gt;, &lt;이메일 :
                info@xroute.co.kr&gt;, &lt;팩스번호 : 070-8233-6603&gt;
              </li>
            </ul>
          </li>
        </ul>

        <strong>제11조(권익침해 구제방법)</strong>
        <p>
          정보주체는 아래의 기관에 대해 개인정보 침해에 대한 피해구제, 상담 등을
          문의하실 수 있습니다.
        </p>
        <ul style="list-style: none">
          <li>
            ▶ 개인정보 침해신고센터 (한국인터넷진흥원 운영)
            <ul>
              <li>- 소관업무 : 개인정보 침해사실 신고, 상담 신청</li>
              <li>- 홈페이지 : privacy.kisa.or.kr</li>
              <li>- 전화 : (국번없이) 118</li>
              <li>
                - 주소 : (58324) 전남 나주시 진흥길 9(빛가람동 301-2) 3층
                개인정보침해신고센터
              </li>
            </ul>
          </li>
        </ul>
        <ul style="list-style: none">
          <li>
            ▶ 개인정보 분쟁조정위원회
            <ul>
              <li>- 소관업무 : 개인정보 분쟁조정신청, 집단분쟁조정 (민사적 해결)</li>
              <li>- 홈페이지 : www.kopico.go.kr</li>
              <li>- 전화 : (국번없이) 1833-6972</li>
              <li>- 주소 : (03171)서울특별시 종로구 세종대로 209 정부서울청사 4층</li>
            </ul>
          </li>
          <li>▶ 대검찰청 사이버범죄수사단 : 02-3480-3573 (www.spo.go.kr)</li>
          <li>▶ 경찰청 사이버안전국 : 182 (http://cyberbureau.police.go.kr)</li>
        </ul>

        <strong>제12조(개인정보 처리방침 시행 및 변경)</strong>
        <p>이 개인정보 처리방침은 2020. 05. 12부터 적용됩니다.</p>
      </div>
    </div>

</section>

    <script>
        function chkForm() {

            if(!document.faq.service.value) {
                alert('문의하실 서비스 종류를 선택해주세요');
                document.getElementById("servicediv").scrollIntoView();
                return false;
            }

            if(!document.faq.company.value) {
                alert('회사명을 입력해주세요');
                document.faq.company.focus();
                return false;
            }
            if(!document.faq.manager.value) {
                alert('담당자명을 입력해주세요');
                document.faq.manager.focus();
                return false;
            }
            if(!document.faq.tel.value) {
                alert('연락처를 입력해주세요');
                document.faq.tel.focus();
                return false;
            }
            if(!document.faq.email.value) {
                alert('이메일을 입력해주세요');
                document.faq.email.focus();
                return false;
            }
            if(!document.faq.channel.value) {
                alert('유입경로를 선택해주세요');
                document.faq.channel.focus();
                return false;
            }
            if(!document.faq.inquiryContent.value) {
                alert('문의하실 내용을 입력하세요');
                document.faq.inquiryContent.focus();
                return false;
            }

            var chk1=document.faq.agree.checked;
            if(!chk1){
                alert('개인정보 수집 및 이용에 대한 동의해 주세요');
                return false;
            }
        }
    </script>

<?php
    include 'footer.php';
?>