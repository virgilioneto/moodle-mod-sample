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
        'classname' => 'mod_sample_item',
        'methodname' => 'load',
        'classpath' => 'mod/sample/classes/service/item.php',
        'description' => 'Load sample items',
        'type' => 'read',
        'ajax' => true
    )
);
