<?php
require 'C:/xampp/htdocs/project-1/includes/path-config.inc.php';
session_start();
if (isset($_GET['key']) && isset($_GET['token'])) {
  $key = $_GET['key'];
  $token = $_GET['token'];
}
?>
<style>
  :root {
    --succes-color: #2ecc71;
    ;
    --error-color: #e74c3c;
  }

  .input-group input:focus {
    outline: 0;
    border-color: #777;
  }

  .input-group.success input {
    border-color: var(--succes-color);
  }

  .input-group.error input {
    border-color: var(--error-color);
  }

  .input-group small {
    color: var(--error-color);
    position: absolute;
    bottom: 0;
    left: 0;
    visibility: hidden;
  }

  .input-group.error small {
    position: static;
    visibility: visible;
  }
</style>
<link rel="icon" type="image/x-icon" href="<?php echo $htmlPath; ?>/resources/img/favicon.png">
<title>Forgot Password</title>
<link href="<?php echo $htmlPath; ?>/resources/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <link href="../../resources/css/style.css" rel="stylesheet"> -->
<script src="<?php echo $htmlPath; ?>/resources/js/bootstrap.min.js"></script>
<script src="<?php echo $htmlPath; ?>/resources/js/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<style>
  .form-gap {
    padding-top: 70px;
  }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container">
  <div class="row">

    <div class="col-md-4 col-md-offset-4">
      <?php
      if (isset($_GET['msg']) && isset($_SESSION['msg'])) {
        echo ' <div class="alert alert-warning alert-dismissible  show" role="alert">
            <strong>' . $_SESSION["msg"] . '</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        unset($_SESSION['msg']);
        // $_SESSION["error"] = "hello";
      }
      ?>
      <div class="panel panel-default">

        <div class="panel-body">
          <div class="text-center">
            <h3><i class="fa fa-lock fa-4x"></i></h3>
            <?php if (isset($_GET['key']) && isset($_GET['token'])) { ?>
              <h2 class="text-center">Forgot Password?</h2>
              <p>Enter Your New Password Here.</p>
              <div class="panel-body">
                <form id="form1" action="<?php echo $htmlPath; ?>/src/process/auth/forgot-auth.process.php" role="form" autocomplete="off" class="form" method="post">

                  <div class="form-group">
                    <div class="input-group">
                      <!-- <i class='bx bxs-user'></i> -->
                      <input id="password" name="password" style="margin-bottom:5px;" placeholder="Password" class="form-control" type="text">
                      <small></small>
                      <!-- <i class='bx bxs-user'></i> -->
                    <input id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="form-control" type="text">
                    <small></small>
                  </div>
              </div>
              <div class="form-group">
                <input name="password-reset-token" id="validate" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
              </div>
              <input type="hidden" name="reset_link_token" value=" <?php echo $token; ?>">
              <input type="hidden" name="key" value="<?php echo $key; ?>">
              <!-- <input type="hidden" class="hide" name="token" id="token" value=""> -->
              </form>
            <?php } else { ?>
              <h2 class="text-center">Forgot Password?</h2>
              <p>You can reset your password here.</p>
              <div class="panel-body">
                <form id="form2" action="<?php echo $htmlPath; ?>/src/process/auth/forgot-auth.process.php" role="form" autocomplete="off" class="form" method="post">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                      <input id="email" name="email" placeholder="email address" class="form-control" type="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <input name="password-reset-token" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                  </div>

                  <input type="hidden" class="hide" name="token" id="token" value="">
                </form>
              <?php } ?>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  
  const form = document.getElementById('validate');
  const password = document.getElementById('password');
  const password2 = document.getElementById('confirm-password');

  //Show input error messages
  function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'input-group error';
    const small = formControl.querySelector('small');
    small.innerText = message;
  }

  //show success colour
  function showSucces(input) {
    const formControl = input.parentElement;
    formControl.className = 'input-group success';
  }

  //check email is valid
  //checkRequired fields
  function checkRequired(inputArr) {
    var flag = false;
    inputArr.forEach(function(input) {
      if (input.value.trim() === '') {
        showError(input, `${getFieldName(input)} is required`)
        flag = false;
      } else {
        showSucces(input);
        flag = true;
      }
    });
    return flag;
  }

  function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

  //check input Length
  function checkLength(input, min, max) {
    if (input.value.length < min) {
      showError(input, `${getFieldName(input)} must be at least ${min} characters`);
    } else if (input.value.length > max) {
      showError(input, `${getFieldName(input)} must be les than ${max} characters`);
    } else {
      showSucces(input);
      return true;
    }
  }

  // check passwords match
  function checkPasswordMatch(input1, input2) {
    if (input1.value !== input2.value) {
      showError(input2, 'Passwords do not match');
    } else {
      return true;
    }
  }

  function checkPassword(input1) {
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    if (!input1.value.match(lowerCaseLetters) || !input1.value.match(upperCaseLetters) || !input1.value.match(numbers)) {
      showError(input1, 'password must contain at least 1 upper an lower letters and digits');
    } else {
      showSucces(input1);
      return true;
    }
  }
  //Event Listeners
 
  form.onclick = function(e) {
    // console.log(checkRequired([username, email, password, password2]));
   
    if (checkRequired([password, password2]) &&
      checkPassword(password) &&
      checkLength(password, 8, 25) &&
      checkPasswordMatch(password, password2)
    ) {
      return true;
    } else {
    e.preventDefault();
    console.log("Hellow");
    }

};
</script>