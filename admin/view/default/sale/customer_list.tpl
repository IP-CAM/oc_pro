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
  {if $success}
  <div class="success">{$langs['success']}</div>
  {/if}
  <div class="box">
    <div class="heading">
      <h1><img src="{$smarty.const.IMAGE}customer.png" alt="" />{$langs['heading_title']}</h1>
      <div class="buttons">
      </div>
    </div>
    <div class="content">
      <form action="" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left">
                {if $sort == 'name'}
                  <a href="{$sort_name}" class="{strtolower($order)}">{$langs['column_name']}</a>
                {else}
                  <a href="{$sort_name}">{$langs['column_name']}</a>
                {/if}
              </td>
              <td class="left">
                {if $sort == 'c.email'}
                  <a href="{$sort_email}" class="{strtolower($order)}">{$langs['column_email']}</a>
                {else}
                  <a href="{$sort_email}">{$langs['column_email']}</a>
                {/if}
              </td>
              <td class="left">{if $sort == 'customer_group'}
                <a href="{$sort_customer_group}" class="{strtolower($order)}">{$langs['column_customer_group']}</a>
                {else}
                <a href="{$sort_customer_group}">{$langs['column_customer_group']}</a>
                {/if}</td>
              <td class="left">{if $sort == 'c.status'}
                <a href="{$sort_status}" class="{strtolower($order)}">{$langs['column_status']}</a>
                {else}
                <a href="{$sort_status}">{$langs['column_status']}</a>
                {/if}</td>
              <td class="left">{if $sort == 'c.approved'}
                <a href="{$sort_approved}" class="{strtolower($order)}">{$langs['column_approved']}</a>
                {else}
                <a href="{$sort_approved}">{$langs['column_approved']}</a>
                {/if}</td>
              <td class="left">{if $sort == 'c.ip'}
                <a href="{$sort_ip}" class="{strtolower($order)}">{$langs['column_ip']}</a>
                {else}
                <a href="{$langs['sort_ip']}">{$langs['column_ip']}</a>
                {/if}</td>
              <td class="left">{if $sort == 'c.date_added'}
                <a href="{$langs['sort_date_added']}" class="{strtolower($order)}">{$langs['column_date_added']}</a>
                {else}
                <a href="{$sort_date_added}">{$langs['column_date_added']}</a>
                {/if}</td>
              <td class="left">{$langs['column_login']}</td>
              <td class="right">{$langs['column_action']}</td>
            </tr>
          </thead>
          <tbody>
            <tr class="filter">
              <td></td>
              <td><input type="text" name="filter_name" value="{$filter_name}" /></td>
              <td><input type="text" name="filter_email" value="{$filter_email}" /></td>
              <td><select name="filter_customer_group_id">
                  <option value="*"></option>
                  {foreach from=$customer_groups item=customer_group}
                  {if $customer_group['customer_group_id'] == $filter_customer_group_id}
                  <option value="{$customer_group['customer_group_id']}" selected="selected">{$customer_group['name']}</option>
                  {else}
                  <option value="{$customer_group['customer_group_id']}">{$customer_group['name']}</option>
                  {/if}
                  {/foreach}
                </select></td>
              <td><select name="filter_status">
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
                </select></td>
              <td><select name="filter_approved">
                  <option value="*"></option>
                  {if $filter_approved}
                  <option value="1" selected="selected">{$langs['text_yes']}</option>
                  {else}
                  <option value="1">{$langs['text_yes']}</option>
                  {/if}
                  {if $filter_approved}
                  <option value="0" selected="selected">{$langs['text_no']}</option>
                  {else}
                  <option value="0">{$langs['text_no']}</option>
                  {/if}
                </select></td>
              <td><input type="text" name="filter_ip" value="{$filter_ip}" /></td>
              <td><input type="text" name="filter_date_added" value="{$filter_date_added}" size="12" id="date" /></td>
              <td></td>
              <td align="right"></td>
            </tr>
            {if $customers}
              {foreach from=$customers item=customer}
                <tr>
                  <td style="text-align: center;">
                    {if $customer['selected']}
                      <input type="checkbox" name="selected[]" value="{$customer['customer_id']}" checked="checked" />
                    {else}
                      <input type="checkbox" name="selected[]" value="{$customer['customer_id']}" />
                    {/if}
                  </td>
                  <td class="left">{$customer['name']}</td>
                  <td class="left">{$customer['email']}</td>
                  <td class="left">{$customer['customer_group']}</td>
                  <td class="left">{$customer['status']}</td>
                  <td class="left">{$customer['approved']}</td>
                  <td class="left">{$customer['ip']}</td>
                  <td class="left">{$customer['date_added']}</td>
                  <td class="left">
                    <select>
                      <option value="">{$langs['text_select']}</option>
                      <option value="0">{$langs['text_default']}</option>
                    </select>
                  </td>
                  <td class="right">
                      [ <a href="{$action['href']}">{$action['text']}</a> ]
                  </td>
                </tr>
              {/foreach}
            {else}
              <tr>
                <td class="center" colspan="10">{$langs['text_no_results']}</td>
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