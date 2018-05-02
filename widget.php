<?php
defined( 'ABSPATH' ) || exit;

/*
* Register Widget
*/
function hms_register_schema_widget() {
  register_widget( 'hms_contact_schema' );
}
add_action( 'widgets_init', 'hms_register_schema_widget' );


/*
* Contact Schema Widget
*/
class hms_contact_schema extends WP_Widget {

  function __construct() {
  parent::__construct(

    // Base ID of your widget
    'hms_contact_schema',

    // Widget name will appear in UI
    __('HMS Schema Address', 'hms_contact_schema_domain'),

    // Widget description
    array( 'description' => __( 'This widget will display contact schema information from your ACF Fields.' ), )
    );
  }

  // Creating widget front-end
  public function widget( $args, $instance ) {

      $title = apply_filters( 'widget_title', $instance['title'] );

      $business_name = apply_filters( 'widget_field', $instance['business_name'] );

      $street = apply_filters( 'widget_field', $instance['bus_street'] );
      $city = apply_filters( 'widget_field', $instance['bus_city'] );
      $state = apply_filters( 'widget_field', $instance['bus_state'] );
      $zip = apply_filters( 'widget_field', $instance['bus_zip'] );
      $country = apply_filters( 'widget_field', $instance['bus_country'] );

      $phone = apply_filters( 'widget_field', $instance['bus_phone'] );
      $email = apply_filters( 'widget_field', $instance['bus_email'] );

      $hours_title = apply_filters( 'widget_field', $instance['bus_hours_title'] );
      $hours_schema = apply_filters( 'widget_field', $instance['bus_hours_schema'] );
      $hours = apply_filters( 'widget_field', $instance['bus_hours_pretty'] );

      $get_directions = apply_filters( 'widget_field', $instance['bus_directions'] );


      echo $args['before_widget'];

      // Widget Title
      if ( ! empty( $title ) ) {
        echo $args['before_title'] . $title . $args['after_title'];
      }

      // Business Name
      if ( ! empty( $business_name ) ) {
        echo '<p class="business-title"><span itemprop="name">' . $business_name . '</span></p>';
      }
      ?>

      <div class="info-section" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <div id="hms-contact-info">
          <?php

          // Output Street Address
          if( ! empty( $street ) ) {
            echo '<p><span itemprop="streetAddress"><i class="fa fa-building-o" aria-hidden="true"></i>' . $street . '</span>';
          }

          // Output City
          if( ! empty( $city ) ) {
            echo ' <span itemprop="addressLocality">' . $city . '</span></p>';
          }

          // Output City, State, Zip, Country
          if( ! empty( $state && $state && $zip ) ) {
            echo '<p><span itemprop="addressRegion">' . $state . '</span>, <span itemprop="postalCode">' . $zip . '</span>, <span itemprop="addressCountry">' . $country . '</span></p>';
          }

          // Output Phone
          if( ! empty( $phone && $title ) ) {
            echo '<p><a href="tel+' . $phone . '" target="_self" title="Call ' . $title  . '" target="_self"><span itemprop="telephone"><i class="fa fa-phone" aria-hidden="true"></i>' . $phone .'</span></a></p>';
          }

          // Output Phone
          if( ! empty( $email && $title ) ) {
            echo '<p><a href="mail:' . $email . '" target="_self" title="Email ' . $title  . '" target="_self"><span itemprop="telephone"><i class="fa fa-envelope-o" aria-hidden="true"></i>' . $email .'</span></a></p>';
          }

          // Hours Schema
          if( ! empty( $hours_title && $hours && $hours_schema) ) {
            echo '<p class="hours-title">' . $hours_title . '</p>';
          }

          // Hours Schema
          if( ! empty( $hours && $hours_schema ) ) {
            echo '<p><i class="fa fa-clock-o" aria-hidden="true"></i><span class="hours-ico" itemprop="openingHours" content="' . $hours_schema . '">' . $hours . '</span></p>';
          }

          // Google Maps Link
          if( ! empty( $get_directions ) ) {
          echo '<p><a itemprop="hasMap" title="Google Map Directions" href="' . $get_directions . '" target="blank"><i class="fa fa-map-o" aria-hidden="true"></i><span class="span-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">Get Directions</a></p>';
          }

          ?>
        </div>
      </div>



      <?php

      // This is where you run the code and display the output
      echo $args['after_widget'];


  } // End public function widget

  // Widget Backend
  public function form( $instance ) {
    // Set Title
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    } else {
      $title = __( '', 'hms_contact_schema_domain' );
    }


    // Set Business Name
    if ( isset( $instance[ 'business_name' ] ) ) {
      $business_name = $instance[ 'business_name' ];
    } else {
      $title = __( '', 'hms_contact_schema_domain' );
    }


    // Set Street Address
    if ( isset( $instance[ 'bus_street' ] ) ) {
      $street = $instance[ 'bus_street' ];
    } else {
      $street = __( '', 'hms_contact_schema_domain' );
    }

    // Set City
    if ( isset( $instance[ 'bus_city' ] ) ) {
      $city = $instance[ 'bus_city' ];
    } else {
      $city = __( '', 'hms_contact_schema_domain' );
    }

    // Set State
    if ( isset( $instance[ 'bus_state' ] ) ) {
      $state = $instance[ 'bus_state' ];
    } else {
      $state = __( '', 'hms_contact_schema_domain' );
    }

    // Set Zip Code
    if ( isset( $instance[ 'bus_zip' ] ) ) {
      $zip = $instance[ 'bus_zip' ];
    } else {
      $zip = __( '', 'hms_contact_schema_domain' );
    }

    // Set Country
    if ( isset( $instance[ 'bus_country' ] ) ) {
      $country = $instance[ 'bus_country' ];
    } else {
      $country = __( '', 'hms_contact_schema_domain' );
    }


    // Phone
    if ( isset( $instance[ 'bus_phone' ] ) ) {
      $phone = $instance[ 'bus_phone' ];
    } else {
      $phone = __( '', 'hms_contact_schema_domain' );
    }

    // Email
    if ( isset( $instance[ 'bus_email' ] ) ) {
      $email = $instance[ 'bus_email' ];
    } else {
      $email = __( '', 'hms_contact_schema_domain' );
    }



    // Hours Title
    if ( isset( $instance[ 'bus_hours_title' ] ) ) {
      $hours_title = $instance[ 'bus_hours_title' ];
    } else {
      $hours_title = __( '', 'hms_contact_schema_domain' );
    }

    // Hours Schema.org Format
    if ( isset( $instance[ 'bus_hours_schema' ] ) ) {
      $hours_schema = $instance[ 'bus_hours_schema' ];
    } else {
      $hours_schema = __( '', 'hms_contact_schema_domain' );
    }

    // Hours Human Readable Format
    if ( isset( $instance[ 'bus_hours_pretty' ] ) ) {
      $hours = $instance[ 'bus_hours_pretty' ];
    } else {
      $hours = __( '', 'hms_contact_schema_domain' );
    }


    // Hours Human Readable Format
    if ( isset( $instance[ 'bus_hours_pretty' ] ) ) {
      $get_directions = $instance[ 'bus_directions' ];
    } else {
      $get_directions = __( '', 'hms_contact_schema_domain' );
    }


    // Widget admin form
    ?>
    <p><!-- Title -->
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <p><!-- Business Name -->
      <label for="<?php echo $this->get_field_id( 'business_name' ); ?>"><?php _e( 'Business Name:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'business_name' ); ?>" name="<?php echo $this->get_field_name( 'business_name' ); ?>" type="text" value="<?php echo esc_attr( $business_name ); ?>" />
    </p>

    <p><!-- Street Address -->
      <label for="<?php echo $this->get_field_id( 'bus_street' ); ?>"><?php _e( 'Street Address:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'street_address' ); ?>" name="<?php echo $this->get_field_name( 'bus_street' ); ?>" type="text" value="<?php echo esc_attr( $street ); ?>" />
    </p>

    <p><!-- City -->
      <label for="<?php echo $this->get_field_id( 'bus_city' ); ?>"><?php _e( 'City:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_city' ); ?>" name="<?php echo $this->get_field_name( 'bus_city' ); ?>" type="text" value="<?php echo esc_attr( $city ); ?>" />
    </p>

    <p><!-- State -->
      <label for="<?php echo $this->get_field_id( 'bus_state' ); ?>"><?php _e( 'State:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_state' ); ?>" name="<?php echo $this->get_field_name( 'bus_state' ); ?>" type="text" value="<?php echo esc_attr( $state ); ?>" />
    </p>

    <p><!-- Zip Code -->
      <label for="<?php echo $this->get_field_id( 'bus_zip' ); ?>"><?php _e( 'Zip:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_zip' ); ?>" name="<?php echo $this->get_field_name( 'bus_zip' ); ?>" type="text" value="<?php echo esc_attr( $zip ); ?>" />
    </p>

    <p><!-- Country -->
      <label for="<?php echo $this->get_field_id( 'bus_country' ); ?>"><?php _e( 'Country:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_country' ); ?>" name="<?php echo $this->get_field_name( 'bus_country' ); ?>" type="text" value="<?php echo esc_attr( $country ); ?>" />
    </p>




    <p><!-- Phone -->
      <label for="<?php echo $this->get_field_id( 'bus_phone' ); ?>"><?php _e( 'Business Phone:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_zip' ); ?>" name="<?php echo $this->get_field_name( 'bus_phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
    </p>

    <p><!-- Email -->
      <label for="<?php echo $this->get_field_id( 'bus_email' ); ?>"><?php _e( 'Business Email:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_email' ); ?>" name="<?php echo $this->get_field_name( 'bus_email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
    </p>



    <p><!-- Business Hours Title -->
      <label for="<?php echo $this->get_field_id( 'bus_hours_title' ); ?>"><?php _e( 'Hours Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_hours_title' ); ?>" name="<?php echo $this->get_field_name( 'bus_hours_title' ); ?>" type="text" value="<?php echo esc_attr( $hours_title ); ?>" />
    </p>

    <p><!-- Business Hours Title -->
      <label for="<?php echo $this->get_field_id( 'bus_hours_schema' ); ?>"><?php _e( 'Hours Schema:' ); ?></label>
      <p class="widget-label-description">For Additional information visit: <a href="https://schema.org/openingHours" alt="Schema.org Opening Hours" target="_blank">Schema Opening Hours</a> as a guide for entering your hours.</p>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_hours_schema' ); ?>" name="<?php echo $this->get_field_name( 'bus_hours_schema' ); ?>" type="text" value="<?php echo esc_attr( $hours_schema ); ?>" />
    </p>

    <p><!-- Business Hours Title -->
      <label for="<?php echo $this->get_field_id( 'bus_hours_pretty' ); ?>"><?php _e( 'Hours of Opeartion:' ); ?></label>
      <p class="widget-label-description">This field is a way to display the hours as you see fit. Ex: Monday - Friday 8:00am - 9:pm</p>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_hours_pretty' ); ?>" name="<?php echo $this->get_field_name( 'bus_hours_pretty' ); ?>" type="text" value="<?php echo esc_attr( $hours ); ?>" />
    </p>

    <p><!-- Business Hours Title -->
      <label for="<?php echo $this->get_field_id( 'bus_directions' ); ?>"><?php _e( 'Google Map Link:' ); ?></label>
      <p class="widget-label-description">Find your address on <a href="https://www.google.com/maps" alt="Google Maps" target="blank">Google Maps</a>. Copy the share link short version and paste it here.</p>
      <input class="widefat" id="<?php echo $this->get_field_id( 'bus_directions' ); ?>" name="<?php echo $this->get_field_name( 'bus_directions' ); ?>" type="text" value="<?php echo esc_attr( $get_directions ); ?>" />
    </p>


    <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    // Title
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    // Business Name
    $instance['business_name'] = ( ! empty( $new_instance['business_name'] ) ) ? strip_tags( $new_instance['business_name'] ) : '';

    //Address
    $instance['bus_street'] = ( ! empty( $new_instance['bus_street'] ) ) ? strip_tags( $new_instance['bus_street'] ) : '';
    $instance['bus_city'] = ( ! empty( $new_instance['bus_city'] ) ) ? strip_tags( $new_instance['bus_city'] ) : '';
    $instance['bus_state'] = ( ! empty( $new_instance['bus_state'] ) ) ? strip_tags( $new_instance['bus_state'] ) : '';
    $instance['bus_zip'] = ( ! empty( $new_instance['bus_zip'] ) ) ? strip_tags( $new_instance['bus_zip'] ) : '';
    $instance['bus_country'] = ( ! empty( $new_instance['bus_country'] ) ) ? strip_tags( $new_instance['bus_country'] ) : '';

    // Contact Information
    $instance['bus_phone'] = ( ! empty( $new_instance['bus_phone'] ) ) ? strip_tags( $new_instance['bus_phone'] ) : '';
    $instance['bus_email'] = ( ! empty( $new_instance['bus_email'] ) ) ? strip_tags( $new_instance['bus_email'] ) : '';

    // Additional Info
    $instance['bus_hours_title'] = ( ! empty( $new_instance['bus_hours_title'] ) ) ? strip_tags( $new_instance['bus_hours_title'] ) : '';
    $instance['bus_hours_schema'] = ( ! empty( $new_instance['bus_hours_schema'] ) ) ? strip_tags( $new_instance['bus_hours_schema'] ) : '';
    $instance['bus_hours_pretty'] = ( ! empty( $new_instance['bus_hours_pretty'] ) ) ? strip_tags( $new_instance['bus_hours_pretty'] ) : '';
    $instance['bus_directions'] = ( ! empty( $new_instance['bus_directions'] ) ) ? strip_tags( $new_instance['bus_directions'] ) : '';

    return $instance;
  }
} // Class wpb_widget ends here
