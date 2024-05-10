<?php
    $tags = get_the_tags(); // 获取当前文章的标签信息
    if ($tags) {
        print '<h5>标签</h5>';
        foreach ($tags as $tag) {
            if ($tag->name == '简单') {
                echo '<image src="http://1.94.108.130:9999/wp-content/uploads/2024/05/001@1x-1.png"></image>';
            } else if($tag->name == '中等') {
                echo '<image src="http://1.94.108.130:9999/wp-content/uploads/2024/05/002@1x.png"></image>';
            }  else if($tag->name == '困难') {
                echo '<image src="http://1.94.108.130:9999/wp-content/uploads/2024/05/001@1x.png"></image>';
            }
        }
    }
?>