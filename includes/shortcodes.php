<?php
function resource_filters() {
    ob_start();
    ?>
    <div class="filters-holder">
        <div class="filter-item">
            <div class="filter-header">
                <span>Filter by</span>
                <span>Reset All</span>
            </div>
            <div class="filter-body">
                <input type="text" name="s" id="search" placeholder="Search…">
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('resource_filters', 'resource_filters');