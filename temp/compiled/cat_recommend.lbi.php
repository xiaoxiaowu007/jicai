<div class="box" > <div class="box_1">
 <h3><span style="text-align:center; display:block; width:100%;">--推荐--</span></h3>
 
  <div class="boxCenterList clearfix" id='history_list'>
    <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <ul class="clearfix">
    	<li class="goodsimg">
        	<a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>"></a>
            <p><span>¥<?php echo $this->_var['goods']['shop_price']; ?>元<del>市场价：<?php echo $this->_var['goods']['market_price']; ?>元</del></span></p>
            <p><a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a></p>
            <p class="p_color"><a href="<?php echo $this->_var['goods']['url']; ?>"><b>▏<?php echo $this->_var['goods']['goods_brief']; ?></b></a></p>
        
        </li>
    </ul>
  	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
 </div>
</div>
<div class="blank5"></div>