<?php

/**
 * ECSHOP 文章及文章分类相关函数库
 * ============================================================================
 * * 版权所有 2005-2012 欧嘉科技，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: lib_article.php 17217 2011-01-19 06:29:08Z liubo $
*/

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}

/**
 * 获得文章分类下的文章列表
 *
 * @access  public
 * @param   integer     $cat_id
 * @param   integer     $page
 * @param   integer     $size
 *
 * @return  array
 */
function get_cat_articles($cat_id, $page = 1, $size = 20 ,$requirement='',$key)
{
    //取出所有非0的文章
    if ($cat_id == '-1')
    {
        $cat_str = 'cat_id > 0';
    }
    else
    {
        $cat_str = get_article_children($cat_id);
    }
	
	if(!$key){
		$key = 'title';	
	}
	
	
	
    //增加搜索条件，如果有搜索内容就进行搜索    
    if ($requirement != '')
    {
        $sql = 'SELECT article_id, title,zhiwei,area, author, add_time, file_url, open_type' .
               ' FROM ' .$GLOBALS['ecs']->table('article') .
               ' WHERE is_open = 1 AND '.$key.' like \'%' . $requirement . '%\' ' .
               ' AND ' . $cat_str .' ORDER BY article_type DESC, article_id DESC';
    }
    else 
    {
        
        $sql = 'SELECT article_id, title,zhiwei,area, author, add_time, file_url, open_type' .
               ' FROM ' .$GLOBALS['ecs']->table('article') .
               ' WHERE is_open = 1 AND ' . $cat_str .
               ' ORDER BY article_type DESC, article_id DESC';
    }

    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page-1) * $size);

    $arr = array();
    if ($res)
    {
        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            $article_id = $row['article_id'];

            $arr[$article_id]['id']          = $article_id;
            $arr[$article_id]['title']       = $row['title'];
			$arr[$article_id]['zhiwei']       = $row['zhiwei'];
			$arr[$article_id]['area']       = $row['area'];
			$arr[$article_id]['file_url']       = $row['file_url'];
            $arr[$article_id]['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ? sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];
            $arr[$article_id]['author']      = empty($row['author']) || $row['author'] == '_SHOPHELP' ? $GLOBALS['_CFG']['shop_name'] : $row['author'];
            $arr[$article_id]['url']         = $row['open_type'] != 1 ? build_uri('article0', array('aid'=>$article_id), $row['title']) : trim($row['file_url']);
            $arr[$article_id]['add_time']    = date($GLOBALS['_CFG']['date_format'], $row['add_time']);
        }
    }
	
	

    return $arr;
}


/**
 * 获得服务中心列表
 *
 * @access  public
 * @param   integer     $cat_id
 * @param   integer     $page
 * @param   integer     $size
 *
 * @return  array
 */
function get_ssj_articles($cat_id, $page = 1, $size = 9 ,$requirement='')
{
    //取出所有非0的文章
	/*    if ($cat_id == '-1')
    {
        $cat_str = 'cat_id > 0';
    }
    else
    {
        $cat_str = get_article_children($cat_id);
    }
	
	if(!$key){
		$key = 'title';	
	}*/
	
	
    //增加搜索条件，如果有搜索内容就进行搜索    
    if ($requirement != '')
    {
        $sql = 'SELECT id, ssj_name,cat_id,address,telphone,ssj_area' .
               ' FROM ' .$GLOBALS['ecs']->table('ssj') .
               ' WHERE cat_id  ="'.$cat_id.'" and ssj_area like \'%' . $requirement . '%\'';
    }
    else 
    {
        
        $sql = 'SELECT id, ssj_name,cat_id,address,telphone,ssj_area'.
               ' FROM ' .$GLOBALS['ecs']->table('ssj').' WHERE cat_id  ="'.$cat_id.'"';
    }

    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page-1) * $size);

    $arr = array();
    if ($res)
    {
        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            $article_id = $row['id'];
            $arr[$article_id]['id']          = $article_id;
            $arr[$article_id]['name']       = $row['ssj_name'];
			$arr[$article_id]['area']       = $row['ssj_area'];
			$arr[$article_id]['address']       = $row['address'];
			$arr[$article_id]['telphone']       = $row['telphone'];
			$arr[$article_id]['cat_id']       = $row['cat_id'];
        }
    }

    return $arr;
}



/**
 * 获得设计师列表
 *
 * @access  public
 * @param   integer     $cat_id
 * @param   integer     $page
 * @param   integer     $size
 *
 * @return  array
 */
function get_cat_articles_sjs($cat, $page = 1, $size = 20 )
{
    //取出所有非0的文章
   /* if ($cat_id == '-1')
    {
        $cat_str = 'cat_id > 0';
    }
    else
    {
        $cat_str = get_article_children($cat_id);
    }*/
	
	
    //增加搜索条件，如果有搜索内容就进行搜索    
        
     $sql = 'SELECT '.$cat.'_name, '.$cat.'_img, '.$cat.'_brief, id,experience' .
               ' FROM ' .$GLOBALS['ecs']->table('article_'.$cat) .
               ' ORDER BY id DESC';
    

    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page-1) * $size);

    $arr = array();
    if ($res)
    {
        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            $article_id = $row['id'];

            $arr[$article_id]['id']          = $article_id;
            $arr[$article_id]['name']       = $row[$cat.'_name'];
			$arr[$article_id]['img']       = $row[$cat.'_img'];
			$arr[$article_id]['brief']       = $row[$cat.'_brief'];
			$arr[$article_id]['cat']       = $cat;
			$arr[$article_id]['experience']      = $row['experience'];
            /*$arr[$article_id]['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ? sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];
            $arr[$article_id]['author']      = empty($row['author']) || $row['author'] == '_SHOPHELP' ? $GLOBALS['_CFG']['shop_name'] : $row['author'];
            $arr[$article_id]['url']         = $row['open_type'] != 1 ? build_uri('article', array('aid'=>$article_id), $row['title']) : trim($row['file_url']);
            $arr[$article_id]['add_time']    = date($GLOBALS['_CFG']['date_format'], $row['add_time']);*/
        }
    }

    return $arr;
}









/**
 * 获得指定分类下的文章总数
 *
 * @param   integer     $cat_id
 *
 * @return  integer
 */
function get_article_count($cat_id ,$requirement='')
{
    global $db, $ecs;
    if ($requirement != '')
    {
        $count = $db->getOne('SELECT COUNT(*) FROM ' . $ecs->table('article') . ' WHERE ' . get_article_children($cat_id) . ' AND  title like \'%' . $requirement . '%\'  AND is_open = 1');
    }
    else
    {
        $count = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('article') . " WHERE " . get_article_children($cat_id) . " AND is_open = 1");
    }
    return $count;
}


/**
 * 获得指定服务商的数量
 *
 * @param   integer     $cat_id
 *
 * @return  integer
 */
function get_ssj_count($cat_id ,$requirement='')
{
    global $db, $ecs;

    if ($requirement != '')
    {
        $count = $db->getOne('SELECT COUNT(*) FROM ' . $ecs->table('ssj') . ' WHERE  cat_id = "'.$cat_id .'" AND  ssj_area like \'%' . $requirement . '%\'');
    }
    else
    {
        $count = $db->getOne("SELECT COUNT(*) FROM " . $ecs->table('ssj') . " WHERE cat_id = '".$cat_id."'");
    }
    return $count;
}


/**
 * 获得指定分类下的设计师和技工总数
 *
 * @param   integer     $cat_id
 *
 * @return  integer
 */
function get_article_sjs_count($cat)
{
    global $db, $ecs;
	
	$table="ecs_article_".$cat;

    $count = $db->getOne("SELECT COUNT(*) FROM " .$table);
    
    return $count;
}


/**
 * 获得指定分类下的子分类
 *
 * @param   integer     $cat_id
 *
 * @return  integer
 */

function get_article_category($cat_id)
{
    global $db, $ecs;
	
    $res = $db->getAll("SELECT cat_name,cat_id FROM ecs_article_cat where parent_id = ".$cat_id);
	
    return $res;
}

/**
 * 获得招聘的地区
 *
 * @param   integer     $cat_id
 *
 * @return  integer
 */

function get_article_area()
{
    global $db, $ecs;
	
    $res = $db->getAll("SELECT area FROM ecs_article where cat_id = 22 ");
	
    	foreach( $res as $rel){
		$area []= $rel['area'];
	}
	
	
	//唯一型
	$area = array_unique($area);
	
	//去空元素
	$area = array_filter($area);

	
    return $area;
}

/**
 * 获得招聘的职位
 *
 * @param   integer     $cat_id
 *
 * @return  integer
 */

function get_article_zhiwei()
{
    global $db, $ecs;
	
    $res = $db->getAll("SELECT zhiwei FROM ecs_article where cat_id = 22 ");
	
	
	foreach( $res as $rel){
		$zhiwei []= $rel['zhiwei'];
	}
	
	
	//唯一型
	$zhiwei = array_unique($zhiwei);
	
	//去空元素
	$zhiwei = array_filter($zhiwei);

	
    return $zhiwei;
}



//插入ip
function insertInto($ip)
{
		
	$ip_arr = $GLOBALS['db']->getOne("SELECT id FROM ecs_fangke WHERE ip = '".$ip."' ");
	
	$num = count($ip_arr);
	
	
	if( $num > 0){
	
		$sql = "insert into ecs_fangke (ip,addtime) values('".$ip."',".time().")";
		
		$res = $GLOBALS['db']->query($sql);
	}
	
}








?>