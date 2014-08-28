<?php
// Heading
$langs['heading_title']             = 'Customer Group';

// Text
$langs['text_success']              = 'Success: You have modified customer groups!';

// Column
$langs['column_name']               = 'Customer Group Name';
$langs['column_sort_order']         = 'Sort Order';
$langs['column_action']             = 'Action';

// Entry
$langs['entry_name']                = 'Customer Group Name:';
$langs['entry_description']         = 'Description:';
$langs['entry_approval']            = 'Approve New Customers:<br /><span class="help">Customers must be approved by and administrator before they can login.</span>';
$langs['entry_company_id_display']  = 'Display Company No.:<br /><span class="help">Display a company no. field.</span>';
$langs['entry_company_id_required'] = 'Company No. Required:<br /><span class="help">Select which customer groups must enter their company no. for billing addresses before checkout.</span>';
$langs['entry_tax_id_display']      = 'Display Tax ID.:<br /><span class="help">Display a Tax ID. field for billing addresses.</span>';
$langs['entry_tax_id_required']     = 'Tax ID Required:<br /><span class="help">Select which customer groups must enter their Tax ID for billing addresses before checkout.</span>';
$langs['entry_sort_order']          = 'Sort Order:';

// Error
$langs['error_permission']          = 'Warning: You do not have permission to modify customer groups!';
$langs['error_name']                = 'Customer Group Name must be between 3 and 32 characters!';
$langs['error_default']             = 'Warning: This customer group cannot be deleted as it is currently assigned as the default store customer group!';
$langs['error_store']               = 'Warning: This customer group cannot be deleted as it is currently assigned to %s stores!';
$langs['error_customer']            = 'Warning: This customer group cannot be deleted as it is currently assigned to %s customers!';
?>