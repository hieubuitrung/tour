

<div class="col l-12">
    <div class="pagination-center" style="padding-top: 78px; text-align: center;">
        <ul class="pagination" style="display: flex; justify-content: center;">
            <?php 
                // $current_page: page hiện tại
                $pre_page = $current_page - 1;
                if ($current_page > 1) {
            ?>
                <li style="border: 1px solid #ccc; margin: 0 4px; height: fit-content; border-radius: 2px;" class="pre-tour">
                    <a href="?LoaiHinh=<?=$type?>&per_page=<?=$item_per_page?>&page=<?=$pre_page?>" style="padding: 0 15px; line-height: 35px; font-size: 1.4rem; color: #444">
                        <i class="fas fa-arrow-left"></i>
                        <span>Trước</span>
                    </a>
                </li>
            <?php
                }
            ?>
            
            <?php
                // $totalPage: tổng số page
                //$item_per_page: số tour trong 1 page
                // type: tour trong nước hay ngoài nước
                for ($num = 1; $num <= $totalPage; $num ++) {
                    if ($num != $current_page) {
                        // nếu không phải trang hiện tại
                        if ($num > $current_page - 3 && $num < $current_page + 3) {
                            echo "<li style='border: 1px solid #ccc; margin: 0 4px; height: fit-content; border-radius: 2px;' class='page-index'>
                            <a href='?LoaiHinh={$type}&per_page={$item_per_page}&page={$num}' style='padding: 0 12px; line-height: 35px; font-size: 1.4rem; color: #444'>{$num}</a>
                            </li>";
                        }
                    } else {
                        // trang hiện tại sẽ được css đổi màu
                        echo "<li style='border: 1px solid #ff891e; margin: 0 4px; height: fit-content; border-radius: 2px;' class='page-index active'>
                        <a href='#' style='padding: 0 12px; line-height: 35px; font-size: 1.4rem; color: #ff891e;'>{$num}</a>
                        </li>";
                    }
                }
            ?>
            <!-- <li style="border: 1px solid #ccc; margin: 0 4px; padding: 4px"><a href="?per_page=4&page=2">2</a></li>
            <li style="border: 1px solid #ccc; margin: 0 4px; padding: 4px"><a href="?per_page=4&page=3">3</a></li>
            <li style="border: 1px solid #ccc; margin: 0 4px; padding: 4px"><a href="?per_page=4&page=4">4</a></li> -->
            <?php
                // $current_page: page hiện tại
                $next_page = $current_page + 1;
                if ($current_page < $totalPage) {
            ?>
                <li style="border: 1px solid #ccc; margin: 0 4px; height: fit-content; border-radius: 2px;" class="next-tour">
                    <a href="?LoaiHinh=<?=$type?>&per_page=<?=$item_per_page?>&page=<?=$next_page?>" style="padding: 0 15px; line-height: 35px; font-size: 1.4rem; color: #444">
                        <span>Sau</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </li>
            <?php
                }
            ?>
        </ul>
    </div>
</div>
