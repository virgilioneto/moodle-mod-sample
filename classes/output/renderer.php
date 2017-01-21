<?php
/**
 * Renderer
 *
 * @package    mod_sample
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace mod_sample\output;

defined('MOODLE_INTERNAL') || die;

use plugin_renderer_base;

require_once($CFG->dirroot . '/mod/sample/locallib.php');

class renderer extends plugin_renderer_base {
    public function render_view_page($page) {
        $data = $page->export_for_template($this);
        return parent::render_from_template('mod_sample/view', $data);
    }
    
    public function render_item_form(\item_form $form) {
        $o = '';
        if ($form->jsinitfunction) {
            $this->page->requires->js_init_call($form->jsinitfunction, array());
        }
        $o .= $this->output->box_start('boxaligncenter ' . $form->classname);
        $o .= $this->moodleform($form->form);
        $o .= $this->output->box_end();
        return $o;
    }
    
    protected function moodleform(\moodleform $mform) {
        $o = '';
        ob_start();
        $mform->display();
        $o .= ob_get_contents();
        ob_end_clean();
        return $o;
    }
}