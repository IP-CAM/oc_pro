<!DOCTYPE html>
<html>
  <head>
    <title>{$title}</title>
    <meta name="description" content="{$description}" />
    <meta name="keywords" content="{$keywords}" />
    <link rel="stylesheet" type="text/css" href="/admin/static/css/stylesheet.css" />
    <script type="text/javascript" src="/admin/static/js/jquery/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/admin/static/js/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
    <link type="text/css" href="/admin/static/js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
    <script type="text/javascript" src="/admin/static/js/jquery/tabs.js"></script>
    <script type="text/javascript" src="/admin/static/js/jquery/superfish/js/superfish.js"></script>
    <script type="text/javascript" src="/admin/static/js/common.js"></script>
    {literal}
    <script type="text/javascript">
    $(document).ready(function(){
        // Confirm Delete
        $('#form').submit(function(){
            if ($(this).attr('action').indexOf('delete',1) != -1) {
                if (!confirm('{$langs['text_confirm']}')) {
                    return false;
                }
            }
        });
        // Confirm Uninstall
        $('a').click(function(){
            if ($(this).attr('href') != null && $(this).attr('href').indexOf('uninstall', 1) != -1) {
                if (!confirm('{$langs['text_confirm']}')) {
                    return false;
                }
            }
        });
            });
        </script>
      {/literal}
  </head>
  <body>
  <div id="container">
    <div id="header">
      <div class="div1">
        <div class="div2"><img src="/admin/static/image/logo.png" title="{$heading_title}" onclick="" /></div>
        {if $smarty.session.ADMIN_UID}
          <div class="div3"><img src="/admin/static/image/lock.png" alt="" style="position: relative"></div>
        {/if}
      </div>
      {if $smarty.session.ADMIN_UID}
      <div id="menu">
        <ul class="left" style="">
          <li id="dashboard"><a href="{$home}" class="top">{$langs['text_dashboard']}</a></li>
          <li id="catalog"><a class="top">{$langs['text_catalog']}</a>
            <ul>
              <li><a href="{$category}">{$langs['text_category']}</a></li>
              <li><a href="{$product}">{$langs['text_product']}</a></li>
              <li><a class="parent">{$langs['text_attribute']}</a>
                <ul>
                  <li><a href="{$attribute}">{$langs['text_attribute']}</a></li>
                  <li><a href="{$attribute_group}">{$langs['text_attribute_group']}</a></li>
                </ul>
              </li>
              <li><a href="{$option}">{$langs['text_option']}</a></li>
            </ul>
          </li>
          <li id="extension"><a class="top">{$langs['text_extension']}</a>
            <ul>
              <li><a href="{$module}">{$langs['text_module']}</a></li>
              <li><a href="{$shipping}">{$langs['text_shipping']}</a></li>
              <li><a href="{$payment}">{$langs['text_payment']}</a></li>
              <li><a href="{$total}">{$langs['text_total']}</a></li>
            </ul>
          </li>
          <li id="sale"><a class="top">{$langs['text_sale']}</a>
            <ul>
              <li><a href="{$order}">{$langs['text_order']}</a></li>
              <li><a class="parent">{$langs['text_customer']}</a>
                <ul>
                  <li><a href="{$customer}">{$langs['text_customer']}</a></li>
                  <li><a href="{$customer_group}">{$langs['text_customer_group']}</a></li>
                  <li><a href="{$customer_ban_ip}">{$langs['text_customer_ban_ip']}</a></li>
                </ul>
              </li>
              <li><a href="{$coupon}">{$langs['text_coupon']}</a></li>
              <!-- PAYPAL MANAGE NAVIGATION LINK END -->
            </ul>
          </li>
          <li id="system"><a class="top">{$langs['text_system']}</a>
            <ul>
              <li><a href="{$setting}">{$langs['text_setting']}</a></li>
              <li><a href="{$layout}">{$langs['text_layout']}</a></li>
              <li><a class="parent">{$langs['text_users']}</a>
                <ul>
                  <li><a href="{$user}">{$langs['text_user']}</a></li>
                  <li><a href="{$user_group}">{$langs['text_user_group']}</a></li>
                </ul>
              </li>
            </ul>
          </li>
          
        </ul>
        <ul class="right" style="display: none;">
          <li id="store"><a href="{$store}" target="_blank" class="top">{$langs['text_front']}</a>
            <ul>
              {foreach from=$stores item=store}
                <li><a href="{$stores['href']}" target="_blank">{$store['name']}</a></li>
              {/foreach}
            </ul>
          </li>
          <li><a class="top" href="{$logout}">{$langs['text_logout']}</a></li>
        </ul>
      </div>
      {/if}
    </div>
