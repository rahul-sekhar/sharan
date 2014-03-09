<div class="event-list">
  <h2>Upcoming Events</h2>

  <div class="filters">
    <div class="city">
      <span class="button">Search by City</span>
      <ul>
        <?php foreach (get_terms('city') as $city) : ?>
          <li><a href="#" data-id="<?php echo $city->term_id; ?>"><?php echo $city->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="type">
      <span class="button">Type of Event</span>
      <ul>
        <?php foreach (get_terms('event_type') as $type) : ?>
          <li><a href="#" data-id="<?php echo $type->term_id; ?>"><?php echo $type->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <div class="events-container">
    <?php sharan_event_list(); ?>

    <div class="loader"></div>
  </div>
</div>