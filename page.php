<?php get_header(); ?>
<?php while(have_posts(  )){
the_post(  );
// Define Global Variables
$PARENT_PAGE =wp_get_post_parent_id(get_the_ID());
$CURRENT_PAGE = $PARENT_PAGE !=null ? $PARENT_PAGE : get_the_ID();

pageBanner();?>

<div class="container container--narrow page-section">
    <?php if($PARENT_PAGE){
  ?> <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?= get_permalink($PARENT_PAGE) ?>"><i class="fa fa-home"
                    aria-hidden="true"></i> Back to <?= get_the_title($PARENT_PAGE); ?></a> <span
                class="metabox__main"><?= the_title(); ?></span>
        </p>
    </div>
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