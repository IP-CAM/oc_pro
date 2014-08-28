{$header}
<div id="content">
  <div class="breadcrumb">
    {foreach from=$breadcrumbs item=$breadcrumb}
      {$breadcrumb['separator']}<a href="{$breadcrumb['href']}">{$breadcrumb['text']}</a>
    {/foreach}
  </div>
  {if $error_warning}
    <div class="warning">{$langs['error_warning']}</div>
  {/if}
  {if $success}
    <div class="success">{$langs['success']}</div>
  {/if}
  <div class="box">
    <div class="heading">
      <h1><img src="{$smarty.const.IMAGE}product.png" alt="" /> {$langs['heading_title']}</h1>
      <div class="buttons">
        <a href="{$insert}" class="button">{$langs['button_insert']}</a>
      </div>
    </div>
    <div class="content">
      <form action="{$delete}" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;">
                <input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" />
              </td>
              <td class="center">{$langs['column_image']}</td>
              <td class="left">
                {if $sort == 'pd.name'}
                  <a href="{$sort_name}" class="{strtolower($order)}">{$langs['column_name']}</a>
                {else}
                  <a href="{$sort_name}">{$langs['column_name']}</a>
                {/if}
              </td>
              <td class="left">
                {if $sort == 'p.model'}
                  <a href="{$sort_model}" class="{strtolower($order)}">{$langs['column_model']}</a>
                {else}
                  <a href="{$sort_model}">{$langs['column_model']}</a>
                {/if}
              </td>
              <td class="left">
                {if $sort == 'p.price'}
                  <a href="{$sort_price}" class="{strtolower($order)}">{$langs['column_price']}</a>
                {else}
                  <a href="{$sort_price}">{$langs['column_price']}</a>
                {/if}
              </td>
              <td class="right">
                {if $sort == 'p.quantity'}
                  <a href="{$sort_quantity}" class="{strtolower($order)}">{$langs['column_quantity']}</a>
                {else}
                  <a href="{$sort_quantity}">{$langs['column_quantity']}</a>
                {/if}
              </td>
              <td class="left">
                {if $sort == 'p.status'}
                  <a href="{$sort_status}" class="{strtolower($order)}">{$langs['column_status']}</a>
                {else}
                  <a href="{$sort_status}">{$langs['column_status']}</a>
                {/if}
              </td>
              <td class="right">{$column_action}</td>
            </tr>
          </thead>
          <tbody>
            <tr class="filter">
              <td></td>
              <td></td>
              <td><input type="text" name="filter_name" value="{$filter_name}" /></td>
              <td><input type="text" name="filter_model" value="{$filter_model}" /></td>
              <td align="left"><input type="text" name="filter_price" value="{$filter_price}" size="8"/></td>
              <td align="right"><input type="text" name="filter_quantity" value="{$filter_quantity}" style="text-align: right;" /></td>
              <td>
                <select name="filter_status">
                  <option value="*"></option>
                  {if $filter_status}
                    <option value="1" selected="selected">{$langs['text_enabled']}</option>
                  {else}
                    <option value="1">{$langs['text_enabled']}</option>
                  {/if}
                  {if $filter_status}
                    <option value="0" selected="selected">{$langs['text_disabled']}</option>
                  {else}
                    <option value="0">{$langs['text_disabled']}</option>
                  {/if}
                </select>
              </td>
              <td align="right"><a onclick="filter()"></a></td>
            </tr>
            {if $products}
              {foreach from=$products item=product}
                <tr>
                  <td style="text-align: center;">
                    <input type="checkbox" name="selected[]" value="{$product['product_id']}" />
                  <td class="center">
                    <img src="{$product['image']}" alt="{$product['name']}" style="padding: 1px; border: 1px solid #DDDDDD;" />
                  </td>
                  <td class="left">{$product['title']}</td>
                  <td class="left">{$product['model']}</td>
                  <td class="left">
                    <span style="text-decoration: line-through"></span><br/>
                    <span style="color: #b00"></span>
                    {$product['price']}
                  </td>
                  <td class="right">
                    {if $product['quantity'] <= 0}
                      <span style="color: #FF0000"></span>
                    {else if $product['quantity'] <= 5}
                      <span style="color: #FFA500"></span>
                    {else}
                      <span style="color: #008000"></span>
                    {/if}
                  </td>
                  <td class="left">{$product['status']}</td>
                  <td class="right">
                  </td>
                </tr>
              {/foreach}
            {else}
              <tr>
                <td class="center" colspan="8">{$langs['text_no_results']}</td>
              </tr>
            {/if}
          </tbody>
        </table>
      </form>
      <div class="pagination">{$langs['pagination']}</div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
function filter() {
	url = 'index.php?route=catalog/product&token={$token}';
	
	var filter_name = $('input[name=\'filter_name\']').attr('value');
	
	if (filter_name) {
		url += '&filter_name=' + encodeURIComponent(filter_name);
	}
	
	var filter_model = $('input[name=\'filter_model\']').attr('value');
	
	if (filter_model) {
		url += '&filter_model=' + encodeURIComponent(filter_model);
	}
	
	var filter_price = $('input[name=\'filter_price\']').attr('value');
	
	if (filter_price) {
		url += '&filter_price=' + encodeURIComponent(filter_price);
	}
	
	var filter_quantity = $('input[name=\'filter_quantity\']').attr('value');
	
	if (filter_quantity) {
		url += '&filter_quantity=' + encodeURIComponent(filter_quantity);
	}
	
	var filter_status = $('select[name=\'filter_status\']').attr('value');
	
	if (filter_status != '*') {
		url += '&filter_status=' + encodeURIComponent(filter_status);
	}	

	location = url;
}
//--></script> 
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		filter();
	}
});
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'filter_name\']').autocomplete({
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
		$('input[name=\'filter_name\']').val(ui.item.label);
						
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});

$('input[name=\'filter_model\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token={$token}&filter_model=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.model,
						value: item.product_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('input[name=\'filter_model\']').val(ui.item.label);
						
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});
//--></script> 
{$footer}