<?php
/**
 * HTML mail template for admin notification.
 * Variables available: $fields (array), $sendDate (string), $senderName (string),
 *                      $remoteAddr (string), $userAgent (string)
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>新規お問い合わせ</title>
</head>
<body style="margin:0;padding:0;background-color:#f5f5f7;font-family:'Helvetica Neue',Arial,'Hiragino Kaku Gothic ProN','Hiragino Sans',Meiryo,sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">

<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#f5f5f7;">
<tr><td align="center" style="padding:40px 16px;">

  <!-- Main container -->
  <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 2px 16px rgba(0,0,0,0.06);">

    <!-- Header -->
    <tr>
      <td style="background:linear-gradient(135deg,#0f3460 0%,#16213e 50%,#1a1a2e 100%);padding:32px;text-align:center;">
        <p style="margin:0 0 6px;font-size:12px;letter-spacing:3px;color:rgba(255,255,255,0.5);text-transform:uppercase;">New Inquiry</p>
        <h1 style="margin:0;font-size:22px;font-weight:700;color:#ffffff;letter-spacing:0.5px;">新規お問い合わせがありました</h1>
      </td>
    </tr>

    <!-- Body -->
    <tr>
      <td style="padding:28px 32px 16px;">
        <p style="margin:0 0 16px;font-size:13px;font-weight:600;color:#666666;letter-spacing:1px;text-transform:uppercase;">お問い合わせ内容</p>

        <!-- Fields table -->
        <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="border:1px solid #e8e8ed;border-radius:12px;overflow:hidden;">
          <tr>
            <td style="padding:0;">
              <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr style="background-color:#fafafa;">
                  <td style="padding:12px 20px;font-size:11px;font-weight:600;color:#888888;letter-spacing:0.5px;border-bottom:1px solid #e8e8ed;width:120px;">送信時刻</td>
                  <td style="padding:12px 20px;font-size:14px;color:#333333;border-bottom:1px solid #e8e8ed;"><?php echo htmlspecialchars($sendDate); ?></td>
                </tr>
<?php
$bgToggle = false;
foreach ($fields as $label => $value):
    if ($value === '') continue;
    $bgToggle = !$bgToggle;
    $bgColor = $bgToggle ? '#ffffff' : '#fafafa';
?>
                <tr style="background-color:<?php echo $bgColor; ?>;">
                  <td style="padding:12px 20px;font-size:11px;font-weight:600;color:#888888;letter-spacing:0.5px;border-bottom:1px solid #e8e8ed;vertical-align:top;"><?php echo htmlspecialchars($label); ?></td>
                  <td style="padding:12px 20px;font-size:14px;color:#333333;line-height:1.7;border-bottom:1px solid #e8e8ed;word-break:break-all;"><?php echo nl2br(htmlspecialchars($value)); ?></td>
                </tr>
<?php endforeach; ?>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <!-- Divider -->
    <tr>
      <td style="padding:8px 32px 0;">
        <hr style="border:none;border-top:1px solid #e8e8ed;margin:0;">
      </td>
    </tr>

    <!-- Technical info -->
    <tr>
      <td style="padding:16px 32px 28px;">
        <p style="margin:0 0 10px;font-size:11px;font-weight:600;color:#999999;letter-spacing:1px;text-transform:uppercase;">送信者情報</p>
        <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%" style="font-size:12px;color:#888888;line-height:1.8;">
          <tr>
            <td style="width:100px;font-weight:600;vertical-align:top;padding:2px 0;">IPアドレス</td>
            <td style="padding:2px 0;"><?php echo htmlspecialchars($remoteAddr); ?></td>
          </tr>
          <tr>
            <td style="font-weight:600;vertical-align:top;padding:2px 0;">ブラウザ</td>
            <td style="padding:2px 0;word-break:break-all;"><?php echo htmlspecialchars($userAgent); ?></td>
          </tr>
        </table>
      </td>
    </tr>

  </table>

  <!-- Footer note -->
  <p style="margin:20px 0 0;font-size:11px;color:#aaaaaa;text-align:center;">
    This is an automated notification from <?php echo htmlspecialchars($senderName); ?> contact form.
  </p>

</td></tr>
</table>

</body>
</html>
