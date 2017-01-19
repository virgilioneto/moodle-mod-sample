/**
 * View Page Loader
 *
 * @package    mod_sample/loader
 * @copyright  2017 https://github.com/virgilioneto
 * @author     Virgilio Neto <virgilio.missao.neto@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'core/templates',
    'core/notification'
], function (templates, notification) {
    var container;
    var stopped;
    
    /**
     * Module initializer
     * @param {DOMElement} _container HTML container element
     */
    function init (_container) {
        if (!_container) return notification.exception(new Error('_container is required'));
        
        container = _container;
        stopped = false;
        loadTemplate();
    }
    
    /**
     * Load template
     */
    function loadTemplate () {
        templates.render('mod_sample/loader', {a:1})
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
        if (!stopped) templates.replaceNodeContents(container, html, js);
    }
    
    function stop () {
        stopped = true;
    }
    
    return {
        init: init,
        stop: stop
    };
});