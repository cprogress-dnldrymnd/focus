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
                <div class="category-filter">
                    <?php foreach ($categories as $categ) { ?>
                        <?php if ($categ->name != 'Uncategorized') { ?>
                            <a href="<?= get_term_link($categ->term_id) ?>"><?= $categ->name ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('resource_filters', 'resource_filters');


function project_overview_item($value, $label = '')
{
    ob_start();
    if ($value) {
    ?>
        <tr>
            <td class="label">
                <strong><?= $label ?></strong>
            </td>
            <td>
                <?= $value ?>
            </td>
        </tr>
    <?php
        return ob_get_clean();
    }
}

function project_overview()
{
    ob_start();
    $client = carbon_get_the_post_meta('client');
    $project = carbon_get_the_post_meta('project');
    $location = carbon_get_the_post_meta('location');
    $value = carbon_get_the_post_meta('value');
    $services = carbon_get_the_post_meta('services');
    $key_facts = carbon_get_the_post_meta('key_facts');
    ?>
    <div class="project-overview">
        <table>
            <?= project_overview_item($client, 'Client') ?>;
            <?= project_overview_item($project, 'Project') ?>;
            <?= project_overview_item($location, 'Location') ?>;
            <?= project_overview_item($value, 'Value') ?>;
            <?= project_overview_item($services, 'Services') ?>;
        </table>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('project_overview', 'project_overview');
