<?php
/**
 * View Page Renderrable
 *
 * @package    mod_sample
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace mod_sample\output;

defined('MOODLE_INTERNAL') || die;
 
use renderable;
use renderer_base;
use templatable;                                                                                                             

class view_page implements templatable, renderable {
    public function __construct($data) {
        $this->data = $data;
    }
    
    public function export_for_template(renderer_base $output) {
        return $this->data;
    }
}