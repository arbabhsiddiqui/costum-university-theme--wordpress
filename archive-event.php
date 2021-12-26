<?php get_header();
pageBanner([
    'title' => 'All Events',
    'subTitle'=> 'View All Event In Once Glance'
]);
?>

<div class="container container--narrow page-section">
    <?php while(have_posts(  )){
        the_post(  );
        get_template_part( 'template-parts/content', 'event');
    }
    echo paginate_links();
    ?>
    <hr class="section-break">
    <p>

        View Old Events <a href=<?= site_url('/past-events') ?>>View All</a>
    </p>
</div>
<?php get_footer(); ?>