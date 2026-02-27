<?php
/**
 * HTML mail template for auto-reply.
 * Variables available: $fields (array), $sendDate (string), $signature (string), $senderName (string)
 */
$signatureHtml = nl2br(htmlspecialchars($signature));
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>お問い合わせありがとうございました</title>
</head>
<body style="margin:0;padding:0;background-color:#f5f5f7;font-family:'Helvetica Neue',Arial,'Hiragino Kaku Gothic ProN','Hiragino Sans',Meiryo,sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">

<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#f5f5f7;">
<tr><td align="center" style="padding:40px 16px;">

  <!-- Main container -->
  <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 2px 16px rgba(0,0,0,0.06);">

    <!-- Header -->
    <tr>
      <td style="background:linear-gradient(135deg,#1a1a2e 0%,#16213e 50%,#0f3460 100%);padding:40px 32px;text-align:center;">
        <p style="margin:0 0 8px;font-size:13px;letter-spacing:3px;color:rgba(255,255,255,0.6);text-transform:uppercase;">Contact Confirmation</p>
        <h1 style="margin:0;font-size:24px;font-weight:700;color:#ffffff;letter-spacing:0.5px;">お問い合わせありがとうございます</h1>
      </td>
    </tr>

    <!-- Body -->
    <tr>
      <td style="padding:32px;">
        <p style="margin:0 0 24px;font-size:15px;line-height:1.8;color:#333333;">
          この度はお問い合わせをいただき、ありがとうございました。<br>
          折り返し担当者から返信が行きますので、しばらくお待ちください。
        </p>

        <p style="margin:0 0 16px;font-size:13px;font-weight:600;color:#666666;letter-spacing:1px;text-transform:uppercase;">お問い合わせ内容</p>

        <!-- Fields table -->
        <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border:1px solid #e8e8ed;border-radius:12px;overflow:hidden;">
          <tr>
            <td style="padding:0;">
              <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr style="background-color:#fafafa;">
                  <td style="padding:14px 20px;font-size:12px;font-weight:600;color:#888888;letter-spacing:0.5px;border-bottom:1px solid #e8e8ed;width:120px;">送信時刻</td>
                  <td style="padding:14px 20px;font-size:14px;color:#333333;border-bottom:1px solid #e8e8ed;"><?php echo htmlspecialchars($sendDate); ?></td>
                </tr>
<?php
$bgToggle = false;
foreach ($fields as $label => $value):
    if ($value === '') continue;
    $bgToggle = !$bgToggle;
    $bgColor = $bgToggle ? '#ffffff' : '#fafafa';
?>
                <tr style="background-color:<?php echo $bgColor; ?>;">
                  <td style="padding:14px 20px;font-size:12px;font-weight:600;color:#888888;letter-spacing:0.5px;border-bottom:1px solid #e8e8ed;vertical-align:top;"><?php echo htmlspecialchars($label); ?></td>
                  <td style="padding:14px 20px;font-size:14px;color:#333333;line-height:1.7;border-bottom:1px solid #e8e8ed;word-break:break-all;"><?php echo nl2br(htmlspecialchars($value)); ?></td>
                </tr>
<?php endforeach; ?>
              </table>
            </td>
          </tr>
        </table>

        <p style="margin:28px 0 0;font-size:14px;line-height:1.8;color:#666666;">
          ※ 3営業日以内に担当者よりご連絡いたします。<br>
          ※ このメールにお心当たりのない場合は、破棄してくださいますようお願いいたします。
        </p>
      </td>
    </tr>

    <!-- Divider -->
    <tr>
      <td style="padding:0 32px;">
        <hr style="border:none;border-top:1px solid #e8e8ed;margin:0;">
      </td>
    </tr>

    <!-- Signature -->
    <tr>
      <td style="padding:28px 32px 36px;text-align:center;">
        <p style="margin:0 0 4px;font-size:15px;font-weight:700;color:#1a1a2e;"><?php echo htmlspecialchars($senderName); ?></p>
        <p style="margin:0;font-size:12px;line-height:1.7;color:#999999;">
          京都府京都市下京区大黒町227番地 第２キョートビル402<br>
          Email：<a href="mailto:hello@mumumu.co.jp" style="color:#0f3460;text-decoration:none;">hello@mumumu.co.jp</a><br>
          URL：<a href="https://mumumu.co.jp" style="color:#0f3460;text-decoration:none;">https://mumumu.co.jp</a>
        </p>
      </td>
    </tr>

  </table>

  <!-- Footer note -->
  <p style="margin:24px 0 0;font-size:11px;color:#aaaaaa;text-align:center;">
    &copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($senderName); ?> All Rights Reserved.
  </p>

</td></tr>
</table>

</body>
</html>
