<?php
/*
Plugin Name: 超链接汇总插件
Plugin URI: ''
Description: 分析文章内容中的超链接，并将它们汇总展示在文章末尾
Version: 1.0
Author: nms
Author URI: ''
*/

// 在文章内容末尾添加超链接汇总
function append_links_to_content($content) {
    // 获取文章内容
    $post_content = get_the_content();

    // 使用正则表达式匹配文章中的超链接
    preg_match_all('/<a\s+.*?href=[\'"](.*?)[\'"].*?>(.*?)<\/a>/', $post_content, $matches, PREG_SET_ORDER);

    // 如果匹配到超链接
    if (!empty($matches)) {
        // 去重
        $unique_links = array();
        foreach ($matches as $match) {
            $link_url = $match[1];
            $link_text = $match[2];

            // 使用链接文本作为唯一标识符，避免重复链接
            if (!in_array($link_text, $unique_links)) {
                $unique_links[] = $link_text;

                $link_summary .= '<li><a href="' . $link_url . '">' . $link_text . '</a></li>';
            }
        }

        // 创建超链接汇总
        if (!empty($unique_links)) {
            $link_summary = '<h2>引用链接</h2>';
            $link_summary .= '<ul>';

            foreach ($unique_links as $link_text) {
                $link_summary .= '<li><a href="' . $link_url . '">' . $link_text . '</a></li>';
            }

            $link_summary .= '</ul>';

            // 输出 h2 引用链接 前加一个空行
            $link_summary = '<br>' . $link_summary;

            // 将超链接汇总添加到文章内容末尾
            $content .= $link_summary;
        }
    }

    return $content;
}

// 将超链接汇总添加到文章内容末尾
add_filter('the_content', 'append_links_to_content');
