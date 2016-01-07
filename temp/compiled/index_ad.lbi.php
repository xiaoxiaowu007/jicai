 
<style type="text/css"> 
.container, .container *{margin:0; padding:0;}

.container{width:100%; height:419px; overflow:hidden;position:relative;}

.slider{position:absolute; width:100%; height:419px;}
.slider li , .slider li a{list-style:none; float:left;width:100%; height:419px;}
.slider img{width:100%; height:419px; display:block;}

.slider2{width:2000px;}
.slider2 li{float:left;}

.num{position:absolute; right:5px; bottom:5px; width:800px; margin:0 auto;}
.num li{
	float: left;
	color: #f69;
	text-align: center;
	line-height: 16px;
	width: 16px;
	height: 16px;
	font-family: Arial;
	font-size: 12px;
	cursor: pointer;
	overflow: hidden;
	margin: 3px 1px;
	border: 1px solid #f69;
	background-color: #fff;
}
.num li.on{
	color: #fff;
	line-height: 21px;
	width: 21px;
	height: 21px;
	font-size: 16px;
	margin: 0 1px;
	border: 0;
	background-color: #f69;
	font-weight: bold;
}
</style>

<div class="banner_index">
  <div class="index_banner" id="banner_tabs">
    <ul>
    <?php $_from = $this->_var['flash']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'flash_0_55219700_1451355528');$this->_foreach['myflash'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myflash']['total'] > 0):
    foreach ($_from AS $this->_var['flash_0_55219700_1451355528']):
        $this->_foreach['myflash']['iteration']++;
?> 
      <li style="z-index: 0; opacity: 1;"><a href="<?php echo $this->_var['flash_0_55219700_1451355528']['url']; ?>" target="_blank" title="点击查看详情"><img src="<?php echo $this->_var['flash_0_55219700_1451355528']['src']; ?>" width="100%"></a></li><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
    </ul>
     
    <img style="visibility:hidden;" src="themes/ecmoban_meilishuo/images/index_banner1.jpg" width="100%">
    <cite>
	 <?php $_from = $this->_var['flash']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'flash_0_55219700_1451355528');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['flash_0_55219700_1451355528']):
        $this->_foreach['no']['iteration']++;
?>
    <span class="cur"><?php echo $this->_foreach['no']['iteration']; ?></span>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </cite>
    <div class="clear"></div>
  </div>
  <script type="text/javascript">
(function(){
	if(!Function.prototype.bind){
		Function.prototype.bind = function(obj){
			var owner = this,args = Array.prototype.slice.call(arguments),callobj = Array.prototype.shift.call(args);
			return function(e){e=e||top.window.event||window.event;owner.apply(callobj,args.concat([e]));};
		};
	}
})();
var banner_tabs = function(id){
	this.ctn = document.getElementById(id);
	this.adLis = null;
	this.btns = null;
	this.animStep = 0.2;//动画速度0.1～0.9
	this.switchSpeed = 3;//自动播放间隔(s)
	this.defOpacity = 1;
	this.tmpOpacity = 1;
	this.crtIndex = 0;
	this.crtLi = null;
	this.adLength = 0;
	this.timerAnim = null;
	this.timerSwitch = null;
	this.init();
};
banner_tabs.prototype = {
	fnAnim:function(toIndex){
		if(this.timerAnim){window.clearTimeout(this.timerAnim);}
		if(this.tmpOpacity <= 0){
			this.crtLi.style.opacity = this.tmpOpacity = this.defOpacity;
			this.crtLi.style.filter = 'Alpha(Opacity=' + this.defOpacity*100 + ')';
			this.crtLi.style.zIndex = 0;
			this.crtIndex = toIndex;
			return;
		}
		this.crtLi.style.opacity = this.tmpOpacity = this.tmpOpacity - this.animStep;
		this.crtLi.style.filter = 'Alpha(Opacity=' + this.tmpOpacity*100 + ')';
		this.timerAnim = window.setTimeout(this.fnAnim.bind(this,toIndex),50);
	},
	fnNextIndex:function(){
		return (this.crtIndex >= this.adLength-1)?0:this.crtIndex+1;
	},
	fnSwitch:function(toIndex){
		if(this.crtIndex==toIndex){return;}
		this.crtLi = this.adLis[this.crtIndex];
		for(var i=0;i<this.adLength;i++){
			this.adLis[i].style.zIndex = 0;
		}
		this.crtLi.style.zIndex = 2;
		this.adLis[toIndex].style.zIndex = 1;
		for(var i=0;i<this.adLength;i++){
			this.btns[i].className = '';
		}
		this.btns[toIndex].className = 'cur'
		this.fnAnim(toIndex);
	},
	fnAutoPlay:function(){
		this.fnSwitch(this.fnNextIndex());
	},
	fnPlay:function(){
		this.timerSwitch = window.setInterval(this.fnAutoPlay.bind(this),this.switchSpeed*1000);
	},
	fnStopPlay:function(){
		window.clearTimeout(this.timerSwitch);
	},
	init:function(){
		this.adLis = this.ctn.getElementsByTagName('li');
		this.btns = this.ctn.getElementsByTagName('cite')[0].getElementsByTagName('span');
		this.adLength = this.adLis.length;
		for(var i=0,l=this.btns.length;i<l;i++){
			with({i:i}){
				this.btns[i].index = i;
				this.btns[i].onclick = this.fnSwitch.bind(this,i);
				this.btns[i].onclick = this.fnSwitch.bind(this,i);
			}
		}
		this.adLis[this.crtIndex].style.zIndex = 2;
		this.fnPlay();
		this.ctn.onmouseover = this.fnStopPlay.bind(this);
		this.ctn.onmouseout = this.fnPlay.bind(this);
	}
};
var player1 = new banner_tabs('banner_tabs');
</script> 
</div>

 
 
 <div class="blank5"></div>
<div class="blank"></div>