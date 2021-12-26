<?php get_header();
pageBanner([
    'title' => get_the_archive_title(),
    'subtitle'=> get_the_author_description()
]);
?>

<div class="container container--narrow page-section">
    <?php while(have_posts(  )){
        the_post(  );
        $link=get_permalink();
        $title=get_the_title();
        $content= get_the_excerpt(  ) != null ? get_the_excerpt(  ) : wp_trim_words( get_the_content(), 18);
        $author=get_the_author_posts_link();
        $postTime=get_the_time('n.j.y');
        $category=get_the_category_list( ',');
    ?>

    <div class="post-item">
        <h2 class="headline headline--medium headline--post-title"><a href="<?= $link; ?>"><?= $title; ?></a></h2>
        <div class="metabox">
            <p>posted by <?=$author; ?> on <?= $postTime; ?> in<?=$category;?></p>
        </div>
        <div class="generic-content"><?= $content; ?><p><a class="btn btn--blue" href="<?= $link; ?>">continue
                    Reading</a></p>
        </div>
    </div>
    <?php
    echo paginate_links();
    }
        ?>
</div>
<?php get_footer(); ?>