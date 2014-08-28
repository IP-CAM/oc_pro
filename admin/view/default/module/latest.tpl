{$header}
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    {$breadcrumb['separator']}<a href="{$breadcrumb['href']}">{$breadcrumb['text']}</a>
    <?php } ?>
  </div>
  {if $error_warning}
    <div class="warning">{$error_warning}</div>
  {/if}
  <div class="box">
    <div class="heading">
      <h1><img src="{$smarty.const.IMAGE}module.png" alt="" /> {$heading_title}</h1>
      <div class="buttons"><a onclick=""></a></div>
    </div>
    <div class="content">
      <form action="{$action}" method="post" enctype="multipart/form-data" id="form">
        <table id="module" class="list">
          <thead>
            <tr>
              <td class="left">{$entry_limit}</td>
              <td class="left">{$entry_image}</td>
              <td class="left">{$entry_layout}</td>
              <td class="left">{$entry_position}</td>
              <td class="left">{$entry_status}</td>
              <td class="right">{$entry_sort_order}</td>
              <td></td>
            </tr>
          </thead>
          {foreach from=$modules item=module}
            <tbody id="module-row">
              <tr>
                <td class="left"><input type="text" name="latest_module[{$module_row}][limit]" value="{$module['limit']}" size="1" /></td>
                <td class="left"><input type="text" name="latest_module[{$module_row}][image_width]" value="{$module['image_width']}" size="3" />
                  <input type="text" name="latest_module[{$module_row}][image_height]" value="{$module['image_height']}" size="3" />
                  {if $error_image[$module_row]}
                    <span class="error">{$error_image[$module_row]}</span>
                  {/if}
                  </td>
                <td class="left">
                  <select name="latest_module[{$module_row}][layout_id]">
                    {foreach from=$layouts item=layout}
                      {if $layout['layout_id'] == $module['layout_id']}
                        <option value="{$layout['layout_id']}" selected="selected">{$layout['name']}</option>
                      {else}
                        <option value="{$layout['layout_id']}">{$layout['name']}</option>
                      {/if}
                    {/foreach}
                  </select></td>
                <td class="left"><select name="latest_module[{$module_row}][position]">
                    {if $module['position'] == 'content_top'}
                      <option value="content_top" selected="selected">{$text_content_top}</option>
                    {else}
                      <option value="content_top">{$text_content_top}</option>
                    {/if}
                    {if $module['position'] == 'content_bottom'}
                      <option value="content_bottom" selected="selected">{$text_content_bottom}</option>
                    {else}
                      <option value="content_bottom">{$text_content_bottom}</option>
                    {/if}
                    {if $module['position'] == 'column_left'}
                      <option value="column_left" selected="selected">{$text_column_left}</option>
                    {else}
                      <option value="column_left">{$text_column_left}</option>
                    {/if}
                    {if $module['position'] == 'column_right'}
                      <option value="column_right" selected="selected">{$text_column_right}</option>
                    {else}
                      <option value="column_right">{$text_column_right}</option>
                    {/if}
                  </select></td>
                <td class="left"><select name="latest_module[{$module_row}][status]">
                    {if $module['status']}
                      <option value="1" selected="selected">{$text_enabled}</option>
                      <option value="0">{$text_disabled}</option>
                    {else}
                      <option value="1">{$text_enabled}</option>
                      <option value="0" selected="selected">{$text_disabled}</option>
                    {/if}
                  </select></td>
                <td class="right"><input type="text" name="latest_module[{$module_row}][sort_order]" value="{$module['sort_order']}" size="3" /></td>
                <td class="left"><a onclick="$('#module-row{$module_row}').remove();" class="button">{$button_remove}</a></td>
              </tr>
            </tbody>
          {/foreach}
          <tfoot>
            <tr>
              <td colspan="6"></td>
              <td class="left"><a onclick="addModule();" class="button">{$button_add_module}</a></td>
            </tr>
          </tfoot>
        </table>
      </form>
    </div>
  </div>
</div>
{$footer}