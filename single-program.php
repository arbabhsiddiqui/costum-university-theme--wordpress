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
            <a class="metabox__blog-home-link" href="<?= get_post_type_archive_link( 'program' ) ?>"><i
                    class="fa fa-home" aria-hidden="true"></i> Back to Programs</a> <span class="metabox__main">
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
    <div class="generic-content"><?php  the_content(); ?></div>

    <?php
            $today=date('Ymd');
            $RelateProfessors= new WP_Query([
                'posts_per_page'=>-1,
                'post_type'=>'professor',
                'orderby'=>'title',
                'order'=>'ASC',
                'meta_query' => [
            ['key'=>'related_programs',
                'compare'=>'LIKE',
                'value'=>'"'.get_the_ID().'"',
                ]
            ]
            ]);
            if($RelateProfessors->have_posts()){
                
            ?>
    <h2 class="headline headline-medium" style="margin-top:25px"><?= get_the_title(); ?> Professor(s)</h2>
    <ul class="professor-cards" style="margin-top:25px">
        <?php
            while($RelateProfessors->have_posts()){
                $RelateProfessors->the_post();
                $Professor_link =get_permalink();
    ?>
        <li class="professor-card__list-item">
            <a href="" class="professor-card">
                <img src="<?= the_post_thumbnail_url('professorLandscape'); ?>" alt="" class="professor-card__image">
                <span class="professor-card__name"><?= the_title(); ?></span>
            </a>
        </li>
        <?php }?>
    </ul>
    <?php
            } wp_reset_postdata(  );?>

    <?php
            $today=date('Ymd');
            $RelateEvents= new WP_Query([
                'posts_per_page'=>-1,
                'post_type'=>'event',
                'meta_key'=>'event_date',
                'orderby'=>'meta_value_num',
                'order'=>'ASC',
                'meta_query' => [['key'=>'event_date',
                'compare'=>'>=',
                'value'=>$today,
                'type'=>'numeric'
            ],
            ['key'=>'related_programs',
                'compare'=>'LIKE',
                'value'=>'"'.get_the_ID().'"',
                ]
            ]
            ]);
            if($RelateEvents->have_posts(  )){
           
            ?>

    <hr class="section-break">
    <h2 class="headline headline-medium">Upcoming <?= get_the_title(); ?> Events</h2>

    <?php
            while($RelateEvents->have_posts()){
                $RelateEvents->the_post();
                $Event_link =get_permalink();
                $Event_Date=new DateTime(get_field('event_date'));

               
    ?>
    <div class="event-summary" style="margin-top:25px">
        <a class="event-summary__date t-center" href="<?= $Event_link; ?>">
            <span class="event-summary__month"><?= $Event_Date->format("M"); ?></span>
            <span class="event-summary__day"><?= $Event_Date->format("d"); ?></span>
        </a>
        <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a
                    href="<?= $Event_link; ?>"><?= the_title(); ?></a></h5>
            <p><?php if(has_excerpt()){
                         echo get_the_excerpt();
                    }else{
                       echo wp_trim_words( get_the_content(), 18);
                    } 
                     ?> <a href="<?= $Event_link; ?>" class="nu gray">Learn
                    more</a></p>
        </div>
    </div>
    <?php }?>

    <?php
            }?>
</div>
<?php
}
get_footer(); ?>