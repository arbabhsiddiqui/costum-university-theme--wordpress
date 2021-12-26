<?php
 $Event_link =get_permalink();
 $Event_Date=new DateTime(get_field('event_date'));
?>
<div class="event-summary">
    <a class="event-summary__date t-center" href="<?= $Event_link; ?>">
        <span class="event-summary__month"><?=
        $Event_Date->format("M"); ?></span>
        <span class="event-summary__day"><?= $Event_Date->format("d"); ?></span>
    </a>
    <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?= $Event_link; ?>"><?= the_title(); ?></a>
        </h5>
        <p><?php if(has_excerpt()){
                         echo get_the_excerpt();
                    }else{
                       echo wp_trim_words( get_the_content(), 18);
                    } 
                     ?> <a href="<?= $Event_link; ?>" class="nu gray">Learn
                more</a></p>
    </div>
</div>