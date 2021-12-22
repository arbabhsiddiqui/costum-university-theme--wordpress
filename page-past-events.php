<?php get_header(); ?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?= get_theme_file_uri('images/ocean.jpg')?>)">
    </div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">
            <?php //is_category() ==1 ? single_cat_title() :"" ; ?>
            <?php //is_author() == 1 ? "post by ".get_the_author() : ""; ?>
            <?php //the_archive_title(); ?>
            All Past Events
        </h1>
        <div class="page-banner__intro">
            <p> <?= the_archive_description(); ?></p>
        </div>
    </div>
</div>
<div class="container container--narrow page-section">
    <?php
     $today=date('Ymd');
     $pastEvent= new WP_Query([
        // 'posts_per_page'=>1,
        'paged'=>get_query_var( 'paged', 1 ),
         'post_type'=>'event',
         'meta_key'=>'event_date',
         'orderby'=>'meta_value_num',
         'order'=>'ASC',
         'meta_query' => [['key'=>'event_date',
         'compare'=>'<=',
         'value'=>$today,
         'type'=>'numeric'
         ]]
     ]);
    
    
    while($pastEvent->have_posts(  )){
        $pastEvent->the_post(  );
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
    echo paginate_links(['total'=>$pastEvent->max_num_pages]);
    }
        ?>
</div>
<?php get_footer(); ?>