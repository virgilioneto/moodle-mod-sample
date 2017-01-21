<?php
/**
 * Local lib
 *
 * @package    mod_sample
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/mod/sample/classes/output/renderable/item_form.php');

class sample {
    private $context;
    private $course;
    private $coursemodule;
    
    public function __construct($coursemodulecontext, $coursemodule, $course) {
        global $SESSION;

        $this->context = $coursemodulecontext;
        $this->course = $course;
        $this->coursemodule = $coursemodule;
    }
    
    public function get_item_form() {
        global $DB, $CFG, $SESSION, $PAGE;
        
        require_once($CFG->dirroot . '/mod/sample/classes/form/item.php');
        
        $o = '';
        $mform = new mod_sample_item_form(
            null,
            array(),
            'post',
            '',
            array('class' => 'item-form')
        );
        $o .= $this->get_renderer()->render(new item_form('item-form', $mform));
        return $o;
    }
    
    public function get_renderer() {
        global $PAGE;
        if ($this->output) {
            return $this->output;
        }
        $this->output = $PAGE->get_renderer('mod_sample', null, RENDERER_TARGET_GENERAL);
        return $this->output;
    }
}