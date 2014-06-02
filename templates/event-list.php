<div class="event-list">
  <h2>Upcoming Events</h2>

  <div class="filters">
    <div class="city">
      <span class="button">Search by City</span>
      <ul>
        <?php foreach (get_terms('city', array( 'hide_empty' => false )) as $city) : ?>
          <li><a href="#" data-id="<?php echo $city->term_id; ?>"><?php echo $city->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="type">
      <span class="button">Type of Event</span>
      <ul>
        <?php foreach (get_terms('event_type', array( 'hide_empty' => false )) as $type) : ?>
          <li><a href="#" data-id="<?php echo $type->term_id; ?>"><?php echo $type->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="events-container">
    <?php sharan_event_list(); ?>

    <div class="loader"></div>
  </div>

  <?php if ( is_front_page() ) : ?>
    <a class="view-all" href="/events">View all events</a>
  <?php endif; ?>
</div>