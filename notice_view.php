<?php
    include 'header.php';
?>
<?include "boad/bd_boad/inc/ego_comm.php";?>
<?
	$int_Ini_Board_Seq = Req::fnc_Om_Def("bd","");
?>
<?include "boad/bd_boad/inc/ego_bd_ini.php";?>
<?
	$int_Bd_Seq = Req::fnc_Om_Def("seq","0");

	If ($int_Bd_Seq<1) {
		echo "<Script Language='JavaScript'>document.location.replace('".$arr_Ini_Board_Info[0]['CONF_BD_PATH']."egolist.php?bd=".$int_Ini_Board_Seq."');</Script>";
		exit;
	}
	// ===============================
	//	= 페이지관련 설정 시작
	$str_Pg = Req::fnc_Om_Def("pg","0");

	If ($str_Pg=="0") {
		$int_Cur_Page = 1;
	}Else{
		$int_Cur_Page = $str_Pg;
	}
	//	= 페이지관련 설정 종료
	// ===============================

	// =========================================
	//	= 게시판 설정순번 변수에 저장 시작
	$Sql_Query = "SELECT CONF_SEQ FROM `".$Tname."b_bd_data".$str_Ini_Group_Table."` WHERE BD_SEQ=? ";
	$result = $Om_Con->selectOne($Sql_Query, array($int_Bd_Seq));
	$int_Conf_Seq = $result['CONF_SEQ'];

	//	= 게시판 설정순번 변수에 저장 종료
	// =========================================

	$Sql_Query =	" SELECT
					A.BD_ID_KEY,
					A.BD_IDX,
					A.BD_NOTICE_YN,
					A.MEM_CODE,
					A.MEM_ID,
					A.BD_W_NAME,
					A.BD_W_EMAIL,
					A.BD_W_IP,
					A.BD_TITLE,
					A.BD_CONT,
					A.BD_FORMAT,
					A.BD_THUMB_YN,
					A.BD_OPEN_YN,
					A.BD_REG_DATE,
					A.BD_EDIT_DATE,
					A.BD_DEL_YN,
					A.BD_VIEW_CNT,
					A.BD_GOOD_CNT,
					A.BD_MEMO_CNT,
					A.BD_BAD_CNT,
					A.BD_LINKURL1,
					A.BD_LINKURL2,
					A.BD_PWD,
					A.BD_YOUTUBE,
					A.BD_CATE,
					A.BD_SCATE,
					A.BD_NONAME,
					E.STR_TNAME
				FROM
					`".$Tname."b_bd_data".$str_Ini_Group_Table."` AS A
					LEFT JOIN `"
					.$Tname."comm_member_nick` AS E
					ON
					A.MEM_ID=E.STR_TUSERID
					AND
					E.STR_USERID='".$arr_Auth[0]."'
					LEFT JOIN `"
					.$Tname."comm_member` AS F
					ON
					A.MEM_ID=F.STR_USERID
				WHERE ";
	// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	//	= 전체 게시판이 아닐때
	//	  해당 게시판 목록 출력
	If ($bln_Main_Bd==False) {
		$Sql_Query .= " A.CONF_SEQ=".$int_Conf_Seq." AND ";
	}
	// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
		$Sql_Query .= " A.BD_SEQ=? AND A.BD_ID_KEY IS NOT NULL "
;

	$obj_Rlt = $Om_Con->selectOne($Sql_Query, array($int_Bd_Seq));

	if(is_array($obj_Rlt)){
		$arr_Get_Data = array();
  		array_push($arr_Get_Data, $obj_Rlt);
	}

	If ($int_Bd_Seq==0 || is_array($arr_Get_Data)==False) {
		//echo "<Script Language='JavaScript'>document.location.replace('egolist.php?bd=".$int_Conf_Seq."');</Script>";
		exit;
	}

	// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
	//	= 비 공개글일때 관리자와 작성자만 조회 가능 시작
	$bln_Flag = False;
	If (is_array($arr_Get_Data)) {
		If ($arr_Get_Data[0]['BD_OPEN_YN']>0) {
			If (($arr_Auth[0]==$arr_Get_Data[0]['MEM_ID'])&&($arr_Auth[0]!="")) {
				$bln_Flag = True;
			}

			If ($bln_Flag==False && $bln_Cur_Admin) {
				$bln_Flag = True;
			}

			If ($bln_Flag==False && $bln_Cur_Brig8) {
				$bln_Flag = True;
			}

			If (Req::fnc_Om_Def("pwd","")==$arr_Get_Data[0]['BD_PWD']&&$arr_Get_Data[0]['BD_PWD']!="") {
				$bln_Flag = True;
			}

			If ($bln_Flag==False) {
				echo "<Script Language='JavaScript'>alert('비공개 게시물 입니다.');document.location.replace('egolist.php?bd=".$int_Conf_Seq."');</Script>";
				exit;
			}
		}
	}
	//	= 비 공개글일때 관리자와 작성자만 조회 가능 종료
	// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

	// ======================================
	//	= 조회수 무한증가 제한 시작
	$Sql_Query =	"UPDATE `".$Tname."b_bd_data".$str_Ini_Group_Table."` SET BD_VIEW_CNT=BD_VIEW_CNT+1 WHERE CONF_SEQ=? AND BD_SEQ=?";
	$Om_Con->execute($Sql_Query,array($int_Conf_Seq, $int_Bd_Seq));

	$arr_Get_Data[0]['BD_VIEW_CNT'] = $arr_Get_Data[0]['BD_VIEW_CNT']+1;
	//	= 조회수 무한증가 제한 종료
	// ======================================

	// ======================================
	//	= 검색 시작
	$Sql_Add_Query = "";
	$Sql_Add_Class_Query = "";

	$int_Itm = Req::fnc_Om_Def("itm","");
	$str_Txt = Req::fnc_Om_Def("txt","");
	$itm_cate = Req::fnc_Om_Def("itm_cate","");
	$itm_scate = Req::fnc_Om_Def("itm_scate","");

	If (Is_numeric($int_Itm)) {
		switch ($int_Itm) {
			case 1 :
				$str_Itm = "BD_W_NAME";
			case 2 :
				$str_Itm = "MEM_ID";
			case 3 :
				$str_Itm = "BD_W_EMAIL";
			case 4  :
				$str_Itm = "BD_CONT";
			default :
				$str_Itm = "BD_TITLE";
				$int_Itm = "0";
		}

		$Sql_Add_Query =	" AND A.".$str_Itm." LIKE '%".$str_Txt."%' ";
	}
	if ($itm_cate!="") {$Sql_Add_Query .= " AND A.BD_CATE = '".$itm_cate."' ";}
	if ($itm_scate!="") {$Sql_Add_Query .= " AND A.BD_CATE = '".$itm_scate."' ";}
	//	= 검색 종료
	// ======================================
	

	// ================================
	//	= 첨부파일정보 배열에 저장 시작
	$Sql_Query =	" SELECT
					1 AS TYPE,
					IMG_SEQ AS SEQ,
					IMG_ID_KEY AS SKEY,
					IMG_TITLE AS F_TITLE,
					IMG_CONT AS F_CONT,
					IMG_F_NAME AS F_NAME,
					IMG_F_TYPE AS F_TYPE,
					IMG_F_SIZE AS F_SIZE,
					IMG_DOWN_CNT,
					IMG_F_WIDTH,
					IMG_F_HEIGHT,
					IMG_VIEW_CNT
				FROM
					`".$Tname."b_img_data".$str_Ini_Group_Table."`
				WHERE
					CONF_SEQ=".$int_Conf_Seq."
					AND
					BD_SEQ=".$int_Bd_Seq."
				UNION ALL
				SELECT
					0 AS TYPE,
					FILE_SEQ AS SEQ,
					FILE_ID_KEY AS SKEY,
					FILE_TITLE AS F_TITLE,
					FILE_CONT AS F_CONT,
					FILE_F_NAME AS F_NAME,
					FILE_F_TYPE AS F_TYPE,
					FILE_F_SIZE AS F_SIZE,
					FILE_DOWN_CNT,
					0,
					0,
					-1
				FROM
					`".$Tname."b_file_data".$str_Ini_Group_Table."`
				WHERE
					CONF_SEQ=?
					AND
					BD_SEQ=?";

	$arr_File_Data = $Om_Con->select($Sql_Query, array($int_Conf_Seq, $int_Bd_Seq));
	$arr_File_Data_Cnt = count($arr_File_Data);
	//	= 첨부파일정보 배열에 저장 종료
	// ================================

	// ================================
	//	= 공지메모정보 배열에 저장 시작
	$Sql_Query =	" SELECT
					A.MEMO_SEQ,
					A.MEMO_IDX,
					A.MEMO_ORDER,
					A.MEMO_LEVEL,
					A.MEM_CODE,
					A.MEM_ID,
					A.MEMO_ICON,
					A.MEMO_W_NAME,
					A.MEMO_W_EMAIL,
					A.MEMO_W_IP,
					A.MEMO_CONT,
					A.MEMO_REG_DATE,
					A.MEMO_NOTICE_YN,
					A.MEMO_GOOD_CNT,
					A.MEMO_BAD_CNT,
					A.MEMO_NONAME,
					E.STR_TNAME
				FROM
					`".$Tname."b_memo_data".$str_Ini_Group_Table."` AS A
					LEFT JOIN `"
					.$Tname."comm_member_nick` AS E
					ON
					A.MEM_ID=E.STR_TUSERID
					AND
					E.STR_USERID='".$arr_Auth[0]."'
					LEFT JOIN `"
					.$Tname."comm_member` AS F
					ON
					A.MEM_ID=F.STR_USERID
				WHERE
					A.CONF_SEQ=?
					AND
					A.BD_SEQ=?
					AND
					(A.MEMO_NOTICE_YN=?)
				ORDER BY
					A.MEMO_NOTICE_YN DESC,A.MEMO_GOOD_CNT DESC,A.MEMO_REG_DATE ASC ";

	$arr_TMemo_Data = $Om_Con->select($Sql_Query, array($int_Conf_Seq, $int_Bd_Seq, "1"));
	$arr_TMemo_Data_Cnt = count($arr_TMemo_Data);
	//	= 공지메모정보 배열에 저장 종료
	// ================================

	// ================================
	//	= 베스트메모정보 배열에 저장 시작
	$Sql_Query =	" SELECT
					A.MEMO_SEQ,
					A.MEMO_IDX,
					A.MEMO_ORDER,
					A.MEMO_LEVEL,
					A.MEM_CODE,
					A.MEM_ID,
					A.MEMO_ICON,
					A.MEMO_W_NAME,
					A.MEMO_W_EMAIL,
					A.MEMO_W_IP,
					A.MEMO_CONT,
					A.MEMO_REG_DATE,
					A.MEMO_NOTICE_YN,
					A.MEMO_GOOD_CNT,
					A.MEMO_BAD_CNT,
					A.MEMO_NONAME,
					E.STR_TNAME
				FROM
					`".$Tname."b_memo_data".$str_Ini_Group_Table."` AS A
					LEFT JOIN `"
					.$Tname."comm_member_nick` AS E
					ON
					A.MEM_ID=E.STR_TUSERID
					AND
					E.STR_USERID='".$arr_Auth[0]."'
					LEFT JOIN `"
					.$Tname."comm_member` AS F
					ON
					A.MEM_ID=F.STR_USERID
				WHERE
					A.CONF_SEQ=?
					AND
					A.BD_SEQ=?
					AND
					(A.MEMO_NOTICE_YN=? AND A.MEMO_GOOD_CNT>0)
				ORDER BY
					A.MEMO_NOTICE_YN DESC,A.MEMO_GOOD_CNT DESC,A.MEMO_REG_DATE ASC LIMIT ".$arr_Ini_Board_Info[0]['CONF_MBEST2_LIMIT'];

	$arr_BMemo_Data = $Om_Con->select($Sql_Query, array($int_Conf_Seq, $int_Bd_Seq, "0"));
	$arr_BMemo_Data_Cnt = count($arr_BMemo_Data);
	//	= 베스트메모정보 배열에 저장 종료
	// ================================

	// ================================
	//	= 메모정보 배열에 저장 시작
	$Sql_Query =	" SELECT
					A.MEMO_SEQ,
					A.MEMO_IDX,
					A.MEMO_ORDER,
					A.MEMO_LEVEL,
					A.MEM_CODE,
					A.MEM_ID,
					A.MEMO_ICON,
					A.MEMO_W_NAME,
					A.MEMO_W_EMAIL,
					A.MEMO_W_IP,
					A.MEMO_CONT,
					A.MEMO_REG_DATE,
					A.MEMO_NOTICE_YN,
					A.MEMO_GOOD_CNT,
					A.MEMO_BAD_CNT,
					A.MEMO_NONAME,
					E.STR_TNAME
				FROM
					`".$Tname."b_memo_data".$str_Ini_Group_Table."` AS A
					LEFT JOIN `"
					.$Tname."comm_member_nick` AS E
					ON
					A.MEM_ID=E.STR_TUSERID
					AND
					E.STR_USERID='".$arr_Auth[0]."'
					LEFT JOIN `"
					.$Tname."comm_member` AS F
					ON
					A.MEM_ID=F.STR_USERID
				WHERE
					A.CONF_SEQ=?
					AND
					A.BD_SEQ=?
				ORDER BY
					A.MEMO_ORDER DESC ";

	$arr_Memo_Data = $Om_Con->select($Sql_Query, array($int_Conf_Seq, $int_Bd_Seq));
	$arr_Memo_Data_Cnt = count($arr_Memo_Data);
	//	= 메모정보 배열에 저장 종료
	// ================================

	If (Is_Array($arr_Get_Data)) {
		// ================================
		//	= 관련글 배열에 저장 시작
		$Sql_Query =	" SELECT
						BD_SEQ,
						BD_LEVEL,
						BD_TITLE,
						BD_OPEN_YN,
						BD_DEL_YN,
						IFNULL(BD_MEMO_CNT, 0) AS BD_MEMO_CNT,
						BD_REG_DATE
					FROM
						`".$Tname."b_bd_data".$str_Ini_Group_Table."`
					WHERE
						CONF_SEQ=?
						AND
						BD_IDX=?
						AND
						BD_ID_KEY IS NOT NULL
					ORDER BY
						BD_ORDER DESC ";

		$arr_Reply_Data = $Om_Con->select($Sql_Query, array($int_Conf_Seq, $arr_Get_Data[0]['BD_IDX']));
		$arr_Reply_Data_Cnt = count($arr_Reply_Data);
		//	= 관련글 배열에 저장 종료
		// ================================

		// ================================
		//	= 이전글 배열에 저장 시작
		$Sql_Query =	" SELECT
						A.BD_SEQ,
						A.BD_IDX,
						A.BD_TITLE,
						A.BD_OPEN_YN,
						A.BD_DEL_YN,
						IFNULL(A.BD_MEMO_CNT, 0) AS BD_MEMO_CNT,
						A.BD_REG_DATE,
						A.BD_BYN
					FROM
						`".$Tname."b_bd_data".$str_Ini_Group_Table."` AS A
					WHERE ";

		// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
		//	= 전체 게시판이 아닐때
		//	  해당 게시판 목록 출력
		If ($bln_Main_Bd==False) {
			$Sql_Query .= " A.CONF_SEQ=".$int_Conf_Seq." AND ";
		}
		// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

		$Sql_Query .= " A.BD_IDX< ?
									AND
									A.BD_LEVEL=0
									AND
									A.BD_ID_KEY IS NOT NULL
									".$Sql_Add_Query."
									".$Sql_Add_Class_Query."
								ORDER BY
									A.BD_ORDER DESC LIMIT 1 ";

		$arr_Prev_Data = $Om_Con->select($Sql_Query, array($arr_Get_Data[0]['BD_IDX']));
		$arr_Prev_Data_Cnt = count($arr_Prev_Data);
		//	= 이전글 배열에 저장 종료
		// ================================

		// ================================
		//	= 다음글 배열에 저장 시작
		$Sql_Query =	" SELECT
						A.BD_SEQ,
						A.BD_IDX,
						A.BD_TITLE,
						A.BD_OPEN_YN,
						A.BD_DEL_YN,
						IFNULL(A.BD_MEMO_CNT, 0) AS BD_MEMO_CNT,
						A.BD_REG_DATE,
						A.BD_BYN
					FROM
						`".$Tname."b_bd_data".$str_Ini_Group_Table."` AS A
					WHERE ";

		// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
		//	= 전체 게시판이 아닐때
		//	  해당 게시판 목록 출력
		If ($bln_Main_Bd==False) {
			$Sql_Query .= " A.CONF_SEQ=".$int_Conf_Seq." AND ";
		}
		// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&

		$Sql_Query .= " A.BD_IDX>?
									AND
									A.BD_LEVEL=0
									AND
									A.BD_ID_KEY IS NOT NULL
									".$Sql_Add_Query."
									".$Sql_Add_Class_Query."
								ORDER BY
									A.BD_ORDER ASC LIMIT 1 ";

		$arr_Next_Data = $Om_Con->select($Sql_Query, array($arr_Get_Data[0]['BD_IDX']));
		$arr_Next_Data_Cnt = count($arr_Next_Data);
		//	= 다음글 배열에 저장 종료
		// ================================
	}

	$str_String = "?bd=".urlencode($int_Ini_Board_Seq)."&itm=".urlencode($int_Itm)."&txt=".urlencode(fnc_Om_Rq($str_Txt))."&itm_cate=".urlencode(fnc_Om_Rq($itm_cate))."&itm_scate=".urlencode(fnc_Om_Rq($itm_scate))."&pg=".$int_Cur_Page;
?>
<script>
  AOS.init();
</script>
<SCRIPT LANGUAGE="JavaScript">
<!--
	var int_Doc_Width = '<?=$int_Ini_Table_Width?>';
	document.write('<L'+'I'+'NK rel="stylesheet" HREF="'+gbl_Str_Comm_Path+'css/egobd.css" TYPE="text/css">');
	document.write('<SCR'+'I'+'PT LANGUAGE="JavaScript" SRC="'+gbl_Str_Comm_Path+'js/egobd/comm.js"><\/SCRIPT>');
//-->
</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
<!--
	var obj_Blank = new Function("x", "return fncCheckBlank(x)");
	var obj_Alert = new Function("x", "y", "z", "return fncFocusAlert(x, y, z)");
	var obj_Byte = new Function("x", "y", "z", "return fncChkByte(x, y, z)");
	var obj_Digit = new Function("x", "return fncCheckDigit(x)");
	var obj_Email = new Function("x", "return fnc_Email_Conf(x)");

	/* +++++++++++++++++++++++++++++++++++++++ *\
		기능설명 : 목록구분 점선으로 분리
		반환값 : str_Devide_Html[라인분리HTML태그]
	\* +++++++++++++++++++++++++++++++++++++++ */
	function fnc_Line_Divide()
	{
		var str_Divide_Html = '';
		str_Divide_Html =	'<tr>'+
							'<td colspan="2" style="background-image:url('+gbl_Str_Comm_Image+'board/line_dot.gif);">'+
							'</td>'+
							'</tr>';
		return str_Divide_Html;
	}

	/* +++++++++++++++++++++++++++++++++++++++ *\
		기능설명 : 첨부파일 상세정보 출력
		상세설명 : 첨부파일 상세정보 레이어로 출력
	\* +++++++++++++++++++++++++++++++++++++++ */
	function fnc_Att_File_Info(pr_Lbl, pr_Title, pr_Cont, pr_File_Name, pr_Down_Cnt, pr_Bd, pr_F_Type, pr_F_Seq, pr_F_Key, pr_F_Ext)
	{
		var obj_Lbl = eval(pr_Lbl);

		var str_Add_Html = "";
		if((pr_Title=="") && (pr_Cont=="")){}
		else
		{
			str_Add_Html =	'<tr>'+
								'<td bgcolor="white">'+
									'<table border="0" cellpadding="3" cellspacing="0" width="100%">'+
										'<tr>'+
											'<td align="center">'+
												'<img src="'+gbl_Str_Comm_Image+'board/ic_opinion.gif" align="absMiddle"> '+
												'<b>'+unescape(pr_Title)+'</b>'+
											'</td>'+
										'</tr>'+
										'<tr>'+
											'<td valign="top">'+
												unescape(pr_Cont)+'<br><br>'+
											'</td>'+
										'</tr>'+
									'</table>'+
								'</td>'+
							'</tr>';
		}

		var str_Html =	'<table border="0" cellpadding="0" cellspacing="1" bgcolor="gray" width="300">'+
							'<tr>'+
								'<td>'+
								'<table border="0" cellpadding="3" cellspacing="0" width="100%">'+
									'<tr bgcolor="#6385BC">'+
									'<td style="FONT-FAMILY:돋움;FONT-SIZE:9pt;font-weight:bold;color:white;">'+
										'<img src="'+gbl_Str_Comm_Image+'board/ic_disk.gif" align="absMiddle"> '+
										unescape(pr_File_Name)+
									'</td>'+
									'<td align="right">'+
										'<img src="'+gbl_Str_Comm_Image+'board/ic_delete.gif" align="absMiddle" style="cursor:pointer;" onclick="fnc_Close_Lbl(\''+pr_Lbl+'\');" alt="close"> '+
									'</td>'+
									'</tr>'+
								'</table>'+
								'</td>'+
							'</tr>'+
							'<tr>'+
								'<td><table border="0" cellpadding="3" cellspacing="0" width="100%"><tr bgcolor="#FFFFCC">'+
								'<td width="50%">'+
									'다운로드횟수 : '+pr_Down_Cnt+
								'</td>'+
								'<td align="right" width="50%">'+
									'<b><a href="egofiledown.php?bd='+pr_Bd+'&ftype='+pr_F_Type+'&fseq='+pr_F_Seq+'&key='+pr_F_Key+'" class="lnk0"><img src="'+pr_F_Ext+'" align="absMiddle" border="0"> download</b>'+
								'</td>'+
								'</tr></table></td>'+
							'</tr>'+
							str_Add_Html+
						'</table>';
		with(obj_Lbl)
		{
			style.posTop = event.clientY+document.body.scrollTop;
			style.posLeft = event.clientX+document.body.scrollLeft;
			//style.posTop = 0+document.body.scrollTop;
			//style.posLeft = 0+document.body.scrollLeft;
			style.zIndex = 100;
			style.display = "";
			innerHTML = str_Html;
		}
	}

	/* +++++++++++++++++++++++++++++++++++++++ *\
		기능설명 : 첨부파일 상세정보 출력창 닫기
	\* +++++++++++++++++++++++++++++++++++++++ */
	function fnc_Close_Lbl(pr_Lbl)
	{
		var obj_Lbl = eval(pr_Lbl);
		var str_Html = "";
		with(obj_Lbl)
		{
			style.zIndex = 0;
			style.display = "none";
			innerHTML = str_Html;
		}
	}

	/* +++++++++++++++++++++++++++++++++++++++ *\
		기능설명 : 해당 문서 수정, 삭제
		삭제 : mode=0
		수정 : mode=1
	\* +++++++++++++++++++++++++++++++++++++++ */
	function fnc_Send_Data(pr_Form, int_Type)
	{
		var obj_Form = pr_Form;
		var str_Move_Page = "";

		if(!obj_Blank(obj_Form.txt_Mem_Id.value))
		{
			if(typeof(obj_Form.txt_Pwd)=="object")
			{
				if(!obj_Blank(obj_Form.txt_Pwd.value))
					return obj_Alert(obj_Form.txt_Pwd, null, "글 암호를 입력하세요.");
			}
		}

		if(int_Type>0)
			str_Move_Page = 'egowrite.php';
		else
			str_Move_Page = 'egodelete.php';

		if(int_Type==0)
		{
			if(confirm("글을 삭제하시면 첨부파일과 메모글까지 삭제됩니다\n\n정말로 삭제하시겠습니까?")==false)
				return false;
		}

		obj_Form.mode.value = int_Type;

		obj_Form.method="post";
		obj_Form.action=str_Move_Page;
		obj_Form.submit();
	}

	/* +++++++++++++++++++++++++++++++++++++++ *\
		기능설명 : 메모글쓰기
	\* +++++++++++++++++++++++++++++++++++++++ */
	function fnc_Save_Memo(pr_Form)
	{
		var obj_Form = pr_Form;
		var int_Byte = 0;

		<?If ($bln_Cur_Writer==False && $bln_Cur_Admin==False && !($arr_Ini_Board_Info[0]['CONF_MEMO_YN']=="1" && $bln_Cur_Brig4)) {?>
			alert("메모 작성 권한이 없습니다.");
			return;
		<?}?>

		if(!obj_Blank(obj_Form.txt_Memo_Name.value))
			return obj_Alert(obj_Form.txt_Memo_Name, null, "이름을 입력하세요.");

		int_Byte = obj_Byte(obj_Form.txt_Memo_Name, null, 20);
		if(int_Byte>20)
			return obj_Alert(obj_Form.txt_Memo_Name, null, "이름은 20 Byte이상 입력할 수 없습니다.\n\n현재 : "+int_Byte+" Byte");

		if(obj_Blank(obj_Form.txt_Memo_Email.value))
		{
			if(!obj_Email(obj_Form.txt_Memo_Email.value))
				return obj_Alert(obj_Form.txt_Memo_Email, null, "올바른 이메일 형식이 아닙니다.");
		}

		if(!obj_Blank(obj_Form.mtx_Memo_Cont.value))
			return obj_Alert(obj_Form.mtx_Memo_Cont, null, "글내용을 입력하세요");

		int_Byte = obj_Byte(obj_Form.mtx_Memo_Cont, null, 1000);
		if(int_Byte>1000)
			return obj_Alert(obj_Form.mtx_Memo_Cont, null, "글내용은 1000 Byte이상 입력할 수 없습니다.\n\n현재 : "+int_Byte+" Byte");

		if(typeof(obj_Form.txt_Memo_Pwd)=="object")
		{
			if(!obj_Blank(obj_Form.txt_Memo_Pwd.value))
				return obj_Alert(obj_Form.txt_Memo_Pwd, null, "비밀번호를 입력하세요.");

			if((obj_Form.txt_Memo_Pwd.value.length)<4)
				return obj_Alert(obj_Form.txt_Memo_Pwd, null, "비밀번호는 4자 이상 입력하셔야 합니다.");
		}

		obj_Form.method="post";
		obj_Form.action="egomemo.php";
		obj_Form.submit();
	}


	function fnc_Memo_Del(pr_Form, pr_Id, pr_Idx)
	{
		var obj_Form = pr_Form;
		var str_Seq = "";
		var str_Pwd = "";

		if(typeof(obj_Form.txt_Memo_Del_Seq.length)!="undefined")
		{
			str_Seq = obj_Form.txt_Memo_Del_Seq[parseInt(pr_Idx)].value;
			if(pr_Id=="")
			{
				if(typeof(obj_Form.txt_Memo_Del_Pwd)=="object")
				{
					if(!obj_Blank(obj_Form.txt_Memo_Del_Pwd[parseInt(pr_Idx)].value))
						return obj_Alert(obj_Form.txt_Memo_Del_Pwd[parseInt(pr_Idx)], null, "글암호를 입력하세요.");

					str_Pwd = obj_Form.txt_Memo_Del_Pwd[parseInt(pr_Idx)].value;
				}
			}
		}
		else
		{
			str_Seq = obj_Form.txt_Memo_Del_Seq.value;
			if(pr_Id=="")
			{
				if(typeof(obj_Form.txt_Memo_Del_Pwd)=="object")
				{
					if(!obj_Blank(obj_Form.txt_Memo_Del_Pwd.value) && pr_Id=="")
						return obj_Alert(obj_Form.txt_Memo_Del_Pwd, null, "글암호를 입력하세요.");

					str_Pwd = obj_Form.txt_Memo_Del_Pwd.value;
				}
			}
		}

		obj_Form.txt_Memo_Real_Seq.value = str_Seq;
		obj_Form.txt_Memo_Real_Pwd.value = str_Pwd;

		if(confirm("선택한 메모를 삭제하시겠습니까?")==false)
		{
			return false;
		}

		obj_Form.method="post";
		obj_Form.action="egomemodel.php";
		obj_Form.submit();
	}

	function fnc_Memo_Mo(pr_Form, pr_seq, pr_Id, pr_Idx)
	{
		var obj_Form = pr_Form;
		var str_Seq = "";
		var str_Pwd = "";

		if(typeof(obj_Form.txt_Memo_Del_Seq.length)!="undefined")
		{
			str_Seq = obj_Form.txt_Memo_Del_Seq[parseInt(pr_Idx)].value;
			if(pr_Id=="")
			{
				if(typeof(obj_Form.txt_Memo_Del_Pwd)=="object")
				{
					if(!obj_Blank(obj_Form.txt_Memo_Del_Pwd[parseInt(pr_Idx)].value))
						return obj_Alert(obj_Form.txt_Memo_Del_Pwd[parseInt(pr_Idx)], null, "글암호를 입력하세요.");

					str_Pwd = obj_Form.txt_Memo_Del_Pwd[parseInt(pr_Idx)].value;
				}
			}
		}
		else
		{
			str_Seq = obj_Form.txt_Memo_Del_Seq.value;
			if(pr_Id=="")
			{
				if(typeof(obj_Form.txt_Memo_Del_Pwd)=="object")
				{
					if(!obj_Blank(obj_Form.txt_Memo_Del_Pwd.value) && pr_Id=="")
						return obj_Alert(obj_Form.txt_Memo_Del_Pwd, null, "글암호를 입력하세요.");

					str_Pwd = obj_Form.txt_Memo_Del_Pwd.value;
				}
			}
		}
		if (fuc_ajax('egomemomo.php?RetrieveFlag=PW&bd='+obj_Form.bd.value+'&pr_seq='+pr_seq+'&pr_Id='+pr_Id+'&str_Pwd='+str_Pwd)=="1") {
			document.getElementById("mo"+pr_seq).style.display="";
		} else {
			alert("수정권한이 없습니다.");
		}

	}

	function fnc_Memo_Mos(pr_Form, pr_Id, pr_Idx)
	{
		var obj_Form = pr_Form;
		var str_Seq = "";
		var str_Pwd = "";

		if(typeof(obj_Form.txt_Memo_Del_Seq.length)!="undefined")
		{
			str_Seq = obj_Form.txt_Memo_Del_Seq[parseInt(pr_Idx)].value;

			if(pr_Id=="")
			{
				if(typeof(obj_Form.txt_Memo_Del_Pwd)=="object")
				{
					if(!obj_Blank(obj_Form.txt_Memo_Del_Pwd[parseInt(pr_Idx)].value))
						return obj_Alert(obj_Form.txt_Memo_Del_Pwd[parseInt(pr_Idx)], null, "글암호를 입력하세요.");

					str_Pwd = obj_Form.txt_Memo_Del_Pwd[parseInt(pr_Idx)].value;
				}
			}
		}
		else
		{
			str_Seq = obj_Form.txt_Memo_Del_Seq.value;
			if(pr_Id=="")
			{
				if(typeof(obj_Form.txt_Memo_Del_Pwd)=="object")
				{
					if(!obj_Blank(obj_Form.txt_Memo_Del_Pwd.value) && pr_Id=="")
						return obj_Alert(obj_Form.txt_Memo_Del_Pwd, null, "글암호를 입력하세요.");

					str_Pwd = obj_Form.txt_Memo_Del_Pwd.value;
				}
			}
		}

		if(!obj_Blank(eval("obj_Form.mtx_Memo_mCont"+str_Seq).value))
			return obj_Alert(eval("obj_Form.mtx_Memo_mCont"+str_Seq), null, "내용을 입력하세요.");

		obj_Form.txt_Memo_Real_Seq.value = str_Seq;
		obj_Form.txt_Memo_Real_Pwd.value = str_Pwd;
		obj_Form.txt_Memo_Cont.value = eval("obj_Form.mtx_Memo_mCont"+str_Seq).value;
		obj_Form.txt_Memo_Notice.value = eval("obj_Form.mtx_Memo_mNotice"+str_Seq).value;

		if (eval("obj_Form.txt_Memo_mNoname"+str_Seq).type == "checkbox") {
			if (eval("obj_Form.txt_Memo_mNoname"+str_Seq).checked) {
				obj_Form.txt_Memo_mNoname.value = "1";
			}else{
				obj_Form.txt_Memo_mNoname.value = "0";
			}
		} else {
			obj_Form.txt_Memo_mNoname.value = eval("obj_Form.txt_Memo_mNoname"+str_Seq).value;
		}
		obj_Form.method="post";
		obj_Form.action="egomemomos.php";
		obj_Form.submit();
	}


	function fnc_Memo_Remo(pr_seq)
	{

		if (document.getElementById("moRe"+pr_seq).style.display=="none") {
			document.getElementById("moRe"+pr_seq).style.display="";
		} else {
			document.getElementById("moRe"+pr_seq).style.display="none";
		}

	}

	function fnc_Save_rMemo(pr_Form, pr_seq, pr_idx, pr_order, pr_level)
	{
		var obj_Form = pr_Form;
		var int_Byte = 0;

		<?If ($bln_Cur_Writer==False && $bln_Cur_Admin==False && !($arr_Ini_Board_Info[0]['CONF_MEMO_YN']=="1" && $bln_Cur_Brig4)) {?>
			alert("메모 작성 권한이 없습니다.");
			return;
		<?}?>

		if(!obj_Blank(eval("obj_Form.txt_rMemo_Name"+pr_seq).value))
			return obj_Alert(eval("obj_Form.txt_rMemo_Name"+pr_seq), null, "이름을 입력하세요.");

		int_Byte = obj_Byte(eval("obj_Form.txt_rMemo_Name"+pr_seq), null, 20);
		if(int_Byte>20)
			return obj_Alert(eval("obj_Form.txt_rMemo_Name"+pr_seq), null, "이름은 20 Byte이상 입력할 수 없습니다.\n\n현재 : "+int_Byte+" Byte");

		if(obj_Blank(eval("obj_Form.txt_rMemo_Email"+pr_seq).value))
		{
			if(!obj_Email(eval("obj_Form.txt_rMemo_Email"+pr_seq).value))
				return obj_Alert(eval("obj_Form.txt_rMemo_Email"+pr_seq), null, "올바른 이메일 형식이 아닙니다.");
		}

		if(!obj_Blank(eval("obj_Form.mtx_rMemo_Cont"+pr_seq).value))
			return obj_Alert(eval("obj_Form.mtx_rMemo_Cont"+pr_seq), null, "글내용을 입력하세요");

		int_Byte = obj_Byte(eval("obj_Form.mtx_rMemo_Cont"+pr_seq), null, 1000);
		if(int_Byte>1000)
			return obj_Alert(eval("obj_Form.mtx_rMemo_Cont"+pr_seq), null, "글내용은 1000 Byte이상 입력할 수 없습니다.\n\n현재 : "+int_Byte+" Byte");

		if(typeof(eval("obj_Form.txt_rMemo_Pwd"+pr_seq))=="object")
		{
			if(!obj_Blank(eval("obj_Form.txt_rMemo_Pwd"+pr_seq).value))
				return obj_Alert(eval("obj_Form.txt_rMemo_Pwd"+pr_seq), null, "비밀번호를 입력하세요.");

			if((eval("obj_Form.txt_rMemo_Pwd"+pr_seq).length)<4)
				return obj_Alert(eval("obj_Form.txt_rMemo_Pwd"+pr_seq), null, "비밀번호는 4자 이상 입력하셔야 합니다.");
		}

		obj_Form.txt_Idx.value = pr_idx;
		obj_Form.txt_Order.value = pr_order;
		obj_Form.txt_Level.value = pr_level;
		obj_Form.txt_rMemo_Name.value = eval("obj_Form.txt_rMemo_Name"+pr_seq).value;
		obj_Form.txt_rMemo_Email.value = eval("obj_Form.txt_rMemo_Email"+pr_seq).value;
		if(typeof(eval("obj_Form.txt_rMemo_Pwd"+pr_seq))=="object") {
			obj_Form.txt_rMemo_Pwd.value = eval("obj_Form.txt_rMemo_Pwd"+pr_seq).value;
		}
		obj_Form.mtx_rMemo_Notice.value = eval("obj_Form.mtx_rMemo_Notice"+pr_seq).value;
		obj_Form.mtx_rMemo_Cont.value = eval("obj_Form.mtx_rMemo_Cont"+pr_seq).value;

		if (eval("obj_Form.txt_rMemo_Noname"+pr_seq).chkecked) {
			obj_Form.txt_rMemo_Noname.value = "1";
		}else{
			obj_Form.txt_rMemo_Noname.value = "0";
		}

		obj_Form.method="post";
		obj_Form.action="egorememo.php";
		obj_Form.submit();
	}

	/* +++++++++++++++++++++++++++++++++++++++ *\
		기능설명 : 이미지 출력 브라우저
	\* +++++++++++++++++++++++++++++++++++++++ */
	function fnc_Img_View(p_Bd, p_Seq, p_Key, p_Width, p_Height)
	{
		var int_Sys_Width = screen.width-20;
		var int_Sys_Height = screen.height-60;
		var int_View_Width = p_Width;
		var int_View_Height = p_Height;
		var str_Scrollbar = 'no';

		if(p_Width>int_Sys_Width)
		{
			int_View_Width = int_Sys_Width;
			str_Scrollbar = 'yes';

		}
		if(p_Height>int_Sys_Height)
		{
			int_View_Height = int_Sys_Height;
			str_Scrollbar = 'yes';
		}

		obj_Win = window.open('', 'imgviewer', 'top=0,left=0,width='+int_View_Width+',height='+int_View_Height+',location=no,scrollbars='+str_Scrollbar);
		if(obj_Win !=null) {
		obj_Win.document.write('<html><head>');
		obj_Win.document.write('<title>IMAGE</title>');
		obj_Win.document.write('</head><body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">');
		obj_Win.document.write('<a href="javascript:self.close();"><img src="egofiledata.php?bd='+p_Bd+'&iseq='+p_Seq+'&ikey='+p_Key+'" border="0"></a>');
		obj_Win.document.write('</body></html>');
		}
	}

	/* +++++++++++++++++++++++++++++++++++++++ *\
		기능설명 : 기술원 메인 게시물로 등록
	\* +++++++++++++++++++++++++++++++++++++++ */
	function fnc_Add_Main(pr_Form, pr_Type)
	{
		var obj_Form = pr_Form;
		obj_Form.txt_Wait.value = pr_Type;
		var str_Tmp = '등록';
		if(parseInt(pr_Type)>0)
			str_Tmp = '대기';


		if(confirm("\""+str_Tmp+"\" 상태로 변경하시겠습니까?"))
		{
			obj_Form.method="post";
			obj_Form.action="egomainadd.php";
			obj_Form.submit();
		}
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
<section class="noticeView">
  <article class="inner">
    <div class="textbox">
      <h2 data-aos="fade-up" data-aos-duration="800">공지사항</h2>
      <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">XROUTE의 다양한 소식들을 만나보세요</p>
    </div>
    <div class="board">
      <?if ($bln_Cur_Brig2 || $bln_Cur_Admin) {?>


				<div class="cont_box" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
					
					<table cellpadding=0 cellspacing=0 border=0 class="view_table">
						<tr>
							<th class="subject">
								<div class="tit"><?=fnc_Om_Rq($arr_Get_Data[0]['BD_TITLE'])?></div>
								<div class="info">
									<ul>
										<li>글쓴이 <span></span> 
											<?
												$str_Tmp = "";
												$str_Tmp = fnc_Om_Rq($arr_Get_Data[0]['BD_W_NAME']);
												if (fnc_Om_Rq($arr_Get_Data[0]['STR_TNAME'])!="") {
													$str_Tmp .= "(".fnc_Om_Rq($arr_Get_Data[0]['STR_TNAME']).")";
												}
												If ($arr_Get_Data[0]['MEM_ID']!="") {
													$str_Tmp .= "(" . $arr_Get_Data[0]['MEM_ID'] .")";
												}
												echo $str_Tmp;
											?>
										</li>
										<li>작성일 <span></span> <?=str_replace("-",".",substr($arr_Get_Data[0]['BD_REG_DATE'],2,8))?></li>
									</ul>
								</div>
							</th>
						</tr>
						<tr>
							<td class="view_cont">

	                        	<table style="width:100%" border="0" cellpadding="0" cellspacing="0">
				                    <tr>
				                        <td>
				
												<?If ($arr_Get_Data[0]['BD_CONT']!="") {?>
													<?
														$str_Tmp = Fnc_Conv_View(fnc_Om_Rq($arr_Get_Data[0]['BD_CONT']), $arr_Get_Data[0]['BD_FORMAT']);
														echo $str_Tmp;
														//$str_Tmp = js_escape($str_Tmp);
													?>
												<?}?>
				
				                        </td>
				                    </tr>
									<?
										// =======================================
										//	= 이미지 미리보기 시작
										If ($arr_Get_Data[0]['BD_THUMB_YN']>0) {
											If ($arr_File_Data_Cnt) {
	
											for($int_I = 0 ;$int_I < $arr_File_Data_Cnt; $int_I++) {
												If ($arr_File_Data[$int_I]['TYPE']>0) {
												?>
									<tr>
										<td style="background-color:#ffffff">
											<!-- ///@@@ 이미지 미리보기 시작 -->
											<table style="width:100%" border="0" cellpadding="0" cellspacing="2">
												<!--tr>
													<td align="center" style="background-color:#ffffff;padding-bottom:10px;">
														<?$int_Ini_Table_Width=600;?>
														<a href="javascript:fnc_Img_View(<?=$int_Conf_Seq?>, <?=$arr_File_Data[$int_I]['SEQ']?>, '<?=$arr_File_Data[$int_I]['SKEY']?>', <?=$arr_File_Data[$int_I]['IMG_F_WIDTH']?>, <?=$arr_File_Data[$int_I]['IMG_F_HEIGHT']?>);"><img src="http://www.goodstoluck.co.kr/boad/bd_boad/egofiledata.php?bd=<?=$int_Conf_Seq?>&iseq=<?=$arr_File_Data[$int_I]['SEQ']?>&ikey=<?=$arr_File_Data[$int_I]['SKEY']?>" width="<?
																								$int_Tmp = ($int_Ini_Table_Width/100)*99;
																								If ($arr_File_Data[$int_I]['IMG_F_WIDTH']>$int_Tmp) {
																									echo $int_Tmp;
																								}Else{
																									echo $arr_File_Data[$int_I]['IMG_F_WIDTH'];
																								}
																							?>"></a>
													</td>
												</tr-->
												<?
													If ($arr_File_Data[$int_I]['F_TITLE']!="") {
												?>
												<tr><td><img src="<?=$str_Board_Icon_Img?>ic_pen.gif" align="absMiddle"> <font color="#000000"><b><?=Fnc_Conv_View($arr_File_Data[$int_I]['F_TITLE'], 0)?></b></font></td></tr>
												<?
													}
	
													If ($arr_File_Data[$int_I]['F_CONT']!="") {
												?>
												<tr><td><font color="#000000"><?=Fnc_Conv_View($arr_File_Data[$int_I]['F_CONT'], 0)?></font></td></tr>
												<?
													}
												?>
											</table>
											<!-- 이미지 미리보기 종료 @@@/// -->
										</td>
									</tr>
												<?
												}
											}
	
											}
										}
										//	= 이미지 미리보기 종료
										// =======================================
									?>
								</table>

								<!--
								<div class="note">
									[출처: 서울신문에서 제공하는 기사입니다.] <br />https://www.seoul.co.kr/news/newsView.php?id=20160325500165#csidx5f3a79e7ebe10b797d69ca92405d62f 
								</div>
								//-->
							</td>
						</tr>
					</table>
					
					<?if($arr_Prev_Data_Cnt || $arr_Next_Data_Cnt){?>
					<div class="view_list">
						<ul>
							<?if($arr_Next_Data_Cnt){?>
							<li class="next">
								<div class="title"><a href="notice_view.php<?=$str_String?>&seq=<?=$arr_Next_Data[0]['BD_SEQ']?>">다음글</a></div>
								<div class="subject">
									<?
										// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
										//	= 비공개글 표시 아이콘 변수에 저장 시작
										$str_Tmp = "";
										If ($arr_Next_Data[0]['BD_OPEN_YN']>0) {
											$str_Tmp = "<img src='".$str_Board_Icon_Img."ic_key.gif' border='0' align='absMiddle'> ";
										}
										//	= 비공개글 표시 아이콘 변수에 저장 종료
										// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
									?>
									<a href="notice_view.php<?=$str_String?>&seq=<?=$arr_Next_Data[0]['BD_SEQ']?>">
									<?
										echo $str_Tmp;
			
										// ========================
										//	= 메모글 갯수 출력 시작
										If ($arr_Next_Data[0]['BD_MEMO_CNT']>0) {
											echo " (<img src='".$str_Board_Icon_Img."ic_memo.gif' align='absMiddle' border='0'> " . $arr_Next_Data[0]['BD_MEMO_CNT'] . ") ";
										}
										//	= 메모글 갯수 출력 종료
										// ========================
			
										$str_Tmp = Fnc_Conv_View($arr_Next_Data[0]['BD_TITLE'], 0);
										$str_Tmp = Fnc_Conv_View($str_Tmp, 0);
										echo $str_Tmp;
									?>
									</a>
								</div>
							</li>
							<?}?>
							<?if($arr_Prev_Data_Cnt){?>
							<li class="prev">
								<div class="title"><a href="notice_view.php<?=$str_String?>&seq=<?=$arr_Prev_Data[0]['BD_SEQ']?>">이전글</a></div>
								<div class="subject">
									<?
										// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
										//	= 비공개글 표시 아이콘 변수에 저장 시작
										$str_Tmp = "";
										If ($arr_Prev_Data[0]['BD_OPEN_YN']>0) {
											$str_Tmp = "<img src='".$str_Board_Icon_Img."ic_key.gif' border='0' align='absMiddle'> ";
										}
										//	= 비공개글 표시 아이콘 변수에 저장 종료
										// &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
									?>
									<a href="notice_view.php<?=$str_String?>&seq=<?=$arr_Prev_Data[0]['BD_SEQ']?>">
									<?
										echo $str_Tmp;
			
										// ========================
										//	= 메모글 갯수 출력 시작
										If ($arr_Prev_Data[0]['BD_MEMO_CNT']>0) {
											echo " (<img src='".$str_Board_Icon_Img."ic_memo.gif' align='absMiddle' border='0'> " . $arr_Prev_Data[0]['BD_MEMO_CNT'] . ") ";
										}
										//	= 메모글 갯수 출력 종료
										// ========================
			
										$str_Tmp = Fnc_Conv_View($arr_Prev_Data[0]['BD_TITLE'], 0);
										$str_Tmp = Fnc_Conv_View($str_Tmp, 0);
										echo $str_Tmp;
									?>
									</a>
								</div>
							</li>
							<?}?>
						</ul>
					</div>
					<?} else {?>
					<div class="view_list">
					</div>
					<? } ?>
					<?
						$tmp_page = "notice.php";
						if($_GET['bd']==4) { $tmp_page = "event.php"; }
						if($_GET['bd']==5) { $tmp_page = "report.php"; }
					?>
					<div class="board_btn">
						<div class="btn"><a href="<?=$tmp_page?><?=$str_String?>"><span>목록으로</span></a></div>
					</div>
					
				</div>

<?}else{?>
	<?include "inc/inc_message.php";?>
<?}?>
    </div>
  </article>
</section>

<?php
include 'footer.php';
?>