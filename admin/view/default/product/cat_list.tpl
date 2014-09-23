{$header}
<div id="content">
  <div class="breadcrumb">
  </div>
  {if $error_warning}
    <div class="warning">{$error_warning}</div>
  {/if}
  {if $success}
    <div class="success">{$success}</div>
  {/if}
  <div class="box">
    <div class="heading">
      <h1><img src="{$smarty.const.IMAGE}category.png" alt="" />{$langs['heading_title']}</h1>
      <div class="buttons"></div>
    </div>
    <div class="content">
      <form action="{$delete}" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left">{$langs['column_name']}</td>
              <td class="right">{$langs['column_sort_order']}</td>
              <td class="right">{$langs['column_action']}</td>
            </tr>
          </thead>
          <tbody>
            {if $cats}
              {foreach from=$cats item=cat}
                <tr>
                  <td style="text-align: center">
                      <input type="checkbox" name="selected[]" value="{$cat['cid']}" />
                  </td>
                  <td class="left">{$cat['name']}</td>
                  <td class="right">{$cat['sort']}</td>
                  <td class="right">
                    [<a href="/admin/product/cat/edit">{$langs['button_edit']}</a>]
                    [<a href="/admin/product/cat/delete">{$langs['button_delete']}</a>]
                  </td>
                </tr>
              {/foreach}
            {else}
              <tr>
                <td class="center" colspan="4">{$langs['text_no_results']}</td>
              </tr>
            {/if}
          </tbody>
        </table>
      </form>
      <div class="pagination">{$pagination}</div>
    </div>
  </div>
</div>
{$footer}