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
      <h1><img src="{$smarty.const.IMAGE}setting.png" alt="" /> {$langs['heading_title']}</h1>
      <div class="buttons">
      </div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs">
        <a href="#tab-general">{$langs['tab_general']}</a>
        <a href="#tab-server">{$langs['tab_server']}</a>
      </div>
      <form action="{$action}" method="post" enctype="multipart/form-data" id="form">
        <div id="tab-general">
          <table class="form">
            <tr>
              <td><span class="required">*</span> {$langs['entry_name']}</td>
              <td><input type="text" name="config_name" value="{$config_name}" size="40" />
                {if $error_name}
                <span class="error">{$langs['error_name']}</span>
                {/if}</td>
            </tr>
          </table>
        </div>
        <div id="tab-server">
          <table class="form">
            <tr>
              <td>{$langs['entry_error_display']}</td>
              <td>{if $config_error_display}
                <input type="radio" name="config_error_display" value="1" checked="checked" />
                  {$langs['text_yes']}
                  <input type="radio" name="config_error_display" value="0" />
                  {$langs['text_no']}
                {else}
                  <input type="radio" name="config_error_display" value="1" />
                  {$langs['text_yes']}
                  <input type="radio" name="config_error_display" value="0" checked="checked" />
                  {$langs['text_no']}
                {/if}</td>
            </tr>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
{$footer}