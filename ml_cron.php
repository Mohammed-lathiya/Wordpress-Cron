<?php

/* Cron Run Every 2 hour */


function ml_cron_schedules($schedules){
    if(!isset($schedules["every_two_hours"])){
        $schedules["every_two_hours"] = array(
            'interval' => 7200,
            'display' => __('Every 2 hours'));
    }
    return $schedules;
}
add_filter('cron_schedules','ml_cron_schedules');



if (!wp_next_scheduled('ml_task_hook')) {
    wp_schedule_event( time(), 'every_two_hours', 'ml_task_hook' );
}
add_action ( 'ml_task_hook', 'ml_task_function' );



function ml_task_function() {
  /* Code */
}

?>
