<?php
function resource_filters()
{
    ob_start();
    $categories = get_categories();
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
        <div class="filter-item">
            <div class="filter-header">
                <span>Resource Type</span>
                <span>Clear</span>
            </div>
            <div class="filter-body">
                <div class="category-fitler">
                    <?php foreach ($categories as $categ) { ?>
                        <a href="<?= get_term_link($categ->term_id) ?>"><?= $categ->name ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}

add_shortcode('resource_filters', 'resource_filters');
