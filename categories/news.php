<?php

function getLatestNews($connection) {
    $query = "SELECT title, text, author, public_time, link_forum FROM news ORDER BY public_time DESC LIMIT 10";
    $result = mysqli_query($connection, $query) or die("Error: ".mysqli_error($connection));
    while($row = mysqli_fetch_array($result)) {
        echo "<div class='latest-news'>";
        echo "<p class='title'>&nbsp;&nbsp;&nbsp;".$row{"title"}."</p>";
        $news_text = $row{"text"};
        if(strlen($news_text) > 100) {
            $print_news = substr($news_text, 0, 100);
            echo "<p class='news-body'>&nbsp;&nbsp;&nbsp;".$print_news.'.'.'.'.'.'."</p>";
        }
        echo "<a href=".$row{'link_forum'}.">Read more</a>";
        echo "<p class='author-time'>".$row{"author"}." / ".$row{"public_time"}."</p>";
        echo "</div>";
    }
}

?>
<div class="news-main">
    <div class="latest-news-inner-block">
        <?php getLatestNews($conn); ?>
    </div>
</div>
