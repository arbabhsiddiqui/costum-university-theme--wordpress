<?php get_header(); ?>
<?php while(have_posts(  )){
the_post(  );
// Define Global Variables
$PARENT_PAGE =wp_get_post_parent_id(get_the_ID());
$CURRENT_PAGE = $PARENT_PAGE !=null ? $PARENT_PAGE : get_the_ID();
?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg')?>)">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <p>Learn how the school of your dreams got started.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?= get_post_type_archive_link( 'event' ) ?>"><i class="fa fa-home"
                    aria-hidden="true"></i> Back to Events</a> <span class="metabox__main">
                <?= the_title(); ?>
            </span>
        </p>
    </div>
    <?php if($PARENT_PAGE){
  ?>
    <?php
}  ?>
    <?php
    $IsParent = get_pages(['child_of' => get_the_ID()]);

    if($PARENT_PAGE || $IsParent ){ ?>
    <div class="page-links">
        <h2 class="page-links__title"><a
                href="<?= get_permalink($PARENT_PAGE) ?>"><?= get_the_title($PARENT_PAGE); ?></a></h2>
        <ul class="min-list">
            <?php
            wp_list_pages([
              'title_li'=>null,
              'child_of'=>$CURRENT_PAGE
              ]); ?>

        </ul>
    </div>
    <?php } ?>
    <div class="generic-content">
        <?php the_content(); ?>
    </div>
</div>

<?php
}
get_footer(); ?>