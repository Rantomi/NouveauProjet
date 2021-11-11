<?php if(!dynamic_sidebar('homepage')):; ?>
  <aside id="secondary" class="widget-area">
        <div class="p-4 mb-3 bg-light rounded">
          <h3 class="p-2" id="widget-title">Rechercher</h3> <hr>
          <div class="p-2">
            <p class="mb-0"><?php get_search_form(); ?></p>
          </div>
        </div>

        <div class="p-4 mb-3 bg-light rounded">
          <h3 class="p-2" id="widget-title">Calendrier</h3> <hr>
          <div class="p-2">
            <p><?php get_calendar(); ?></p>
          </div>
        </div>

        <div class="p-4 mb-3 bg-light rounded">
          <h3 class="p-2">Archives</h3> <hr>
          <div class="p-2">
            <p><?php wp_get_archives(['type'=>'monthly']); ?></p>
          </div>
        </div>
  </aside>
<?php endif; ?>	




