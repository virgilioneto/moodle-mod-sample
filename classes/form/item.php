<?php
/**
 * Item Form
 *
 * @package    mod_sample
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die('');

require_once($CFG->dirroot . '/lib/formslib.php');

class mod_sample_item_form extends moodleform {

    public function definition() {
        global $CFG;

        $mform = $this->_form;

        $mform->addElement('text', 'name', get_string('name', ''), array('size' => '64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('name', 'videoforumname', 'videoforum');

        $mform->addElement('text', 'test', get_string('name', ''), array('size' => '64'));
        $mform->setType('test', PARAM_TEXT);
        $mform->addRule('test', null, 'required', null, 'client');
        $mform->addRule('test', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('test', 'videoforumname', 'videoforum');
                
        $mform->addElement('filepicker', 'attachment1', get_string('selectfile', 'local_instart_form'), null,
                   array('maxbytes' => 1024*1024, 'accepted_types' => '*'));
        $mform->addRule('attachment1', get_string('requiredattachment', 'local_instart_form'), 'required', null, 'client');
        
        $this->add_action_buttons();
    }
}