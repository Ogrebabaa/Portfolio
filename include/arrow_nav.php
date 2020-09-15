        <!-- Navigation Arrow(s)  ============================================================= -->
<?php
    

        $arrow_right = "
        <div id='a_right' class='arrow '>
            <img id='a_right_img' class='arrow_img' src='assets/ICON/arrow_nav_right.svg' alt='right_arrow'>
            <a id='a_right_title' class='next_page_title' href='$nextLink'>
                $nextPage  
            </a>
        </div>";
        
        $arrow_left = "
        <div id='a_left' class='arrow '>
            <img id='a_left_img' class='arrow_img' src='assets/ICON/arrow_nav_left.svg' alt='left_arrow'>
            <a id='a_left_title' class='next_page_title' href='$prevLink'>
                $prevPage
            </a>
        </div>
        ";

        switch($idPage) {
            case 1;
            case 3;
            case 4;
            case 9;
                echo $arrow_left;
                echo $arrow_right;
            break;
            case 2;
                echo $arrow_right;
            break;
            case 5;
                echo $arrow_left;
            break;
        
            }
        
?>
        <!-- Navigation Arrow(s)  ============================================================= -->