<div class="htg-nav clear-fix">
	<span class="bao-count">共（<b>{$total}</b>个）</span>
	<span class="bao-btns">
		<span>排序：</span>
		<a href="javascript:void(0);" class="sel" onclick="filterSort(this,'default')">默认</a>
		<a href="javascript:void(0);" onclick="filterSort(this,'price')"> <em>价格</em> <em class="order"></em></a>
		<a href="javascript:void(0);" onclick="filterSort(this,'commission')"><em>返利</em><em class="order"></em></a>
		<a href="javascript:void(0);" onclick="filterSort(this,'credit')"><em>信誉</em><em class="order"></em></a>
		<a href="javascript:void(0);" onclick="filterSort(this,'sale')"><em>销量</em><em class="order"></em></a>
	</span>
	<span class="bao-btns">
		<span>价格：</span>
		<a href="javascript:void(0);" class="sel" onclick="filterPrice(this,0)">全部</a>
		<a href="javascript:void(0);" onclick="filterPrice(this,1)">1-200</a>
		<a href="javascript:void(0);" onclick="filterPrice(this,200)">200-500</a>
		<a href="javascript:void(0);" onclick="filterPrice(this,500)">500-1000</a>
		<a href="javascript:void(0);" onclick="filterPrice(this,1000)">更高</a>
	</span>
	<span class="bao-search shadow15">
        <input value="" name="q" placeholder="描述筛选..." id="keyword" />
        <input type="button" value="搜" class="search_btn" onclick="filterSearch(this)" />
	</span>
</div>