/**
 * Item List
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
    var sampleId = 0;
    var container;
    
    /**
     * Module initializer
     * @param {Number} _sampleId Sample ID
     */
    function init (_sampleId) {
        if (!_sampleId) return notification.exception(new Error('_sampleId is required'));
        sampleId = _sampleId;
        container = $('#view-item-list');
        
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
                args: {sampleid: sampleId},
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
            'mod_sample/item_list', 
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

