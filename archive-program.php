<?php get_header(); ?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg')?>)">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php //is_category() ==1 ? single_cat_title() :"" ; ?>
            <?php //is_author() == 1 ? "post by ".get_the_author() : ""; ?>
            <?php //the_archive_title(); ?>
            All Programs
        </h1>
        <div class="page-banner__intro">
            <p> <?= the_archive_description(); ?></p>
        </div>
    </div>
</div>
<div class="container container--narrow page-section">
    <ul class="link-list min-list">
        <?php while(have_posts(  )){
        the_post(  );
        $Event_link =get_permalink();
        $Event_Date=new DateTime(get_field('event_date'));
    ?>

        <li><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></li>
        <?php
    echo paginate_links();
    }
        ?>
    </ul>

</div>
<?php get_footer(); ?>