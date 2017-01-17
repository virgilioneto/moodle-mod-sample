<?php
/**
 * Settings Page
 *
 * @package    mod_sample
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    $settings->add(new admin_setting_heading('sample_method_heading', get_string('pluginconfig', 'sample'), ''));

    if (isset($CFG->maxbytes)) {
        $maxbytes = 0;
        $configplugin = get_config("mod_sample");
        if (isset($configplugin->sample_maxbytes)) {
            $maxbytes = $configplugin->sample_maxbytes;
        }
        $settings->add(
            new admin_setting_configselect(
                'mod_sample/sample_maxbytes', 
                get_string('maxbytes', 'sample'), 
                get_string('maxbytesdesc', 'sample'), 
                0, 
                get_max_upload_sizes($CFG->maxbytes, 0, 0, $maxbytes)
            )
        );
    }

    $settings->add(
        new admin_setting_configtext(
            'mod_sample/textfield', 
            get_string('textfield', 'sample'),
            get_string('textfielddesc', 'sample'), 
            'Sample Text'
        )
    );
}
