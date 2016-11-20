<?php

function error_field($title, array $errors) {
    foreach ($errors as $error) {
        /* @var $error Error */
        if ($error->getSource() == $title) {
            return ' error-field';
        }
    }
    return '';
}
/* @var $user Booking */
//what the heck am i doing?!//
?>

<h1>
    Login
</h1>

<?php if (!empty($errors)): ?>
<ul class="errors">
    <?php foreach ($errors as $error): ?>
        <?php /* @var $error Error */ ?>
        <li><?php echo $error->getMessage(); ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="#" method="post">
    <fieldset>
        <div class="field">
            <label>First Name:</label>
            
            <input type="text" name="user[first_name]" value="<?php echo Utils::escape($user->getFirstName()); ?>"
                   class="text<?php echo error_field('first_name', $errors); ?>"/>
        </div>
       <div class="field">
            <label>Last Name:</label>
            
            <input type="text" name="user[last_name]" value="<?php echo Utils::escape($user->getLastName()); ?>"
                   class="text<?php echo error_field('last_name', $errors); ?>"/>
        </div>
        <div class="field">
            <label>Email:</label>
            
            <input type="text" name="user[email]" value="<?php echo Utils::escape($user->getEmail()); ?>"
                   class="text<?php echo error_field('email', $errors); ?>"/>
        </div>
        <div class="field">
            <label>Password:</label>
            
            <input type="password" name="user[password]" value="<?php echo Utils::escape($user->getPassword()); ?>"
                   class="text<?php echo error_field('password', $errors); ?>"/>
        </div>
        <div class="wrapper">
<!--            <input type="submit" name="cancel" value="CANCEL" class="submit" />-->
            <input type="submit" name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
        </div>
    </fieldset>
</form>
