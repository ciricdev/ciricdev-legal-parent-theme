<section class="mp-polygon-map">
    <?php
    $raw_location = get_field('location');
    $styles = get_field('polygon_map_styles', 'option');
    PolygonMap_Module::render(
      array(
        'map_id' => get_field('map_id_override') ?: get_field('polygon_map_map_id', 'option'),
        'place_id' => $raw_location['place_id'],
        'feature_layer_category' => get_field('feature_layer_category'),
        'center' => array(
          $raw_location['lat'],$raw_location['lng']
        ),
        'styles' => array(
          'stroke_color' => $styles['stroke_color'],
          'fill_color' => $styles['fill_color'],
        )
      )
    );
    ?>
</section>
