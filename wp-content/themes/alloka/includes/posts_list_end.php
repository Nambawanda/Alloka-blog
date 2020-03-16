<?php
$news_column_end = (($pages_count != 0)? ((!$exclude)? "<div class=\"news__item news__item_preview\"></div></div>\n\r" : "</div>\r\n") : "</div>\r\n");
echo $news_column1.$news_column_end.$news_column2.$news_column_end.$news_column3.$news_column_end;