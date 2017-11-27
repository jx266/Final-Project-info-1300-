<?php
// Stores the name of the class for hidden error messages
$HIDDEN_ERROR_CLASS = "hiddenError";

// when the user submits a form
$submit = $_REQUEST["submit"];
if (isset($submit)) {
  // log to the PHP console
  error_log("user submitted form");

  // Handle first name
  $firstName = $_REQUEST["firstName"];
  // if the first name field is not empty:
  if ( !empty($firstName) ) {
    // the first name is valid
    $fnameValid = true;
  } else {
    // the first name is not valid
    $fnameValid = false;
  }

  // Handle last name
  $lastName = $_REQUEST["lastName"];
  if ( !empty($lastName) ) {
    $lnameValid = true;
  } else {
    $lnameValid = false;
  }

  // Handle email
  $email = $_REQUEST["userEmail"];
  if ( !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) ) {
    $emailValid = true;
  } else {
    $emailValid = false;
  }


  // the form is valid if the first name (and last name and email) is valid.
  $formValid = $fnameValid && $lnameValid && $emailValid;

  // if valid, allow submission
  if ($formValid) {
    // create session to pass values to redirected page
    session_start();
    $_SESSION['fname'] = $firstName;
    $_SESSION['lname'] = $lastName;
    $_SESSION['email'] = $email;

    // redirect to formSubmitted.php
    header("Location: formSub.php");
    return;
  }
} else {
  // log to the PHP console
  error_log("no form submitted");

  // no form submitted
  $fnameValid = true;
  $lnameValid = true;
  $emailValid = true;
}
?>

<?php include("includes/header.php"); ?>
<div id="mainContent">
  <div class="fbContent">
    <h1>Questionaire</h1>

    <h3>Your opinion is very important for us!</h3>

    <h3>Please fill the form so that we can be better!</h3>

    <form method="post" action="forms.php" id="mainForm" novalidate>

      <div class="labelAndInputHolder">
        <div class="labelHolder">
          <label for="firstName">First Name: </label>
        </div>
        <div class="inputHolder">
          <input id="firstName" name="firstName" placeholder="First name" value="<?php echo($firstName);?>" required>
        </div>
        <span class="errorContainer <?php if ($fnameValid) { echo($HIDDEN_ERROR_CLASS); } ?>" id="fnameError">
          First name is required.
        </span>
      </div>

      <div class="labelAndInputHolder">
        <div class="labelHolder">
          <label for="lastName">Last Name: </label>
        </div>
        <div class="inputHolder">
          <input id="lastName" name="lastName" placeholder="Last name" value="<?php echo($lastName);?>" required>
        </div>
        <span class="errorContainer <?php if ($lnameValid) { echo($HIDDEN_ERROR_CLASS); } ?>" id="lnameError">
          Last name is required.
        </span>
      </div>

      <div class="labelAndInputHolder">
        <div class="labelHolder">
          <label for="userEmail">Email: </label>
        </div>
        <div class="inputHolder">
          <input type="email" id="userEmail" name="userEmail" placeholder="Your Email" value="<?php echo($email);?>" required>
        </div>
        <span class="errorContainer <?php if ($emailValid) { echo($HIDDEN_ERROR_CLASS); } ?>" id="emailErrorNoEmail">
          Valid email required.
        </span>
      </div>


      <div class = "labelAndInputHolder2">
        <div class = "labelHolder2"
          <label for ="level"> What level player are you?: </label>
        </div>
        <div class = "inputHolder">
          <input type = "radio" id = "level" name = "level" placeholder="Your Level" value = "Never Played"> Never Played
          <input type = "radio" id = "level" name = "level" placeholder="Your Level" value = "Beginner"> Beginner
          <input type = "radio" id = "level" name = "level" placeholder="Your Level" value = "Intermediate"> Intermediate
          <input type = "radio" id = "level" name = "level" placeholder="Your Level" value = "Advanced"> Advanced
        </div> <br> <br>

        <div class="labelAndInputHolder2">
          <div class="labelHolder2">
            <label for="why">Why are you interested in Poker?: </label>
          </div>
          <div class="inputHolder">
            <input type="text" id="why" name="why" placeholder="Why Poker" value="<?php echo($why);?>">
          </div>
        </div>




      <div class="labelAndInputHolder2">
        <div class="labelHolder2">
          <label for="feedback">How do you feel about our website? and why?: </label>
        </div>
        <div class="inputHolder">
          <input type="text" id="feedback" name="feedback" placeholder="Your feedback" value="<?php echo($feedback);?>">
        </div>
      </div>

      <div class="labelAndInputHolder2">
        <div class="labelHolder2">
          <label for="advice">Please give us some advice for improvement: </label>
        </div>
        <div class="inputHolder">
          <input type="text" id="advice" name="advice" placeholder="Advice" value="<?php echo($email);?>">
        </div>
      </div>

      <div id="buttonDiv">
        <button type="submit" name="submit" class="submit">Submit</button>
      </div>

    </form>

  </div>
</div>


</html>

<!-- Poker Photo Background Image: https://www.peppermillreno.com//library/images/backgrounds/gaming_poker_cards.jpg
-->
