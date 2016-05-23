<?php

define('MAX_RANDOM_VALUE', 9);
define('MIN_RANDOM_VALUE', -9);

/**
 * Get random value.
 */
function get_random_value() {
    $value = rand(MIN_RANDOM_VALUE, MAX_RANDOM_VALUE);
    if (strlen($value) == 1) {
        $value = ' ' . $value;
    }
    return $value;
}

/**
 * Prepare template.
 */
function render_template($file_name, $vars = array()) {
    ob_start();
    include_once $file_name;
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

session_start();

// Process form submit.
if (!empty($_POST)) {
    $vars_answer = $_POST;
    $vars_answer['questions'] = $_SESSION['questions_html'];
    $answers_html = render_template('answer_template.php', $vars_answer);
    $file_name = $_POST['fio'] . '_' . $_SERVER['REQUEST_TIME'] . '.html';
    $fileLocation = getenv("DOCUMENT_ROOT") . "/" . $file_name;
    $file = fopen($fileLocation,"w") or die("can't open file");
    $content = $answers_html;
    fwrite($file, $content);
    fclose($file);
}

// Prepare template.
$_SESSION['questions_html'] = $vars['questions'] = render_template('tasks_template.php', $vars);
echo render_template('main_template.php', $vars);
