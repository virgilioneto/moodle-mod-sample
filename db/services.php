<?php
/**
 * Services definition
 *
 * @package    mod_sample
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

$functions = array(
    'mod_sample_load_items' => array(
        'classname' => 'mod_sample_component1',
        'methodname' => 'load_items',
        'classpath' => 'mod/sample/classes/service/component1.php',
        'description' => 'Load component1 items',
        'type' => 'read',
        'ajax' => true
    )
);
