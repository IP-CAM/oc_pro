<?php
// Heading
$langs['heading_title']                = 'Settings';

// Text
$langs['text_success']                 = 'Success: You have modified settings!';
$langs['text_items']                   = 'Items';
$langs['text_tax']                     = 'Taxes';
$langs['text_account']                 = 'Account';
$langs['text_checkout']                = 'Checkout';
$langs['text_stock']                   = 'Stock';
$langs['text_image_manager']           = 'Image Manager';
$langs['text_browse']                  = 'Browse';
$langs['text_clear']                   = 'Clear';
$langs['text_shipping']                = 'Shipping Address';
$langs['text_payment']                 = 'Payment Address';

// Column
$langs['column_name']                  = 'Store Name';
$langs['column_url']	               = 'Store URL';
$langs['column_action']                = 'Action';

$langs['text_setting']				   = 'Setting';

// Entry
$langs['entry_url']                    = 'Store URL:<br /><span class="help">Include the full URL to your store. Make sure to add \'/\' at the end. Example: http://www.yourdomain.com/path/<br /><br />Don\'t use directories to create a new store. You should always point another domain or sub domain to your hosting.</span>';
$langs['entry_ssl']                    = 'SSL URL:<br /><span class="help">SSL URL to your store. Make sure to add \'/\' at the end. Example: http://www.yourdomain.com/path/<br /><br />Don\'t use directories to create a new store. You should always point another domain or sub domain to your hosting.</span>';
$langs['entry_name']                   = 'Store Name:';
$langs['entry_owner']                  = 'Store Owner:';
$langs['entry_address']                = 'Address:';
$langs['entry_email']                  = 'E-Mail:';
$langs['entry_telephone']              = 'Telephone:';
$langs['entry_fax']                    = 'Fax:';
$langs['entry_title']                  = 'Title:';
$langs['entry_meta_description']       = 'Meta Tag Description:';
$langs['entry_layout']                 = 'Default Layout:';
$langs['entry_template']               = 'Template:';
$langs['entry_country']                = 'Country:';
$langs['entry_zone']                   = 'Region / State:';
$langs['entry_language']               = 'Language:';
$langs['entry_currency']               = 'Currency:';
$langs['entry_catalog_limit'] 	       = 'Default Items Per Page (Catalog):<br /><span class="help">Determines how many catalog items are shown per page (products, categories, etc)</span>';
$langs['entry_tax']                    = 'Display Prices With Tax:';
$langs['entry_tax_default']            = 'Use Store Tax Address:<br /><span class="help">Use the store address to calculate taxes if no one is logged in. You can choose to use the store address for the customers shipping or payment address.</span>';
$langs['entry_tax_customer']           = 'Use Customer Tax Address:<br /><span class="help">Use the customers default address when they login to calculate taxes. You can choose to use the default address for the customers shipping or payment address.</span>';
$langs['entry_customer_group']         = 'Customer Group:<br /><span class="help">Default customer group.</span>';
$langs['entry_customer_group_display'] = 'Customer Groups:<br /><span class="help">Display customer groups that new customers can select to use such as wholesale and business when signing up.</span>';
$langs['entry_customer_price']         = 'Login Display Prices:<br /><span class="help">Only show prices when a customer is logged in.</span>';
$langs['entry_account']                = 'Account Terms:<br /><span class="help">Forces people to agree to terms before an account can be created.</span>';
$langs['entry_cart_weight']            = 'Display Weight on Cart Page:';
$langs['entry_guest_checkout']         = 'Guest Checkout:<br /><span class="help">Allow customers to checkout without creating an account. This will not be available when a downloadable product is in the shopping cart.</span>';
$langs['entry_checkout']               = 'Checkout Terms:<br /><span class="help">Forces people to agree to terms before an a customer can checkout.</span>';
$langs['entry_order_status']           = 'Order Status:<br /><span class="help">Set the default order status when an order is processed.</span>';
$langs['entry_stock_display']          = 'Display Stock:<br /><span class="help">Display stock quantity on the product page.</span>';
$langs['entry_stock_checkout']         = 'Stock Checkout:<br /><span class="help">Allow customers to still checkout if the products they are ordering are not in stock.</span>';
$langs['entry_logo']                   = 'Store Logo:';
$langs['entry_icon']                   = 'Icon:<br /><span class="help">The icon should be a PNG that is 16px x 16px.</span>';
$langs['entry_image_category']         = 'Category Image Size:';
$langs['entry_image_thumb']            = 'Product Image Thumb Size:';
$langs['entry_image_popup']            = 'Product Image Popup Size:';
$langs['entry_image_product']          = 'Product Image List Size:';
$langs['entry_image_additional']       = 'Additional Product Image Size:';
$langs['entry_image_related']          = 'Related Product Image Size:';
$langs['entry_image_compare']          = 'Compare Image Size:';
$langs['entry_image_wishlist']         = 'Wish List Image Size:';
$langs['entry_image_cart']             = 'Cart Image Size:';
$langs['entry_secure']                 = 'Use SSL:<br /><span class="help">To use SSL check with your host if a SSL certificate is installed.</span>';

// Error
$langs['error_warning']                = 'Warning: Please check the form carefully for errors!';
$langs['error_permission']             = 'Warning: You do not have permission to modify stores!';
$langs['error_name']                   = 'Store Name must be between 3 and 32 characters!';
$langs['error_owner']                  = 'Store Owner must be between 3 and 64 characters!';
$langs['error_address']                = 'Store Address must be between 10 and 256 characters!';
$langs['error_email']                  = 'E-Mail Address does not appear to be valid!';
$langs['error_telephone']              = 'Telephone must be between 3 and 32 characters!';
$langs['error_url']                    = 'Store URL required!';
$langs['error_title']                  = 'Title must be between 3 and 32 characters!';
$langs['error_limit']       	       = 'Limit required!';
$langs['error_customer_group_display'] = 'You must include the default customer group if you are going to use this feature!';
$langs['error_image_thumb']            = 'Product Image Thumb Size dimensions required!';
$langs['error_image_popup']            = 'Product Image Popup Size dimensions required!';
$langs['error_image_product']          = 'Product List Size dimensions required!';
$langs['error_image_category']         = 'Category List Size dimensions required!';
$langs['error_image_additional']       = 'Additional Product Image Size dimensions required!';
$langs['error_image_related']          = 'Related Product Image Size dimensions required!';
$langs['error_image_compare']          = 'Compare Image Size dimensions required!';
$langs['error_image_wishlist']         = 'Wish List Image Size dimensions required!';
$langs['error_image_cart']             = 'Cart Image Size dimensions required!';
$langs['error_default']                = 'Warning: You can not delete your default store!';
$langs['error_store']                  = 'Warning: This Store cannot be deleted as it is currently assigned to %s orders!';
?>