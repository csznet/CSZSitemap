<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

$this_plugin_name = 'CSZSitemap';
if (basename(dirname(__FILE__)) != $this_plugin_name) {
    $now_dir  = dirname(__FILE__);
    $dir_name = basename($now_dir);
    $tar_dir  = __TYPECHO_ROOT_DIR__ . '/' . __TYPECHO_PLUGIN_DIR__ . '/' . $this_plugin_name;
    if (file_exists($tar_dir)) {
        echo '请把本插件目录名修改为：' . $this_plugin_name . '，现在的目录名为：' . $dir_name;
        exit();
    }
    if (rename($now_dir, $tar_dir)) {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = str_replace($dir_name, $this_plugin_name, $url);
        header('Location: ' . $url);
    } else {
        echo '请把本插件目录名修改为：' . $this_plugin_name . '，现在的目录名为：' . $dir_name;
    }
    exit();
}
/**
 * Sitemap站点地图
 * 
 * @package CSZSitemap
 * @author Milkcu & CSZ
 * @version 0.1
 * @link http://www.csz.net
 *
 */
class CSZSitemap_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
		Helper::addRoute('sitemap_xml', '/sitemap.xml', 'CSZSitemap_XmlGenerator', 'action');
		Helper::addRoute('sitemap_html', '/sitemap.html', 'CSZSitemap_HtmlGenerator', 'action');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
	{
		Helper::removeRoute('sitemap_xml');
		Helper::removeRoute('sitemap_html');
	}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

}
