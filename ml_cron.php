<?php

/*
There are 2 types of Cron

1. WP Cron

WP Cron is supported in all WordPress sites by default(Unless turned off manually in the wp-config file). The main disadvantage of WP Cron is that it will trigger only when someone visits the site. For example, If there is no site activity for some time say 10 days, the cron will not be triggered on those 10 days.

2. Server Cron

Server Cron is an alternate to WP Cron. The main advantage of Server Cron is that it is not dependent on site activity. But, Server Cron requires separate configuration. As far as we know, it cannot be configured using a Plugin within the site. It can only be configured from the site’s C-Panel or control panel.

If you want to use WP Cron, then in “Select Cron Type” select “WP Cron”. If you want to run Server cron, select “Server Cron”. Please follow the steps mentioned in the “Server Cron Configuration” section. */


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
