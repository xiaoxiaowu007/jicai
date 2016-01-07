<?php

/**
 * ECSHOP 文章分类
 * ============================================================================
 * * 版权所有 2005-2012 欧嘉科技，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: article_cat.php 17217 2011-01-19 06:29:08Z liubo $
*/


define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

/* 清除缓存 */
clear_cache_files();

$cat_id = $_REQUEST['cat_id'];

$cat=$cat_id;

$smarty->assign('cat', $cat);

if($cat_id == '1'){
	$cat_id = '服务中心';
}else if($cat_id == '2'){
	$cat_id = '直销店招商';
}else if($cat_id == '3'){
	$cat_id = '材料商';
}else{
	$cat_id = '经销商';
}

$smarty->assign('shop_logo',        htmlspecialchars($_CFG['shop_logo']));
/*------------------------------------------------------ */
//-- INPUT
/*------------------------------------------------------ */

/* 获得指定的分类ID */


/* 获得当前页码 */
$page   = !empty($_REQUEST['page'])  && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;

$last_page =($page==1)?'1':($page-1);



$smarty->assign('last_page',$last_page);


/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

/* 获得页面的缓存ID */
$cache_id = sprintf('%X', crc32($cat_id . '-' . $page . '-' . $_CFG['lang']));

if (!$smarty->is_cached('article_cat.dwt', $cache_id))
{
    /* 如果页面没有被缓存则重新获得页面的内容 */

    assign_template('a', array($cat_id));
    $position = assign_ur_here($cat_id);
    $smarty->assign('page_title',           $position['title']);     // 页面标题
    $smarty->assign('ur_here',              $position['ur_here']);   // 当前位置

    $smarty->assign('categories',           get_categories_tree(0)); // 分类树
    $smarty->assign('article_categories',   article_categories_tree($cat_id)); //文章分类树
    $smarty->assign('helps',                get_shop_help());        // 网店帮助
    $smarty->assign('top_goods',            get_top10());            // 销售排行

    $smarty->assign('best_goods',           get_recommend_goods('best'));
    $smarty->assign('new_goods',            get_recommend_goods('new'));
    $smarty->assign('hot_goods',            get_recommend_goods('hot'));
    $smarty->assign('promotion_goods',      get_promote_goods());
    $smarty->assign('promotion_info', get_promotion_info());
    $smarty->assign('children_category',      get_article_category(15));//分类下的子分类
    
	$smarty->assign('lanmu_name',      $cat_id);//分类下的子分类
		

    /* Meta */
    $meta = $db->getAll("SELECT ssj_name, address,telphone,ssj_area,id FROM " . $ecs->table('ssj') . " WHERE cat_id = '$cat_id'");
	
    /*if ($meta === false || empty($meta))
    {
        /* 如果没有找到任何记录则返回首页
        ecs_header("Location: ./\n");
        exit;
    }*/
	
    $smarty->assign('name',    htmlspecialchars($meta['ssj_name']));
    $smarty->assign('address',    htmlspecialchars($meta['address']));
    $smarty->assign('telphone', htmlspecialchars($meta['telphone']));

    /* 获得文章总数 */
    $size   = isset($_CFG['article_page_size']) && intval($_CFG['article_page_size']) > 0 ? intval($_CFG['article_page_size']) : 20;
    $count  = get_ssj_count($cat_id,$_REQUEST['keywords']);
    $pages  = ($count > 0) ? ceil($count / $size) : 1;

    if ($page > $pages)
    {
        $page = $pages;
    }
	
	$next_page = ($page==$pages)?$pages:($page+1);
	
	$smarty->assign('next_page',$next_page);
	
    $pager['search']['id'] = $cat_id;
    $keywords = '';
    $goon_keywords = ''; //继续传递的搜索关键词

    /* 获得文章列表 */
    if (isset($_REQUEST['keywords']))
    {
        $keywords = addslashes(htmlspecialchars(urldecode(trim($_REQUEST['keywords']))));
		$key = addslashes(htmlspecialchars(urldecode(trim($_REQUEST['key']))));
        $pager['search']['keywords'] = $keywords;
        $search_url = substr(strrchr($_POST['cur_url'], '/'), 1);

        $smarty->assign('search_value',    stripslashes(stripslashes($keywords)));
        $smarty->assign('search_url',       $search_url);
        $count  = get_ssj_count($cat_id, $keywords);
        $pages  = ($count > 0) ? ceil($count / $size) : 1;
        if ($page > $pages)
        {
            $page = $pages;
        }

        $goon_keywords = urlencode($_REQUEST['keywords']);
    }
	
	//获取职位列表
	$smarty->assign('zhiwei', get_article_zhiwei());
	
	
	//获取地区列表
	$smarty->assign('area', get_article_area());
	
	//获取经销商图片展示1
	$smarty->assign('fen1',get_cat_articles('26'));
	
	//获取经销商图片展示2
	$smarty->assign('fen2',get_cat_articles('27'));
	
	//获取经销商图片展示3
	$smarty->assign('fen3',get_cat_articles('28'));
	
	//获取经销商图片展示4
	$smarty->assign('fen4',get_cat_articles('29'));
	
	//获取经销商图片展示5
	$smarty->assign('fen5',get_cat_articles('30'));
	
	//获取经销商图片展示6
	$smarty->assign('fen6',get_cat_articles('31'));
	
	
    $smarty->assign('artciles_list',    get_ssj_articles($cat_id, $page, $size ,$keywords));
	
    $smarty->assign('cat_id',    $cat_id);
	
    /* 分页 */
    assign_pager('article_cat', $cat, $count, $size, '', '', $page, $goon_keywords);
    assign_dynamic('article_cat');
}

$smarty->assign('feed_url',         ($_CFG['rewrite'] == 1) ? "feed-typearticle_cat" . $cat_id . ".xml" : 'feed.php?type=article_cat' . $cat_id); // RSS URL


//print_r( get_cat_articles($cat_id, $page, $size ,$keywords));

$smarty->display('article_cat3.dwt', $cache_id);


?>