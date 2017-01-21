/**
 * Item Form
 *
 * @package    mod_sample/item_form
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'jquery',
    'core/notification',
    'core/templates',
    'core/fragment',
    'core/ajax',
    'mod_sample/loader'
], function ($, notification, templates, fragment, ajax, loader) {
    var sampleId = 0;
    var cmnId = 0;
    var container;

    /**
     * Module initializer
     * @param {Number} _sampleId Sample ID
     * @param {Number} _cmId Course Module ID
     */
    function init (_sampleId, _cmId) {
        if (!_sampleId || !_cmId) return notification.exception(new Error('_sampleId and _cmId are required'));
        sampleId = _sampleId;
        cmnId = _cmId;
        container = $('#view-item-form');
        
        loader.init(container);
        formEvents();
        loadFragment();
    }

    function formEvents() {
        container.on('submit', 'form', saveCallback);
    }

    function saveCallback(e) {
        e.preventDefault();
    }

    /**
     * Load fragment
     */
    function loadFragment () {
        fragment.loadFragment('mod_sample', 'item_form', cmnId, {})
            .done(fragmentCallback)
            .fail(notification.exception);
    }
    
    /**
     * Load fragment callback
     * @callback
     * @param {String} html Template html code
     * @param {String} js Template js code
     */
    function fragmentCallback (html, js) {
        loader.stop();
        templates.replaceNodeContents(container, html, js);
    }
    
    return {
        init: init
    };
});