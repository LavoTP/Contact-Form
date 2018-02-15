<?php
include_once 'contact.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link rel="stylesheet" href="style/contact.css">
</head>
<body>
    <h3>Contact us today, and get reply within 24 hours!</h3>

    <div class="container">
        <form class="form-contact" action="<?=htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" autocomplete="off">
            <fieldset>
                <input type="text" placeholder="Name" tabindex="1" value="<?= $name ?>" name="name">
                <span class="error"> <?= $name_error ?></span>
            </fieldset>
            <fieldset>
                <input type="text" placeholder="E-mail address" tabindex="2" value="<?= $email ?>" name="email">
                <span class="error"><?= $email_error ?></span>
            </fieldset>
            <fieldset>
                <input type="text" placeholder="Cell number" tabindex="3" value="<?= $tel ?>" name="tel">
                <span class="error"><?= $tel_error ?></span>
            </fieldset>
            <fieldset>
                <input type="text" placeholder="http:\\website" tabindex="4" value="<?= $url ?>" name="url">
                <span class="error"><?= $url_error ?></span>
            </fieldset>
            <fieldset>
              <select name="Subject" id="subject">
                    <option value="none" selected>Select Subject:</option>
                    <option value="services">General Customer</option>
                    <option value="suggestions">Suggestions</option>
                    <option value="product">Support</option>
                </select>
                </fieldset>
            <fieldset>
                <textarea type="text" placeholder="message..." name="message" tabindex="5" value="<?= $message ?>"></textarea>
            </fieldset>
            <fieldset>
                <button type="submit" id="contact" name="submit">Submit</button>
            </fieldset>
          <div class="success"><?= $success ?></div>
        </form>
    </div>

</body>
</html>
