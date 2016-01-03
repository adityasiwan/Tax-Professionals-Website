<?php
/**
 * Search-form Template
 *
 * @file           searchform.php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/appoinment/searchform.php
*/ 
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class=" search_btn"  name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'appointment' ); ?>" />
	<input type="submit" class=" btn appo_btn  search_btn" name="submit" value="<?php esc_attr_e( 'Search', 'appointment' ); ?>" />
</form>