<?php

//~ Template for add-edit.php
// variables:
//  $errors - validation errors
//  $todo - submitted TODO
//  $edit - true for EDIT, false for ADD
function error_field($title, array $errors) {
    foreach ($errors as $error) {
        /* @var $error Error */
        if ($error->getSource() == $title) {
            return ' error-field';
        }
    }
    return '';
}
/* @var $booking Booking */
?>

<h1>
    <?php if ($edit): ?>
        Edit&nbsp;
    <?php else: ?>
        Add&nbsp;
    <?php endif; ?>
       new Booking
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
            <label>Flight Name:</label>
            <select name="booking[flight_name]">
            <?php foreach ($flightNames as $flightName): ?>
                <option value="<?php echo $flightName; ?>"
                        <?php if ($booking->getFlightName() == $flightName): ?>
                            selected="selected"
                        <?php endif; ?>
                        ><?php echo $flightName; ?></option>
            <?php endforeach; ?>
            </select>
                
<!--            <select name="booking[flight_name]">    
                <option value="Helicopter Sightseeing">Helicopter Sightseeing</option>
                <option value="Glider">Glider</option>
                <option value="Tramping excursion">Tramping excursion</option>
                <option value="Heliskiing">Heliskiing</option>
            </select>-->
<!--            <input type="text" name="booking[flight_name]" value="<?php // echo Utils::escape($booking->getFlightName()); ?>"
                   class="text<?php // echo error_field('flight_name', $errors); ?>"/>-->
        
        <div class="field">
            <label>Date of Flight:</label>
            <input id="flight_date" type="text" name="booking[flight_date]" value="<?php echo Utils::escape($booking->getFlightDate()->format('Y-n-j')); ?>"
                   class="text datepicker<?php echo error_field('flight_date', $errors); ?>" </div>           
        <div class="wrapper">
            <input type="submit" name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
        </div>
    </fieldset>
</form>