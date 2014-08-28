{assign var="iid" value=$item['id']}
{assign var="sid" value=$item['sid']}

<div class="single pin">
  <div class="">
    <a target="_blank" href="/shop/item/detail/{$iid}/" class="thumb imgsPreview" title="">
      <img rel="noindex nofollow" src="{$item['pic']}_230x230.jpg" title="{$item['title']}" class="huge" alt=""  width="216" />
    </a>
  </div>
  <!--description(分享描述信息)-->
  <div class="con">
    <div class="pl">
      <div class="user_pn">
        <a href="/shop/{$sid}/" target="_blank">
          <img src="" title="{$item['nick']}" onerror="defaultImg(this)" />
        </a>
      </div>
      <div rel="xatree" class="text">
        <a href="/shop/{$sid}/" title="" class="uthead" target="_blank">{$item['nick']}</a>
        :{$item['title']}#<a href="/box/{$item['bid']}/" target="_blank">{$item['bname']}</a>#
        <b>￥{number_format($item['price'],1)}</b>
        {if isset($item['cprice'])}
          <span class="flflag">促销价￥{number_format($item['cprice'],1)}</span>
        {/if}
        <span class="flflag">返￥{number_format($item['commission']*0.7,0)}</span>
      </div>
    </div>
    <div class="bottom clear">
      <div class="right actions">
        <a class="btn_ico  pin_like" onclick="likeShare(this,'{$iid}','em',{$item['likenum']})">
          <i class="icon ico_like"></i>( <em>{$item['likenum']}</em>)
        </a>
        <a class="btn_ico liked" style="display:none" onclick="unlikeShare(this,'{$iid}','em',{$item['likenum']})">
          <i class="icon ico_like liked"></i>(<em>{$item['likenum']}</em>)
        </a>
        <a class="btn_ico pin_comment" onclick="commentShare(this,'{$iid}')">
          <i class="icon ico_comment"></i>(<em>{$item['commentnum']}</em>)
        </a>
      </div>
    </div>
    <div class="convo commentbox clearfix">
      <a href="#" title="{$smarty.session.UNAME}" class="ImgLink">
        <img src="{$smarty.const.DEFAULT_HEADIMG_PATH}{$smarty.session.UID}{$smarty.session.HEADIMG}" onerror="defaultImg(this)" alt="{$smarty.session.UNAME}" /></a>
        <textarea placeholder="添加评论" class=""></textarea>
        <a href="javascript:void(0)" onclick="addPinComment(this,'{$iid}')" class="com_btn"></a>
    </div>
  </div>
</div>