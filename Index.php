<?php

define('MAX_RANDOM_VALUE', 9);
define('MIN_RANDOM_VALUE', -9);

/**
 * Get random value.
 */
function get_random_value() {
    return rand(MIN_RANDOM_VALUE, MAX_RANDOM_VALUE);
}

/**
 * Prepare template.
 */
function render_template($vars) {
    ob_start();
    include_once 'tasks_template.php';
    return ob_get_clean();
}

/**
 * Prepare tasks variables.
 */

/**
 * Task 1
 */
$vars['task_1_a'] = array(array(0, 0), array(0, 0), array(0, 0));
$vars['task_1_b'] = array(array(0, 0, 0), array(0, 0, 0));
foreach ($vars['task_1_a'] as &$items) {
    foreach ($items as &$value) {
        $value = get_random_value();
    }
}
foreach ($vars['task_1_b'] as &$items) {
    foreach ($items as &$value) {
        $value = get_random_value();
    }
}

/**
 * Task 2
 */
$vars['task_2_a'] = array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0));
foreach ($vars['task_2_a'] as &$items) {
    foreach ($items as &$value) {
        $value = get_random_value();
    }
}

/**
 * Task 3
 */
$vars['task_3_a'] = array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0));
foreach ($vars['task_3_a'] as &$items) {
    foreach ($items as &$value) {
        $value = get_random_value();
    }
}

// Prepare template.
echo render_template($vars);