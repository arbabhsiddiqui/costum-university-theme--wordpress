<?php get_header();
pageBanner([
    'title' => 'All Events',
    'subTitle'=> 'View All Event In Once Glance'
]);
?>

<div class="container container--narrow page-section">
    <?php while(have_posts(  )){
        the_post(  );
        $link=get_permalink();
        $title= get_the_title();
        $content =wp_trim_words( get_the_content(), 15);
        $Event_Date=new DateTime(get_field('event_date'));

    ?>

    <div class="event-summary">
        <a class="event-summary__date t-center" href="<?= $link; ?>">
            <span class="event-summary__month"><?= $Event_Date->format("M"); ?></span>
            <span class="event-summary__day"><?= $Event_Date->format("d"); ?></span>
        </a>
        <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?= $link; ?>"><?=$title;  ?></a></h5>
            <p><?= $content;  ?> <a href="<?= $link; ?>" class="nu gray">Learn more</a></p>
        </div>
    </div>
    <?php
    echo paginate_links();
    }?>
    <hr class="section-break">
    <p>

        View Old Events <a href=<?= site_url('/past-events') ?>>View All</a>
    </p>
</div>
<?php get_footer(); ?>