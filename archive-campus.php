<?php get_header();

pageBanner([
    'title' => 'All Campuses',
    'subTitle'=> 'View All Campuses'
]);
?>

<div class="container container--narrow page-section">
    <ul class="link-list min-list">
        <?php while(have_posts(  )){
        the_post(  );
        $link=get_permalink();
        $title=get_the_title();
    ?>

        <li><a href="<?= $link; ?>"><?= $title; ?></a></li>
        <?php
    echo paginate_links();
    }
        ?>
    </ul>

</div>
<?php get_footer(); ?>