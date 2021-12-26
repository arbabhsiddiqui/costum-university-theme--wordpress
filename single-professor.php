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
    <div class="generic-content">
        <div class="row group">
            <div class="one-third">

                <?php the_post_thumbnail('professorPortraits');  ?>
            </div>
            <div class="two-third">

                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php
        $relatedPrograms=get_field("related_programs");
        if($relatedPrograms){
            foreach ($relatedPrograms as $program) {
                ?>
    <hr class="section-break">
    <h2 class="headline headline-medium">Subject(s) Taught</h2>
    <ul class="link-list min-list">
        <li>
            <a href="<?= get_the_permalink($program) ?>">
                <?= get_the_title($program) ?>

            </a>
        </li>
    </ul>
    <?php
            }
        }
            ?>




</div>

<?php
}
get_footer(); ?>