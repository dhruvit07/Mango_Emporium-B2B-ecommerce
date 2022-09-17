<?php
require $_SERVER['DOCUMENT_ROOT']  .  '/project-1/includes/path-config.inc.php';
?>

<div class="sidebar-contact">
    <div class="toggle"></div>
    <h2>Inquiry Form</h2>
    <div class="scroll">
        <form action="<?php echo $htmlPath ?>/src/process/inquiry.process.php" method="post">
            <input type="email" name="email" <?php echo $formFillUp == "" ? "" :  'readonly="readonly"'; ?> value="<?php echo $formFillUp == "" ? "" : $formFillUp['u_email'] ?>"  placeholder="Email">
            <input type="rel" name="number" <?php echo $formFillUp == "" ? "" :  'readonly="readonly"'; ?> value="<?php echo $formFillUp == "" ? "" : $formFillUp['u_contact'] ?>"  placeholder="Phone Number">
            <textarea name="description" rows="3" placeholder="Please include product name, order quantity, usage, special requests if any in your inquiry."></textarea>
            <input type="submit" name="direct-inquiry" value="send">
        </form>
    </div>
</div>