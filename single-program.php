<?php get_header(); ?>
<?php while(have_posts(  )){
the_post(  );
// Define Global Variables
$PARENT_PAGE =wp_get_post_parent_id(get_the_ID());
$CURRENT_PAGE = $PARENT_PAGE !=null ? $PARENT_PAGE : get_the_ID();
?>
<?php pageBanner(); ?>
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
            <a href="<?= $Professor_link; ?>" class="professor-card">
                <img src="<?= the_post_thumbnail_url('professorLandscape'); ?>" alt="" class="professor-card__image">
                <span class="professor-card__name"><?= the_title(); ?></span>
            </a>
        </li>
        <?php } } wp_reset_postdata(  );?>
    </ul>
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
                get_template_part( 'template-parts/content', 'event');
            }
        }
    ?>
</div>
<?php
}
get_footer(); ?>