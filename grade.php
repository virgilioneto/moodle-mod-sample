<?php
/**
 * Grade Page
 *
 * @package    mod_sample
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . "../../../config.php");

$id = required_param('id', PARAM_INT);
$itemnumber = optional_param('itemnumber', 0, PARAM_INT);
$userid = optional_param('userid', 0, PARAM_INT);
redirect('view.php?id='.$id);
