 
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<script type="text/javascript">


function SetHome(obj,url){
    try{
        obj.style.behavior='url(#default#homepage)';
       obj.setHomePage(url);
   }catch(e){
       if(window.netscape){
          try{
              netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
         }catch(e){
              alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
          }
       }else{
        alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");
       }
  }
}
 
function AddFavorite(title, url) {
  try {
      window.external.addFavorite(url, title);
  }
catch (e) {
     try {
       window.sidebar.addPanel(title, url, "");
    }
     catch (e) {
         alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
     }
  }
}
</script>




<div class="header_bg">
	<div id="head">
        <div id="left">
          <div id="left_content"> 欢迎访问吉采电子商务平台！  　 <span class="fontcolor"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></span> <span onclick="AddFavorite('我的网站',location.href)" style=" cursor:pointer;">收藏本站</span><div class="app_pos" style="float:right;">您是第<?php 
$k = array (
  'name' => 'ip',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>位登陆的用户</div></div>
        </div>
        <div id="right">
          <div id="right_content">
            <ul>
              <li><a href="/user.php?act=order_list">我的订单</a></li>
              <li><a href="user.php">我的吉采</a></li>
              <li><a href="/article_list0.php?cat_id=1">服务中心</a></li>
              <li><a href="/article_list.php?id=33">直销店招商</a></li>
              <li><a href="/article.php?id=147">材料商招商</a></li>
              <li><a href="/article_list0.php?cat_id=4">经销商查询</a></li>
              <li style=" border:0px;"><a href="/article_list.php?id=22">技工招聘</a></li>
            </ul>
          </div>
        </div>
      </div>
</div>

<div class="header_logo">
  <div class="logo"> <a href="/" title="欢迎吉采电子"><img src="<?php echo $this->_var['shop_logo']; ?>" alt="欢迎吉采电子"></a> </div>
  <div class="logo_1"><img src="themes/ecmoban_meilishuo/images/index_02.png" width="159" height="42"></div>
  <form id="searchForm" class="searchBox" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()">
  <dl class="se_1">
    <dt>
      <input name="keywords" type="text" id="keyword" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>" class="searchKey" />
      <input type="submit"  name="imageField" class="fm_hd_btm_shbx_bttn" value="搜 索">
    </dt>
    <dd>热门搜索:<?php if ($this->_var['searchkeywords']): ?>
            <?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'searchkeywords_0_00390500_1450059573');if (count($_from)):
    foreach ($_from AS $this->_var['searchkeywords_0_00390500_1450059573']):
?>
             	<a href="search.php?keywords=<?php echo $this->_var['searchkeywords_0_00390500_1450059573']; ?>"><?php echo $this->_var['searchkeywords_0_00390500_1450059573']; ?></a>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
           <?php endif; ?>
             </dd>
  </dl>
  </form>
  <div class="logo_2"><a href="/topic.php?topic_id=1" class="logo_t1">意大利原装进口</a>
    <p><a href="/topic.php?topic_id=1" class="logo_t2">每日推荐一款特价</a></p>
  </div>
  <div class="logo_3"><img src="themes/ecmoban_meilishuo/images/index_04_1.png" width="29" height="21"><span><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></span><a href="flow.php"><p>购物车</p></a></div>
</div>



<div class="top_nav" style="display:none;">
	<script type="text/javascript">
          //初始化主菜单
            function sw_nav(obj,tag)
            {
     
            var DisSub = document.getElementById("DisSub_"+obj);
            var HandleLI= document.getElementById("HandleLI_"+obj);
                if(tag==1)
                {
                    DisSub.style.display = "block";
             
                    
                }
                else
                {
                    DisSub.style.display = "none";
                
                }
     
            }
     
    </script>
    <div class="block">     
    
        <ul class="top_bav_l">
        <li class="top_sc">
           <a href="javascript:void(0);" onclick="AddFavorite('我的网站',location.href)">收藏本站</a>
</li>
            <li>关注我们：</li>
            <li style="border:none" class="menuPopup"  onMouseOver="sw_nav(1,1);" onMouseOut="sw_nav(1,0);">
            <a id="HandleLI_1" href="javascript:;" title="微博" class="attention"></a> 
            <div id=DisSub_1 class="top_nav_box  top_weibo"> 
            <a href="http://e.weibo.com/ECMBT" title="新浪微博" class="top_weibo"></a>
            <a href="http://e.t.qq.com/ecmoban_com" title="QQ微博" class="top_qq"></a> 
            </div> 
            </li> 
            <li class="menuPopup" onMouseOver="sw_nav(2,1);" onMouseOut="sw_nav(2,0);">
            <a id="HandleLI_2" href="javascript:;" title="微信" class="top_weixin"></a> 
            <div id="DisSub_2" class="weixinBox" style="display: none;"> 
		
            <img src="themes/ecmoban_meilishuo/images/weixin.png" style="width:150px; height:190px;  background:#0000CC" width="150" height="190"> 
            </div> 
            </li>
        </ul>
    
        <div class="header_r">
        
        <font id="ECS_MEMBERZONE" ><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?> </font>
     
         <?php if ($this->_var['navigator_list']['top']): ?>
            <?php $_from = $this->_var['navigator_list']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?>
                   <a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a>
                    <?php if (! ($this->_foreach['nav_top_list']['iteration'] == $this->_foreach['nav_top_list']['total'])): ?>
                     |
                    <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
           <?php endif; ?>
         
        </div>
    </div>
</div>





<div class=" block header_bg" style="margin-bottom: 0px; display:none;">
  <div class="clear_f"></div>
  <div class="header_top logo_wrap"> <a class="logo_new" href="index.php"><img src="themes/ecmoban_meilishuo/images/logo.gif" /></a>
    <div class="ser_n">
    
      <form id="searchForm" class="searchBox" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()">
        <div class="search-table"> <span class="cur" data-type="1">宝贝</span> <em class="arrow"></em> </div>
        <span class="ipt1"><em class="i_search"></em>
        <input name="keywords" type="text" id="keyword" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>" class="searchKey" />
        </span> <span class="ipt2">
        <input type="submit"  name="imageField" class="fm_hd_btm_shbx_bttn" value="搜 索">
        </span>
      </form>
      
      <div class="clear_f"></div>
      <ul class="searchType none_f">
      </ul>
    </div>
    <ul class="cart_info">
      <li id="ECS_CARTINFO"><span class="carts_num none_f"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></span> <em class="i_cart">&nbsp;</em><a href="flow.php">查看购物车</a></li>
      <li><a href="user.php"><em class="i_order">&nbsp;</em>我的订单</a></li>
    </ul>
  </div>
</div>

<div style="clear:both"></div>
 
<div class="menu_box clearfix"> 
<div class="block"> 
<div class="menu" style="display:none;">
  <a href="index.php"<?php if ($this->_var['navigator_list']['config']['index'] == 1): ?> class="cur"<?php endif; ?>><?php echo $this->_var['lang']['home']; ?><span></span></a>
  <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
  <a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?> <?php if ($this->_var['nav']['active'] == 1): ?> class="cur"<?php endif; ?>>
<?php echo $this->_var['nav']['name']; ?>
 <span></span>
</a>
 
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div> 
<div class="nav_0">
  <div class="nav">
    <ul>
      <li class="nav-item cur"><a href="/">网站首页</a></li>
      <li class="nav-item"><a href="/article.php?id=36">关于我们</a></li>
      <li class="nav-item"><a href="/article_list.php?id=23">新闻动态</a></li>
      <li class="nav-item"><a href="/article_list.php?id=24">公司公告</a></li>
      <li class="nav-item"><a href="/user.php?act=message_list">互动留言</a></li>
      <li class="nav-item"><a href="/article.php?id=200">采购须知</a></li>
      <li class="nav-item"><a href="/user.php">会员登录</a></li>
      <li class="nav-item"><a href="article_list.php?category=15">装修效果</a></li>
    </ul>
    
    <div class="move-bg" style="display: block; left: 0px;"></div>
     
  </div></div>
</div>
</div>
 
 

 


