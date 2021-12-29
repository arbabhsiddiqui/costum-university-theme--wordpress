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
            <a class="metabox__blog-home-link" href="<?= get_post_type_archive_link( 'campus' ) ?>"><i
                    class="fa fa-home" aria-hidden="true"></i> Back to Campuses</a> <span class="metabox__main">
                <?= the_title(); ?>
            </span>
        </p>
    </div>

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
    <!-- fake  map -->
    <div class="gmap_canvas"><iframe id="gmap_canvas" class="acf-map"
            src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
            href="https://123movies-org.net"></a><br>
    </div>
    <?php $today=date('Ymd');
            $RelatePrograms=new WP_Query([ 'posts_per_page'=>-1,
                'post_type'=>'program',
                'orderby'=>'title',
                'order'=>'ASC',
                'meta_query'=> [ ['key'=>'related_campus',
                'compare'=>'LIKE',
                'value'=>'"'.get_the_ID().'"',
                ]]]);

            if($RelatePrograms->have_posts()) {

                ?><h2 class="headline headline-medium" style="margin-top:25px">Program Available At this Campus </h2>
    <ul class="min-list link-list" style="margin-top:25px"><?php while($RelatePrograms->have_posts()) {
                    $RelatePrograms->the_post();
                    $program_link=get_permalink();
                    ?><li class=""><a href="<?= $program_link; ?>"><?= the_title(); ?></a></li><?php
                }
            }

            wp_reset_postdata();
            ?></ul>
</div>
<?php
            }

            get_footer();
            ?>