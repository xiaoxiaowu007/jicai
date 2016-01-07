<?php

/**
 * ECSHOP 管理中心文章处理程序文件
 * ============================================================================
 * * 版权所有 2005-2012 欧嘉科技，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: article.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . "includes/fckeditor/fckeditor.php");
require_once(ROOT_PATH . 'includes/cls_image.php');

/*初始化数据交换对象 */
$exc   = new exchange($ecs->table("article"), $db, 'article_id', 'title');

$exc1   = new exchange($ecs->table("article_sjs"), $db, 'id', 'sjs_name');


$exc2   = new exchange($ecs->table("article_jg"), $db, 'id', 'jg_name');

//$image = new cls_image();

/* 允许上传的文件类型 */
$allow_file_types = '|GIF|JPG|PNG|BMP|SWF|DOC|XLS|PPT|MID|WAV|ZIP|RAR|PDF|CHM|RM|TXT|';


/*------------------------------------------------------ */
//-- 文章列表
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'list')
{
	/* 权限检查 */
    admin_priv('article_manage');
	
//	$result = get_filter();
//	
//	print_r($result);
	
	
    /* 取得过滤条件 */
    $filter = array();
    $smarty->assign('cat_select',  article_cat_list(0));
	
	$cat_id    = array();
	$rank_id = array();
	
	if(strpos($_SESSION['rank_id'],"article_a") !== false){
		$rank_id = explode("article_a",$_SESSION['rank_id']);
		foreach( $rank_id as $key => $val){
			if( is_numeric($val)){
				$cat_id[]=$val;
			}
		}
		
		$cat_id_str = implode(",",$cat_id);
	
		$cat_id_str = "cat_id in (".$cat_id_str.") ";	
		
		  $article_list = get_articleslist($cat_id_str);
	}
	
	
	
	
	
    $smarty->assign('ur_here',      $_LANG['03_article_list']);
    $smarty->assign('action_link',  array('text' => $_LANG['article_add'], 'href' => 'article.php?act=add'));
    $smarty->assign('full_page',    1);
    $smarty->assign('filter',       $filter);
	
  
	
//	echo "<pre>";
//	print_r($article_list);
//	echo "</pre>";
	
    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    assign_query_info();
	
    $smarty->display('article_list.htm');
}

/*------------------------------------------------------ */
//-- 设计师列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'sjs_list')
{
    /* 取得过滤条件 */
    $filter = array();
    $smarty->assign('cat_select',  article_cat_list(0));
	
    $smarty->assign('ur_here',      $_LANG['03_article_list']);
    $smarty->assign('action_link',  array('text' => $_LANG['article_add'], 'href' => 'article.php?act=add'));
    $smarty->assign('full_page',    1);
    $smarty->assign('filter',       $filter);

    $article_list = get_sjs_articleslist();

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    assign_query_info();
	
    $smarty->display('article_sjs_list.htm');
}


/*------------------------------------------------------ */
//-- 技工列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list_jg')
{
    /* 取得过滤条件 */
    $filter = array();
    $smarty->assign('cat_select',  article_cat_list(0));
	
    $smarty->assign('ur_here',      $_LANG['03_article_list']);
    $smarty->assign('action_link',  array('text' => $_LANG['article_add'], 'href' => 'article.php?act=add'));
    $smarty->assign('full_page',    1);
    $smarty->assign('filter',       $filter);

    $article_list = get_jg_articleslist();

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    assign_query_info();
	
    $smarty->display('article_jg_list.htm');
}


/**
 * 这个是获取服务中心的列表
 * **/
if ($_REQUEST['act'] == 'list0')
{
	admin_priv('02_ssj_fwzx');
	
    /* 取得过滤条件 */
    $filter = array();
    $smarty->assign('cat_select',  article_cat_list(0));
	
    $smarty->assign('ur_here',      $_LANG['03_article_list']);
    $smarty->assign('action_link',  array('text' => $_LANG['article_add'], 'href' => 'article.php?act=add0'));
    $smarty->assign('full_page',    1);
    $smarty->assign('filter',       $filter);

    $article_list = get_articleslist0('服务中心');
	
	

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    assign_query_info();
	
    $smarty->display('article_list0.htm');
}


/**
 * 这个是获取服务中心的列表
 * **/
if ($_REQUEST['act'] == 'list_jxscx')
{
	/* 权限判断 */
    admin_priv('03_ssj_jxscx');
	
    /* 取得过滤条件 */
    $filter = array();
    $smarty->assign('cat_select',  article_cat_list(0));
	
    $smarty->assign('ur_here',      $_LANG['03_article_list']);
    $smarty->assign('action_link',  array('text' => $_LANG['article_add'], 'href' => 'article.php?act=add_jxscx'));
    $smarty->assign('full_page',    1);
    $smarty->assign('filter',       $filter);

    $article_list = get_articleslist0("经销商");

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    assign_query_info();
	
    $smarty->display('article_list_jxscx.htm');
}


/**
 * 这个是获取直销店招商的列表
 * **/
if ($_REQUEST['act'] == 'list_zxdzs')
{
	/* 权限判断 */
    admin_priv('04_ssj_zxdzs');
	
    /* 取得过滤条件 */
    $filter = array();
    $smarty->assign('cat_select',  article_cat_list(0));
	
    $smarty->assign('ur_here',      $_LANG['03_article_list']);
    $smarty->assign('action_link',  array('text' => $_LANG['article_add'], 'href' => 'article.php?act=add_zxdzs'));
    $smarty->assign('full_page',    1);
    $smarty->assign('filter',       $filter);

    $article_list = get_articleslist0("直销店招商");

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    assign_query_info();
	
    $smarty->display('article_list_zxdzs.htm');
}



/**
 * 这个是获取客服qq 给39个市场用的 每个商品必须对应一个市场
 * **/
if ($_REQUEST['act'] == 'list_kfqq')
{
	/* 权限判断 */
    admin_priv('05_ssj_kfqq');
	
    /* 取得过滤条件 */
    $filter = array();
	
	$mes= goods_category();
	
    $smarty->assign('cat_list',  $mes);
	
	$smarty->assign('full_page',    1);
	
    $smarty->assign('article_list',    $article_list['arr']);
	
    $smarty->display('article_list_kfqq.htm');
}

/**
 * 这个是获取客服qq 给39个市场用的 每个商品必须对应一个市场 更新操作
 * **/
if ($_REQUEST['act'] == 'update_kfqq')
{
	/* 权限判断 */
    admin_priv('05_ssj_kfqq');
	
	//先组成一个包含客服qq和栏目id
	$cat_id_arr = $_POST['cat_id'];
	$cat_kfqq = $_POST['kfqq'];
	
	//把栏目id变成id字符串
	$cat_id_attr = implode(",",$cat_id_arr);
	
	
	foreach($cat_id_arr as $key => $val){
		$cat_id_info[$key]['cat_id'] = $cat_id_arr[$key];
		$cat_id_info[$key]['cat_kfqq'] = $cat_kfqq[$key];
	}
	
	/**后面的思路不对
		存的时候 简单存
		读的时候再遍历就会简单点
	**/
	
	//现在就直接更新ecs_category
	$sql_update = "UPDATE ecs_category 
    SET kfqq = CASE cat_id";
	
	foreach($cat_id_info as $key => $val){ 
	
       $sql_update .=" WHEN ".$val['cat_id']." THEN '".$val['cat_kfqq']."'";
		
	}
   $sql_update .="END
	WHERE cat_id IN (".$cat_id_attr.")";
	
	$mes = $GLOBALS['db']->query($sql_update);
	
	if($mes){
		$link[0]['text'] = $_LANG['back_list'];
		$link[0]['href'] = 'article.php?act=list_kfqq';
		$note = sprintf($_LANG['articleedit_succeed'], stripslashes($_POST['title']));
		sys_msg($note, 0, $link);
		
	}else{
		
		die($db->error());
	}
	
	
	
	//然后对这些id做一一的修改和更新
	
	
	//最后就可以直接在商品调用的页面直接调用栏目的客服qq了，无需对数据进行处理才能得出客服qq  这些也是提高网站打开速度的方法之一
	
	
	
}



/*------------------------------------------------------ */
//-- 翻页，排序 设计师
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'query_sjs')
{
    check_authz_json('article_manage');

    $article_list = get_sjs_articleslist();

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('article_sjs_list.htm'), '',
        array('filter' => $article_list['filter'], 'page_count' => $article_list['page_count']));
}

/*------------------------------------------------------ */
//-- 翻页，排序 设计师
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'query_ssj')
{
    check_authz_json('02_ssj_fwzx');

    $article_list = get_articleslist0();

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('article_list0.htm'), '',
        array('filter' => $article_list['filter'], 'page_count' => $article_list['page_count']));
}

/*------------------------------------------------------ */
//-- 经销商查询翻页
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'query_jxscx')
{
    check_authz_json('03_ssj_jxscx');

    $article_list = get_articleslist0("经销商");

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('article_list_jxscx.htm'), '',
        array('filter' => $article_list['filter'], 'page_count' => $article_list['page_count']));
}

/*------------------------------------------------------ */
//-- 直销店排序
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'query_zxdzs')
{
    check_authz_json('04_ssj_zxdzs');

    $article_list = get_articleslist0("直销店招商");

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('article_list_zxdzs.htm'), '',
        array('filter' => $article_list['filter'], 'page_count' => $article_list['page_count']));
}





/*------------------------------------------------------ */
//-- 翻页，排序 设计师
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'query_jg')
{
    check_authz_json('article_manage');

    $article_list = get_jg_articleslist();

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('article_jg_list.htm'), '',
        array('filter' => $article_list['filter'], 'page_count' => $article_list['page_count']));
}


/*------------------------------------------------------ */
//-- 翻页，排序  
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'query')
{
    check_authz_json('article_manage');
	
	$cat_id    = array();
	$rank_id = array();
	
	if(strpos($_SESSION['rank_id'],"article_a") !== false){
		$rank_id = explode("article_a",$_SESSION['rank_id']);
		foreach( $rank_id as $key => $val){
			if( is_numeric($val)){
				$cat_id[]=$val;
			}
		}
		
	}
	
	$cat_id_str = implode(",",$cat_id);
	
	$cat_id_str = "cat_id in (".$cat_id_str.") ";
	
    $article_list = get_articleslist($cat_id_str);

	
	
//	echo "<pre>";
//	print_r($article_list['filter']);
//	echo "</pre>";

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);
	
    make_json_result($smarty->fetch('article_list.htm'), '',
        array('filter' => $article_list['filter'], 'page_count' => $article_list['page_count']));
}


/*------------------------------------------------------ */
//-- 翻页，排序 服务商  成功！
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'query_ssj')
{
    check_authz_json('02_ssj_fwzx');

    $article_list = get_articleslist0();

    $smarty->assign('article_list',    $article_list['arr']);
    $smarty->assign('filter',          $article_list['filter']);
    $smarty->assign('record_count',    $article_list['record_count']);
    $smarty->assign('page_count',      $article_list['page_count']);

    $sort_flag  = sort_flag($article_list['filter']);
    $smarty->assign($sort_flag['tag'], $sort_flag['img']);

    make_json_result($smarty->fetch('article_list0.htm'), '',
        array('filter' => $article_list['filter'], 'page_count' => $article_list['page_count']));
}



/*------------------------------------------------------ */
//-- 添加文章
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'add')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /* 创建 html editor */
    create_html_editor('FCKeditor1');

    /*初始化*/
    $article = array();
    $article['is_open'] = 1;

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list',     get_brand_list());

    /* 清理关联商品 */
    $sql = "DELETE FROM " . $ecs->table('goods_article') . " WHERE article_id = 0";
    $db->query($sql);

    if (isset($_GET['id']))
    {
        $smarty->assign('cur_id',  $_GET['id']);
    }
	
	
	
	//处理权限
	$rank_id = $_SESSION['rank_id'];
	
	//print_r($_SESSION);
	
	
	
	if($rank_id){
		$rank_id_arr = array();
		
		$rank_id_arr = explode("article_a",$rank_id);
		
		foreach($rank_id_arr as $key => $val){
			if(is_numeric($val)){
				$rank_id_tt[] = $val;
			}
		}
		//print_r($rank_id_tt);
//		if(strpos($rank_id,"article") || strpos($rank_id,"article") == 0){
//			$rank_id_arr = explode(',', $rank_id);
//			
//			foreach($rank_id_arr as $val){
//				$id_arr = explode('_', $val);
//				$rank_id_res[] = $id_arr['1'];
//			}
//			//print_r($rank_id_res);
//		}
		
		$smarty->assign('cat_select',  article_cat_list_dan($rank_id_tt));
	}else{
		$smarty->assign('cat_select',  article_cat_list(0));
	}
	//$smarty->assign('cat_select',  article_cat_list_dan($rank_id_res));
	
	//echo (article_cat_list_dan($rank_id_res));
	
    $smarty->assign('article',     $article);
    
    $smarty->assign('ur_here',     $_LANG['article_add']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list'));
    $smarty->assign('form_action', 'insert');

    assign_query_info();
    $smarty->display('article_info.htm');
}



/*------------------------------------------------------ */
//-- 添加服务商
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'add0')
{
    /* 权限判断 */
    admin_priv('02_ssj_fwzx');

    /* 创建 html editor */
    create_html_editor('FCKeditor1');

    /*初始化*/
    $article = array();
    $article['is_open'] = 1;

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list',     get_brand_list());
	
	/*服务商名称*/
	$smarty->assign('item_name', '服务中心');

    /* 清理关联商品 */
    $sql = "DELETE FROM " . $ecs->table('goods_article') . " WHERE article_id = 0";
    $db->query($sql);

    if (isset($_GET['id']))
    {
        $smarty->assign('cur_id',  $_GET['id']);
    }
    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0));
    $smarty->assign('ur_here',     $_LANG['article_add']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list'));
    $smarty->assign('form_action', 'insert');

    assign_query_info();
	
    $smarty->display('article_info0.htm');
}


/*------------------------------------------------------ */
//-- 添加服务商
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'add_jxscx')
{
    /* 权限判断 */
    admin_priv('03_ssj_jxscx');

    /* 创建 html editor */
    create_html_editor('FCKeditor1');

    /*初始化*/
    $article = array();
    $article['is_open'] = 1;

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list',     get_brand_list());
	
	/*服务商名称*/
	$smarty->assign('item_name', '经销商');

    /* 清理关联商品 */
    $sql = "DELETE FROM " . $ecs->table('goods_article') . " WHERE article_id = 0";
    $db->query($sql);

    if (isset($_GET['id']))
    {
        $smarty->assign('cur_id',  $_GET['id']);
    }
    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0));
    $smarty->assign('ur_here',     $_LANG['article_add']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list_jxscx'));
    $smarty->assign('form_action', 'insert_jxscx');

    assign_query_info();
	
    $smarty->display('article_info0.htm');
}


/*------------------------------------------------------ */
//-- 添加直销店
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'add_zxdzs')
{
    /* 权限判断 */
    admin_priv('04_ssj_zxdzs');

    /* 创建 html editor */
    create_html_editor('FCKeditor1');

    /*初始化*/
    $article = array();
    $article['is_open'] = 1;

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list',     get_brand_list());
	
	/*服务商名称*/
	$smarty->assign('item_name', '直销店');

    /* 清理关联商品 */
    $sql = "DELETE FROM " . $ecs->table('goods_article') . " WHERE article_id = 0";
    $db->query($sql);

    if (isset($_GET['id']))
    {
        $smarty->assign('cur_id',  $_GET['id']);
    }
    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0));
    $smarty->assign('ur_here',     $_LANG['article_add']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list'));
    $smarty->assign('form_action', 'insert_zxdzs');

    assign_query_info();
	
    $smarty->display('article_info0.htm');
}

/*------------------------------------------------------ */
//-- 添加设计师
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'add_sjs')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /* 创建 html editor */
    create_html_editor('FCKeditor1');

    /*初始化*/
    $article = array();
    $article['is_open'] = 1;

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list',     get_brand_list());

    /* 清理关联商品 */
    $sql = "DELETE FROM " . $ecs->table('goods_article') . " WHERE article_id = 0";
    $db->query($sql);

    if (isset($_GET['id']))
    {
        $smarty->assign('cur_id',  $_GET['id']);
    }
    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0));
    $smarty->assign('ur_here',     $_LANG['article_add']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list'));
    $smarty->assign('form_action', 'insert');

    assign_query_info();
    $smarty->display('article_info_sjs.htm');
}


/*------------------------------------------------------ */
//-- 添加设计师
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'add_jg')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /* 创建 html editor */
    create_html_editor('FCKeditor1');

    /*初始化*/
    $article = array();
    $article['is_open'] = 1;

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list',     get_brand_list());

    /* 清理关联商品 */
    //$sql = "DELETE FROM " . $ecs->table('goods_article') . " WHERE article_id = 0";
   // $db->query($sql);

    if (isset($_GET['id']))
    {
        $smarty->assign('cur_id',  $_GET['id']);
    }
    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0));
    $smarty->assign('ur_here',     $_LANG['article_add']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list'));
    $smarty->assign('form_action', 'insert');

    assign_query_info();
    $smarty->display('article_info_jg.htm');
}






/*------------------------------------------------------ */
//-- 添加文章
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'insert')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /*检查是否重复*/
    $is_only = $exc->is_only('title', $_POST['title'],0, " cat_id ='$_POST[article_cat]'");

    if (!$is_only)
    {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }

    /* 取得文件地址 */
    $file_url = '';
    if ((isset($_FILES['file']['error']) && $_FILES['file']['error'] == 0) || (!isset($_FILES['file']['error']) && isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != 'none'))
    {
        // 检查文件格式
        if (!check_file_type($_FILES['file']['tmp_name'], $_FILES['file']['name'], $allow_file_types))
        {
            sys_msg($_LANG['invalid_file']);
        }

        // 复制文件
        $res = upload_article_file($_FILES['file']);
        if ($res != false)
        {
            $file_url = $res;
        }
    }

    if ($file_url == '')
    {
        $file_url = $_POST['file_url'];
    }

    /* 计算文章打开方式 */
    if ($file_url == '')
    {
        $open_type = 0;
    }
    else
    {
        $open_type = $_POST['FCKeditor1'] == '' ? 1 : 2;
    }

    /*插入数据*/
    $add_time = gmtime();
    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }
    $sql = "INSERT INTO ".$ecs->table('article')."(title, cat_id, article_type, is_open, author, ".
                "author_email, keywords, content,area,zhiwei,add_time, file_url, open_type, link, description) ".
            "VALUES ('$_POST[title]', '$_POST[article_cat]', '$_POST[article_type]', '$_POST[is_open]', ".
                "'$_POST[author]', '$_POST[author_email]', '$_POST[keywords]', '$_POST[FCKeditor1]','$_POST[area]','$_POST[zhiwei]', ".
                "'$add_time', '$file_url', '$open_type', '$_POST[link_url]', '$_POST[description]')";
    $db->query($sql);

    /* 处理关联商品 */
    $article_id = $db->insert_id();
    $sql = "UPDATE " . $ecs->table('goods_article') . " SET article_id = '$article_id' WHERE article_id = 0";
    $db->query($sql);

    $link[0]['text'] = $_LANG['continue_add'];
    $link[0]['href'] = 'article.php?act=add';

    $link[1]['text'] = $_LANG['back_list'];
    $link[1]['href'] = 'article.php?act=list';

    admin_log($_POST['title'],'add','article');

    clear_cache_files(); // 清除相关的缓存文件

    sys_msg($_LANG['articleadd_succeed'],0, $link);
}



/*------------------------------------------------------ */
//-- 添加新设计师
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'insert_sjs')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /*检查是否重复*/

    /* 取得文件地址 */
    $file_url = '';
	
    if ((isset($_FILES['sjs_products1']['error']) && $_FILES['sjs_products1']['error'] == 0) || (!isset($_FILES['sjs_products1']['error']) && isset($_FILES['sjs_products1']['tmp_name']) && $_FILES['sjs_products1']['tmp_name'] != 'none'))
    {
        // 复制文件
        $res1 = upload_article_file($_FILES['sjs_products1']);
		
        if ($res1 != false)
        {
            $file_url1 = $res1;
        }
    }
	
	if ((isset($_FILES['sjs_products2']['error']) && $_FILES['sjs_products2']['error'] == 0) || (!isset($_FILES['sjs_products2']['error']) && isset($_FILES['sjs_products2']['tmp_name']) && $_FILES['sjs_products2']['tmp_name'] != 'none'))
    {

        // 复制文件
        $res2 = upload_article_file($_FILES['sjs_products2']);
		
        if ($res2 != false)
        {
            $file_url2 = $res2;
        }
    }
	
	if ((isset($_FILES['sjs_products3']['error']) && $_FILES['sjs_products3']['error'] == 0) || (!isset($_FILES['sjs_products3']['error']) && isset($_FILES['sjs_products3']['tmp_name']) && $_FILES['sjs_products3']['tmp_name'] != 'none'))
    {

        // 复制文件
        $res3 = upload_article_file($_FILES['sjs_products3']);
		
        if ($res3 != false)
        {
            $file_url3 = $res3;
        }
    }
	
	if ((isset($_FILES['sjs_products4']['error']) && $_FILES['sjs_products4']['error'] == 0) || (!isset($_FILES['sjs_products4']['error']) && isset($_FILES['sjs_products4']['tmp_name']) && $_FILES['sjs_products4']['tmp_name'] != 'none'))
    {

        // 复制文件
        $res4 = upload_article_file($_FILES['sjs_products4']);
		
        if ($res4 != false)
        {
            $file_url4 = $res4;
        }
    }
	
	if ((isset($_FILES['sjs_products5']['error']) && $_FILES['sjs_products5']['error'] == 0) || (!isset($_FILES['sjs_products5']['error']) && isset($_FILES['sjs_products5']['tmp_name']) && $_FILES['sjs_products5']['tmp_name'] != 'none'))
    {
        $res5 = upload_article_file($_FILES['sjs_products5']);
		
        if ($res5 != false)
        {
            $file_url5 = $res5;
        }
    }
	
	
	
	if ((isset($_FILES['sjs_img']['error']) && $_FILES['sjs_img']['error'] == 0) || (!isset($_FILES['sjs_img']['error']) && isset($_FILES['sjs_img']['tmp_name']) && $_FILES['sjs_img']['tmp_name'] != 'none'))
    {
        $res6 = upload_article_file($_FILES['sjs_img']);
		
        if ($res6 != false)
        {
            $file_url6 = $res6;
        }
    }
	
	if ((isset($_FILES['sjs_name_img']['error']) && $_FILES['sjs_name_img']['error'] == 0) || (!isset($_FILES['sjs_name_img']['error']) && isset($_FILES['sjs_name_img']['tmp_name']) && $_FILES['sjs_name_img']['tmp_name'] != 'none'))
    {
        $res7 = upload_article_file($_FILES['sjs_name_img']);
		
        if ($res7 != false)
        {
            $file_url7 = $res7;
        }
    }
	if ((isset($_FILES['sjs_tou']['error']) && $_FILES['sjs_tou']['error'] == 0) || (!isset($_FILES['sjs_tou']['error']) && isset($_FILES['sjs_tou']['tmp_name']) && $_FILES['sjs_tou']['tmp_name'] != 'none'))
    {
        $res8 = upload_article_file($_FILES['sjs_tou']);
		
        if ($res8 != false)
        {
            $file_url8 = $res8;
        }
    }
	
	
	if ((isset($_FILES['left_img']['error']) && $_FILES['left_img']['error'] == 0) || (!isset($_FILES['left_img']['error']) && isset($_FILES['left_img']['tmp_name']) && $_FILES['left_img']['tmp_name'] != 'none'))
		{
			$res9 = upload_article_file($_FILES['left_img']);
			
			if ($res9 != false)
			{
				$file_url9 = $res9;
			}
	}
	
	
	if ((isset($_FILES['rec_img']['error']) && $_FILES['rec_img']['error'] == 0) || (!isset($_FILES['rec_img']['error']) && isset($_FILES['rec_img']['tmp_name']) && $_FILES['rec_img']['tmp_name'] != 'none'))
		{
			$res10 = upload_article_file($_FILES['rec_img']);
			
			if ($res10 != false)
			{
				$file_url10 = $res10;
			}
	}
	
	
	

    /* 计算文章打开方式 */
    /*if ($file_url == '')
    {
        $open_type = 0;
    }
    else
    {
        $open_type = $_POST['FCKeditor1'] == '' ? 1 : 2;
    }*/
	

    /*插入数据*/
    $add_time = gmtime();
    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }
	
    $sql = "INSERT INTO ".$ecs->table('article_sjs')."(sjs_name, sjs_img, sjs_tou, sjs_name_img, sjs_brief,sjs_company, sjs_guoji, sjs_area, sjs_products1, sjs_products2, sjs_products3, sjs_products4, sjs_products5,sjs_answer1,sjs_answer2,sjs_answer3,sjs_answer4,sjs_ask1,sjs_ask2,sjs_ask3,sjs_ask4,experience,zuoyouming,add_time,is_open,left_img,rec_img)".
            "VALUES ('$_POST[sjs_name]', '$file_url6', '$file_url8', '$file_url7','$_POST[sjs_brief]', '$_POST[sjs_company]', '$_POST[sjs_guoji]', '$_POST[sjs_area]','$file_url1', '$file_url2', '$file_url3','$file_url4', '$file_url5', '$_POST[sjs_answer1]','$_POST[sjs_answer2]', '$_POST[sjs_answer3]', '$_POST[sjs_answer4]', '$_POST[sjs_ask1]', '$_POST[sjs_ask2]', '$_POST[sjs_ask3]', '$_POST[sjs_ask4]', '$_POST[experience]', '$_POST[zuoyouming]','$add_time','$_POST[is_open]', '$file_url9', '$file_url10')";
			
    $db->query($sql);
	
	//, '$file_url', '$open_type', '$_POST[link_url]', '$_POST[description]';
	

    /* 处理关联商品 */
    $article_id = $db->insert_id();
    $sql = "UPDATE " . $ecs->table('goods_article') . " SET article_id = '$article_id' WHERE article_id = 0";
    $db->query($sql);

    $link[0]['text'] = $_LANG['continue_add'];
    $link[0]['href'] = 'article.php?act=add_sjs';

    $link[1]['text'] = $_LANG['back_list'];
    $link[1]['href'] = 'article.php?act=list_sjs';

    admin_log($_POST['title'],'add','article');

    clear_cache_files(); // 清除相关的缓存文件

    sys_msg($_LANG['articleadd_succeed'],0, $link);
}


/*------------------------------------------------------ */
//-- 添加新技工
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'insert_jg')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /*检查是否重复*/

    /* 取得文件地址 */
    $file_url = '';
	
    if ((isset($_FILES['jg_products1']['error']) && $_FILES['jg_products1']['error'] == 0) || (!isset($_FILES['jg_products1']['error']) && isset($_FILES['jg_products1']['tmp_name']) && $_FILES['jg_products1']['tmp_name'] != 'none'))
    {
        // 复制文件
        $res1 = upload_article_file($_FILES['jg_products1']);
		
        if ($res1 != false)
        {
            $file_url1 = $res1;
        }
    }
	
	if ((isset($_FILES['jg_products2']['error']) && $_FILES['jg_products2']['error'] == 0) || (!isset($_FILES['jg_products2']['error']) && isset($_FILES['jg_products2']['tmp_name']) && $_FILES['jg_products2']['tmp_name'] != 'none'))
    {

        // 复制文件
        $res2 = upload_article_file($_FILES['jg_products2']);
		
        if ($res2 != false)
        {
            $file_url2 = $res2;
        }
    }
	
	if ((isset($_FILES['jg_products3']['error']) && $_FILES['jg_products3']['error'] == 0) || (!isset($_FILES['jg_products3']['error']) && isset($_FILES['jg_products3']['tmp_name']) && $_FILES['jg_products3']['tmp_name'] != 'none'))
    {

        // 复制文件
        $res3 = upload_article_file($_FILES['jg_products3']);
		
        if ($res3 != false)
        {
            $file_url3 = $res3;
        }
    }
	
	if ((isset($_FILES['jg_products4']['error']) && $_FILES['jg_products4']['error'] == 0) || (!isset($_FILES['jg_products4']['error']) && isset($_FILES['jg_products4']['tmp_name']) && $_FILES['jg_products4']['tmp_name'] != 'none'))
    {

        // 复制文件
        $res4 = upload_article_file($_FILES['jg_products4']);
		
        if ($res4 != false)
        {
            $file_url4 = $res4;
        }
    }
	
	if ((isset($_FILES['jg_products5']['error']) && $_FILES['jg_products5']['error'] == 0) || (!isset($_FILES['jg_products5']['error']) && isset($_FILES['jg_products5']['tmp_name']) && $_FILES['jg_products5']['tmp_name'] != 'none'))
    {
        $res5 = upload_article_file($_FILES['jg_products5']);
		
        if ($res5 != false)
        {
            $file_url5 = $res5;
        }
    }
	
	
	
	if ((isset($_FILES['jg_img']['error']) && $_FILES['jg_img']['error'] == 0) || (!isset($_FILES['jg_img']['error']) && isset($_FILES['jg_img']['tmp_name']) && $_FILES['jg_img']['tmp_name'] != 'none'))
    {
        $res6 = upload_article_file($_FILES['jg_img']);
		
        if ($res6 != false)
        {
            $file_url6 = $res6;
        }
    }
	
	if ((isset($_FILES['jg_name_img']['error']) && $_FILES['jg_name_img']['error'] == 0) || (!isset($_FILES['jg_name_img']['error']) && isset($_FILES['jg_name_img']['tmp_name']) && $_FILES['jg_name_img']['tmp_name'] != 'none'))
    {
        $res7 = upload_article_file($_FILES['jg_name_img']);
		
        if ($res7 != false)
        {
            $file_url7 = $res7;
        }
    }
	if ((isset($_FILES['jg_tou']['error']) && $_FILES['jg_tou']['error'] == 0) || (!isset($_FILES['jg_tou']['error']) && isset($_FILES['jg_tou']['tmp_name']) && $_FILES['jg_tou']['tmp_name'] != 'none'))
    {
        $res8 = upload_article_file($_FILES['jg_tou']);
		
        if ($res8 != false)
        {
            $file_url8 = $res8;
        }
    }
	
	if ((isset($_FILES['left_img']['error']) && $_FILES['left_img']['error'] == 0) || (!isset($_FILES['left_img']['error']) && isset($_FILES['left_img']['tmp_name']) && $_FILES['left_img']['tmp_name'] != 'none'))
		{
			$res9 = upload_article_file($_FILES['left_img']);
			
			if ($res9 != false)
			{
				$file_url9 = $res9;
			}
	}
	
	
	if ((isset($_FILES['rec_img']['error']) && $_FILES['rec_img']['error'] == 0) || (!isset($_FILES['rec_img']['error']) && isset($_FILES['rec_img']['tmp_name']) && $_FILES['rec_img']['tmp_name'] != 'none'))
		{
			$res10 = upload_article_file($_FILES['rec_img']);
			
			if ($res10 != false)
			{
				$file_url10 = $res10;
			}
	}
	

    /* 计算文章打开方式 */
    /*if ($file_url == '')
    {
        $open_type = 0;
    }
    else
    {
        $open_type = $_POST['FCKeditor1'] == '' ? 1 : 2;
    }*/

    /*插入数据*/
    $add_time = gmtime();
    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }
	
    $sql = "INSERT INTO ".$ecs->table('article_jg')."(jg_name, jg_img, jg_tou, jg_name_img, jg_brief,jg_company, jg_guoji, jg_area, jg_products1, jg_products2, jg_products3, jg_products4, jg_products5,jg_answer1,jg_answer2,jg_answer3,jg_answer4,jg_ask1,jg_ask2,jg_ask3,jg_ask4,experience,zuoyouming,add_time,is_open,left_img,rec_img)".
            "VALUES ('$_POST[jg_name]', '$file_url6', '$file_url8', '$file_url7','$_POST[jg_brief]', '$_POST[jg_company]', '$_POST[jg_guoji]', '$_POST[jg_area]','$file_url1', '$file_url2', '$file_url3','$file_url4', '$file_url5', '$_POST[jg_answer1]','$_POST[jg_answer2]', '$_POST[jg_answer3]', '$_POST[jg_answer4]', '$_POST[jg_ask1]', '$_POST[jg_ask2]', '$_POST[jg_ask3]', '$_POST[jg_ask4]', '$_POST[experience]', '$_POST[zuoyouming]','$add_time','$_POST[is_open]','$file_url9','$file_url10')";
			
    $db->query($sql);
	
	//, '$file_url', '$open_type', '$_POST[link_url]', '$_POST[description]';
	

    /* 处理关联商品 */
    $article_id = $db->insert_id();
    $sql = "UPDATE " . $ecs->table('goods_article') . " SET article_id = '$article_id' WHERE article_id = 0";
    $db->query($sql);

    $link[0]['text'] = $_LANG['continue_add'];
    $link[0]['href'] = 'article.php?act=add_jg';

    $link[1]['text'] = $_LANG['back_list'];
    $link[1]['href'] = 'article.php?act=list_jg';

    admin_log($_POST['title'],'add','article');

    clear_cache_files(); // 清除相关的缓存文件

    sys_msg($_LANG['articleadd_succeed'],0, $link);
}


/*------------------------------------------------------ */
//-- 添加服务中心
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'insert0')
{
    /* 权限判断 */
    admin_priv('02_ssj_fwzx');

    /*检查是否重复*/
    $is_only = $exc->is_only('title', $_POST['title'],0, " cat_id ='$_POST[article_cat]'");

    if (!$is_only)
    {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }

    /*插入数据*/
    $add_time = gmtime();
	
	
	
    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }
	
    $sql = "INSERT INTO ".$ecs->table('ssj')." (ssj_name, cat_id, address, telphone,ssj_area,content) ".
            "VALUES ('$_POST[ssj_name]', '服务中心', '$_POST[address]', '$_POST[telphone]', '$_POST[ssj_area]','$_POST[FCKeditor1]')";
    $db->query($sql);


    /* 处理关联商品 */
    $article_id = $db->insert_id();
    $sql = "UPDATE " . $ecs->table('goods_article') . " SET article_id = '$article_id' WHERE article_id = 0";
    $db->query($sql);

    $link[0]['text'] = $_LANG['continue_add'];
    $link[0]['href'] = 'article.php?act=add0';

    $link[1]['text'] = $_LANG['back_list'];
    $link[1]['href'] = 'article.php?act=list0';

    admin_log($_POST['title'],'add','article');

    clear_cache_files(); // 清除相关的缓存文件

    sys_msg($_LANG['articleadd_succeed'],0, $link);
}


/*------------------------------------------------------ */
//-- 添加直销店招商
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'insert_zxdzs')
{
    /* 权限判断 */
    admin_priv('04_ssj_zxdzs');

    /*检查是否重复*/
    $is_only = $exc->is_only('title', $_POST['title'],0, " cat_id ='$_POST[article_cat]'");

    if (!$is_only)
    {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }

    /*插入数据*/
    $add_time = gmtime();
	
	
	
    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }
	
    $sql = "INSERT INTO ".$ecs->table('ssj')." (ssj_name, cat_id, address, telphone,ssj_area,content) ".
            "VALUES ('$_POST[ssj_name]', '直销店招商', '$_POST[address]', '$_POST[telphone]', '$_POST[ssj_area]','$_POST[FCKeditor1]')";
    $db->query($sql);


    /* 处理关联商品 */
    $article_id = $db->insert_id();
    $sql = "UPDATE " . $ecs->table('goods_article') . " SET article_id = '$article_id' WHERE article_id = 0";
    $db->query($sql);

    $link[0]['text'] = $_LANG['continue_add'];
    $link[0]['href'] = 'article.php?act=add_zxdzs';

    $link[1]['text'] = $_LANG['back_list'];
    $link[1]['href'] = 'article.php?act=list_zxdzs';

    admin_log($_POST['title'],'add','article');

    clear_cache_files(); // 清除相关的缓存文件

    sys_msg($_LANG['articleadd_succeed'],0, $link);
}

/*------------------------------------------------------ */
//-- 添加经销商查询
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'insert_jxscx')
{
    /* 权限判断 */
    admin_priv('03_ssj_jxscx');

    /*检查是否重复*/
    $is_only = $exc->is_only('title', $_POST['title'],0, " cat_id ='$_POST[article_cat]'");

    if (!$is_only)
    {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }

    /*插入数据*/
    $add_time = gmtime();
	
	
	
    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }
	
    $sql = "INSERT INTO ".$ecs->table('ssj')." (ssj_name, cat_id, address, telphone,ssj_area,content) ".
            "VALUES ('$_POST[ssj_name]', '经销商', '$_POST[address]', '$_POST[telphone]', '$_POST[ssj_area]','$_POST[FCKeditor1]')";
    $db->query($sql);


    /* 处理关联商品 */
    $article_id = $db->insert_id();
    $sql = "UPDATE " . $ecs->table('goods_article') . " SET article_id = '$article_id' WHERE article_id = 0";
    $db->query($sql);

    $link[0]['text'] = $_LANG['continue_add'];
    $link[0]['href'] = 'article.php?act=add_jxscx';

    $link[1]['text'] = $_LANG['back_list'];
    $link[1]['href'] = 'article.php?act=list_jxscx';

    admin_log($_POST['title'],'add','article');

    clear_cache_files(); // 清除相关的缓存文件

    sys_msg($_LANG['articleadd_succeed'],0, $link);
}

/*------------------------------------------------------ */
//-- 编辑
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /* 取文章数据 */
    $sql = "SELECT * FROM " .$ecs->table('article'). " WHERE article_id='$_REQUEST[id]'";
    $article = $db->GetRow($sql);

    /* 创建 html editor */
    create_html_editor('FCKeditor1',$article['content']);

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list', get_brand_list());

    /* 取得关联商品 */
    $goods_list = get_article_goods($_REQUEST['id']);
    $smarty->assign('goods_list', $goods_list);

    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0, $article['cat_id']));
    $smarty->assign('ur_here',     $_LANG['article_edit']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list&' . list_link_postfix()));
    $smarty->assign('form_action', 'update');

    assign_query_info();
    $smarty->display('article_info.htm');
}


/*------------------------------------------------------ */
//-- 编辑 设计师
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit_sjs')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /* 取文章数据 */
    $sql = "SELECT * FROM " .$ecs->table('article_sjs'). " WHERE id='$_REQUEST[id]'";
    $article = $db->GetRow($sql);

    /* 创建 html editor */
    create_html_editor('FCKeditor1',$article['content']);

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list', get_brand_list());

    /* 取得关联商品 */
    //$goods_list = get_article_goods($_REQUEST['id']);
   // $smarty->assign('goods_list', $goods_list);

    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0, $article['cat_id']));
    $smarty->assign('ur_here',     $_LANG['article_edit']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list&' . list_link_postfix()));
    $smarty->assign('form_action', 'update');

    assign_query_info();
    $smarty->display('article_info_sjs.htm');
}


/*------------------------------------------------------ */
//-- 编辑 设计师
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit_jg')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /* 取文章数据 */
    $sql = "SELECT * FROM " .$ecs->table('article_jg'). " WHERE id='$_REQUEST[id]'";
    $article = $db->GetRow($sql);

    /* 创建 html editor */
    create_html_editor('FCKeditor1',$article['content']);

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list', get_brand_list());

    /* 取得关联商品 */
    //$goods_list = get_article_goods($_REQUEST['id']);
   // $smarty->assign('goods_list', $goods_list);

    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0, $article['cat_id']));
    $smarty->assign('ur_here',     $_LANG['article_edit']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list&' . list_link_postfix()));
    $smarty->assign('form_action', 'update');

    assign_query_info();
    $smarty->display('article_info_jg.htm');
}


/*------------------------------------------------------ */
//-- 编辑服务中心
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit0')
{
    /* 权限判断 */
    admin_priv('02_ssj_fwzx');

    /* 取文章数据 */
    $sql = "SELECT * FROM " .$ecs->table('ssj'). " WHERE id='$_REQUEST[id]'";
    $article = $db->GetRow($sql);

    /* 创建 html editor */
    create_html_editor('FCKeditor1',$article['content']);
	
	/*服务商名称*/
	$smarty->assign('item_name', '服务中心');

    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list', get_brand_list());

    /* 取得关联商品 */
    $goods_list = get_article_goods($_REQUEST['id']);
    $smarty->assign('goods_list', $goods_list);

    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0, $article['cat_id']));
    $smarty->assign('ur_here',     $_LANG['article_edit']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list&' . list_link_postfix()));
    $smarty->assign('form_action', 'update');

    assign_query_info();
    $smarty->display('article_info0.htm');
}


/*------------------------------------------------------ */
//-- 编辑经销商查询
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit_jxscx')
{
    /* 权限判断 */
    admin_priv('03_ssj_jxscx');

    /* 取文章数据 */
    $sql = "SELECT * FROM " .$ecs->table('ssj'). " WHERE id='$_REQUEST[id]'";
    $article = $db->GetRow($sql);

    /* 创建 html editor */
    create_html_editor('FCKeditor1',$article['content']);
	
	
	/*服务商名称*/
	$smarty->assign('item_name', '经销商');
	
    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list', get_brand_list());

    /* 取得关联商品 */
    $goods_list = get_article_goods($_REQUEST['id']);
    $smarty->assign('goods_list', $goods_list);

    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0, $article['cat_id']));
    $smarty->assign('ur_here',     $_LANG['article_edit']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list&' . list_link_postfix()));
    $smarty->assign('form_action', 'update_jxscx');

    assign_query_info();
    $smarty->display('article_info0.htm');
}


/*------------------------------------------------------ */
//-- 编辑经销商查询
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'edit_zxdzs')
{
    /* 权限判断 */
    admin_priv('04_ssj_zxdzs');

    /* 取文章数据 */
    $sql = "SELECT * FROM " .$ecs->table('ssj'). " WHERE id='$_REQUEST[id]'";
    $article = $db->GetRow($sql);

    /* 创建 html editor */
    create_html_editor('FCKeditor1',$article['content']);
	
	/*服务商名称*/
	$smarty->assign('item_name', '直销店');
	
    /* 取得分类、品牌 */
    $smarty->assign('goods_cat_list', cat_list());
    $smarty->assign('brand_list', get_brand_list());

    /* 取得关联商品 */
    $goods_list = get_article_goods($_REQUEST['id']);
    $smarty->assign('goods_list', $goods_list);

    $smarty->assign('article',     $article);
    $smarty->assign('cat_select',  article_cat_list(0, $article['cat_id']));
    $smarty->assign('ur_here',     $_LANG['article_edit']);
    $smarty->assign('action_link', array('text' => $_LANG['03_article_list'], 'href' => 'article.php?act=list_zxdzs&' . list_link_postfix()));
    $smarty->assign('form_action', 'update_zxdzs');

    assign_query_info();
    $smarty->display('article_info0.htm');
}




if ($_REQUEST['act'] =='update')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /*检查文章名是否相同*/
    $is_only = $exc->is_only('title', $_POST['title'], $_POST['id'], "cat_id = '$_POST[article_cat]'");

    if (!$is_only)
    {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }


    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }
	 
	
    /* 取得文件地址 */
    $file_url = '';
    if (empty($_FILES['file']['error']) || (!isset($_FILES['file']['error']) && isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != 'none'))
    {
        // 检查文件格式
        if (!check_file_type($_FILES['file']['tmp_name'], $_FILES['file']['name'], $allow_file_types))
        {
            sys_msg($_LANG['invalid_file']);
        }

        // 复制文件
        $res = upload_article_file($_FILES['file']);
        if ($res != false)
        {
            $file_url = $res;
        }
    }

    if ($file_url == '')
    {
        $file_url = $_POST['file_url'];
    }

    /* 计算文章打开方式 */
    if ($file_url == '')
    {
        $open_type = 0;
    }
    else
    {
        $open_type = $_POST['FCKeditor1'] == '' ? 1 : 2;
    }

    /* 如果 file_url 跟以前不一样，且原来的文件是本地文件，删除原来的文件 */
    $sql = "SELECT file_url FROM " . $ecs->table('article') . " WHERE article_id = '$_POST[id]'";
    $old_url = $db->getOne($sql);
    if ($old_url != '' && $old_url != $file_url && strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
    {
        @unlink(ROOT_PATH . $old_url);
    }

    if ($exc->edit("title='$_POST[title]', cat_id='$_POST[article_cat]', article_type='$_POST[article_type]', is_open='$_POST[is_open]', author='$_POST[author]', author_email='$_POST[author_email]', keywords ='$_POST[keywords]', file_url ='$file_url', open_type='$open_type', content='$_POST[FCKeditor1]', link='$_POST[link_url]', description = '$_POST[description]', area = '$_POST[area]', zhiwei = '$_POST[zhiwei]'", $_POST['id']))
    {
        $link[0]['text'] = $_LANG['back_list'];
        $link[0]['href'] = 'article.php?act=list&' . list_link_postfix();

        $note = sprintf($_LANG['articleedit_succeed'], stripslashes($_POST['title']));
        admin_log($_POST['title'], 'edit', 'article');

        clear_cache_files();

        sys_msg($note, 0, $link);
    }
    else
    {
        die($db->error());
    }
}


/*设计师更新*/

if ($_REQUEST['act'] =='update_sjs')
{
    /* 权限判断 */
    admin_priv('article_manage');

    /*检查文章名是否相同*/
   // $is_only = $exc->is_only('title', $_POST['title'], $_POST['id'], "cat_id = '$_POST[article_cat]'");

    /*if (!$is_only)
    {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }


    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }*/

    /* 取得文件地址 */
    $file_url = '';
	
		 if ((isset($_FILES['sjs_products1']['error']) && $_FILES['sjs_products1']['error'] == 0) || (!isset($_FILES['sjs_products1']['error']) && isset($_FILES['sjs_products1']['tmp_name']) && $_FILES['sjs_products1']['tmp_name'] != 'none'))
		{
			// 复制文件
			$res1 = upload_article_file($_FILES['sjs_products1']);
			
			if ($res1 != false)
			{
				$file_url1 = $res1;
			}
	
	}else{
		$file_url1 = $_POST['sjs_products1_url'];
	}
	
	
		if ((isset($_FILES['sjs_products2']['error']) && $_FILES['sjs_products2']['error'] == 0) || (!isset($_FILES['sjs_products2']['error']) && isset($_FILES['sjs_products2']['tmp_name']) && $_FILES['sjs_products2']['tmp_name'] != 'none'))
		{
	
			// 复制文件
			$res2 = upload_article_file($_FILES['sjs_products2']);
			
			if ($res2 != false)
			{
				$file_url2 = $res2;
			}
	}else{
		$file_url2 = $_POST['sjs_products2_url'];
	}
	
		if ((isset($_FILES['sjs_products3']['error']) && $_FILES['sjs_products3']['error'] == 0) || (!isset($_FILES['sjs_products3']['error']) && isset($_FILES['sjs_products3']['tmp_name']) && $_FILES['sjs_products3']['tmp_name'] != 'none'))
		{
	
			// 复制文件
			$res3 = upload_article_file($_FILES['sjs_products3']);
			
			if ($res3 != false)
			{
				$file_url3 = $res3;
			}
	}else{
		$file_url3 = $_POST['sjs_products3_url'];
	}
	
	
		if ((isset($_FILES['sjs_products4']['error']) && $_FILES['sjs_products4']['error'] == 0) || (!isset($_FILES['sjs_products4']['error']) && isset($_FILES['sjs_products4']['tmp_name']) && $_FILES['sjs_products4']['tmp_name'] != 'none'))
		{
	
			// 复制文件
			$res4 = upload_article_file($_FILES['sjs_products4']);
			
			if ($res4 != false)
			{
				$file_url4 = $res4;
			}
	}else{
		$file_url4 = $_POST['sjs_products4_url'];
	}
	
	
	
		if ((isset($_FILES['sjs_products5']['error']) && $_FILES['sjs_products5']['error'] == 0) || (!isset($_FILES['sjs_products5']['error']) && isset($_FILES['sjs_products5']['tmp_name']) && $_FILES['sjs_products5']['tmp_name'] != 'none'))
		{
			$res5 = upload_article_file($_FILES['sjs_products5']);
			
			if ($res5 != false)
			{
				$file_url5 = $res5;
			}
	}else{
		$file_url5 = $_POST['sjs_products5_url'];
	}
	
	
		if ((isset($_FILES['sjs_img']['error']) && $_FILES['sjs_img']['error'] == 0) || (!isset($_FILES['sjs_img']['error']) && isset($_FILES['sjs_img']['tmp_name']) && $_FILES['sjs_img']['tmp_name'] != 'none'))
		{
			$res6 = upload_article_file($_FILES['sjs_img']);
			
			if ($res6 != false)
			{
				$file_url6 = $res6;
			}
	}else{
		$file_url6 = $_POST['sjs_img_url'];
	}
	
	
		if ((isset($_FILES['sjs_name_img']['error']) && $_FILES['sjs_name_img']['error'] == 0) || (!isset($_FILES['sjs_name_img']['error']) && isset($_FILES['sjs_name_img']['tmp_name']) && $_FILES['sjs_name_img']['tmp_name'] != 'none'))
		{
			$res7 = upload_article_file($_FILES['sjs_name_img']);
			
			if ($res7 != false)
			{
				$file_url7 = $res7;
			}
	}else{
		$file_url7 = $_POST['sjs_name_img_url'];
	}
	
	
	
		if ((isset($_FILES['sjs_tou']['error']) && $_FILES['sjs_tou']['error'] == 0) || (!isset($_FILES['sjs_tou']['error']) && isset($_FILES['sjs_tou']['tmp_name']) && $_FILES['sjs_tou']['tmp_name'] != 'none'))
		{
			$res8 = upload_article_file($_FILES['sjs_tou']);
			
			if ($res8 != false)
			{
				$file_url8 = $res8;
			}
	}else{
		$file_url8 = $_POST['sjs_tou_url'];
	}
	
	
	if ((isset($_FILES['left_img']['error']) && $_FILES['left_img']['error'] == 0) || (!isset($_FILES['left_img']['error']) && isset($_FILES['left_img']['tmp_name']) && $_FILES['left_img']['tmp_name'] != 'none'))
		{
			$res9 = upload_article_file($_FILES['left_img']);
			
			if ($res9 != false)
			{
				$file_url9 = $res9;
			}
	}else{
		$file_url9 = $_POST['left_img_url'];
	}
	
	
	if ((isset($_FILES['rec_img']['error']) && $_FILES['rec_img']['error'] == 0) || (!isset($_FILES['rec_img']['error']) && isset($_FILES['rec_img']['tmp_name']) && $_FILES['rec_img']['tmp_name'] != 'none'))
		{
			$res10 = upload_article_file($_FILES['rec_img']);
			
			if ($res10 != false)
			{
				$file_url10 = $res10;
			}
	}else{
		$file_url10 = $_POST['rec_img'];
	}

    if ($exc1->edit("sjs_name = '$_POST[sjs_name]',is_open ='$_POST[is_open]', sjs_img = '$file_url6', sjs_tou = '$file_url8', sjs_name_img = '$file_url7', sjs_brief = '$_POST[sjs_brief]',sjs_company = '$_POST[sjs_company]', sjs_guoji = '$_POST[sjs_guoji]', sjs_area = '$_POST[sjs_area]', sjs_products1 = '$file_url1', sjs_products2 = '$file_url2', sjs_products3 = '$file_url3', sjs_products4 = '$file_url4', sjs_products5 = '$file_url5',sjs_answer1 = '$_POST[sjs_answer1]',sjs_answer2 = '$_POST[sjs_answer2]',sjs_answer3 = '$_POST[sjs_answer3]',sjs_answer4 = '$_POST[sjs_answer4]',sjs_ask1 = '$_POST[sjs_ask1]',sjs_ask2 = '$_POST[sjs_ask2]',sjs_ask3 = '$_POST[sjs_ask3]',sjs_ask4 = '$_POST[sjs_ask4]',experience = '$_POST[experience]',zuoyouming='$_POST[zuoyouming]',rec_img = '$file_url10',left_img = '$file_url9'", $_POST['id']))
    {
        $link[0]['text'] = $_LANG['back_list'];
        $link[0]['href'] = 'article.php?act=sjs_list&' . list_link_postfix();

        $note = sprintf($_LANG['articleedit_succeed'], stripslashes($_POST['title']));
        admin_log($_POST['title'], 'edit', 'article');

        clear_cache_files();

        sys_msg($note, 0, $link);
    }
    else
    {
        die($db->error());
    }
}

/*设计师更新*/

if ($_REQUEST['act'] =='update_jg')
{
    /* 权限判断 */
    admin_priv('article_manage');


    /* 取得文件地址 */
    $file_url = '';
	
        if ((isset($_FILES['jg_products1']['error']) && $_FILES['jg_products1']['error'] == 0) || (!isset($_FILES['jg_products1']['error']) && isset($_FILES['jg_products1']['tmp_name']) && $_FILES['jg_products1']['tmp_name'] != 'none'))
    {
        // 复制文件
        $res1 = upload_article_file($_FILES['jg_products1']);
		
        if ($res1 != false)
        {
            $file_url1 = $res1;
        }
    }else{
		$file_url1 = $_POST['jg_products1_url'];
	}
	
	if ((isset($_FILES['jg_products2']['error']) && $_FILES['jg_products2']['error'] == 0) || (!isset($_FILES['jg_products2']['error']) && isset($_FILES['jg_products2']['tmp_name']) && $_FILES['jg_products2']['tmp_name'] != 'none'))
    {

        // 复制文件
        $res2 = upload_article_file($_FILES['jg_products2']);
		
        if ($res2 != false)
        {
            $file_url2 = $res2;
        }
    }else{
		$file_url2 = $_POST['jg_products2_url'];
	}
	
	if ((isset($_FILES['jg_products3']['error']) && $_FILES['jg_products3']['error'] == 0) || (!isset($_FILES['jg_products3']['error']) && isset($_FILES['jg_products3']['tmp_name']) && $_FILES['jg_products3']['tmp_name'] != 'none'))
    {

        // 复制文件
        $res3 = upload_article_file($_FILES['jg_products3']);
		
        if ($res3 != false)
        {
            $file_url3 = $res3;
        }
    }else{
		$file_url3 = $_POST['jg_products3_url'];
	}
	
	if ((isset($_FILES['jg_products4']['error']) && $_FILES['jg_products4']['error'] == 0) || (!isset($_FILES['jg_products4']['error']) && isset($_FILES['jg_products4']['tmp_name']) && $_FILES['jg_products4']['tmp_name'] != 'none'))
    {

        // 复制文件
        $res4 = upload_article_file($_FILES['jg_products4']);
		
        if ($res4 != false)
        {
            $file_url4 = $res4;
        }
    }else{
		$file_url4 = $_POST['jg_products4_url'];
	}
	
	if ((isset($_FILES['jg_products5']['error']) && $_FILES['jg_products5']['error'] == 0) || (!isset($_FILES['jg_products5']['error']) && isset($_FILES['jg_products5']['tmp_name']) && $_FILES['jg_products5']['tmp_name'] != 'none'))
    {
        $res5 = upload_article_file($_FILES['jg_products5']);
		
        if ($res5 != false)
        {
            $file_url5 = $res5;
        }
    }else{
		$file_url5 = $_POST['jg_products5_url'];
	}
	
	
	
	if ((isset($_FILES['jg_img']['error']) && $_FILES['jg_img']['error'] == 0) || (!isset($_FILES['jg_img']['error']) && isset($_FILES['jg_img']['tmp_name']) && $_FILES['jg_img']['tmp_name'] != 'none'))
    {
        $res6 = upload_article_file($_FILES['jg_img']);
		
        if ($res6 != false)
        {
            $file_url6 = $res6;
        }
    }else{
		$file_url6 = $_POST['jg_img_url'];
	}
	
	if ((isset($_FILES['jg_name_img']['error']) && $_FILES['jg_name_img']['error'] == 0) || (!isset($_FILES['jg_name_img']['error']) && isset($_FILES['jg_name_img']['tmp_name']) && $_FILES['jg_name_img']['tmp_name'] != 'none'))
    {
        $res7 = upload_article_file($_FILES['jg_name_img']);
		
        if ($res7 != false)
        {
            $file_url7 = $res7;
        }
    }else{
		$file_url7 = $_POST['jg_name_img_url'];
	}
	
	if ((isset($_FILES['jg_tou']['error']) && $_FILES['jg_tou']['error'] == 0) || (!isset($_FILES['jg_tou']['error']) && isset($_FILES['jg_tou']['tmp_name']) && $_FILES['jg_tou']['tmp_name'] != 'none'))
    {
        $res8 = upload_article_file($_FILES['jg_tou']);
		
        if ($res8 != false)
        {
            $file_url8 = $res8;
        }
    }else{
		$file_url8 = $_POST['jg_tou_url'];
	}
	
	
	if ((isset($_FILES['left_img']['error']) && $_FILES['left_img']['error'] == 0) || (!isset($_FILES['left_img']['error']) && isset($_FILES['left_img']['tmp_name']) && $_FILES['left_img']['tmp_name'] != 'none'))
		{
			$res9 = upload_article_file($_FILES['left_img']);
			
			if ($res9 != false)
			{
				$file_url9 = $res9;
			}
	}else{
		$file_url9 = $_POST['left_img_url'];
	}
	
	
	if ((isset($_FILES['rec_img']['error']) && $_FILES['rec_img']['error'] == 0) || (!isset($_FILES['rec_img']['error']) && isset($_FILES['rec_img']['tmp_name']) && $_FILES['rec_img']['tmp_name'] != 'none'))
		{
			$res10 = upload_article_file($_FILES['rec_img']);
			
			if ($res10 != false)
			{
				$file_url10 = $res10;
			}
	}else{
		$file_url10 = $_POST['rec_img'];
	}
	
	
	
	
	

    if ($exc2->edit("jg_name = '$_POST[jg_name]',is_open ='$_POST[is_open]', jg_img = '$file_url6', jg_tou = '$file_url8', jg_name_img = '$file_url7', jg_brief = '$_POST[jg_brief]',jg_company = '$_POST[jg_company]', jg_guoji = '$_POST[jg_guoji]', jg_area = '$_POST[jg_area]', jg_products1 = '$file_url1', jg_products2 = '$file_url2', jg_products3 = '$file_url3', jg_products4 = '$file_url4', jg_products5 = '$file_url5',jg_answer1 = '$_POST[jg_answer1]',jg_answer2 = '$_POST[jg_answer2]',jg_answer3 = '$_POST[jg_answer3]',jg_answer4 = '$_POST[jg_answer4]',jg_ask1 = '$_POST[jg_ask1]',jg_ask2 = '$_POST[jg_ask2]',jg_ask3 = '$_POST[jg_ask3]',jg_ask4 = '$_POST[jg_ask4]',experience = '$_POST[experience]',zuoyouming='$_POST[zuoyouming]',rec_img = '$file_url10',left_img = '$file_url9'", $_POST['id']))
    {
		
        $link[0]['text'] = $_LANG['back_list'];
        $link[0]['href'] = 'article.php?act=jg_list&' . list_link_postfix();

        $note = sprintf($_LANG['articleedit_succeed'], stripslashes($_POST['title']));
        admin_log($_POST['title'], 'edit', 'article');

        clear_cache_files();

        sys_msg($note, 0, $link);
    }
    else
    {
        die($db->error());
    }
}

/**
 * 经销商查询更新
 * */

if ($_REQUEST['act'] =='update_jxscx')
{
    /* 权限判断 */
    admin_priv('03_ssj_jxscx');

    /*检查文章名是否相同*/
    $is_only = $exc->is_only('title', $_POST['title'], $_POST['id'], "cat_id = '$_POST[article_cat]'");

    if (!$is_only)
    {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }


    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }

    if ($exc->edit0("ssj_name='$_POST[ssj_name]', cat_id='经销商', address='$_POST[address]', telphone='$_POST[telphone]',ssj_area='$_POST[ssj_area]',content='$_POST[FCKeditor1]'", $_POST['id']))
    {
        $link[0]['text'] = $_LANG['back_list'];
        $link[0]['href'] = 'article.php?act=list_jxscx&' . list_link_postfix();

        $note = sprintf($_LANG['articleedit_succeed'], stripslashes($_POST['title']));
        admin_log($_POST['title'], 'edit', 'article');

        clear_cache_files();

        sys_msg($note, 0, $link);
    }
    else
    {
        die($db->error());
    }
}

/**
 * 直销店招商更新
 * */
if ($_REQUEST['act'] =='update_zxdzs')
{
    /* 权限判断 */
    admin_priv('04_ssj_zxdzs');

    /*检查文章名是否相同*/
    $is_only = $exc->is_only('title', $_POST['title'], $_POST['id'], "cat_id = '$_POST[article_cat]'");

    if (!$is_only)
    {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }


    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }

    if ($exc->edit0("ssj_name='$_POST[ssj_name]', cat_id='直销店招商', address='$_POST[address]', telphone='$_POST[telphone]',ssj_area='$_POST[ssj_area]',content='$_POST[FCKeditor1]'", $_POST['id']))
    {
        $link[0]['text'] = $_LANG['back_list'];
        $link[0]['href'] = 'article.php?act=list_zxdzs&' . list_link_postfix();

        $note = sprintf($_LANG['articleedit_succeed'], stripslashes($_POST['title']));
        admin_log($_POST['title'], 'edit', 'article');

        clear_cache_files();

        sys_msg($note, 0, $link);
    }
    else
    {
        die($db->error());
    }
}

if ($_REQUEST['act'] =='update0')
{
    /* 权限判断 */
    admin_priv('02_ssj_fwzx');

    /*检查文章名是否相同*/
    $is_only = $exc->is_only('title', $_POST['title'], $_POST['id'], "cat_id = '$_POST[article_cat]'");

    if (!$is_only)
    {
        sys_msg(sprintf($_LANG['title_exist'], stripslashes($_POST['title'])), 1);
    }


    if (empty($_POST['cat_id']))
    {
        $_POST['cat_id'] = 0;
    }

    if ($exc->edit0("ssj_name='$_POST[ssj_name]', cat_id='服务中心', address='$_POST[address]', telphone='$_POST[telphone]',ssj_area='$_POST[ssj_area]',content='$_POST[FCKeditor1]'", $_POST['id']))
    {
        $link[0]['text'] = $_LANG['back_list'];
        $link[0]['href'] = 'article.php?act=list0&' . list_link_postfix();

        $note = sprintf($_LANG['articleedit_succeed'], stripslashes($_POST['title']));
        admin_log($_POST['title'], 'edit', 'article');

        clear_cache_files();

        sys_msg($note, 0, $link);
    }
    else
    {
        die($db->error());
    }
}





/*------------------------------------------------------ */
//-- 编辑文章主题
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit_title')
{
    check_authz_json('article_manage');

    $id    = intval($_POST['id']);
    $title = json_str_iconv(trim($_POST['val']));

    /* 检查文章标题是否重复 */
    if ($exc->num("title", $title, $id) != 0)
    {
        make_json_error(sprintf($_LANG['title_exist'], $title));
    }
    else
    {
        if ($exc->edit("title = '$title'", $id))
        {
            clear_cache_files();
            admin_log($title, 'edit', 'article');
            make_json_result(stripslashes($title));
        }
        else
        {
            make_json_error($db->error());
        }
    }
}

/*------------------------------------------------------ */
//-- 切换是否显示
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_show')
{
    check_authz_json('article_manage');

    $id     = intval($_POST['id']);
    $val    = intval($_POST['val']);

    $exc->edit("is_open = '$val'", $id);
    clear_cache_files();

    make_json_result($val);
}

/*------------------------------------------------------ */
//-- 切换文章重要性
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_type')
{
    check_authz_json('article_manage');

    $id     = intval($_POST['id']);
    $val    = intval($_POST['val']);

    $exc->edit("article_type = '$val'", $id);
    clear_cache_files();

    make_json_result($val);
}



/*------------------------------------------------------ */
//-- 删除文章主题
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove')
{
    check_authz_json('article_manage');

    $id = intval($_GET['id']);

    /* 删除原来的文件 */
    $sql = "SELECT file_url FROM " . $ecs->table('article') . " WHERE article_id = '$id'";
    $old_url = $db->getOne($sql);
    if ($old_url != '' && strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
    {
        @unlink(ROOT_PATH . $old_url);
    }

    $name = $exc->get_name($id);
    if ($exc->drop($id))
    {
        $db->query("DELETE FROM " . $ecs->table('comment') . " WHERE " . "comment_type = 1 AND id_value = $id");
        
        admin_log(addslashes($name),'remove','article');
        clear_cache_files();
    }

    $url = 'article.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
	
    exit;
}

/*------------------------------------------------------ */
//-- 删除服务中心文章
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove0')
{
    check_authz_json('02_ssj_fwzx');

    $id = intval($_GET['id']);

    /* 删除原来的文件 */
    //$sql = "SELECT file_url FROM " . $ecs->table('ssj') . " WHERE article_id = '$id'";
    //$old_url = $db->getOne($sql);
    if ($old_url != '' && strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
    {
        @unlink(ROOT_PATH . $old_url);
    }
	
	$db->query("DELETE FROM " . $ecs->table('ssj') . " WHERE id = $id");
	
    $name = $exc->get_name($id);
    if ($exc->drop($id))
    {
        $db->query("DELETE FROM " . $ecs->table('comment') . " WHERE " . "comment_type = 1 AND id_value = $id");
        
        admin_log(addslashes($name),'remove','ssj');
        clear_cache_files();
    }

    $url = 'article.php?act=query_ssj&' . str_replace('act=remove0', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
	
    exit;
}


/*------------------------------------------------------ */
//-- 删除删除经销商查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove_jxscx')
{
    check_authz_json('03_ssj_jxscx');

    $id = intval($_GET['id']);

    /* 删除原来的文件 */
    //$sql = "SELECT file_url FROM " . $ecs->table('ssj') . " WHERE article_id = '$id'";
    //$old_url = $db->getOne($sql);
    if ($old_url != '' && strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
    {
        @unlink(ROOT_PATH . $old_url);
    }
	
	$db->query("DELETE FROM " . $ecs->table('ssj') . " WHERE id = $id");
	
    $name = $exc->get_name($id);
    if ($exc->drop($id))
    {
        $db->query("DELETE FROM " . $ecs->table('comment') . " WHERE " . "comment_type = 1 AND id_value = $id");
        
        admin_log(addslashes($name),'remove','ssj');
        clear_cache_files();
    }

    $url = 'article.php?act=query_jxscx&' . str_replace('act=remove_jxscx', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
	
    exit;
}


/*------------------------------------------------------ */
//-- 删除直销店查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove_zxdzs')
{
    check_authz_json('04_ssj_zxdzs');

    $id = intval($_GET['id']);

    /* 删除原来的文件 */
    //$sql = "SELECT file_url FROM " . $ecs->table('ssj') . " WHERE article_id = '$id'";
    //$old_url = $db->getOne($sql);
    if ($old_url != '' && strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
    {
        @unlink(ROOT_PATH . $old_url);
    }
	
	$db->query("DELETE FROM " . $ecs->table('ssj') . " WHERE id = $id");
	
    $name = $exc->get_name($id);
    if ($exc->drop($id))
    {
        $db->query("DELETE FROM " . $ecs->table('comment') . " WHERE " . "comment_type = 1 AND id_value = $id");
        
        admin_log(addslashes($name),'remove','ssj');
        clear_cache_files();
    }

    $url = 'article.php?act=query_zxdzs&' . str_replace('act=remove_zxdzs', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
	
    exit;
}




/*------------------------------------------------------ */
//-- 删除文章主题  设计师
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove_sjs')
{
    check_authz_json('article_manage');

    $id = intval($_GET['id']);

    /* 删除原来的文件 */
    $sql = "SELECT file_url FROM " . $ecs->table('article') . " WHERE article_id = '$id'";
    $old_url = $db->getOne($sql);
    if ($old_url != '' && strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
    {
        @unlink(ROOT_PATH . $old_url);
    }

    $name = $exc1->get_name($id);
    if ($exc1->drop($id))
    {
        $db->query("DELETE FROM " . $ecs->table('comment') . " WHERE " . "comment_type = 1 AND id_value = $id");
        
        admin_log(addslashes($name),'remove','article');
        clear_cache_files();
    }

    $url = 'article.php?act=query_sjs&' . str_replace('act=remove_sjs', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
    exit;
}


/*------------------------------------------------------ */
//-- 删除文章主题  技工
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove_jg')
{
    check_authz_json('article_manage');

    $id = intval($_GET['id']);

    /* 删除原来的文件 */
    $sql = "SELECT file_url FROM " . $ecs->table('article') . " WHERE article_id = '$id'";
    $old_url = $db->getOne($sql);
    if ($old_url != '' && strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
    {
        @unlink(ROOT_PATH . $old_url);
    }

    $name = $exc2->get_name($id);
    if ($exc2->drop($id))
    {
        $db->query("DELETE FROM " . $ecs->table('comment') . " WHERE " . "comment_type = 1 AND id_value = $id");
        
        admin_log(addslashes($name),'remove','article');
        clear_cache_files();
    }

    $url = 'article.php?act=query_jg&' . str_replace('act=remove_jg', '', $_SERVER['QUERY_STRING']);

    ecs_header("Location: $url\n");
    exit;
}



/*------------------------------------------------------ */
//-- 将商品加入关联
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'add_link_goods')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    check_authz_json('article_manage');

    $add_ids = $json->decode($_GET['add_ids']);
    $args = $json->decode($_GET['JSON']);
    $article_id = $args[0];

    if ($article_id == 0)
    {
        $article_id = $db->getOne('SELECT MAX(article_id)+1 AS article_id FROM ' .$ecs->table('article'));
    }

    foreach ($add_ids AS $key => $val)
    {
        $sql = 'INSERT INTO ' . $ecs->table('goods_article') . ' (goods_id, article_id) '.
               "VALUES ('$val', '$article_id')";
        $db->query($sql, 'SILENT') or make_json_error($db->error());
    }

    /* 重新载入 */
    $arr = get_article_goods($article_id);
    $opt = array();

    foreach ($arr AS $key => $val)
    {
        $opt[] = array('value'  => $val['goods_id'],
                        'text'  => $val['goods_name'],
                        'data'  => '');
    }

    make_json_result($opt);
}

/*------------------------------------------------------ */
//-- 将商品删除关联
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'drop_link_goods')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    check_authz_json('article_manage');

    $drop_goods     = $json->decode($_GET['drop_ids']);
    $arguments      = $json->decode($_GET['JSON']);
    $article_id     = $arguments[0];

    if ($article_id == 0)
    {
        $article_id = $db->getOne('SELECT MAX(article_id)+1 AS article_id FROM ' .$ecs->table('article'));
    }

    $sql = "DELETE FROM " . $ecs->table('goods_article').
            " WHERE article_id = '$article_id' AND goods_id " .db_create_in($drop_goods);
    $db->query($sql, 'SILENT') or make_json_error($db->error());

    /* 重新载入 */
    $arr = get_article_goods($article_id);
    $opt = array();

    foreach ($arr AS $key => $val)
    {
        $opt[] = array('value'  => $val['goods_id'],
                        'text'  => $val['goods_name'],
                        'data'  => '');
    }

    make_json_result($opt);
}

/*------------------------------------------------------ */
//-- 搜索商品
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'get_goods_list')
{
    include_once(ROOT_PATH . 'includes/cls_json.php');
    $json = new JSON;

    $filters = $json->decode($_GET['JSON']);

    $arr = get_goods_list($filters);
    $opt = array();

    foreach ($arr AS $key => $val)
    {
        $opt[] = array('value' => $val['goods_id'],
                        'text' => $val['goods_name'],
                        'data' => $val['shop_price']);
    }

    make_json_result($opt);
}
/*------------------------------------------------------ */
//-- 批量操作
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'batch')
{
    /* 批量删除 */
    if (isset($_POST['type']))
    {
        if ($_POST['type'] == 'button_remove')
        {
            admin_priv('article_manage');

            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                sys_msg($_LANG['no_select_article'], 1);
            }

            /* 删除原来的文件 */
            $sql = "SELECT file_url FROM " . $ecs->table('article') .
                    " WHERE article_id " . db_create_in(join(',', $_POST['checkboxes'])) .
                    " AND file_url <> ''";

            $res = $db->query($sql);
            while ($row = $db->fetchRow($res))
            {
                $old_url = $row['file_url'];
                if (strpos($old_url, 'http://') === false && strpos($old_url, 'https://') === false)
                {
                    @unlink(ROOT_PATH . $old_url);
                }
            }

            foreach ($_POST['checkboxes'] AS $key => $id)
            {
                if ($exc->drop($id))
                {
                    $name = $exc->get_name($id);
                    admin_log(addslashes($name),'remove','article');
                }
            }

        }

        /* 批量隐藏 */
        if ($_POST['type'] == 'button_hide')
        {
            check_authz_json('article_manage');
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                sys_msg($_LANG['no_select_article'], 1);
            }

            foreach ($_POST['checkboxes'] AS $key => $id)
            {
              $exc->edit("is_open = '0'", $id);
            }
        }

        /* 批量显示 */
        if ($_POST['type'] == 'button_show')
        {
            check_authz_json('article_manage');
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']))
            {
                sys_msg($_LANG['no_select_article'], 1);
            }

            foreach ($_POST['checkboxes'] AS $key => $id)
            {
              $exc->edit("is_open = '1'", $id);
            }
        }

        /* 批量移动分类 */
        if ($_POST['type'] == 'move_to')
        {
            check_authz_json('article_manage');
            if (!isset($_POST['checkboxes']) || !is_array($_POST['checkboxes']) )
            {
                sys_msg($_LANG['no_select_article'], 1);
            }

            if(!$_POST['target_cat'])
            {
                sys_msg($_LANG['no_select_act'], 1);
            }
            
            foreach ($_POST['checkboxes'] AS $key => $id)
            {
              $exc->edit("cat_id = '".$_POST['target_cat']."'", $id);
            }
        }
    }

    /* 清除缓存 */
    clear_cache_files();
    $lnk[] = array('text' => $_LANG['back_list'], 'href' => 'article.php?act=list');
    sys_msg($_LANG['batch_handle_ok'], 0, $lnk);
}

/* 把商品删除关联 */
function drop_link_goods($goods_id, $article_id)
{
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('goods_article') .
            " WHERE goods_id = '$goods_id' AND article_id = '$article_id' LIMIT 1";
    $GLOBALS['db']->query($sql);
    create_result(true, '', $goods_id);
}

/* 取得文章关联商品 */
function get_article_goods($article_id)
{
    $list = array();
    $sql  = 'SELECT g.goods_id, g.goods_name'.
            ' FROM ' . $GLOBALS['ecs']->table('goods_article') . ' AS ga'.
            ' LEFT JOIN ' . $GLOBALS['ecs']->table('goods') . ' AS g ON g.goods_id = ga.goods_id'.
            " WHERE ga.article_id = '$article_id'";
    $list = $GLOBALS['db']->getAll($sql);

    return $list;
}

/* 获得文章列表 */
function get_articleslist($tiaojian)
{
	
    $result = get_filter();
	
    if ($result === false)
    {
        $filter = array();
        $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        $filter['cat_id'] = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'a.article_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

        $where = '';
        if (!empty($filter['keyword']))
        {
            $where = " AND a.title LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
        }
        
//		if ($filter['cat_id'])
//	    {
//	            $where .= " AND a." . get_article_children($filter['cat_id']);
//	    }
		
		if($tiaojian){
			$where .= " AND a.".$tiaojian;
		}
		
		
		//echo $where;
		

        /* 文章总数 */
        $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('article'). ' AS a '.
               'LEFT JOIN ' .$GLOBALS['ecs']->table('article_cat'). ' AS ac ON ac.cat_id = a.cat_id '.
               'WHERE 1 ' .$where;
		
		
		
			   
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        $filter = page_and_size($filter);
		
//		echo "<pre>";
//		print_r($_SESSION);
//		echo "</pre>";
		
		

        /* 获取文章数据 */
        $sql = 'SELECT a.* , ac.cat_name '.
               'FROM ' .$GLOBALS['ecs']->table('article'). ' AS a '.
               'LEFT JOIN ' .$GLOBALS['ecs']->table('article_cat'). ' AS ac ON ac.cat_id = a.cat_id '.
               'WHERE 1 ' .$where. ' ORDER by '.$filter['sort_by'].' '.$filter['sort_order'];
		
		//echo $sql;
		
        $filter['keyword'] = stripslashes($filter['keyword']);
        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $arr = array();
	
	
    $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);

    while ($rows = $GLOBALS['db']->fetchRow($res))
    {
        $rows['date'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);

        $arr[] = $rows;
    }
    return array('arr' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}


/**#@* 获得设计师列表 */
function get_sjs_articleslist()
{
    $result = get_filter();
    if ($result === false)
    {
        $filter = array();
        $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        $filter['cat_id'] = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'a.article_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

        $where = '';
        if (!empty($filter['keyword']))
        {
            $where = " AND a.title LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
        }
        if ($filter['cat_id'])
        {
            $where .= " AND a." . get_article_children($filter['cat_id']);
        }

        /* 文章总数 */
        $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('article_sjs'). ' AS a '.
               'WHERE 1 ' .$where;
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        $filter = page_and_size($filter);

        /* 获取文章数据 */
        $sql = 'SELECT a.* '.
               'FROM ' .$GLOBALS['ecs']->table('article_sjs'). ' AS a
               WHERE 1 ' .$where. ' ORDER by a.id';

        $filter['keyword'] = stripslashes($filter['keyword']);
        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $arr = array();
    $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);

    while ($rows = $GLOBALS['db']->fetchRow($res))
    {
        $rows['date'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);

        $arr[] = $rows;
    }
    return array('arr' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}


/**#@* 获得技工列表 */
function get_jg_articleslist()
{
    $result = get_filter();
    if ($result === false)
    {
        $filter = array();
        $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        $filter['cat_id'] = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'a.article_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

        $where = '';
        if (!empty($filter['keyword']))
        {
            $where = " AND a.title LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
        }
        if ($filter['cat_id'])
        {
            $where .= " AND a." . get_article_children($filter['cat_id']);
        }

        /* 文章总数 */
        $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('article_jg'). ' AS a '.
               'WHERE 1 ' .$where;
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        $filter = page_and_size($filter);

        /* 获取文章数据 */
        $sql = 'SELECT a.* '.
               'FROM ' .$GLOBALS['ecs']->table('article_jg'). ' AS a
               WHERE 1 ' .$where. ' ORDER by a.id';

        $filter['keyword'] = stripslashes($filter['keyword']);
        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $arr = array();
    $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);

    while ($rows = $GLOBALS['db']->fetchRow($res))
    {
        $rows['date'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);

        $arr[] = $rows;
    }
    return array('arr' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}








/**获取服务商列表***/
function get_articleslist0($cat_id)
{
    $result = get_filter();
    if ($result === false)
    {
        $filter = array();
        $filter['keyword']    = empty($_REQUEST['keyword']) ? '' : trim($_REQUEST['keyword']);
        if (isset($_REQUEST['is_ajax']) && $_REQUEST['is_ajax'] == 1)
        {
            $filter['keyword'] = json_str_iconv($filter['keyword']);
        }
        $filter['cat_id'] = empty($_REQUEST['cat_id']) ? 0 : intval($_REQUEST['cat_id']);
        $filter['sort_by']    = empty($_REQUEST['sort_by']) ? 'a.article_id' : trim($_REQUEST['sort_by']);
        $filter['sort_order'] = empty($_REQUEST['sort_order']) ? 'DESC' : trim($_REQUEST['sort_order']);

        $where = '';
        if (!empty($filter['keyword']))
        {
            $where = " AND ssj_name LIKE '%" . mysql_like_quote($filter['keyword']) . "%'";
        }
        if ($filter['cat_id'])
        {
            $where .= " AND " . get_article_children($filter['cat_id']);
        }
		
		$where .= " and cat_id = '".$cat_id."'";
		

        /* 文章总数 */
        $sql = 'SELECT COUNT(*) FROM ' .$GLOBALS['ecs']->table('ssj').
               'WHERE 1 ' .$where;
        $filter['record_count'] = $GLOBALS['db']->getOne($sql);

        $filter = page_and_size($filter);

        /* 获取文章数据 */
        $sql = 'SELECT * '.
               'FROM ' .$GLOBALS['ecs']->table('ssj').' WHERE 1 ' .$where;

        $filter['keyword'] = stripslashes($filter['keyword']);
		
        set_filter($filter, $sql);
    }
    else
    {
        $sql    = $result['sql'];
        $filter = $result['filter'];
    }
    $arr = array();
    $res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);

    while ($rows = $GLOBALS['db']->fetchRow($res))
    {
        $rows['date'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);

        $arr[] = $rows;
    }
    return array('arr' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}



/* 上传文件 */
function upload_article_file($upload)
{
    if (!make_dir("../" . DATA_DIR . "/article"))
    {
        /* 创建目录失败 */
        return false;
    }

    $filename = cls_image::random_filename() . substr($upload['name'], strpos($upload['name'], '.'));
    $path     = ROOT_PATH. DATA_DIR . "/article/" . $filename;

    if (move_upload_file($upload['tmp_name'], $path))
    {
        return DATA_DIR . "/article/" . $filename;
    }
    else
    {
        return false;
    }
}

/**
	查询客服qq分类栏目
*/
function goods_category(){
	
   $sql = 'SELECT cat_id,cat_name,kfqq FROM ' .$GLOBALS['ecs']->table('category').
               'WHERE parent_id = 706';
			   
  $res = $GLOBALS['db']->getAll($sql);
  
  return $res;
}










?>