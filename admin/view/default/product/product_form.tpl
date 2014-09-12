{$header}
<div id="content">
  <div class="breadcrumb">
    {foreach from=$breadcrumbs item=breadcrumb}
      {$breadcrumb['separator']}<a href="{$breadcrumb['href']}">{$breadcrumb['text']}</a>
    {/foreach}
  </div>
  {if $error_warning}
  <div class="warning">{$langs['error_warning']}</div>
  {/if}
  <div class="box">
    <div class="heading">
      <h1>
        <img src="{$smarty.const.IMAGE}product.png" alt="" /> {$langs['heading_title']}</h1>
      <div class="buttons">
      </div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs">
        <a href="#tab-general">{$langs['tab_general']}</a>
        <a href="#tab-data">{$langs['tab_data']}</a>
        <a href="#tab-attribute">{$langs['tab_attribute']}</a>
        <a href="#tab-option">{$langs['tab_option']}</a>
        <a href="#tab-image">{$langs['tab_image']}</a>
      </div>
      <form action="{$action}" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
          <div id="languages" class="htabs">
            {foreach from=$languages item=language}
              <a href="#language{$language['language_id']}">
              <img src="view/image/flags/{$language['image']}" title="{$language['name']}" /> {$language['name']}</a>
            {/foreach}
          </div>
          {foreach from=$languages item=language}
            <div id="language{$language['language_id']}">
              <table class="form">
                <tr>
                  <td><span class="required">*</span> {$langs['entry_name']}</td>
                  <td><input type="text" name="product_description[{$language['language_id']}][name]" size="100" value="" />
                    {if $error_name[$language['language_id']]}
                    <span class="error">{$error_name[$language['language_id']]}</span>
                    {/if}</td>
                </tr>
                <tr>
                  <td>{$langs['entry_meta_description']}</td>
                  <td><textarea name="product_description[{$language['language_id']}][meta_description]" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                  <td>{$langs['entry_meta_keyword']}</td>
                  <td><textarea name="product_description[{$language['language_id']}][meta_keyword]" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                  <td>{$langs['entry_description']}</td>
                  <td><textarea name="product_description[{$language['language_id']}][description]" id="description{$language['language_id']}"></textarea></td>
                </tr>
                <tr>
                  <td>{$langs['entry_tag']}</td>
                  <td><input type="text" name="product_description[{$language['language_id']}][tag]" value="" size="80" /></td>
                </tr>
              </table>
            </div>
          {/foreach}
        </div>
        <div id="tab-data">
          <table class="form">
            <tr>
              <td><span class="required">*</span> {$langs['entry_model']}</td>
              <td><input type="text" name="model" value="{$model}" />
                {if $error_model}
                <span class="error">{$langs['error_model']}</span>
                {/if}</td>
            </tr>
            <tr>
              <td>{$langs['entry_sku']}</td>
              <td><input type="text" name="sku" value="{$sku}" /></td>
            </tr>
            <tr>
                <td>{$langs['entry_price']}</td>
                <td><input type="text" name="price" value="{$price}" /></td>
            </tr>
            <tr>
              <td>{$langs['entry_tax_class']}</td>
              <td><select name="tax_class_id">
                  <option value="0">{$langs['text_none']}</option>
                  {foreach from=$tax_classes item=tax_class}
                    {if $tax_class['tax_class_id'] == $tax_class_id}
                      <option value="{$tax_class['tax_class_id']}" selected="selected">{$tax_class['title']}</option>
                    {else}
                      <option value="{$tax_class['tax_class_id']}">{$tax_class['title']}</option>
                    {/if}
                  {/foreach}
                </select></td>
            </tr>
            <tr>
              <td>{$langs['entry_quantity']}</td>
              <td><input type="text" name="quantity" value="{$quantity}" size="2" /></td>
            </tr>
            <tr>
              <td>{$langs['entry_minimum']}</td>
              <td><input type="text" name="minimum" value="{$minimum}" size="2" /></td>
            </tr>
            <tr>
              <td>{$langs['entry_subtract']}</td>
              <td><select name="subtract">
                  {if $subtract}
                  <option value="1" selected="selected">{$langs['text_yes']}</option>
                  <option value="0">{$langs['text_no']}</option>
                  {else}
                  <option value="1">{$langs['text_yes']}</option>
                  <option value="0" selected="selected">{$langs['text_no']}</option>
                  {/if}
                </select></td>
            </tr>
            <tr>
              <td>{$langs['entry_stock_status']}</td>
              <td>
                <select name="stock_status_id">
                  {foreach from=$stock_statuses item=stock_status}
                    {if $stock_status['stock_status_id'] == $stock_status_id}
                      <option value="{$stock_status['stock_status_id']}" selected="selected">{$stock_status['name']}</option>
                    {else}
                      <option value="{$stock_status['stock_status_id']}">{$stock_status['name']}</option>
                    {/if}
                  {/foreach}
                </select>
              </td>
            </tr>
            <tr>
              <td>{$langs['entry_shipping']}</td>
              <td>{if $shipping}
                <input type="radio" name="shipping" value="1" checked="checked" />
                {$langs['text_yes']}
                <input type="radio" name="shipping" value="0" />
                {$langs['text_no']}
                {else}
                <input type="radio" name="shipping" value="1" />
                {$langs['text_yes']}
                <input type="radio" name="shipping" value="0" checked="checked" />
                {$langs['text_no']}
                {/if}</td>
            </tr>
            <tr>
              <td>{$langs['entry_keyword']}</td>
              <td><input type="text" name="keyword" value="{$keyword}" /></td>
            </tr>
            <tr>
              <td>{$langs['entry_image']}</td>
              <td>
                <div class="image"><img src="{$thumb}" alt="" id="thumb" /><br />
                  <input type="hidden" name="image" value="{$image}" id="image" />
                </div>
              </td>
            </tr>
            <tr>
              <td>{$langs['entry_date_available']}</td>
              <td><input type="text" name="date_available" value="{$date_available}" size="12" class="date" /></td>
            </tr>
            <tr>
              <td>{$langs['entry_status']}</td>
              <td><select name="status">
                  {if $status}
                  <option value="1" selected="selected">{$langs['text_enabled']}</option>
                  <option value="0">{$langs['text_disabled']}</option>
                  {else}
                  <option value="1">{$langs['text_enabled']}</option>
                  <option value="0" selected="selected">{$langs['text_disabled']}</option>
                  {/if}
                </select></td>
            </tr>
            <tr>
              <td>{$langs['entry_sort_order']}</td>
              <td><input type="text" name="sort_order" value="{$sort_order}" size="2" /></td>
            </tr>
          </table>
        </div>
        <div id="tab-links">
          <table class="form">
            <tr>
              <td>{$langs['entry_manufacturer']}</td>
              <td>
                <input type="text" name="manufacturer" value="{$manufacturer}" />
                <input type="hidden" name="manufacturer_id" value="{$manufacturer_id}" />
              </td>
            </tr>
            <tr>
              <td>{$langs['entry_category']}</td>
              <td><input type="text" name="category" value="" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td></td>
            </tr> 
            <tr>
              <td>{$langs['entry_store']}</td>
              <td></td>
            </tr>
          </table>
        </div>
        <div id="tab-attribute">
          <table id="attribute" class="list">
            <thead>
              <tr>
                <td class="left">{$langs['entry_attribute']}</td>
                <td class="left">{$langs['entry_text']}</td>
                <td></td>
              </tr>
            </thead>
            {foreach from=$product_attributes item=product_attribute}
            <tbody id="attribute-row{$langs['attribute_row']}">
              <tr>
                <td class="left"><input type="text" name="product_attribute[{$attribute_row}][name]" value="{$product_attribute['name']}" />
                  <input type="hidden" name="product_attribute[{$attribute_row}][attribute_id]" value="{$product_attribute['attribute_id']}" /></td>
                <td class="left">
                  {foreach from=$languages item=language}
                  <textarea name="product_attribute[{$attribute_row}][product_attribute_description][{$language['language_id']}][text]" cols="40" rows="5"></textarea>
                  <img src="view/image/flags/{$language['image']}" title="{$language['name']}" align="top" /><br />
                  {/foreach}
                </td>
                <td class="left">
                  <a></a>
                </td>
              </tr>
            </tbody>
            {/foreach}
            <tfoot>
              <tr>
                <td colspan="2"></td>
                <td class="left"><a></a></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
$.widget('custom.catcomplete', $.ui.autocomplete, {
	_renderMenu: function(ul, items) {
		var self = this, currentCategory = '';
		
		$.each(items, function(index, item) {
			if (item.category != currentCategory) {
				ul.append('<li class="ui-autocomplete-category">' + item.category + '</li>');
				
				currentCategory = item.category;
			}
			
			self._renderItem(ul, item);
		});
	}
});

// Manufacturer
$('input[name=\'manufacturer\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/manufacturer/autocomplete&token={$token}&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.manufacturer_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('input[name=\'manufacturer\']').attr('value', ui.item.label);
		$('input[name=\'manufacturer_id\']').attr('value', ui.item.value);
	
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

// Category
$('input[name=\'category\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/category/autocomplete&token={$token}&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.category_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('#product-category' + ui.item.value).remove();
		
		$('#product-category').append('<div id="product-category' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="product_category[]" value="' + ui.item.value + '" /></div>');

		$('#product-category div:odd').attr('class', 'odd');
		$('#product-category div:even').attr('class', 'even');
				
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

$('#product-category div img').live('click', function() {
	$(this).parent().remove();
	
	$('#product-category div:odd').attr('class', 'odd');
	$('#product-category div:even').attr('class', 'even');	
});

// Filter
$('input[name=\'filter\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/filter/autocomplete&token={$token}&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.filter_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('#product-filter' + ui.item.value).remove();
		
		$('#product-filter').append('<div id="product-filter' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="product_filter[]" value="' + ui.item.value + '" /></div>');

		$('#product-filter div:odd').attr('class', 'odd');
		$('#product-filter div:even').attr('class', 'even');
				
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

$('#product-filter div img').live('click', function() {
	$(this).parent().remove();
	
	$('#product-filter div:odd').attr('class', 'odd');
	$('#product-filter div:even').attr('class', 'even');	
});

// Downloads
$('input[name=\'download\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/download/autocomplete&token={$token}&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.download_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('#product-download' + ui.item.value).remove();
		
		$('#product-download').append('<div id="product-download' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="product_download[]" value="' + ui.item.value + '" /></div>');

		$('#product-download div:odd').attr('class', 'odd');
		$('#product-download div:even').attr('class', 'even');
				
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

$('#product-download div img').live('click', function() {
	$(this).parent().remove();
	
	$('#product-download div:odd').attr('class', 'odd');
	$('#product-download div:even').attr('class', 'even');	
});

// Related
$('input[name=\'related\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token={$token}&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.product_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('#product-related' + ui.item.value).remove();
		
		$('#product-related').append('<div id="product-related' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="product_related[]" value="' + ui.item.value + '" /></div>');

		$('#product-related div:odd').attr('class', 'odd');
		$('#product-related div:even').attr('class', 'even');
				
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

$('#product-related div img').live('click', function() {
	$(this).parent().remove();
	
	$('#product-related div:odd').attr('class', 'odd');
	$('#product-related div:even').attr('class', 'even');	
});
//--></script> 

<script type="text/javascript"><!--	
var option_row = {$option_row};

$('input[name=\'option\']').catcomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/option/autocomplete&token={$token}&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						category: item.category,
						label: item.name,
						value: item.option_id,
						type: item.type,
						option_value: item.option_value
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		html  = '<div id="tab-option-' + option_row + '" class="vtabs-content">';
		html += '	<input type="hidden" name="product_option[' + option_row + '][product_option_id]" value="" />';
		html += '	<input type="hidden" name="product_option[' + option_row + '][name]" value="' + ui.item.label + '" />';
		html += '	<input type="hidden" name="product_option[' + option_row + '][option_id]" value="' + ui.item.value + '" />';
		html += '	<input type="hidden" name="product_option[' + option_row + '][type]" value="' + ui.item.type + '" />';
		html += '	<table class="form">';
		html += '	  <tr>';
		html += '		<td>{$entry_required}</td>';
		html += '       <td><select name="product_option[' + option_row + '][required]">';
		html += '	      <option value="1">{$text_yes}</option>';
		html += '	      <option value="0">{$text_no}</option>';
		html += '	    </select></td>';
		html += '     </tr>';
		
		if (ui.item.type == 'text') {
			html += '     <tr>';
			html += '       <td>{$entry_option_value}</td>';
			html += '       <td><input type="text" name="product_option[' + option_row + '][option_value]" value="" /></td>';
			html += '     </tr>';
		}
		
		if (ui.item.type == 'textarea') {
			html += '     <tr>';
			html += '       <td>{$entry_option_value}</td>';
			html += '       <td><textarea name="product_option[' + option_row + '][option_value]" cols="40" rows="5"></textarea></td>';
			html += '     </tr>';						
		}
		 
		if (ui.item.type == 'file') {
			html += '     <tr style="display: none;">';
			html += '       <td>{$entry_option_value}</td>';
			html += '       <td><input type="text" name="product_option[' + option_row + '][option_value]" value="" /></td>';
			html += '     </tr>';			
		}
						
		if (ui.item.type == 'date') {
			html += '     <tr>';
			html += '       <td>{$entry_option_value}</td>';
			html += '       <td><input type="text" name="product_option[' + option_row + '][option_value]" value="" class="date" /></td>';
			html += '     </tr>';			
		}
		
		if (ui.item.type == 'datetime') {
			html += '     <tr>';
			html += '       <td>{$entry_option_value}</td>';
			html += '       <td><input type="text" name="product_option[' + option_row + '][option_value]" value="" class="datetime" /></td>';
			html += '     </tr>';			
		}
		
		if (ui.item.type == 'time') {
			html += '     <tr>';
			html += '       <td>{$entry_option_value}</td>';
			html += '       <td><input type="text" name="product_option[' + option_row + '][option_value]" value="" class="time" /></td>';
			html += '     </tr>';			
		}
		
		html += '  </table>';
			
		if (ui.item.type == 'select' || ui.item.type == 'radio' || ui.item.type == 'checkbox' || ui.item.type == 'image') {
			html += '  <table id="option-value' + option_row + '" class="list">';
			html += '  	 <thead>'; 
			html += '      <tr>';
			html += '        <td class="left">{$entry_option_value}</td>';
			html += '        <td class="right">{$entry_quantity}</td>';
			html += '        <td class="left">{$entry_subtract}</td>';
			html += '        <td class="right">{$entry_price}</td>';
			html += '        <td class="right">{$entry_option_points}</td>';
			html += '        <td class="right">{$entry_weight}</td>';
			html += '        <td></td>';
			html += '      </tr>';
			html += '  	 </thead>';
			html += '    <tfoot>';
			html += '      <tr>';
			html += '        <td colspan="6"></td>';
			html += '        <td class="left"><a onclick="addOptionValue(' + option_row + ')}</a></td>';
			html += '      </tr>';
			html += '    </tfoot>';
			html += '  </table>';
            html += '  <select id="option-values' + option_row + '" style="display: none;">';
			
            for (i = 0; i < ui.item.option_value.length; i++) {
				html += '  <option value="' + ui.item.option_value[i]['option_value_id'] + '">' + ui.item.option_value[i]['name'] + '</option>';
            }

            html += '  </select>';			
			html += '</div>';	
		}
		
		$('#tab-option').append(html);
		
		$('#option-add').before('<a href="#tab-option-' + option_row + '" id="option-' + option_row + '">' + ui.item.label + '&nbsp;<img src="view/image/delete.png" alt="" onclick="$(\'#option-' + option_row + '\').remove(); $(\'#tab-option-' + option_row + '\').remove(); $(\'#vtab-option a:first\').trigger(\'click\'); return false;" /></a>');
		
		$('#vtab-option a').tabs();
		
		$('#option-' + option_row).trigger('click');		
				
		option_row++;
		
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});
//--></script> 

<script type="text/javascript"><!--

$('#vtab-option a').tabs();

//--></script>

{$footer}