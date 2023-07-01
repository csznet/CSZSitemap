<?php
/**
 * Sitemap站点地图
 * 
 * @package CSZSitemap
 * @author Milkcu && CSZ
 * @version 0.5
 * @link http://www.csz.net
 *
 * 历史版本
 * version 0.5 at 2014-07-25
 * Sitemap for Baidu
 * 生成文章和页面的Sitemap
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
