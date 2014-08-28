{$header}
<div id="content">
  <div class="breadcrumb">
  </div>
  {if $error_warning}
    <div class="warning">{$error_warning}</div>
  {/if}
  <div class="box">
    <div class="heading">
      <h1><img src="{$smarty.const.IMAGE}category.png" alt="" />{$langs['heading_title']}</h1>
      <div class="buttons"></div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs">
        <a href="#tab-general">{$langs['tab_general']}</a>
        <a href="#tab-data">{$langs['tab_data']}</a>
        <a href="#tab-design">{$langs['tab_design']}</a>
      </div>
      <form action="{$action}" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
          <div id="languages" class="htabs">
            {foreach from=$languages item=language}
              <a href="#language{$language['language_id']}">
                <img src="view/image/flags/{$language['image']}" title="{$language['name']}" /> 
                {$language['name']}
              </a>
            {/foreach}
          </div>
          {foreach from=$languages item=language}
            <div id="language{$language['language_id']}">
              <table class="form">
                <tr>
                  <td><span class="required">*</span> {$langs['entry_name']}</td>
                  <td><input type="text" name="category_description[{$language['language_id']}][name]" size="100" value="" />
                    {if $error_name[$language['language_id']]}
                     <span class="error">{$error_name[$language['language_id']]}</span>
                    {/if}
                  </td>
                </tr>
                <tr>
                  <td>{$langs['entry_meta_description']}</td>
                  <td>
                    <textarea name="category_description[{$language['language_id']}][meta_description]" cols="40" rows="5"></textarea>
                  </td>
                </tr>
                <tr>
                  <td>{$langs['entry_meta_keyword']}</td>
                  <td>
                    <textarea name="category_description[{$language['language_id']}][meta_keyword]" cols="40" rows="5"></textarea>
                  </td>
                </tr>
                <tr>
                  <td>{$langs['entry_description']}</td>
                  <td>
                    <textarea name="category_description[{$language['language_id']}][description]" id="description{$language['language_id']}"></textarea>
                  </td>
                </tr>
              </table>
            </div>
          {/foreach}
        </div>
        <div id="tab-data">
          <table class="form">
            <tr>
              <td>{$langs['entry_parent']}</td>
              <td><input type="text" name="path" value="{$path}" size="100" />
                <input type="hidden" name="parent_id" value="{$parent_id}" /></td>
            </tr>
            <tr>
              <td>{$langs['entry_keyword']}</td>
              <td><input type="text" name="keyword" value="{$keyword}" /></td>
            </tr>
            <tr>
              <td>{$langs['entry_image']}</td>
              <td valign="top">
                <div class="image"><img src="{$thumb}" alt="" id="thumb" />
                  <input type="hidden" name="image" value="{$image}" id="image" />
                  <br />
                  <a></a>
                </div>
              </td>
            </tr>
            <tr>
              <td>{$langs['entry_top']}</td>
              <td>
                {if $top}
                  <input type="checkbox" name="top" value="1" checked="checked" />
                {else}
                  <input type="checkbox" name="top" value="1" />
                {/if}
              </td>
            </tr>
            <tr>
              <td>{$entry_sort_order}</td>
              <td><input type="text" name="sort_order" value="{$sort_order}" size="1" /></td>
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
          </table>
        </div>
        <div id="tab-design">
          <table class="list">
            <thead>
              <tr>
                <td class="left">{$langs['entry_store']}</td>
                <td class="left">{$langs['entry_layout']}</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="left">{$langs['text_default']}</td>
                <td class="left"><select name="category_layout[0][layout_id]">
                    <option value=""></option>
                    {foreach from=$layouts item=layout}
                      {if $category_layout[0]}
                        <option value="{$layout['layout_id']}" selected="selected">{$layout['name']}</option>
                      {else}
                        <option value="{$layout['layout_id']}">{$layout['name']}</option>
                      {/if}
                    {/foreach}
                  </select></td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <td class="left">{$store['name']}</td>
                <td class="left"><select name="category_layout[{$store['store_id']}][layout_id]">
                    <option value=""></option>
                    {foreach from=$layouts item=layout}
                      {if $category_layout[$store['store_id']]}
                        <option value="{$layout['layout_id']}" selected="selected">{$layout['name']}</option>
                      {else}
                        <option value="{$layout['layout_id']}">{$layout['name']}</option>
                      {/if}
                    {/foreach}
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="/admin/static/js/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
{foreach from=$languages item=language}
CKEDITOR.replace('description{$language['language_id']}', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token={$token}',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token={$token}',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token={$token}',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token={$token}',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token={$token}',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token={$token}'
});
{/foreach}
//--></script> 
<script type="text/javascript"><!--
$('input[name=\'path\']').autocomplete({
	delay: 500,
	source: function(request, response) {		
		$.ajax({
			url: 'index.php?route=catalog/category/autocomplete&token={$token}&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {
				json.unshift({
					'category_id':  0,
					'name':  '{$text_none}'
				});
				
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
		$('input[name=\'path\']').val(ui.item.label);
		$('input[name=\'parent_id\']').val(ui.item.value);
		
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});
//--></script> 
<script type="text/javascript"><!--
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
		$('#category-filter' + ui.item.value).remove();
		
		$('#category-filter').append('<div id="category-filter' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="category_filter[]" value="' + ui.item.value + '" /></div>');

		$('#category-filter div:odd').attr('class', 'odd');
		$('#category-filter div:even').attr('class', 'even');
				
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

$('#category-filter div img').live('click', function() {
	$(this).parent().remove();
	
	$('#category-filter div:odd').attr('class', 'odd');
	$('#category-filter div:even').attr('class', 'even');	
});
//--></script> 
<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px}&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '{$text_image_manager}',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token={$token}&image=' + encodeURIComponent($('#' + field).val()),
					dataType: 'text',
					success: function(data) {
						$('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
					}
				});
			}
		},	
		bgiframe: false,
		width: 800,
		height: 400,
		resizable: false,
		modal: false
	});
};
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#languages a').tabs();
//--></script> 
{$footer}