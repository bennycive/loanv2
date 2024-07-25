<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verification</title>
</head>

<body style="background-color: #e8edf7; font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <!-- Main Container -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #c7daff; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" border="0"
                    style="background-color: #fff; margin: 0 auto; padding: 20px; border: 1px solid #e9e9e9; border-radius: 3px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <!-- Header -->
                    <tr>
                        <td align="center"
                            style="background-image: url('https://afrigotech.com/skills/logo.png'); background-size: cover; background-position: center; height: 100px;">
                        </td>
                    </tr>

                    <!-- Main Content -->
                    <tr>
                        <td align="center" style="padding: 20px;">
                            
                            <p style="color: #333; font-size: 18px;">
                            <span style="color: #003776;">Hello, welcome to our customer portal</span>
                            </p>
                            <div style="border: 2px dotted #3c84d6; padding: 20px; border-radius: 5px; text-align: center; color: black; font-size: 16px;">
                                <p>Please use the following verification code: <strong>{{ $code }}</strong> to verify your account</p>
                            </div>
                            <br>
                            <p style="color: #333;">Thank you for using {{ config('app.name') }}</p>
                        </td>
                    </tr>


                    <!-- Footer -->
                    <tr>
                        <td align="center"
                            style="background-image: linear-gradient(135deg, #577B8D, #A1DD70); padding: 20px; border-radius: 0 0 3px 3px;">
                            <p style="color: #fff;">Follow us for more information on:</p>
                            <!-- Social Media Icons -->
                            <a href="https://www.facebook.com/" style="text-decoration: none;">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/Facebook_Logo_2023.png"
                                    alt="Facebook" style="width: 20px; height: 20px; margin-right: 15px;">
                            </a>
                            <a href="https://www.instagram.com/" style="text-decoration: none;">
                                <img src="https://freelogopng.com/images/all_img/1658587303instagram-png.png"
                                    alt="Instagram" style="width: 20px; height: 20px; margin-right: 15px;">
                            </a>
                            <a href="https://twitter.com/" style="text-decoration: none;">
                                <img src="https://www.edigitalagency.com.au/wp-content/uploads/new-Twitter-logo-x-black-png.png"
                                    alt="Twitter" style="width: 20px; height: 20px; margin-right: 15px;">
                            </a>
                            <p style="color: #fff; margin-top: 10px;">&copy; {{ strtolower(config('app.name')) }}, <span
                                    id="current-year"></span> All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <script>
        // JavaScript to dynamically insert the current year
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
