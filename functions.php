<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一一张图片地址, 在网站标签标题前加上一个LOGO'));
    $form->addInput($logoUrl);
    
    // 自定义背景图
    $background = new Typecho_Widget_Helper_Form_Element_Text('background', NULL, NULL, _t('站点背景'), _t('在这里填入一张图片地址，可以是随机图片API，不填则默认纯白背景'));
    $form -> addInput($background);
    
    // 自定义背景图
    $background_other = new Typecho_Widget_Helper_Form_Element_Text('background_other', NULL, NULL, _t('背景透明度'), _t('在这里填入0~1之间的精确到个位小数，数字越小透明度越高，建议0.1~0.3,不填默认0.1'));
    $form -> addInput($background_other);

     // 自定义作者信息
    $author_text = new Typecho_Widget_Helper_Form_Element_Textarea('author_text', NULL, NULL, _t('作者（或版权）信息'), _t('显示在文章区与评论区之间，不填则不显示，请控制字数。'));
    $form -> addInput($author_text);
    
    // 自定义样式表
    $custom_css = new Typecho_Widget_Helper_Form_Element_Textarea('custom_css', NULL, NULL, _t('自定义样式表'), _t('在这里填入你的自定义样式表，不填则不输出。需要精确到类名'));
    $form -> addInput($custom_css);
    
    $footers = new Typecho_Widget_Helper_Form_Element_Textarea('footers', NULL, NULL, _t('页面底部信息'), _
        ('在这里填入需要添加到页面底部的内容，不填则不输出，请使用html、css、js等语言，有需要自行添加自定义样式'));
    $form -> addInput($footers);

   $custom_talk = new Typecho_Widget_Helper_Form_Element_Textarea('custom_talk', NULL, NULL, _t('关于页面的个性签名'), _
        ('在这里填入关于页面的个性签名，不填则不输出，请控制字数。'));
    $form -> addInput($custom_talk);
    
    $custom_informaintion = new Typecho_Widget_Helper_Form_Element_Textarea('custom_informaintion', NULL, NULL, _t('关于页面的介绍'), _
        ('在这里填入关于页面的介绍，不填则不输出，请控制字数。'));
    $form -> addInput($custom_informaintion);
    
   
    

}





// 获取文章首张图片
function getPostImg($archive) {
    $img = array();
    //  匹配 img 的 src 的正则表达式
    preg_match_all("/<img.*?src=\"(.*?)\".*?\/?>/i", $archive->content, $img);
    //  判断是否匹配到图片
    if (count($img) > 0 && count($img[0]) > 0) {
        //  返回图片
        return $img[1][0];
    } else {
        //  如果没有匹配到就返回 none
        return 'none';
    }
}



// 作者信息https://blog.ghostry.cn/mood/979.html
/* 文章目录开始 */
function createCatalog($obj) {
    //为文章标题添加锚点
    global $catalog;
    global $catalog_count;
    $catalog = array();
    $catalog_count = 0;
    $obj = preg_replace_callback('/<h([1-3])(.*?)>(.*?)<\/h\1>/i', function ($obj) {
        global $catalog;
        global $catalog_count;
        $catalog_count++;
        $catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
        return '<h' . $obj[1] . $obj[2] . '><a name="cl-' . $catalog_count . '"></a>' . $obj[3] . '</h' . $obj[1] . '>';
    }, $obj);
    return $obj;
}


function getCatalog() {
    //输出文章目录容器
    global $catalog;
    $index = '';
    if ($catalog) {
        $index = '<ul>' . "\n";
        $prev_depth = '';
        $to_depth = 0;
        foreach ($catalog as $catalog_item) {
            $catalog_depth = $catalog_item['depth'];
            if ($prev_depth) {
                if ($catalog_depth == $prev_depth) {
                    $index .= '</li>' . "\n";
                } elseif ($catalog_depth > $prev_depth) {
                    $to_depth++;
                    $index .= '<ul>' . "\n";
                } else {
                    $to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
                    if ($to_depth2) {
                        for ($i = 0; $i < $to_depth2; $i++) {
                            $index .= '</li>' . "\n" . '</ul>' . "\n";
                            $to_depth--;
                        }
                    }
                    $index .= '</li>';
                }
            }
            $index .= '<li><a href="#cl-' . $catalog_item['count'] . '">' . $catalog_item['text'] . '</a>';
            $prev_depth = $catalog_item['depth'];
        }
        for ($i = 0; $i <= $to_depth; $i++) {
            $index .= '</li>' . "\n" . '</ul>' . "\n";
        }
        $index = '<div title="目录树" class="gottree glyphicon glyphicon-list"></div>' .
            '<div id="toc-container">' . "\n" .
            $index .
            '</div>' . "\n";
    }
    echo $index;
}


function themeInit($archive) {
    if ($archive->is('single')) {
        $archive->content = createCatalog($archive->content);
    }
}


/* 文章目录结束 */
