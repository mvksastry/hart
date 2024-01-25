<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

  <head>
    <title>

    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }
        .ReadMsgBody {
            width: 100%;
        }
        .ExternalClass {
            width: 100%;
        }
        .ExternalClass * {
            line-height: 100%;
        }
        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }
        p {
            display: block;
            margin: 13px 0;
        }
    </style>
    <style type="text/css">
      @media only screen and (max-width:480px) {
        @-ms-viewport {
            width: 320px;
        }
        @viewport {
            width: 320px;
        }
      }
    </style>
    <style type="text/css">
      @media only screen and (min-width:480px) {
        .mj-column-per-100 {
            width: 100% !important;
        }
      }
    </style>
    <style type="text/css">
    </style>
  </head>

  <body style="background-color:#f9f9f9;">
    <div style="background-color:#f9f9f9;">
      <div style="background:#f9f9f9;background-color:#f9f9f9;Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f9f9f9;background-color:#f9f9f9;width:100%;">
          <tbody>
            <tr>
              <td style="border-bottom:#333957 solid 5px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div style="background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#fff;background-color:#fff;width:100%;">
          <tbody>
            <tr>
              <td style="border:#dddddd solid 1px;border-top:0px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                  <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                    <tr>
                      <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;" width="10%">
                          <tbody>
                            <tr>
                              <td style="width:64px;">
                                <img height="auto" src="https://i.imgur.com/KO1vcE9.png" style="border:0;display:block;outline:none;text-decoration:none;width:100%;" width="64" />
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>

                    <tr>
                      <td align="center" style="font-size:0px;padding:10px 20px;padding-bottom:40px;word-break:break-word;">
                        <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:24px;font-weight:bold;line-height:1;text-align:center;color:#555;">
                          Welcome to {{ $contactMailData['product'] }}
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                          <p>
                            Hello {{ ucwords($contactMailData['name']) }}!
                          </p>
                          <p>
                            Thank you for contacting regarding {{ $contactMailData['product'] }}. 
                          </p>
                        </div>
                                       
                        <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                          <p>
                            {{ $contactMailData['body'] }}
                          </p>                                       
                        </div>
                                          
                        <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:16px;line-height:22px;text-align:left;color:#555;">
                          <p>We have a number of paper-less cloud and standalone applications that help run an office.
                              Does not matter where you are yet you can complete all your work!</p>
                          <p>We are a Human & Administrative Resource Tracker office software company.
                              Our software helps you manage and run your office with least IT infrastructure.
                              Simply sign-up and start using it right away. 
                              It is that <span>Simple</span> &amp; <span>Easy</span>
                          </p>
                        </div>
                      </td>
                    </tr>
                    
                    <!--
                    <tr>
                      <td align="center" style="font-size:0px;padding:10px 25px;padding-top:30px;padding-bottom:50px;word-break:break-word;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:separate;line-height:100%;">
                            <tr>
                              <td align="center" bgcolor="#2F67F6" role="presentation" style="border:none;border-radius:3px;color:#ffffff;cursor:auto;padding:15px 25px;" valign="middle">
                                <p style="background:#2F67F6;color:#ffffff;font-family:'Helvetica Neue',Arial,sans-serif;font-size:15px;font-weight:normal;line-height:120%;Margin:0;text-decoration:none;text-transform:none;">
                                  Login to Your Account
                                </p>
                              </td>
                            </tr>
                        </table>
                      </td>
                    </tr>
                    -->
                    
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <div style="background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#fff;background-color:#fff;width:100%;">
          <tbody>
            <tr>
              <td style="border:#dddddd solid 1px;border-top:0px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                  <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
                    <tr>
                      <td valign="top" width="50%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td style="padding-top: 20px; padding-right: 10px;">
                              <a href="#"><img src="images/work-1.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>
                              <div class="text-project" style="text-align: center;">
                                <h3><a href="#">E-Lab</a></h3>
                                <span>A Complete, secure E-Laboratory note book</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding-top: 20px; padding-right: 10px;">
                              <a href="#"><img src="images/work-3.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>
                              <div class="text-project" style="text-align: center;">
                                <h3><a href="#">H A R T</a></h3>
                                <span>Human & Administrative Resource Tracker</span>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </td>

                      <td valign="top" width="50%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                          <tr>
                            <td style="padding-top: 20px; padding-right: 10px;">
                              <a href="#"><img src="images/work-2.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>
                              <div class="text-project" style="text-align: center;">
                                <h3><a href="#">A R M</a></h3>
                                <span>Automated Recruitment Management</span>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding-top: 20px; padding-right: 10px;">
                              <a href="#"><img src="images/work-4.jpg" alt="" style="width: 100%; max-width: 600px; height: auto; margin: auto; display: block;"></a>
                              <div class="text-project" style="text-align: center;">
                                <h3><a href="#">BEST</a></h3>
                                <span>Breeding Experimental Systems Trackers</span>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                        
                    <tr>
                      <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                        <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:14px;line-height:20px;text-align:left;color:#525252;">
                            Best regards,<br><br> Krishna Teja M<br>Meissa Software Solutions., </br> CEO and Founder<br>
                            <a href="https://www.meissahart.in" style="color:#2F67F6">HART-Meissa</a>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div style="Margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
          <tbody>
            <tr>
              <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
                  <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                    <tbody>
                      <tr>
                        <td style="vertical-align:bottom;padding:0;">
                          <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                            <tr>
                              <td align="center" style="font-size:0px;padding:0;word-break:break-word;">
                                <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:12px;font-weight:300;line-height:1;text-align:center;color:#575757;">
                                  Meissa Software Solutions Pvt Ltd., Pune, India
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" style="font-size:0px;padding:10px;word-break:break-word;">
                                <div style="font-family:'Helvetica Neue',Arial,sans-serif;font-size:12px;font-weight:300;line-height:1;text-align:center;color:#575757;">
                                  <a href="" style="color:#575757">Unsubscribe</a> from our emails
                                </div>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>