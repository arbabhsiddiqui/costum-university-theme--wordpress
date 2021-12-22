<?php get_header(); ?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg')?>)">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php //is_category() ==1 ? single_cat_title() :"" ; ?>
            <?php //is_author() == 1 ? "post by ".get_the_author() : ""; ?>
            <?php //the_archive_title(); ?>
            All Events
        </h1>
        <div class="page-banner__intro">
            <p> <?= the_archive_description(); ?></p>
        </div>
    </div>
</div>
<div class="container container--narrow page-section">
    <?php while(have_posts(  )){
        the_post(  );
        $Event_link =get_permalink();
        $Event_Date=new DateTime(get_field('event_date'));
    ?>

    <div class="event-summary">
        <a class="event-summary__date t-center" href="<?= $Event_link; ?>">
            <span class="event-summary__month"><?= $Event_Date->format("M"); ?></span>
            <span class="event-summary__day"><?= $Event_Date->format("d"); ?></span>
        </a>
        <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a
                    href="<?= $Event_link; ?>"><?= the_title(); ?></a></h5>
            <p><?= wp_trim_words( get_the_content(), 15) ?> <a href="<?= $Event_link; ?>" class="nu gray">Learn
                    more</a></p>
        </div>
    </div>
    <?php
    echo paginate_links();
    }
        ?>
    <hr class="section-break">
    <p>

        View Old Events <a href=<?= site_url('/past-events') ?>>View All</a>
    </p>
</div>
<?php get_footer(); ?>