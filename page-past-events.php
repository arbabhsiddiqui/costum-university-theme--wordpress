<?php get_header();

pageBanner();
?>
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