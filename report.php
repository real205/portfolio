<?php
    include 'header.php';
?>
<?include "boad/bd_boad/inc/ego_comm.php";?>
<?
$int_Ini_Board_Seq = Req::fnc_Om_Def("bd","");
?>
<?include "boad/bd_boad/inc/ego_bd_ini.php";?>
<?
// ==================================================
//	= 새글표시를 위한 날짜값 설정 시작

$Sql_Query = " SELECT IFNULL(MAX(BD_REG_DATE), NOW()) AS MAX_DATE FROM `".$Tname."b_bd_data".$str_Ini_Group_Table."`";
If (!$bln_Main_Bd) {
    $Sql_Query .= " WHERE CONF_SEQ= ? ";
}
$obj_Rlt = $Om_Con->select($Sql_Query, array($int_Ini_Board_Seq));

$arr_New_Date = array();
array_push($arr_New_Date, $obj_Rlt[0]);

//	= 새글표시를 위한 날짜값 설정 종료
// ==================================================

// ===============================
//	= 페이지관련 설정 시작
$int_Page_Size		= $arr_Ini_Board_Info[0]['CONF_LIST_CNT'];					// @@@@@@ 한 페이지에 출력될 목록수 설정
$int_Out_Page_Cnt	= $arr_Ini_Board_Info[0]['CONF_PAGE_CNT'];					// @@@@@@ 출력할 페이지 갯수 설정

$int_Total_Page = 0; $int_Total_Cnt = 0;

$str_Pg = Req::fnc_Om_Def("pg","1");

//	= 페이지관련 설정 종료
// ===============================

// ======================================
//	= 검색 시작
$Sql_Add_Query = "";

$int_Itm = Req::fnc_Om_Def("itm","");
$str_Txt = Req::fnc_Om_Def("txt","");
$itm_cate = Req::fnc_Om_Def("itm_cate","");
$itm_scate = Req::fnc_Om_Def("itm_scate","");

If (Is_Numeric($int_Itm)) {
    switch ($int_Itm) {
        case "1" :
            $str_Itm = "BD_W_NAME";break;
        case "2" :
            $str_Itm = "MEM_ID"; break;
        case "3" :
            $str_Itm = "BD_W_EMAIL"; break;
        case "4" :
            $str_Itm = "BD_CONT"; break;
        default :
            $str_Itm = "BD_TITLE";
            $int_Itm = "0";
            break;;
    }

    $Sql_Add_Query =	" AND A.BD_IDX IN(SELECT BD_IDX FROM `".$Tname."b_bd_data".$str_Ini_Group_Table."` WHERE ";
    // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
    //	= 전체 게시판이 아닐때
    //	  해당 게시판 목록 출력
    If ($bln_Main_Bd==False) {
        $Sql_Add_Query .= " CONF_SEQ=".$int_Ini_Board_Seq." AND ";
    }
    // &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
    $Sql_Add_Query .= $str_Itm." LIKE '%".$str_Txt."%' GROUP BY BD_IDX) ";

}
if ($itm_cate!="") {$Sql_Add_Query .= " AND A.BD_CATE = '".$itm_cate."' ";}
if ($itm_scate!="") {$Sql_Add_Query .= " AND A.BD_SCATE = '".$itm_scate."' ";}
//	= 검색 종료
// ======================================


$Sql_Query =	" SELECT
					COUNT(A.BD_SEQ) AS CNT
				FROM `"
    .$Tname."b_bd_data".$str_Ini_Group_Table."` AS A
					LEFT JOIN `"
    .$Tname."b_img_data".$str_Ini_Group_Table."` AS C
					ON
					A.CONF_SEQ=C.CONF_SEQ
					AND
					A.BD_SEQ=C.BD_SEQ
					AND
					C.IMG_ALIGN=1
					LEFT JOIN `"
    .$Tname."b_file_data".$str_Ini_Group_Table."` AS D
					ON
					A.CONF_SEQ=D.CONF_SEQ
					AND
					A.BD_SEQ=D.BD_SEQ
					AND
					D.FILE_ALIGN=1
					LEFT JOIN `"
    .$Tname."comm_member_nick` AS E
					ON
					A.MEM_ID=E.STR_TUSERID
					AND
					E.STR_USERID='".$arr_Auth[0]."' 
				WHERE ";

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//	= 기술원 전체 게시판이 아닐때
//	  해당 게시판 목록 출력
If ($bln_Main_Bd==False) {
    $Sql_Query .= " A.CONF_SEQ=".$int_Ini_Board_Seq." AND ";
}
// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

$Sql_Query .= " A.BD_ID_KEY IS NOT NULL AND A.BD_NOTICE_YN=0 ";
$Sql_Query .= $Sql_Add_Query;

$arr_Get_Data = $Om_Con->selectOne($Sql_Query, array());
$int_Total_Cnt = $arr_Get_Data['CNT'];

$Om_Pg=new Om_Class_Page($int_Total_Cnt,$str_Pg,$int_Out_Page_Cnt,$int_Page_Size);

$Sql_Query =	" SELECT
					A.BD_SEQ,
					A.CONF_SEQ,
					A.BD_ID_KEY,
					A.BD_IDX,
					A.BD_ORDER,
					A.BD_LEVEL,
					A.MEM_CODE,
					A.MEM_ID,
					A.BD_W_NAME,
					A.BD_W_EMAIL,
					A.BD_TITLE,
					A.BD_TCOLOR,
					A.BD_TBOLD,
					A.BD_CONT,
					A.BD_OPEN_YN,
					A.BD_REG_DATE,
					A.BD_DEL_YN,
					A.BD_VIEW_CNT,
					A.BD_GOOD_CNT,
					A.BD_BAD_CNT,
					IFNULL(A.BD_MEMO_CNT, 0) AS BD_MEMO_CNT,
					IFNULL(C.IMG_SEQ, 0) AS IMG_SEQ,
					IFNULL(C.IMG_ID_KEY, '') AS IMG_ID_KEY,
					IFNULL(C.IMG_TITLE, '') AS IMG_TITLE,
					IFNULL(C.IMG_CONT, '') AS IMG_CONT,
					IFNULL(C.IMG_F_WIDTH, 0) AS IMG_F_WIDTH,
					IFNULL(C.IMG_F_HEIGHT, 0) AS IMG_F_HEIGHT,
					IFNULL(D.FILE_SEQ, 0) AS FILE_SEQ,
					A.BD_CATE,
					A.BD_SCATE,
					A.BD_NONAME,
					E.STR_TNAME,
					A.BD_ITEM1,
					A.BD_BYN
				FROM `"
    .$Tname."b_bd_data".$str_Ini_Group_Table."` AS A
					LEFT JOIN `"
    .$Tname."b_img_data".$str_Ini_Group_Table."` AS C
					ON
					A.CONF_SEQ=C.CONF_SEQ
					AND
					A.BD_SEQ=C.BD_SEQ
					AND
					C.IMG_ALIGN=1
					LEFT JOIN `"
    .$Tname."b_file_data".$str_Ini_Group_Table."` AS D
					ON
					A.CONF_SEQ=D.CONF_SEQ
					AND
					A.BD_SEQ=D.BD_SEQ
					AND
					D.FILE_ALIGN=1
					LEFT JOIN `"
    .$Tname."comm_member_nick` AS E
					ON
					A.MEM_ID=E.STR_TUSERID
					AND
					E.STR_USERID='".$arr_Auth[0]."'
				WHERE ";

// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
//	= 기술원 전체 게시판이 아닐때
//	  해당 게시판 목록 출력
If ($bln_Main_Bd==False) {
    $Sql_Query .= " A.CONF_SEQ=".$int_Ini_Board_Seq." AND ";
}
// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

$Sql_Query .= " A.BD_ID_KEY IS NOT NULL AND A.BD_NOTICE_YN=0 ";
$Sql_Query .= $Sql_Add_Query;
$Sql_Query .= " ORDER BY
								BD_ORDER DESC ";

$Sql_Mquery = $Om_Pg->getPaggingQuery($Sql_Query);

$arr_Get_Data = $Om_Con->select($Sql_Mquery, array());
$arr_Get_Data_Cnt=count($arr_Get_Data);

// =============================================
//	= 공지글 배열에 저장 시작
$Sql_Query =	" SELECT
					A.BD_SEQ,
					A.CONF_SEQ,
					A.BD_ID_KEY,
					A.BD_IDX,
					A.BD_ORDER,
					A.BD_LEVEL,
					A.MEM_CODE,
					A.MEM_ID,
					A.BD_W_NAME,
					A.BD_W_EMAIL,
					A.BD_TITLE,
					A.BD_TCOLOR,
					A.BD_TBOLD,
					A.BD_CONT,
					A.BD_OPEN_YN,
					A.BD_REG_DATE,
					A.BD_DEL_YN,
					A.BD_VIEW_CNT,
					A.BD_GOOD_CNT,
					A.BD_BAD_CNT,
					IFNULL(A.BD_MEMO_CNT, 0) AS BD_MEMO_CNT,
					IFNULL(C.IMG_SEQ, 0) AS IMG_SEQ,
					IFNULL(C.IMG_ID_KEY, '') AS IMG_ID_KEY,
					IFNULL(C.IMG_TITLE, '') AS IMG_TITLE,
					IFNULL(C.IMG_CONT, '') AS IMG_CONT,
					IFNULL(C.IMG_F_WIDTH, 0) AS IMG_F_WIDTH,
					IFNULL(C.IMG_F_HEIGHT, 0) AS IMG_F_HEIGHT,
					IFNULL(D.FILE_SEQ, 0) AS FILE_SEQ,
					A.BD_CATE,
					A.BD_SCATE,
					A.BD_NONAME,
					E.STR_TNAME,
					A.BD_ITEM1,
					A.BD_BYN
				FROM `"
    .$Tname."b_bd_data".$str_Ini_Group_Table."` AS A
					LEFT JOIN `"
    .$Tname."b_img_data".$str_Ini_Group_Table."` AS C
					ON
					A.CONF_SEQ=C.CONF_SEQ
					AND
					A.BD_SEQ=C.BD_SEQ
					AND
					C.IMG_ALIGN=1
					LEFT JOIN `"
    .$Tname."b_file_data".$str_Ini_Group_Table."` AS D
					ON
					A.CONF_SEQ=D.CONF_SEQ
					AND
					A.BD_SEQ=D.BD_SEQ
					AND
					D.FILE_ALIGN=1
					LEFT JOIN `"
    .$Tname."comm_member_nick` AS E
					ON
					A.MEM_ID=E.STR_TUSERID
					AND
					E.STR_USERID='".$arr_Auth[0]."'
				WHERE
					A.CONF_SEQ=".$int_Ini_Board_Seq."
					AND
					A.BD_ID_KEY IS NOT NULL
					AND
					A.BD_NOTICE_YN=1
				ORDER BY
					A.BD_SEQ DESC ";

$arr_Notice_Data = $Om_Con->select($Sql_Query, array());
$arr_Notice_Data_Cnt=count($arr_Notice_Data);
//	= 공지글 배열에 저장 종료
// =============================================

$str_String = "?bd=".urlencode($int_Ini_Board_Seq)."&itm=".urlencode($int_Itm)."&txt=".urlencode(fnc_Om_Rq($str_Txt))."&itm_cate=".urlencode(fnc_Om_Rq($itm_cate))."&itm_scate=".urlencode(fnc_Om_Rq($itm_scate))."&pg=";
$str_Url = "egolist.php".$str_String;

//$Om_Pg_Display = $Om_Pg->Show_Bo($str_Url);
$Om_Pg_Display = $Om_Pg->fnc_Output_Page_Num3($str_String);

?>
    <SCRIPT LANGUAGE="JavaScript">
        <!--
        var obj_Blank = new Function("x", "return fncCheckBlank(x)");
        var obj_Alert = new Function("x", "y", "z", "return fncFocusAlert(x, y, z)");

        /* +++++++++++++++++++++++++++++++++++++++ *\
            기능설명 : 목록구분 점선으로 분리
            반환값 : str_Devide_Html[라인분리HTML태그]
        \* +++++++++++++++++++++++++++++++++++++++ */
        function fnc_Line_Divide()
        {
            var str_Divide_Html = '';
            str_Divide_Html =	'<tr>'+
                '<td colspan="20" style="background-image:url('+gbl_Str_Comm_Image+'board/line_dot.gif);">'+
                '</td>'+
                '</tr>';
            return str_Divide_Html;
        }

        function fnc_Send_Data(pr_Form)
        {
            var obj_Form = pr_Form;
            var obj_Txt = obj_Form.txt;
            var regSchChk = /[^\w@\s.ㄱ-힣]/;

            if(!obj_Blank(obj_Txt.value))
                return obj_Alert(obj_Txt, null, "검색어를 입력하세요.");

            if(regSchChk.test(obj_Txt.value))
                return obj_Alert(obj_Txt, null, "@ . 이외의 기호는 사용하실 수 없습니다.");
        }

        function fnc_Del_Bd(pr_Form)
        {
            var obj_Form = pr_Form;

            var int_I = 0;
            var obj = document.getElementsByName("seq[]");

            if(typeof(obj.length)!="undefined"){
                for(var i=0; i<obj.length; i++)
                {
                    if(obj[i].checked==true)
                        int_I += 1;
                }
            }else{
                if(obj.checked==true)
                    int_I += 1;
            }

            if(int_I==0)
            {
                alert("삭제할 데이터를 선택해 주세요");
            }
            else
            {
                if(confirm("선택한 데이터를 삭제하시겠습니까?"))
                {
                    obj_Form.method="post";
                    obj_Form.action="egodelete.php";
                    obj_Form.submit();
                }
            }
        }

        function fnc_All_Chk(pr_Form)
        {
            var obj_Form = pr_Form;
            try
            {
                var obj = document.getElementsByName("seq[]");

                if(typeof(obj.length)!="undefined"){
                    for(var i=0; i<obj.length; i++)
                    {
                        if(obj[i].checked==false)
                            obj[i].checked=true;
                        else
                            obj[i].checked=false;
                    }
                }else{
                    if(obj.checked==false)
                        obj.checked=true;
                    else
                        obj.checked=false;
                }
            }catch(e){}
        }
        //-->
    </SCRIPT>

    <SCRIPT LANGUAGE="JavaScript">
        <!--
        function fnc_Read_Pop(str_tuserid)
        {
            var int_Y = event.clientY;
            var int_X = event.clientX;

            document.getElementById("lbl_Pop").style.top=int_Y+document.documentElement.scrollTop+"px";
            document.getElementById("lbl_Pop").style.left=int_X+document.documentElement.scrollLeft+"px";
            document.getElementById("str_tuserid").value=str_tuserid;
            document.getElementById("lbl_Pop").style.visibility="visible";

        }

        //-->
    </SCRIPT>

    <label id="lbl_Pop" class="layer_brow" style="z-index:1000000">
        <form name="frm_Pop" method="post">
            <input type="hidden" name="str_tuserid" id="str_tuserid">
            <div class="pop_w pop_alert" style="display:none">
                <div class="pop_tit">Alert</div>
                <a href="#;" onclick="javascript:document.getElementById('lbl_Pop').style.visibility='';" class="pop_close"><i class="xi-close"></i></a>
                <div class="pop_container">
                    <ul class="pop_menu">
                        <?if ($arr_Ini_Board_Info[0]['CONF_NICKYN']=="1"){?>
                            <li><a href="#" onclick="popupLayer('egonick.php?str_tuserid='+document.getElementById('str_tuserid').value, 300, 160);document.getElementById('lbl_Pop').style.visibility='';">별칭 설정하기</a></li>
                        <?}?>
                        <?if ($arr_Ini_Board_Info[0]['CONF_NOTEYN']=="1"){?>
                            <li><a href="#" onclick="ppopupLayer('egonote.php?str_tuserid='+document.getElementById('str_tuserid').value, 600, 420);document.getElementById('lbl_Pop').style.visibility='';">쪽지보내기</a></li>
                        <?}?>
                        <li><a href="#">작성글 보기</a></li>
                        <li><a href="#">작성댓글보기</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </label>
    <script>
        AOS.init();
    </script>

<section class="notice">
  <article class="inner">
    <div class="textbox">
      <h2 data-aos="fade-up" data-aos-duration="800">보도자료 <b class="geomanist">.</b></h2>
      <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">XROUTE의 다양한 소식들을 만나보세요</p>
    </div>
    <div class="noticeTab">
      <ul class="noticeTabs" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
        <li><a href="notice.php?bd=3">공지사항</a></li>
        <li class="current"><a href="report.php?bd=5">보도자료</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="event.php?bd=4">이벤트</a></li>
      </ul>
      <div class="tabContent current" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
          <SCRIPT LANGUAGE="JavaScript">
              <!--
              /* +++++++++++++++++++++++++++++++++++++++ *\
                  수정일자	: 2006-09-20
                  작성자		: 김진규(p7227kjg@dreamwiz.com)
                  기능설명	: 작성글 조회 페이지로 이동.
                                비공개글 조회시 글 비밀번호 입력창 출력
              \* +++++++++++++++++++++++++++++++++++++++ */
              function fnc_Read_Cont(url, int_Mem, int_Opn, int_Adm, int_Match, obj)
              {

                  //var obj2 = getBoundsObject(obj);

                  if (int_Adm==1)
                  {
                      location.href=url;
                  }
                  else
                  {
                      if (int_Match==1)
                      {
                          location.href=url;
                      }
                      else
                      {
                          if(int_Mem==1)
                          {
                              location.href=url;
                              //alert("회원이 작성한 글입니다.\n\n로그인을 하여 주십시오.");
                          }
                          else
                          {
                              if (int_Mem==0 && int_Opn==0)
                              {
                                  location.href=url;
                              }
                              else
                              {
                                  var lbl_Layer = eval("lbl_Pwd");
                                  var int_Y = event.clientY;
                                  var int_X = event.clientX;

                                  lbl_Layer.style.top=int_Y+document.documentElement.scrollTop+"px";
                                  lbl_Layer.style.left=int_X+document.documentElement.scrollLeft+"px";

                                  //lbl_Layer.style.top=obj2.top-100+"px";
                                  //lbl_Layer.style.left=obj2.left-200+"px";


                                  document.frm_Pwd.hid_Url.value=url;
                                  //lbl_Layer.style.display="block";
                                  showPopup();
                                  document.frm_Pwd.txt_Pwd.focus();
                              }
                          }
                      }
                  }
              }

              jQuery.fn.center = function () {
                  this.css("position","absolute");
                  this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
                  this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
                  return this;
              }
              showPopup = function() {
                  $("#lbl_Pwd").show();
                  $("#lbl_Pwd").center();
              }
              //-->
          </SCRIPT>
          <?
          $int_Adm = 0;
          If ($arr_Auth[1]=="91"||$bln_Cur_Brig8) {
              $int_Adm = 1;
          }
          ?>
          <SCRIPT LANGUAGE="JavaScript">
              <!--
              function fnc_Send_Pwd()
              {
                  var obj_Form = document.frm_Pwd;

                  var txt_Pwd = obj_Form.txt_Pwd.value;

                  if(!obj_Blank(txt_Pwd))
                  {
                      alert("글 암호를 입력하세요.");
                      obj_Form.txt_Pwd.focus();
                      return false;
                  }
                  window.location.href=obj_Form.hid_Url.value+'&pwd='+txt_Pwd;
                  return false;
              }
              //-->
          </SCRIPT>

          <form name="frm_Pwd" method="post" action="egoread.php" onsubmit="return fnc_Send_Pwd();">
              <input type="hidden" name="hid_Url">

              <label id="lbl_Pwd" class="layer_brow1" style="display:none;">
                  <table border="0" cellpadding="3" cellspacing="1" bgcolor="#000000" width="190">
                      <tr>
                          <td width="70" bgcolor="#DDDDDD" align="center">
                            <B><img src="/pub/img/icons/key_01.gif" align="absMiddle"> 암호</B>
                          </td>
                          <td width="130" bgcolor="#FFFFFF">
                            <input type="password" class="int" name="txt_Pwd" size="10" style="width:65px;">
                            <input type="image" src="/pub/img/icons/alert_01.gif" width="16" height="16" align="absMiddle">
                            <img src="/pub/img/icons/cancel_r.gif" align="absMiddle" onmouseover="this.style.cursor='hand'" onclick="$('#lbl_Pwd').hide();">
                          </td>
                      </tr>
                  </table>
              </label>
          </form>

          <?if ($bln_Cur_Brig1 || $bln_Cur_Admin) {?>
              <form name="frm_List">
                  <input type="hidden" name="bd" value="<?=$int_Ini_Board_Seq?>">
                  <input type="hidden" name="mode" value="99">


                  <?include "boad/bd_boad/inc/inc_skin".$arr_Ini_Board_Info[0]['CONF_TYPE'].".php";?>


              </form>
          <?}else{?>
              <?include "boad/bd_boad/inc/inc_message.php";?>
          <?}?>
      </div>
    </div>
  </article>
</section>

<?php
    include 'footer.php';
?>