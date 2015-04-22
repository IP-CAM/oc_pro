{top}
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
  </head>
  <body>
  <div id="container">
    <div id="header">
      <div class="div1">
        <div class="div2">
          <img src="/admin/static/image/logo.png" title="{$heading_title}" onclick="" />
        </div>
        {if $smarty.session.AID}
          <div class="div3"><img src="/admin/static/image/lock.png" alt="" style="position: relative"></div>
        {/if}
      </div>
      {if $smarty.session.AID}
      <div id="menu">
        <ul class="left" style="">
          <li id="dashboard" class="{$selected['common']}"><a href="{$home}" class="top">{$langs['text_dashboard']}</a></li>
          <li id="catalog" class="{$selected['product']}"><a class="top">{$langs['text_product']}</a>
            <ul>
              <li><a href="{$category}">{$langs['text_category']}</a></li>
              <li><a href="{$product}">{$langs['text_item']}</a></li>
              <li><a class="parent">{$langs['text_attribute']}</a>
                <ul>
                  <li><a href="{$attribute}">{$langs['text_attribute']}</a></li>
                  <li><a href="{$attribute_group}">{$langs['text_attribute_group']}</a></li>
                </ul>
              </li>
              <li><a href="{$option}">{$langs['text_option']}</a></li>
            </ul>
          </li>
          <li id="system" class="{$selected['setting']}"><a class="top">{$langs['text_system']}</a>
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
          <li><a class="top" href="{$logout}">{$langs['text_logout']}</a></li>
        </ul>
      </div>
      {/if}
    </div>
{literal}
  <script type="text/javascript">
    $(document).ready(function() {
      $('#menu > ul').superfish({
        pathClass  : 'overideThisToUse',
        delay    : 0,
        animation  : {height: 'show'},
        speed    : 'normal',
        autoArrows   : false,
        dropShadows  : false, 
        disableHI  : false, /* set to true to disable hoverIntent detection */
        onInit     : function(){},
        onBeforeShow : function(){},
        onShow     : function(){},
        onHide     : function(){}
      });
      $('#menu > ul').css('display', 'block');
    });
  </script>
{/literal}
{/top}