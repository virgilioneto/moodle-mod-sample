<?php
/**
 * View Page
 *
 * @package    mod_sample
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT);
$s  = optional_param('s', 0, PARAM_INT);

if ($id) {
    $cm = get_coursemodule_from_id('sample', $id, 0, false, MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $sample = $DB->get_record('sample', array('id' => $cm->instance), '*', MUST_EXIST);
} else if ($s) {
    $sample = $DB->get_record('sample', array('id' => $s), '*', MUST_EXIST);
    $course = $DB->get_record('course', array('id' => $$samplevideoforum->course), '*', MUST_EXIST);
    $cm = get_coursemodule_from_instance('videoforum', $sample->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

$event = \mod_sample\event\course_module_viewed::create(array(
    'objectid' => $PAGE->cm->instance,
    'context' => $PAGE->context,
));
$event->add_record_snapshot('course', $PAGE->course);
$event->add_record_snapshot($PAGE->cm->modname, $sample);
$event->trigger();

$PAGE->set_url('/mod/sample/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($sample->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->add_body_class('mod_sample');

$output = $PAGE->get_renderer('mod_sample');

echo $output->header();

if ($sample->intro) {
    echo $output->box(format_module_intro('sample', $sample, $cm->id), 'generalbox mod_introbox', 'sampleintro');
}

$data = new stdClass();
$data->myvar = "Some data to share with the template";

$template = new \mod_sample\output\view_page($data);
echo $output->render($template);

$PAGE->requires->js_call_amd('mod_sample/component1', 'init', array($cm->id));

echo $output->footer();
