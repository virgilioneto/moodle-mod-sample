/**
 * View Page Component 1
 *
 * @package    mod_sample/component1
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'jquery',
    'core/templates',
    'core/notification',
    'core/ajax',
    'mod_sample/loader'
], function ($, templates, notification, ajax, loader) {
    var cmId = 0;
    var container;
    
    /**
     * Module initializer
     * @param {Number} _cmId Course Module ID
     */
    function init (_cmId) {
        if (!_cmId) return notification.exception(new Error('_cmId is required'));
        cmId = _cmId;
        container = $('#view_component1');
        
        loader.init(container);
        loadItems();
    }
    
    /**
     * Ajax request to load component items
     */
    function loadItems () {
        ajax.call([
            {
                methodname: 'mod_sample_load_items',
                args: {cmid: cmId},
                done: loadTemplate,
                fail: notification.exception
            }
        ]);
    }

    /**
     * Load template
     * @callback
     * @param {Array} items
     */
    function loadTemplate (items) {
        templates.render(
            'mod_sample/component1', 
            {items: items}
        )
        .done(templateCallback)
        .fail(notification.exception);
    }
    
    /**
     * Load template callback
     * @callback
     * @param {String} html Template html code
     * @param {String} js Template js code
     */
    function templateCallback (html, js) {
        loader.stop();
        templates.replaceNodeContents(container, html, js);
    }
    
    return {
        init: init
    };
});

