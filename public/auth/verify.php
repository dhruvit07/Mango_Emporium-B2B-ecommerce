<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" type="image/x-icon" href="<?php echo $htmlPath; ?>/resources/img/favicon.png">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link type="text/css" rel="stylesheet" href="<?php echo $htmlPath; ?>/resources/css/bootstrap.min.css" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #1DBF73;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            max-width: 1100px;
            text-align: center;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .code-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 40px 0;

        }

        .code {
            border-radius: 5px;
            font-size: 75px;
            height: 120px;
            width: 100px;
            border: 1px solid #eee;
            outline-width: thin;
            ;
            outline-color: #ddd;
            margin: 1%;
            text-align: center;
            font-weight: 300;
            -moz-appearance: textfield;
            margin-left: 10px;
        }

        .code::-webkit-outer-spin-button,
        .code::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .code:valid {
            border-color: #1DBF73;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        }

        .info {
            background-color: #eaeaea;
            display: inline-block;
            padding: 10px;
            line-height: 20px;
            max-width: 400px;
            color: #777;
            border-radius: 5px;
        }

        @media (max-width: 600px) {
            .code-container {
                flex-wrap: wrap;
            }

            .code {
                font-size: 60px;
                height: 80px;
                max-width: 70px;
            }
        }

        br {
            /* display: none; */
        }
    </style>

    <title>Verify Account
    </title>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET['error']) && isset($_SESSION['error'])) {
            echo ' <div class="alert alert-warning alert-dismissible  show" role="alert">
            <strong>' . $_SESSION["error"] . '</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            unset($_SESSION['error']);
            // $_SESSION["error"] = "hello";
        }
        ?>
        <h2>Verify Your Account</h2>
        <p>We emailed you the six digit code to <?php echo $_SESSION["email"]; ?><br /> Enter the code below to confirm your email address.</p>
        <form action="../../src/process/auth/otp-auth.process.php" method="post">
            <div class="code-container">
                <input type="number" class="code" placeholder="0" min="0" max="9" required>
                <input type="number" class="code" placeholder="0" min="0" max="9" required>
                <input type="number" class="code" placeholder="0" min="0" max="9" required>
                <input type="number" class="code" placeholder="0" min="0" max="9" required>
                <input type="number" class="code" placeholder="0" min="0" max="9" required>
                <input type="number" class="code" placeholder="0" min="0" max="9" required>
            </div>
            <input type="number" name="otp" type="otp" id="otp" style="visibility:hidden;">
            <br>
            <small onclick="sub()" class="info">
                Submit
            </small>
            <small id="resend" class="info">
                Resend
            </small>
            <button style="visibility:hidden;" type="submit" id="button"></button>
            <form>
    </div>
    <script src="<?php echo $htmlPath; ?>/resources/js/jquery.min.js"></script>
    <script>
        const codes = document.querySelectorAll('.code');

        codes[0].focus();

        codes.forEach((code, idx) => {
            code.addEventListener('keydown', (e) => {
                if (e.key >= 0 && e.key <= 9) {
                    codes[idx].value = ''
                    setTimeout(() => codes[idx + 1].focus(), 10)
                } else if (e.key === 'Backspace') {
                    setTimeout(() => codes[idx - 1].focus(), 10)
                }
            })
        });

        function sub() {
            const code = codes[0].value + codes[1].value + codes[2].value + codes[3].value + codes[4].value + codes[5].value;
            // console.log(code);
            document.getElementById("otp").value = code;
            var but = document.getElementById("button").click();

        }
    </script>
    <script>
        $(document).ready(function() {
            resend = true
            $("#resend").click(function() {
                $.ajax({
                    url: "<?php echo $htmlPath; ?>/src/process/auth/register-auth.process.php",
                    type: 'post',
                    data: {
                        resend: resend
                    },
                    success: function(result) {
                        console.log(result);
                    }
                });
            });
        });
    </script>
</body>

</html>