// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

var mathMax = function(numbers) {
    var maxNumber;

    if (numbers) {
        if (!Array.isArray) {
            Array.isArray = function(obj) {
                return Object.prototype.toString.call(obj) === '[object Array]';
            };
        }

        if (Array.isArray(numbers)) {
            for (var i = 0, len = numbers.length; i < len; i++) {
                if ((typeof numbers[i] === 'number') && (i === 0 || numbers[i] > maxNumber)) {
                    maxNumber = numbers[i];
                }
            }
        }
    }

    return maxNumber;
};

// Place any jQuery/helper plugins in here.
