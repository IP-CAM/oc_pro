<?php
// Heading
$langs['heading_title']        = 'Currency';  

// Text
$langs['text_success']         = 'Success: You have modified currencies!';

// Column
$langs['column_title']         = 'Currency Title';
$langs['column_code']          = 'Code'; 
$langs['column_value']         = 'Value';
$langs['column_date_modified'] = 'Last Updated';
$langs['column_action']        = 'Action';

// Entry
$langs['entry_title']          = 'Currency Title:';
$langs['entry_code']           = 'Code:<br /><span class="help">Do not change if this is your default currency. Must be valid <a href="http://www.xe.com/iso4217.php" target="_blank">ISO code</a>.</span>';
$langs['entry_value']          = 'Value:<br /><span class="help">Set to 1.00000 if this is your default currency.</span>';
$langs['entry_symbol_left']    = 'Symbol Left:';
$langs['entry_symbol_right']   = 'Symbol Right:';
$langs['entry_decimal_place']  = 'Decimal Places:';
$langs['entry_status']         = 'Status:';

// Error
$langs['error_permission']     = 'Warning: You do not have permission to modify currencies!';
$langs['error_title']          = 'Currency Title must be between 3 and 32 characters!';
$langs['error_code']           = 'Currency Code must contain 3 characters!';
$langs['error_default']        = 'Warning: This currency cannot be deleted as it is currently assigned as the default store currency!';
$langs['error_store']          = 'Warning: This currency cannot be deleted as it is currently assigned to %s stores!';
$langs['error_order']          = 'Warning: This currency cannot be deleted as it is currently assigned to %s orders!';
?>