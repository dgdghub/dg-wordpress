<?php
    if(is_single()) {
        // 获取文章内容
        $post_content = get_the_content();
        $link_summary = '<h5>相关引用</h5>';
        // 使用正则表达式匹配文章中的超链接
        if(!empty($post_content)) {
            preg_match_all('/<a\s+.*?href=[\'"](.*?)[\'"].*?>(.*?)<\/a>/', $post_content, $matches, PREG_SET_ORDER);

            // 如果匹配到超链接
            if (!empty($matches)) {
                $link_summary .= '<ul>';
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
                $link_summary .= '</ul>';
                echo $link_summary;
            }
        }
    }
?>