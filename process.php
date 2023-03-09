<!-- Global site tag (gtag.js) - Google Ads: 466156703 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-466156703"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'AW-466156703');
</script>

<?php
include_once('PHPMailer/PHPMailerAutoload.php');

function mailer($fname, $fmail, $to, $subject, $content, $type=0, $file="", $cc="", $bcc="")
{
    if ($type != 1) $content = nl2br($content);
    // type : text=0, html=1, text+html=2
    $mail = new PHPMailer(); // defaults to using php "mail()"
    $mail->IsSMTP();
    //   $mail->SMTPDebug = 2;
    $mail->SMTPSecure = "ssl";
    $mail->SMTPAuth = true;
    $mail->Host = "smtps.hiworks.com";
    $mail->Port = 465;
    $mail->Username = "info2@logifocus.co.kr";
    $mail->Password = "logifocus1!";
    $mail->CharSet = 'UTF-8';
    $mail->From = $fmail;
    $mail->FromName = $fname;
    $mail->Subject = $subject;
    $mail->AltBody = ""; // optional, comment out and test
    $mail->msgHTML($content);
    $mail->addAddress($to);
    if ($cc)
        $mail->addCC($cc);
    if ($bcc)
        $mail->addBCC($bcc);
    if ($file != "") {
        foreach ($file as $f) {
            $mail->addAttachment($f['path'], $f['name']);
        }
    }
    $rmsg = "";
    if ( $mail->send() ) $rmsg =  "견적문의가 완료되었습니다.";
    else $rmsg =  "견적문의가 완료되지 않았습니다.";

    echo "<script>alert('".$rmsg."'); location.href = '/';</script>";
}

$fname = $_POST['company'];
$fmail = $_POST['email'];
$to = "info@xroute.co.kr";
$subject = "엑스루트 온라인 상담 : [".$fname."]";
$content = "[".$_POST['service']."]<br>[".$_POST['company']."]<br>[".$_POST['manager']."]<br>[".$_POST['tel']."]<br>[".$fmail."]<br>[".$_POST['channel']."]<br>".$_POST['inquiryContent'];
mailer($fname,$fmail,$to,$subject,$content);


?>