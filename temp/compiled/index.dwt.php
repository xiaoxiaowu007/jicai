<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />


<title><?php echo $this->_var['page_title']; ?></title>



<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="/themes/ecmoban_meilishuo/mb.css" rel="stylesheet" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />






<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.7.2.min.js,jquery.movebg.js')); ?>

</head>
<body class="index_page" style="min-width:1200px;">


<?php echo $this->fetch('library/page_header.lbi'); ?>

<?php echo $this->fetch('library/index_ad.lbi'); ?>


<div class="classification">
	<div style="display:none;">
    <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tuijian_tree_0_43019000_1451355528');if (count($_from)):
    foreach ($_from AS $this->_var['tuijian_tree_0_43019000_1451355528']):
?>
    <li><a href="/category.php?id=<?php echo $this->_var['tuijian_tree_0_43019000_1451355528']['cat_id']; ?>"><?php echo $this->_var['tuijian_tree_0_43019000_1451355528']['cat_name']; ?></a></li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
    </div>
  <div class="title_02"><span>热门商城分类</span></div>
  <ul class="cf clearfix">
     <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tuijian_tree_0_43019000_1451355528');if (count($_from)):
    foreach ($_from AS $this->_var['tuijian_tree_0_43019000_1451355528']):
?>
    <li><a href="/category.php?id=<?php echo $this->_var['tuijian_tree_0_43019000_1451355528']['cat_id']; ?>"><?php echo $this->_var['tuijian_tree_0_43019000_1451355528']['cat_name']; ?></a></li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </ul>
</div>


<div class="activity_bg">
    <div class="title_01">
      <div class="title_01_left"></div>
      <div class="title_01_right">
        <ul class="color_c">
          <li class="color_01 tt"><a href="javascript:void(0)">综合</a></li>
          
          <?php $_from = $this->_var['cat_new']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          
          	<li class="t3 tt"><a href="javascript:void(0)"><?php echo $this->_var['goods']['cat_name']; ?></a></li>
          
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
          
          <li class="color_13"><a href="/category.php?id=705" target="_blank">更多</a></li>
        </ul>
      </div>
    </div>
    
    <Script>
		$(function(){
			col=$(".color_c .t3");
			len = col.length;
			for(var i = 2;i<= (len+1);i++){
				$(".color_c .t3").eq(i-2).addClass("color_"+i);
			}
		})
	</script>
    
    <div class="exhibition_01_left">
    
    
        <ul class="ex">
        
          <?php $_from = $this->_var['zhonghe']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          
          <li><a href="/goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><img src="<?php echo $this->_var['goods']['original_img']; ?>" width="192" height="200"> </a> <a href="/goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><span><?php echo $this->_var['goods']['goods_name']; ?></span></a>
            <p><a href="/goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><?php echo $this->_var['goods']['goods_brief']; ?></a></p>
            <a href="/goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><b>¥<?php echo $this->_var['goods']['shop_price']; ?></b></a> </li>
            
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            
        </ul>
        
        
        
        <?php $_from = $this->_var['tui_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tuijian');if (count($_from)):
    foreach ($_from AS $this->_var['tuijian']):
?>
        
        <ul class="ex last2">
          <?php if ($this->_var['tuijian']): ?>
              <?php $_from = $this->_var['tuijian']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
              
              <li><a href="/goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><img src="<?php echo $this->_var['goods']['original_img']; ?>" width="192" height="200"> </a> <a href="/goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><span><?php echo $this->_var['goods']['goods_name']; ?></span></a>
                <p><a href="/goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><?php echo $this->_var['goods']['goods_brief']; ?></a></p>
                <a href="/goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><b>¥<?php echo $this->_var['goods']['shop_price']; ?></b></a> </li>
                
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php endif; ?>
            
        </ul>

		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
		




        
        
        <script>
			$(function(){
				
				//点击切换最新产品的栏目
				$(".color_c .tt").click(function(){
					var k=$(this).index();
					$(".exhibition_01_left ul").addClass("last2");
					$(".exhibition_01_left ul").eq(k).removeClass("last2");
				});
				
				//加载是判断是否显示
				//$(".exhibition_01_left .ex").eq(0).removeClass("last2");
				
				
			})
		</script>
        
        
        
        
      </div>
    
    <div class="exhibition_01_right">
        <div class="designer">
        	
            <div class="des_con">
               <a href="/article_sjs.php?cat=sjs" target="_blank"><img src="themes/ecmoban_meilishuo/images/index_08.png" width="237" height="96"></a>
                <a href="/article_type.php?id=<?php echo $this->_var['sjs']['id']; ?>&type=sjs" target="_blank"><img src="<?php echo $this->_var['sjs']['rec_img']; ?>" width="212" height="110"></a>
                <div class="designer_text">
                <span><a href="/article_type.php?id=<?php echo $this->_var['sjs']['id']; ?>&type=sjs" target="_blank"><?php echo $this->_var['sjs']['sjs_name']; ?></a></span>
                <p><a href="/article_type.php?id=<?php echo $this->_var['sjs']['id']; ?>&type=sjs" target="_blank">工作年限：<?php echo $this->_var['sjs']['experience']; ?></a></p>
                <p><a href="/article_type.php?id=<?php echo $this->_var['sjs']['id']; ?>&type=sjs" target="_blank"><?php echo $this->_var['sjs']['sjs_brief']; ?></a></p>
                </div>
            </div>
          
            
            
            <div class="des_con" style="margin-top: 15px;">
                <a href="/article_sjs.php?cat=jg" target="_blank"><img src="themes/ecmoban_meilishuo/images/jgzj.jpg" width="236" height="96"></a>
                <a href="/article_type.php?id=<?php echo $this->_var['jg']['id']; ?>&type=jg" target="_blank"><img src="<?php echo $this->_var['jg']['rec_img']; ?>" width="212" height="110"></a>
                <div class="designer_text"><span><a href="/article_type.php?id=<?php echo $this->_var['jg']['id']; ?>&type=jg" target="_blank"><?php echo $this->_var['jg']['jg_name']; ?></a></span>
                <p><a href="/article_type.php?id=<?php echo $this->_var['sjs']['id']; ?>&type=sjs" target="_blank">工作年限：<?php echo $this->_var['jg']['experience']; ?></a></p>
                  <p><a href="/article_type.php?id=<?php echo $this->_var['jg']['id']; ?>&type=jg" target="_blank"><?php echo $this->_var['jg']['jg_brief']; ?></a></p>
                </div>
            </div>
            
          </div>
        </div>
      </div>
  
</div>






  <div class="clear"></div>
  <div class="f1_commodity" id="foot">
    <div class="f1_commodity_left">
      <ul>
      <?php $_from = $this->_var['categories1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
        <li><a href="<?php echo htmlspecialchars($this->_var['childer']['url']); ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <li><a href="/category.php?id=1">更多</a></li>
        
        
      </ul>
      <img src="themes/ecmoban_meilishuo/images/index_10_1.png" width="220" height="220" /> </div>
    <div class="f1_commodity_right">
      <div class="title_commodity"></div>
      <div class="commodity_top">
      	<ul class="top">
        
          <?php $_from = $this->_var['best1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'best_goods1');if (count($_from)):
    foreach ($_from AS $this->_var['best_goods1']):
?>
          <li class="big_t"><a href="/goods.php?id=<?php echo $this->_var['best_goods1']['goods_id']; ?>"><img src="<?php echo $this->_var['best_goods1']['original_img']; ?>" width="441" height="233" /></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
          <?php $_from = $this->_var['hot_goods1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'hot_goods1_0_43119000_1451355528');if (count($_from)):
    foreach ($_from AS $this->_var['hot_goods1_0_43119000_1451355528']):
?>
          <li><a href="/goods.php?id=<?php echo $this->_var['hot_goods1_0_43119000_1451355528']['goods_id']; ?>"><img src="<?php echo $this->_var['hot_goods1_0_43119000_1451355528']['original_img']; ?>" height="118" width="138" /></a><a href="/goods.php?id=<?php echo $this->_var['hot_goods1_0_43119000_1451355528']['goods_id']; ?>" class="tit_name"><span><?php echo $this->_var['hot_goods1_0_43119000_1451355528']['goods_name']; ?></span></a>
            <!--<p><a href="<?php echo $this->_var['hot_goods1_0_43119000_1451355528']['goods_id']; ?>" class="tit_brief"><?php echo $this->_var['hot_goods1_0_43119000_1451355528']['brief']; ?></a></p>-->
            <a href="/goods.php?id=<?php echo $this->_var['hot_goods1_0_43119000_1451355528']['goods_id']; ?>" style="text-align:center;  display: block;">吉采价：￥<b><?php echo $this->_var['hot_goods1_0_43119000_1451355528']['shop_price']; ?></b>元</a>
            <p style="text-align:center;"><i style="text-decoration:line-through;">市场价：￥<?php echo $this->_var['hot_goods1_0_43119000_1451355528']['market_price']; ?>元</i></p>
            </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
        </ul>
      </div>
    </div>
  </div>



  <div class="clear"></div>
  <div class="f2_commodity">
    <div class="f2_commodity_left">
      <ul>
        <?php $_from = $this->_var['categories2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
        <li><a href="<?php echo htmlspecialchars($this->_var['childer']['url']); ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <li><a href="/category.php?id=2">更多</a></li>
      </ul>
      <img src="themes/ecmoban_meilishuo/images/index_11_1.png" width="220" height="220" /> </div>
    <div class="f2_commodity_right">
      <div class="title_commodity"></div>
      <div class="commodity_top">
      	<ul class="top">
        
          <?php $_from = $this->_var['best2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'best_goods2');if (count($_from)):
    foreach ($_from AS $this->_var['best_goods2']):
?>
          <li class="big_t"><a href="/goods.php?id=<?php echo $this->_var['best_goods2']['goods_id']; ?>"><img src="<?php echo $this->_var['best_goods2']['original_img']; ?>" width="441" height="233" /></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                 
          <?php $_from = $this->_var['hot_goods2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'hot_goods2_0_43119000_1451355528');if (count($_from)):
    foreach ($_from AS $this->_var['hot_goods2_0_43119000_1451355528']):
?>
          <li><a href="/goods.php?id=<?php echo $this->_var['hot_goods2_0_43119000_1451355528']['goods_id']; ?>"><img src="<?php echo $this->_var['hot_goods2_0_43119000_1451355528']['original_img']; ?>" height="118" width="138" /></a><a href="<?php echo $this->_var['hot_goods2_0_43119000_1451355528']['goods_id']; ?>" class="tit_name"><span><?php echo $this->_var['hot_goods2_0_43119000_1451355528']['goods_name']; ?></span></a>
            <!--<p><a href="<?php echo $this->_var['hot_goods2_0_43119000_1451355528']['url']; ?>"><?php echo $this->_var['hot_goods2_0_43119000_1451355528']['brief']; ?></a></p>
            <a href="<?php echo $this->_var['hot_goods2_0_43119000_1451355528']['url']; ?>">￥<b><?php echo $this->_var['hot_goods2_0_43119000_1451355528']['shop_price']; ?></b>元</a>-->
            
            <a href="/goods.php?id=<?php echo $this->_var['hot_goods2_0_43119000_1451355528']['goods_id']; ?>" style="text-align:center;  display: block;">吉采价：￥<b><?php echo $this->_var['hot_goods2_0_43119000_1451355528']['shop_price']; ?></b>元</a>
            <p style="text-align:center;"><i style="text-decoration:line-through;">市场价：￥<?php echo $this->_var['hot_goods2_0_43119000_1451355528']['market_price']; ?>元</i></p>
            </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
        </ul>
      </div>
    </div>
  </div>






  <div class="clear"></div>
  <div class="f3_commodity">
    <div class="f3_commodity_left">
      <ul>
        <?php $_from = $this->_var['categories3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
        <li><a href="<?php echo htmlspecialchars($this->_var['childer']['url']); ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <li><a href="/category.php?id=3">更多</a></li>
      </ul>
      <img src="themes/ecmoban_meilishuo/images/index_12_1.png" width="220" height="220" /> </div>
    <div class="f3_commodity_right">
      <div class="title_commodity"></div>
      <div class="commodity_top">
      	<ul class="top">
        
         <?php $_from = $this->_var['best3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'best_goods3');if (count($_from)):
    foreach ($_from AS $this->_var['best_goods3']):
?>
          <li class="big_t"><a href="/goods.php?id=<?php echo $this->_var['best_goods3']['goods_id']; ?>"><img src="<?php echo $this->_var['best_goods3']['original_img']; ?>" width="441" height="233" /></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
          <?php $_from = $this->_var['hot_goods3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'hot_goods3_0_43119000_1451355528');if (count($_from)):
    foreach ($_from AS $this->_var['hot_goods3_0_43119000_1451355528']):
?>
          <li><a href="/goods.php?id=<?php echo $this->_var['hot_goods3_0_43119000_1451355528']['goods_id']; ?>"><img src="<?php echo $this->_var['hot_goods3_0_43119000_1451355528']['original_img']; ?>" height="118" width="138" /></a><a href="/goods.php?id=<?php echo $this->_var['hot_goods3_0_43119000_1451355528']['goods_id']; ?>" class="tit_name"><span><?php echo $this->_var['hot_goods3_0_43119000_1451355528']['goods_name']; ?></span></a>
            <!--<p><a href="<?php echo $this->_var['hot_goods3_0_43119000_1451355528']['goods_id']; ?>"><?php echo $this->_var['hot_goods3_0_43119000_1451355528']['brief']; ?></a></p>
            <a href="<?php echo $this->_var['hot_goods3_0_43119000_1451355528']['goods_id']; ?>">￥<b><?php echo $this->_var['hot_goods3_0_43119000_1451355528']['shop_price']; ?></b>元</a>-->
            
            
            <a href="/goods.php?id=<?php echo $this->_var['hot_goods3_0_43119000_1451355528']['goods_id']; ?>" style="text-align:center;  display: block;">吉采价：￥<b><?php echo $this->_var['hot_goods3_0_43119000_1451355528']['shop_price']; ?></b>元</a>
            <p style="text-align:center;"><i style="text-decoration:line-through;">市场价：￥<?php echo $this->_var['hot_goods3_0_43119000_1451355528']['market_price']; ?>元</i></p>
           
            </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
        </ul>
      </div>
    </div>
  </div>





  <div class="clear"></div>
  <div class="f4_commodity">
    <div class="f4_commodity_left">
      <ul>
        <?php $_from = $this->_var['categories4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
        <li><a href="<?php echo htmlspecialchars($this->_var['childer']['url']); ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <li><a href="/category.php?id=4">更多</a></li>
      </ul>
      <img src="themes/ecmoban_meilishuo/images/index_13_1.png" width="220" height="220" /> </div>
    <div class="f4_commodity_right">
      <div class="title_commodity"></div>
      <div class="commodity_top">
      
      <ul class="top">
      
          <?php $_from = $this->_var['best4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'best_goods4');if (count($_from)):
    foreach ($_from AS $this->_var['best_goods4']):
?>
          <li class="big_t"><a href="/goods.php?id=<?php echo $this->_var['best_goods4']['goods_id']; ?>"><img src="<?php echo $this->_var['best_goods4']['original_img']; ?>" width="441" height="233" /></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
          <?php $_from = $this->_var['hot_goods4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'hot_goods4_0_43119000_1451355528');if (count($_from)):
    foreach ($_from AS $this->_var['hot_goods4_0_43119000_1451355528']):
?>
          <li><a href="/goods.php?id=<?php echo $this->_var['hot_goods4_0_43119000_1451355528']['goods_id']; ?>"><img src="<?php echo $this->_var['hot_goods4_0_43119000_1451355528']['original_img']; ?>" height="118" width="138" /></a><a href="/goods.php?id=<?php echo $this->_var['hot_goods4_0_43119000_1451355528']['goods_id']; ?>" class="tit_name"><span><?php echo $this->_var['hot_goods4_0_43119000_1451355528']['goods_name']; ?></span></a>
            <!--<p><a href="<?php echo $this->_var['hot_goods4_0_43119000_1451355528']['url']; ?>"><?php echo $this->_var['hot_goods4_0_43119000_1451355528']['brief']; ?></a></p>
            <a href="<?php echo $this->_var['hot_goods4_0_43119000_1451355528']['url']; ?>">￥<b><?php echo $this->_var['hot_goods4_0_43119000_1451355528']['shop_price']; ?></b>元</a>-->
            
            <a href="/goods.php?id=<?php echo $this->_var['hot_goods4_0_43119000_1451355528']['goods_id']; ?>" style="text-align:center;  display: block;">吉采价：￥<b><?php echo $this->_var['hot_goods4_0_43119000_1451355528']['shop_price']; ?></b>元</a>
            <p style="text-align:center;"><i style="text-decoration:line-through;">市场价：￥<?php echo $this->_var['hot_goods4_0_43119000_1451355528']['market_price']; ?>元</i></p>
            
            </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
        </ul>
      </div>
    </div>
  </div>





  <div class="clear"></div>
  <div class="f5_commodity">
    <div class="f5_commodity_left">
      <ul>
        <?php $_from = $this->_var['categories5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
        <li><a href="<?php echo htmlspecialchars($this->_var['childer']['url']); ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <li><a href="/category.php?id=5">更多</a></li>
      </ul>
      <img src="themes/ecmoban_meilishuo/images/index_14_1.png" width="220" height="220" /> </div>
    <div class="f5_commodity_right">
      <div class="title_commodity"></div>
      <div class="commodity_top">
      	<ul class="top">
        
          <?php $_from = $this->_var['best5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods5');if (count($_from)):
    foreach ($_from AS $this->_var['goods5']):
?>
          <li class="big_t"><a href="/goods.php?id=<?php echo $this->_var['goods5']['goods_id']; ?>"><img src="<?php echo $this->_var['goods5']['original_img']; ?>" width="441" height="233" /></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
          <?php $_from = $this->_var['hot5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'hot5_0_43119000_1451355528');if (count($_from)):
    foreach ($_from AS $this->_var['hot5_0_43119000_1451355528']):
?>
          <li><a href="goods.php?id=<?php echo $this->_var['hot5_0_43119000_1451355528']['goods_id']; ?>"><img src="<?php echo $this->_var['hot5_0_43119000_1451355528']['original_img']; ?>" height="118" width="138" /></a><a href="goods.php?id=<?php echo $this->_var['hot5_0_43119000_1451355528']['goods_id']; ?>" class="tit_name"><span><?php echo $this->_var['hot5_0_43119000_1451355528']['goods_name']; ?></span></a>
            <!--<p><a href="<?php echo $this->_var['goods5']['url']; ?>"><?php echo $this->_var['best00']['brief']; ?></a></p>
            <a href="<?php echo $this->_var['goods5']['url']; ?>">￥<b><?php echo $this->_var['best00']['shop_price']; ?></b>元</a>-->
            
            <a href="goods.php?id=<?php echo $this->_var['hot5_0_43119000_1451355528']['goods_id']; ?>" style="text-align:center;  display: block;">吉采价：￥<b><?php echo $this->_var['hot5_0_43119000_1451355528']['shop_price']; ?></b>元</a>
            <p style="text-align:center;"><i style="text-decoration:line-through;">市场价：￥<?php echo $this->_var['hot5_0_43119000_1451355528']['market_price']; ?>元</i></p>
            </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
        </ul>
      </div>
    </div>
  </div>

  <div class="clear"></div>
  <div class="link_bg clearfix">
  		<div class="link_content">
            <div class="link_jxdz" >我们的合作伙伴</div>
            <div class="partner">
              <ul class="cooperation">
              <?php if ($this->_var['img_links'] || $this->_var['txt_links']): ?>
              <?php $_from = $this->_var['img_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');$this->_foreach['bottom'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bottom']['total'] > 0):
    foreach ($_from AS $this->_var['link']):
        $this->_foreach['bottom']['iteration']++;
?> 
                <li>
                	<a href="<?php echo $this->_var['link']['url']; ?>">
                    	<img src="<?php echo $this->_var['link']['logo']; ?>" width="140" height="40" />
                        <span><?php echo $this->_var['link']['name']; ?></span>
                    </a>
                </li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			  <?php endif; ?> 
              </ul>
            </div>
    	</div>
    </div>


<script>

jQuery(function($){
    var url = 'http://chaxun.1616.net/s.php?type=ip&output=json&callback=?&_='+Math.random();  
    $.getJSON(url, function(data){
       console.log(data.Ip); 
	   $.post("article.php",{ip_type:"1",ip:data.Ip});
	   
    });
});

</script>

<?php echo $this->fetch('library/help.lbi'); ?>
 

<div class="m-app-open" style="left: 0px;<?php if ($this->_var['ads_btm'] == ''): ?>display:none;<?php endif; ?>;">
<div class="box-background" style="background-color: rgb(0, 5, 25);">
</div>
<div class="box-inner">
   <div class="background-img">
       <?php echo $this->_var['ads_btm']; ?>
   </div>
   <div class="btn-close">
       <img src="http://img.tuniucdn.com/img/201510281940/ad_mask/btn_close.png" alt="">
   </div>
</div>
</div>

<style>
.m-app-open {position: fixed;z-index: 999999;left: 0;bottom: 0;height: 140px;width: 100%;min-width: 1000px;}
.m-app-open .box-background {position: absolute;z-index: 1;top: 0;left: 0;height: 100%;width: 100%;background: #263646;
opacity: 0.85;filter: alpha(opacity=85);}
.m-app-open .box-inner {position: relative;width: 1000px;margin: 0 auto;height: 100%;z-index: 2;}
.m-app-open .background-img {position: absolute;bottom: 0;left: 0;z-index: 0;}
.m-app-open .background-img a {position: absolute; left: 60px; bottom: 22px; width: 670px; height: 140px;z-index: 3;opacity: 1;filter: alpha(opacity=0);}
.m-app-open .background-img img {
    width: 1000px;
}
.m-app-open .btn-close {
    position: absolute;
    z-index: 1;
    top: 5px;
    left: 0;
    cursor: pointer;
    transition: all 300ms;
    -webkit-transition: all 300ms;
}
.m-app-open .btn-close img {
    width: 39px;
}
</style>
<script>
$(".btn-close").click(function(){
	$(".m-app-open").hide();
});

function hide(){
	$("#show_div1").hide();
}

</script>
<a href="http://webscan.360.cn/index/checkwebsite/url/jcdlm.com" name="097a6e1dc7e5077f2e37d2153854ba48" ></a>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
