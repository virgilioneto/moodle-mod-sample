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

require_once("$CFG->libdir/externallib.php");
require_once("$CFG->dirroot/user/externallib.php");
require_once("$CFG->dirroot/mod/sample/locallib.php");

/**
 * @class mod_sample_component1
 */
class mod_sample_component1 extends external_api {
    
    /**
     * Load items parameter validation
     * @return \external_function_parameters
     */
    public static function load_items_parameters() {
        return new external_function_parameters(
            array(
                'cmid' => new external_value(PARAM_INT, 'Context Module ID')
            )
        );
    }

    /**
     * Load items
     * @param Int $cmid
     * @return \external_multiple_structure
     */
    public static function load_items($cmid) {
        $params = self::validate_parameters(
            self::load_items_parameters(),
            array('cmid' => $cmid)
        );
        
        return array(
            array(   
                'id' => 1,
                'field_1' => 100,
                'field_2' => 'Some Text 1',
                'field_3' => '<p>Some HTML text 1</p>',
                'field_4' => 50
            ),
            array(   
                'id' => 2,
                'field_1' => 100,
                'field_2' => 'Some Text 2',
                'field_3' => '<p>Some HTML text 2</p>',
                'field_4' => 50
            ),
            array(   
                'id' => 3,
                'field_1' => 100,
                'field_2' => 'Some Text 3',
                'field_3' => '<p>Some HTML text 3</p>',
                'field_4' => 50
            ),
            array(   
                'id' => 4,
                'field_1' => 100,
                'field_2' => 'Some Text 4',
                'field_3' => '<p>Some HTML text 4</p>',
                'field_4' => 50
            ),
        );
    }

    /**
     * Load items return validation
     * @return \external_multiple_structure
     */
    public static function load_items_returns() {
        return new external_multiple_structure(
            new external_single_structure(
                array(
                    'id' => new external_value(PARAM_INT, 'Item ID'),
                    'field_1' => new external_value(PARAM_INT, 'Field 1'),
                    'field_2' => new external_value(PARAM_TEXT, 'Field 2'),
                    'field_3' => new external_value(PARAM_RAW, 'Field 3'),
                    'field_4' => new external_value(PARAM_INT, 'Field 4')
                )
            )
        );
    }

}
