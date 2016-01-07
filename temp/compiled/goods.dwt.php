<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8">
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />

<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="/themes/ecmoban_meilishuo/mb.css" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'transport.js,common.js,jquery-1.7.2.min.js')); ?>
<script type="text/javascript" src="themes/ecmoban_meilishuo/js/action.js"></script>
<script type="text/javascript" src="themes/ecmoban_meilishuo/js/mzp-packed-me.js"></script>
<script type="text/javascript">
function $id(element){
  return document.getElementById(element);
}

//切屏--是按钮，_v是内容平台，_h是内容库
function reg(str){
  var bt=$id(str+"_b").getElementsByTagName("h2");
  for(var i=0;i<bt.length;i++){
    bt[i].subj=str;
    bt[i].pai=i;
    bt[i].style.cursor="pointer";
    bt[i].onclick=function(){
      $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
      for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++){
        var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
        var ison=j==this.pai;
        _bt.className=(ison?"h2bg1":"");
      }
    }
  }
  $id(str+"_h").className="none";
  $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
}

</script>
<style>
.like_products{width: 952px !important;}
.left_hot{margin-top:7px;}
.AreaR {
  width: 951px;
  float: right;
  padding-bottom: 30px;
  margin-right:0px;
  margin-top:0px;
}
.box_1{border:0px;}
.box_1 h3 span{padding-left:0px;}
.box_1 h3 {background:#fff; border-bottom:1px solid #ddd;}
#goodsInfo{border-right:1px dashed #ddd;}
.like_products{height:270px !important;}
.yScrollList{height:268px !important;}
.yScrollListInList ul{margin-top:15px;}
</style>
</head>
<body>
<?php echo $this->fetch('library/page_header2.lbi'); ?>

  <?php echo $this->fetch('library/ur_here.lbi'); ?>

<div class="block clearfix">
  
  
  
  <div class="AreaR" style="float:left;">
   
   <div id="goodsInfo" class="clearfix">
    
     
     <div class="imgInfo">
     <a href="<?php echo $this->_var['pictures']['0']['img_url']; ?>" id="zoom1" class="MagicZoom MagicThumb" title="<?php echo $this->_var['goods']['goods_style_name']; ?>">
      <img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="360px;" height="360px"/>
     </a>
     <div class="blank5"></div>
 
         <div class="blank"></div>
           
     <?php echo $this->fetch('library/goods_gallery.lbi'); ?>
     
         

     </div>
     
     <div class="textInfo">
     <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
	  <h1 class="clearfix" >
      <?php echo $this->_var['goods']['goods_style_name']; ?>
      </h1>
      
      <p class="tb-subtitle">
 		<?php echo $this->_var['goods']['goods_brief']; ?>
      </p>
      <style>
	  	.tb-subtitle {
		  margin-top: 5px;
		  padding-bottom: 15px;
		  color: #6C6C6C;
		    font-weight: normal !important;
  font-size: 12px !important;
}		
		.box_1{min-height:600px;}
	  </style> 
 
       <?php if ($this->_var['promotion']): ?>
      <div class="padd">
      <?php $_from = $this->_var['promotion']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      
      
      <?php if ($this->_var['item']['type'] == "snatch"): ?>
      <a href="snatch.php" title="<?php echo $this->_var['lang']['snatch']; ?>" style="font-weight:100; color:#f69; text-decoration:none;">[<?php echo $this->_var['lang']['snatch']; ?>]</a>
      <?php elseif ($this->_var['item']['type'] == "group_buy"): ?>
      <a href="group_buy.php" title="<?php echo $this->_var['lang']['group_buy']; ?>" style="font-weight:100; color:#f69; text-decoration:none;">[<?php echo $this->_var['lang']['group_buy']; ?>]</a>
      <?php elseif ($this->_var['item']['type'] == "auction"): ?>
      <a href="auction.php" title="<?php echo $this->_var['lang']['auction']; ?>" style="font-weight:100; color:#f69; text-decoration:none;">[<?php echo $this->_var['lang']['auction']; ?>]</a>
      <?php elseif ($this->_var['item']['type'] == "favourable"): ?>
      <a href="activity.php" title="<?php echo $this->_var['lang']['favourable']; ?>" style="font-weight:100; color:#f69; text-decoration:none;">[<?php echo $this->_var['lang']['favourable']; ?>]</a>
      <?php endif; ?>
      <a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo $this->_var['lang'][$this->_var['item']['type']]; ?> <?php echo $this->_var['item']['act_name']; ?><?php echo $this->_var['item']['time']; ?>" style="font-weight:100; color:#f69;"><?php echo $this->_var['item']['act_name']; ?></a><br />
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
      <?php endif; ?> 
	   
	  
	  <ul class="ul2 clearfix">
        <li class="clearfix" style="width:100%">
       <dd class="price_dd">
 
       
       <div><strong>吉采价：</strong><font class="shop" id="ECS_SHOPPRICE"><?php echo $this->_var['goods']['shop_price_formated']; ?></font>元</div>
   	   <div><strong>市场价：</strong><?php if ($this->_var['cfg']['show_marketprice']): ?>
       <font class="market"><?php echo $this->_var['goods']['market_price']; ?></font>元 
       <?php endif; ?></div>
       <input type="hidden" id="shop_price0" value="<?php echo $this->_var['goods']['shop_price_formated']; ?>"/>
       
       </dd>
       </li>
      
      
       <?php if ($this->_var['cfg']['show_goodssn']): ?>
      <li class="clearfix" style="display:none;">
       <dd>
       <strong><?php echo $this->_var['lang']['goods_sn']; ?></strong><?php echo $this->_var['goods']['goods_sn']; ?>
      
       </dd>
       </li> 
        <?php endif; ?>

	
        <?php if ($this->_var['cfg']['show_goodsweight']): ?>
       <li class="clearfix">
       <dd>
       
       <strong><?php echo $this->_var['lang']['goods_weight']; ?></strong><?php echo $this->_var['goods']['goods_weight']; ?>
       
       </dd>
      </li>
      <?php endif; ?>  

       <li class="clearfix" style=" height:50px; line-height:50px;">
       <dd>
       
       <strong>已售：</strong><?php echo $this->_var['goods']['sales_num']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
       </dd>
       <dd>
       <strong><?php echo $this->_var['lang']['goods_sn']; ?></strong><?php echo $this->_var['goods']['goods_sn']; ?>
      
       </dd>
       
       <?php if ($this->_var['goods']['goods_number'] != "" && $this->_var['cfg']['show_goodsnumber']): ?>
       <dd>
        <?php if ($this->_var['goods']['goods_number'] == 0): ?>
          <strong><?php echo $this->_var['lang']['goods_number']; ?></strong>
          <font color='red'><?php echo $this->_var['lang']['stock_up']; ?></font>
        <?php else: ?>
          <strong><?php echo $this->_var['lang']['goods_number']; ?></strong>
          <?php echo $this->_var['goods']['goods_number']; ?><?php echo $this->_var['goods']['measure_unit']; ?>
        <?php endif; ?>
     
       </dd>
       <?php endif; ?>
      </li>
	  </ul>
	  
	  
	  <ul style="display:none;">
     
        

      <?php if ($this->_var['volume_price_list']): ?>
      <li class="padd">
       <font class="f1"><?php echo $this->_var['lang']['volume_price']; ?>：</font><br />
			 <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#aad6ff">
				<tr>
					<td align="center" bgcolor="#FFFFFF"><strong><?php echo $this->_var['lang']['number_to']; ?></strong></td>
					<td align="center" bgcolor="#FFFFFF"><strong><?php echo $this->_var['lang']['preferences_price']; ?></strong></td>
				</tr>
				<?php $_from = $this->_var['volume_price_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('price_key', 'price_list');if (count($_from)):
    foreach ($_from AS $this->_var['price_key'] => $this->_var['price_list']):
?>
				<tr>
					<td align="center" bgcolor="#FFFFFF" class="shop"><?php echo $this->_var['price_list']['number']; ?></td>
					<td align="center" bgcolor="#FFFFFF" class="shop"><?php echo $this->_var['price_list']['format_price']; ?></td>
				</tr>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	     </table>
      </li>
      <?php endif; ?>

      <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
      <?php echo $this->smarty_insert_scripts(array('files'=>'lefttime.js')); ?>
      <li class="padd loop" style="margin-bottom:5px; border-bottom:1px dashed #ccc; display:none;">
      <strong><?php echo $this->_var['lang']['promote_price']; ?></strong><font class="shop"><?php echo $this->_var['goods']['promote_price']; ?></font><br />
      <strong><?php echo $this->_var['lang']['residual_time']; ?></strong>
      <font class="f4" id="leftTime"><?php echo $this->_var['lang']['please_waiting']; ?></font><br />
      </li>
      <?php endif; ?>
  
  
  <li class="clearfix">
       <dd >
  
       <?php $_from = $this->_var['rank_prices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'rank_price');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['rank_price']):
?>
       <?php echo $this->_var['rank_price']['rank_name']; ?>：<font class="f1" id="ECS_RANKPRICE_<?php echo $this->_var['key']; ?>" style=" padding-right:10px;"><?php echo $this->_var['rank_price']['price']; ?></font> 
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       
        <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)">收藏</a> |  
        <?php if ($this->_var['affiliate']['on']): ?>
      <a href="user.php?act=affiliate&goodsid=<?php echo $this->_var['goods']['goods_id']; ?>" >推荐</a>
      <?php endif; ?>
   </dd>
      </li>
  
       <?php if ($this->_var['goods']['give_integral'] > 0): ?>
       <li class="clearfix" style="display:none;">
       <dd >
       
        <strong><?php echo $this->_var['lang']['goods_give_integral']; ?></strong><font class="f4"><?php echo $this->_var['goods']['give_integral']; ?> <?php echo $this->_var['points_name']; ?></font>
        
       </dd>
      </li>
      <?php endif; ?>
      <?php if ($this->_var['goods']['bonus_money']): ?>
      <li class="padd loop" style="margin-bottom:5px; border-bottom:1px dashed #ccc;display:none;">
      <strong><?php echo $this->_var['lang']['goods_bonus']; ?></strong><font class="shop"><?php echo $this->_var['goods']['bonus_money']; ?></font><br />
      </li>
      <?php endif; ?>
  
      
       <?php if ($this->_var['cfg']['use_integral']): ?>

        <li class="clearfix">
       <dd>
       <strong><?php echo $this->_var['lang']['goods_integral']; ?></strong><font class="f4"><?php echo $this->_var['goods']['integral']; ?> <?php echo $this->_var['points_name']; ?></font>
       </dd>
      </li>
       <?php endif; ?>
         <?php if ($this->_var['goods']['is_shipping']): ?>
      <li style="height:30px;padding-top:4px; display:none;">
      <?php echo $this->_var['lang']['goods_free_shipping']; ?><br />
      </li>
      <?php endif; ?>
            </ul>
         <ul class="bnt_ul">
      
      
      <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
      <li class="padd">
      
        
                    <?php if ($this->_var['spec']['attr_type'] == 1): ?>
                      <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?>
              <div class="catt"><strong class="catb"><?php echo $this->_var['spec']['name']; ?>:</strong><div style="float: left;    width: 399px;">
<?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
  <a <?php if ($this->_var['key'] == 0): ?>class="cattsel"<?php endif; ?> onclick="changeAttr(this.id)" id="p_<?php echo $this->_var['value']['id']; ?>" href="javascript:;" name="<?php echo $this->_var['value']['id']; ?>"><?php if ($this->_var['value']['img'] == ''): ?> <?php echo $this->_var['value']['label']; ?> <?php endif; ?><?php if ($this->_var['value']['img']): ?><img src="<?php echo $this->_var['value']['img']; ?>" width="50" height="50" onclick="changeImg(this)"/><?php endif; ?><input style="display:none" id="spec_value_<?php echo $this->_var['value']['id']; ?>" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> /><input type="hidden" value="<?php echo $this->_var['value']['price']; ?>" id="price_<?php echo $this->_var['value']['id']; ?>"/><input type="hidden" value="<?php echo $this->_var['value']['market_price']; ?>" id="market_price_<?php echo $this->_var['value']['id']; ?>"/></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
              <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                      <?php endif; ?>                      
                    <?php else: ?>
                    <div class="blank10"></div>
                      <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
              <label for="spec_value_<?php echo $this->_var['value']['id']; ?>">                      
          <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
                      <?php echo $this->_var['value']['label']; ?></label>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                    <?php endif; ?>
      </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
      
      
      
           <li class="clearfix">
        <dd>
       <strong><?php echo $this->_var['lang']['number']; ?>：</strong>
        
        <div class="goods_cut" onclick="goods_cut();"><img src="themes/ecmoban_meilishuo/images/plus1.gif" alt="减少" width="15" height="15" /></div>
<input name="number" type="text" id="number" value="1" size="4"  style="  text-align: center;float: left;border:1px solid #ccc; "/>
<div class="goods_add" onclick="goods_add();"><img src="themes/ecmoban_meilishuo/images/plus2.gif" alt="增加" width="15" height="15" /></div>

        
        
        
        <style>
		
		/*--------------商品详情页增加减少-------------*/
		.textInfo ul strong{float:left;}
		.goods_gds {
			height:35px;
			display:block;
			overflow:hidden;
		}
		.bnt_ul li{margin:10px 0px;}
		.goods_font {
			display:block;
			float:left;    
			height:15px;
			margin:3px 3px 0;
			font-size:12px;
		}
		.goods_cut {
			border:0 none;
			cursor:pointer;
			display:block;
			float:left;
			font-size:0;
			height:15px;
			line-height:0;
			margin:3px 3px 0;
			width:15px;
			padding-right:0px;
			_padding-right:0px;
		}
		input.goodsBuyBox,input.number {
			border:1px solid #DDDDDD;
			float:left;
			font-size:10px;
			height:18px;
			line-height:18px;
			margin:5px 5px 5px 5px;
			padding:0;
			text-align:center;
		}
		.goods_add {
			border:0 none;
			cursor:pointer;
			display:block;
			float:left;
			font-size:0;
			height:15px;
			line-height:0;
			margin:3px 3px 0;
			width:15px;
		}
		.goods_number_tit{
			display: block;
			background:none;
			text-align:left;
			padding-left:5px; 
		}
		</style>
        
        
        
        <script>
		
		function goods_cut(){

		var num_val=document.getElementById('number');
		
		var new_num=num_val.value;
		
		var Num = parseInt(new_num);
		
		if(Num>1)Num=Num-1;
		
		num_val.value=Num;
		
		}
		
		function goods_add(){

		var num_val=document.getElementById('number');
		
		var new_num=num_val.value;
		
		var Num = parseInt(new_num);
		
		Num=Num+1;
		
		num_val.value=Num;
		
		}
		
		function changeImg(t){
		
			document.getElementById("zoom1").childNodes[0].src = t.src ;
		
		}
		
		
		</script>
        
        
        
        
        <!--<strong><?php echo $this->_var['lang']['amount']; ?>：</strong><font id="ECS_GOODS_AMOUNT" class="f1"></font>-->
       </dd>
       </li>
      
      <li class="padd clearfix" style="   margin-top: 44px; ">
      <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)"><img src="themes/ecmoban_meilishuo/images/goumai2.gif" /></a>
     <a href="tencent://message/?uin=<?php echo $this->_var['t_qq']; ?>&websiteName=(www.jcdlm.com)&Menu=yes"><img src="themes/ecmoban_meilishuo/images/index_47.png" /></a>
      </li>
     
      </ul>
      </form>
      <div class="sale_00"><span>诚信发货</span><span>正品保证</span><span>货真价实</span></div>
     </div>
   </div>
   <div class="blank"></div>
   
   
   
   <style>
   
   .catt .catb {
    height:auto;
    overflow:hidden;
    line-height:30px;
    float:left;
}
.catt {
    width:100%;
    height:auto;
    overflow:hidden;
    padding-bottom:5px;
    text-decoration:none;
}
.catt a {
    border:#c8c9cd 1px solid;
    text-align:center;
    background-color:#fff;
    margin-left:5px;
    margin-top:6px;
    display:block;
    white-space:nowrap;
    color:#000;
    text-decoration:none;
    float:left;
}
.catt a:hover {
    border:#ff6701 2px solid;
    margin:-1px;
    margin-left:4px;
    margin-top:5px;
}
.catt a:focus {
    outline-style:none;
}
.catt .cattsel {
    border:#ff6701 2px solid;
    margin:-1px;
    background:url("images/test.gif") no-repeat bottom right;
    margin-left:4px;
    margin-top:5px;
}
.catt .cattsel a:hover {
    border:#ff6701 2px solid;
    margin:-1px;
    background:url("images/test.gif") no-repeat bottom right;
}
   
   </style>
   
   
   
   
   <script>
   
	/*function changeAtt(t){
		//t.getElementsByTagName("input").checked='checked';
		t.lastChild.checked='checked';
		for (var i = 0; i<t.parentNode.childNodes.length;i++) {
				if (t.parentNode.childNodes[i].className == 'cattsel') {
					t.parentNode.childNodes[i].className = '';
				}
			}
			
		t.className = "cattsel";
		changePrice();
	}*/
	
	
   

	
	function changeAttr(p){
	    //alert(p);
		t=document.getElementById(p);
		//alert(t.parentNode.childNodes.length);
		for (var i = 0; i<t.parentNode.childNodes.length;i++) {
				if (t.parentNode.childNodes[i].className == 'cattsel'){
					t.parentNode.childNodes[i].className = '';
					//delete t.parentNode.childNodes[i].childNodes[1].checked;
					t.parentNode.childNodes[i].childNodes[1].checked = false;
					//alert(t.parentNode.childNodes[i].childNodes[1]+"---"+i+"--"+t.parentNode.childNodes[i]);
					
				}else{
					//t.parentNode.childNodes[i].className = 'cattsel';
					//alert(t.parentNode.childNodes[i].childNodes[1]+"---"+i+"--"+t.parentNode.childNodes[i]);
					//t.parentNode.childNodes[i].childNodes[1].checked=true;
					//t.parentNode.childNodes[i].lastChild.checked=;
					t.parentNode.childNodes[i].className = 'pp';
					//alert(t.parentNode.childNodes[i].childNodes[1]+"---"+i+"--"+t.parentNode.childNodes[i]);
				}
		}
		t.className = 'cattsel';
		t.childNodes[1].checked = true;
		chu_val = document.getElementById("shop_price0").value; 
		attr_val = document.getElementById(p).getElementsByTagName("input")[1].value;
		
		//点击跟换相应的市场价格
		var id_arr = new Array();
		id_arr = p.split("_");
		
		market_price = document.getElementById("market_price_"+id_arr[1]).value;
		
		getElementsClass('market')[0].innerHTML=market_price;
		
		
		
		//alert(parseFloat(attr_val));
		
		document.getElementById("ECS_SHOPPRICE").innerHTML = (parseFloat(chu_val)+parseFloat(attr_val)).toFixed(2);
		
		//alert((parseFloat(chu_val)+parseFloat(attr_val)).toFixed(2));
		
		//alert(t.childNodes[1].getAttribute('checked'));
		//t.childNodes[1].checked = true;
		
		//alert("nimen"+t.childNodes[1].checkd = true);
		
		//$("#p_1007").removeClass('cattsel');
		
		/*$("#"+p).siblings().find("input").attr("checked",flase);
		$("#"+p).find("input").attr("checked",true);
   		$("#"+p).addClass('cattsel');
		*/
		///changePrice();
   
   }
	
   
function getElementsClass(classnames){ 
	var classobj= new Array();//定义数组 
	 
	var classint=0;//定义数组的下标 
	 
	var tags=document.getElementsByTagName("*");//获取HTML的所有标签 
	 
	for(var i in tags){//对标签进行遍历 
	 
		if(tags[i].nodeType==1){//判断节点类型 
		 
			if(tags[i].getAttribute("class") == classnames)//判断和需要CLASS名字相同的，并组成一个数组 
			 
			{ 
			 
				classobj[classint]=tags[i]; 
				 
				classint++; 
			 
			} 
		 
		} 
	 
	} 
	 
	return classobj;//返回组成的数组 
 
} 
   
   
   
   
   </script>
   
   
   <div class="like_products"><div class="yScrollList">
	<div class="yScrollListTitle"><h1 class="yth1click">相关推荐</h1></div>
	<div class="yScrollListIn">
		<div class="yScrollListInList yScrollListInList1" style="display:block;">
			<ul style="width: 2684px;">
				<?php $_from = $this->_var['goods_recommend']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_93240100_1450066207');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_93240100_1450066207']):
?>
                <li>
					<a href="/goods.php?id=<?php echo $this->_var['goods_0_93240100_1450066207']['goods_id']; ?>">
						<img src="<?php echo $this->_var['goods_0_93240100_1450066207']['original_img']; ?>">
						<p>￥<?php echo $this->_var['goods_0_93240100_1450066207']['shop_price']; ?>  市场价：<del>￥<?php echo $this->_var['goods_0_93240100_1450066207']['market_price']; ?></del></p>
						<span><?php echo $this->_var['goods_0_93240100_1450066207']['goods_name']; ?></span>
					</a>
                    
				</li>
                
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			<div class="yScrollListbtn yScrollListbtnl"></div>
			<div class="yScrollListbtn yScrollListbtnr"></div>
		</div>
		<div class="yScrollListInList yScrollListInList2">
		</div>
	</div>
</div>
</div>
   
   
   
   
   
   
   
     <div class="box">
 
      <div style="padding:0 0px;">
        <div id="com_b" class="history clearfix">
        <h2 class="h2bg1">商品描述</h2>
        <h2><?php echo $this->_var['lang']['goods_attr']; ?></h2>
           <h2>售后服务</h2>
           
        <?php if ($this->_var['package_goods_list']): ?>
        <h2 class="h2bg" style="color:red;"><?php echo $this->_var['lang']['remark_package']; ?></h2>
        <?php endif; ?>
        </div>
      </div>    <div class="box_1">
      <div id="com_v" style="padding:6px; padding-top:30px;"></div>
      <div id="com_h">
      
      
       <blockquote>
        <?php echo $this->_var['goods']['goods_desc']; ?>
       </blockquote>
       
       
       
       <blockquote>
       <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
       <h3 style="text-align:center;"><?php echo htmlspecialchars($this->_var['key']); ?></h3>
       <ul class="suxing_ul clearfix">
       <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
       <li><?php echo htmlspecialchars($this->_var['property']['name']); ?>:<?php echo $this->_var['property']['value']; ?></li>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       </ul>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     </blockquote>
     
     
    
 
 
<blockquote>
   	<?php echo $this->_var['shouhou']['content']; ?>
</blockquote>
  

     <?php if ($this->_var['package_goods_list']): ?>
     <blockquote>
       <?php $_from = $this->_var['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods']):
?>
			  <strong><?php echo $this->_var['package_goods']['act_name']; ?></strong><br />
        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#dddddd">
				<tr>
					<td bgcolor="#FFFFFF">
					<?php $_from = $this->_var['package_goods']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['goods_list']):
?>
					<a href="goods.php?id=<?php echo $this->_var['goods_list']['goods_id']; ?>" target="_blank"><font class="f1"><?php echo $this->_var['goods_list']['goods_name']; ?></font></a> &nbsp;&nbsp;X <?php echo $this->_var['goods_list']['goods_number']; ?><br />
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</td>
					<td bgcolor="#FFFFFF">
					<strong><?php echo $this->_var['lang']['old_price']; ?></strong><font class="market"><?php echo $this->_var['package_goods']['subtotal']; ?></font><br />
          <strong><?php echo $this->_var['lang']['package_price']; ?></strong><font class="shop"><?php echo $this->_var['package_goods']['package_price']; ?></font><br />
          <strong><?php echo $this->_var['lang']['then_old_price']; ?></strong><font class="shop"><?php echo $this->_var['package_goods']['saving']; ?></font><br />
					</td>
					<td bgcolor="#FFFFFF">
					<a href="javascript:addPackageToCart(<?php echo $this->_var['package_goods']['act_id']; ?>)" style="background:transparent"><img src="themes/ecmoban_meilishuo/images/bnt_buy_1.gif" alt="<?php echo $this->_var['lang']['add_to_cart']; ?>" /></a>
					</td>
				</tr>
	    </table>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     </blockquote>
     <?php endif; ?>


      </div>
     </div>
    </div>
    <script type="text/javascript">
    <!--
    reg("com");
    //-->
    </script>
  <div class="blank"></div>
  
   

 

  </div>
  
    <div class="AreaL" style="float:right;  margin-top: -11px;">
    
    



    
    <?php echo $this->fetch('library/history.lbi'); ?>
    <div class="left_hot">
    <h3><span style="text-align:center; display:block; width:100%;">--设计师推荐--</span></h3>
<ul>

<?php $_from = $this->_var['people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'people_0_93340200_1450066207');if (count($_from)):
    foreach ($_from AS $this->_var['people_0_93340200_1450066207']):
?>
	<li>
        <a href="/article_type.php?id=<?php echo $this->_var['people_0_93340200_1450066207']['id']; ?>&type=sjs"><img src="<?php echo $this->_var['people_0_93340200_1450066207']['sjs_img']; ?>" width="155"></a>
        <p><a href="/article_type.php?id=<?php echo $this->_var['people_0_93340200_1450066207']['id']; ?>&type=sjs">姓名：<?php echo $this->_var['people_0_93340200_1450066207']['sjs_name']; ?></a></p>
        <p><a href="/article_type.php?id=<?php echo $this->_var['people_0_93340200_1450066207']['id']; ?>&type=sjs">工作年限：<?php echo $this->_var['people_0_93340200_1450066207']['experience']; ?></a></p>
     </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>



</div>
  </div>
  
  
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
  fixpng();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
  
  //document.getElementById("ECS_SHOPPRICE").innerHTML='119';
  
  

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}


function changePrice1()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
  
  //document.getElementById("ECS_SHOPPRICE").innerHTML='119';
  
  

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse1, 'GET', 'JSON');
}


function changePriceResponse1(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    /*if (document.getElementById('ECS_SHOPPRICE'))
      document.getElementById('ECS_SHOPPRICE').innerHTML = res.result;*/
  }
}


/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_SHOPPRICE'))
      document.getElementById('ECS_SHOPPRICE').innerHTML = res.result;
  }
}

</script>
</html>
