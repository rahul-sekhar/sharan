<div class="event-list">
  <h2>Upcoming Events</h2>

  <div class="filters">
    <div class="buttons">
      <a href="#" class="city">Search by City</a>
      <a href="#" class="type">Type of Event</a>
    </div>

    <div class="city-list">
      <ul>
        <?php foreach (get_terms('city') as $city) : ?>
          <li><a href="#" data-id="<?php echo $city->term_id; ?>"><?php echo $city->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="type-list">
      <ul>
        <?php foreach (get_terms('event_type') as $type) : ?>
          <li><a href="#" data-id="<?php echo $type->term_id; ?>"><?php echo $type->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

  <?php sharan_event_list(); ?>
</div>