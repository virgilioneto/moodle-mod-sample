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
class mod_sample_item extends external_api {
    
    /**
     * Load items parameter validation
     * @return \external_function_parameters
     */
    public static function get_by_sampleid_parameters() {
        return new external_function_parameters(
            array(
                'sampleid' => new external_value(PARAM_INT, 'Sample ID')
            )
        );
    }

    /**
     * Load items
     * @param Int $sampleid
     * @return array
     */
    public static function get_by_sampleid($sampleid) {
        $params = self::validate_parameters(
            self::get_by_sampleid_parameters(),
            array('sampleid' => $sampleid)
        );
        
        return array(
            array(
                'id' => 1,
                'title' => 'Some Text 1',
                'htmltext' => '<p>Some HTML text 1</p>',
                'value1' => 100,
                'value2' => 50
            ),
            array(   
                'id' => 2,
                'title' => 'Some Text 2',
                'htmltext' => '<p>Some HTML text 2</p>',
                'value1' => 100,
                'value2' => 50
            ),
            array(   
                'id' => 3,
                'title' => 'Some Text 3',
                'htmltext' => '<p>Some HTML text 3</p>',
                'value1' => 100,
                'value2' => 50
            ),
            array(   
                'id' => 4,
                'title' => 'Some Text 4',
                'htmltext' => '<p>Some HTML text 4</p>',
                'value1' => 100,
                'value2' => 50
            ),
        );
    }

    /**
     * Load items return validation
     * @return \external_multiple_structure
     */
    public static function get_by_sampleid_returns() {
        return new external_multiple_structure(
            new external_single_structure(
                array(
                    'id' => new external_value(PARAM_INT, 'Item ID'),
                    'title' => new external_value(PARAM_TEXT, 'Title'),
                    'htmltext' => new external_value(PARAM_RAW, 'Html String'),
                    'value1' => new external_value(PARAM_INT, 'Value 1'),
                    'value2' => new external_value(PARAM_INT, 'Value 2')
                )
            )
        );
    }

}
