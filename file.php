<?php
/**
 * 归档
 *
 * @package custom
 * 感谢主要源码提供：https://www.mrhe.net/z-turn/a-typecho-archive-page.html
 */
?>
<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;$this->need('header.php');?>
<title><?php $this->title() ?></title>
<!DOCTYPE html>
<main>
	<div class="post-main">
		<a name=“top”></a>
		<p class="post-tittle">文章归档</p>

		 
		<article class="post-content">
	    
		    <div class="page-class">   
   
                <div class="page-class-content">   
                    
                    <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
                    $year=0; $mon=0; $i=0; $j=0;
                    $output = '<div class="post-content cf">';
                    while($archives->next()):
                    $year_tmp = date('Y',$archives->created);
                    $mon_tmp = date('m',$archives->created);
                    $y=$year; $m=$mon;
                    if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
                    if ($year != $year_tmp && $year > 0) $output .= '</ul>';
                    if ($year != $year_tmp) {
                    $year = $year_tmp;
                    // $output .= '<h5>'. $year .' 年</h5><ul>'; 
                        
                    }
        
                    if ($mon != $mon_tmp) {
                    $mon = $mon_tmp;
                    $output .= '<li style="list-style:none;" ><h5 style="display:block; margin: .5em auto;" >'. $year .' 年'. $mon .' 月</h5><ul>';
                    }
                    $output .= '<li>'.date('d日: ',$archives->created).'<a style=" color: #6e8aad;"  href="'.$archives->permalink .'">'. $archives->title .'</a> ('. $archives->commentsNum.')('. $archives->category.')</li>';
                    endwhile;
                    $output .= '</ul></li></ul></div>';
                    echo $output;
                    ?>  

                
                </div>   
           
            </div> 
        
        </article>
        


</main>

    <?php $this->need('footer.php'); ?>
    
    