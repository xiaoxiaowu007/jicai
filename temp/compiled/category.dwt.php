<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />

<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="/themes/ecmoban_meilishuo/mb.css" rel="stylesheet" type="text/css" />

<?php if ($this->_var['cat_style']): ?>
<link href="<?php echo $this->_var['cat_style']; ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>

<style type="text/css">
/* v_show style */
.v_show {width:595px; margin:20px 0 1px 60px;}
.v_caption {height:35px; overflow:hidden; background:url(themes/ecmoban_meilishuo/images/btn_cartoon.gif) no-repeat 0 0;}
.v_caption h2 {float:left; width:84px; height:35px; overflow:hidden; background:url(themes/ecmoban_meilishuo/images/btn_cartoon.gif) no-repeat; text-indent:-9999px;}
.v_caption .cartoon {background-position: 0 -100px;}
.v_caption .variety {background-position:-100px -100px;}
.highlight_tip {display:inline; float:left; margin:14px 0 0 10px;}
.highlight_tip span {display:inline; float:left; width:7px; height:7px; overflow:hidden; margin:0 2px; background:url(themes/ecmoban_meilishuo/images/btn_cartoon.gif) no-repeat 0 -320px; text-indent:-9999px;}
.highlight_tip .current {background-position:0 -220px;}
.change_btn {float:left; margin:7px 0 0 10px;}
.change_btn span {display:block; float:left; width:30px; height:23px; overflow:hidden; background:url(themes/ecmoban_meilishuo/images/btn_cartoon.gif) no-repeat; text-indent:-9999px; cursor:pointer;}
.change_btn .prev {background-position:0 -400px;}
.change_btn .next {width:31px; background-position:-30px -400px;}
.v_caption em {display:inline; float:right; margin:10px 12px 0 0; font-family:simsun;}
.v_content {position:relative; width:592px; height:160px; overflow:hidden; border-right:1px solid #E7E7E7; border-bottom:1px solid #E7E7E7; border-left:1px solid #E7E7E7;}
.v_content_list {position:absolute; width:2500px;top:0px; left:0px;}
.v_content ul {float:left;}
.v_content ul li {display:inline; float:left; margin:10px 2px 0; padding:8px; background:url(themes/ecmoban_meilishuo/images/v_bg.gif) no-repeat;}
.v_content ul li a {display:block; width:128px; height:80px; overflow:hidden;}
.v_content ul li img {width:128px; height:96px;}
.v_content ul li h4 {width:128px; height:18px; overflow:hidden; margin-top:12px; font-weight:normal;}
.v_content ul li h4 a {display:inline !important; height:auto !important;}
.v_content ul li span {color:#666;}
.v_content ul li em {color:#888; font-family:Verdana; font-size:0.9em;}

/*幻灯片样式*/
.goodsItem{margin: 8px 0 0px 25px !important;}
.market_s{ margin-left: 9px !important;
margin-right: 4px !important;}
.list_gong{margin-top:12px;}
.right_category form{display:inline;}
</style>

<link href="/themes/ecmoban_meilishuo/datouwang.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/themes/ecmoban_meilishuo/style111.css" media="screen" />
<link href="/themes/ecmoban_meilishuo/simplefoucs_lrtk.css" rel="stylesheet" />


<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.8.3.min.js,transport.js,common.js,global.js,jiemi1.js')); ?>
</head>
<body>
<?php echo $this->fetch('library/page_header2.lbi'); ?>

<?php echo $this->_var['ads']; ?>

<script type="text/javascript">
	Qfast.add('widgets', {path: "/js/terminator_self3.js", type: "js", requires: ['fx']});  
	Qfast(false, 'widgets', function (){
		K.tabs({
			id: 'fsD1', 
			conId: "D1pic1", 
			tabId:"D1fBt", 
			tabTn:"a",
			conCn: '.fcon',
			auto: 1,
			effect: 'fade', 
			eType: 'click',
			pageBt:true,
			bns: ['.prev', '.next'],                  
			interval: 2000 
		}) 
	})  
</script>


<div class="category clearfix">
<div class="title_product_screening"><p> <?php echo $this->_var['ur_here']; ?> </p></div>
<h3 class="tit_h3"><span><?php echo $this->_var['lang']['goods_filter']; ?></span></h3>

<?php if ($this->_var['check'] == '0'): ?>
<div class="left_category" >产品类别：</div>
<div class="right_category">
<?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['no']['iteration']++;
?>
<a href="<?php echo $this->_var['cat']['url']; ?>" class="<?php if ($this->_var['parent_id'] == 0): ?><?php if ($this->_var['cat_id'] == $this->_var['cat'] [ 'id' ]): ?>current<?php endif; ?><?php else: ?><?php if ($this->_var['parent_id'] == $this->_var['cat'] [ id ]): ?>current<?php endif; ?><?php endif; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<?php endif; ?>

<?php if ($this->_var['check'] == '1'): ?>
<div class="left_category">产品分类：</div>
<div class="right_category">
<?php $_from = $this->_var['cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_0_99390500_1450059572');if (count($_from)):
    foreach ($_from AS $this->_var['cate_0_99390500_1450059572']):
?>
<a href="<?php echo $this->_var['cate_0_99390500_1450059572']['url']; ?>" class="<?php if ($this->_var['cat_id'] == $this->_var['cate_0_99390500_1450059572'] [ 'id' ]): ?>current<?php endif; ?>"><?php echo $this->_var['cate_0_99390500_1450059572']['name']; ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<?php endif; ?>

<?php if ($this->_var['cate_z']): ?>
<div class="left_category">产品子类：</div>
<div class="right_category">
<?php $_from = $this->_var['cate_z']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate_0_99390500_1450059572');if (count($_from)):
    foreach ($_from AS $this->_var['cate_0_99390500_1450059572']):
?>
<a href="/category.php?id=<?php echo $this->_var['cate_0_99390500_1450059572']['cat_id']; ?>" class="<?php if ($this->_var['cat_id'] == $this->_var['cate_0_99390500_1450059572'] [ 'cat_id' ]): ?>current<?php endif; ?>"><?php echo $this->_var['cate_0_99390500_1450059572']['cat_name']; ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>

<?php endif; ?>

</div>











<div class="zuhe_search">

	  <?php if ($this->_var['brands']['1'] || $this->_var['price_grade']['1'] || $this->_var['filter_attr_list']): ?>
	  <div class="box">
		 <div class="box_1">
			<?php if ($this->_var['brands']['1']): ?>
			<div class="screeBox">
			  <strong><?php echo $this->_var['lang']['brand']; ?>：</strong>
				<?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
					<?php if ($this->_var['brand']['selected']): ?>
					<span><?php echo $this->_var['brand']['brand_name']; ?></span>
					<?php else: ?>
					<a href="<?php echo $this->_var['brand']['url']; ?>"><?php echo $this->_var['brand']['brand_name']; ?></a>&nbsp;
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<?php endif; ?>
			<?php if ($this->_var['price_grade']['1']): ?>
			<div class="screeBox">
			<strong><?php echo $this->_var['lang']['price']; ?>：</strong>
			<?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?>
				<?php if ($this->_var['grade']['selected']): ?>
				<span><?php echo $this->_var['grade']['price_range']; ?></span>
				<?php else: ?>
				<a href="<?php echo $this->_var['grade']['url']; ?>"><?php echo $this->_var['grade']['price_range']; ?></a>&nbsp;
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
			<?php endif; ?>
			<?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_99390500_1450059572');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr_0_99390500_1450059572']):
?>
      <div class="screeBox">
			<strong><?php echo htmlspecialchars($this->_var['filter_attr_0_99390500_1450059572']['filter_attr_name']); ?> :</strong>
			<?php $_from = $this->_var['filter_attr_0_99390500_1450059572']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>
				<?php if ($this->_var['attr']['selected']): ?>
				<span><?php echo $this->_var['attr']['attr_value']; ?></span>
				<?php else: ?>
				<a href="<?php echo $this->_var['attr']['url']; ?>"><?php echo $this->_var['attr']['attr_value']; ?></a>&nbsp;
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		 </div>
		</div>
		<div class="blank"></div>
	  <?php endif; ?>
	 



</div>


<div class="clear"></div>

<div class="block clearfix">
  
  <div class="AreaL">
    
    
<?php echo $this->fetch('library/cat_recommend.lbi'); ?>



    
  </div>
  
  
  <div class="AreaR">
   
<?php echo $this->fetch('library/goods_list.lbi'); ?>
<?php echo $this->fetch('library/pages.lbi'); ?>
 
 
 
 



  </div>  
  
</div>


<?php echo $this->fetch('library/recommend_hot0.lbi'); ?>



</div>  




</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
