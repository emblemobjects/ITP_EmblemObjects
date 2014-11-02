store = window.store || {};
///////////////////////////////////////// HANDLEBARS HELPER

Handlebars.registerHelper('compare', function(lvalue, rvalue, options) {

    if (arguments.length < 3)
        throw new Error("Handlerbars Helper 'compare' needs 2 parameters");

    operator = options.hash.operator || "==";

    var operators = {
        '===':      function(l,r) { return l === r; },
        '!=':       function(l,r) { return l != r; },
        '<':        function(l,r) { return l < r; },
        '>':        function(l,r) { return l > r; },
    }

    if (!operators[operator])
        throw new Error("Handlerbars Helper 'compare' doesn't know the operator "+operator);

    var result = operators[operator](lvalue,rvalue);

    if( result ) {
        return options.fn(this);
    } else {
        return options.inverse(this);
    }

});

store.getIndex = function(el){
    return $(el).attr('data-item-id');
}

var template = Handlebars.compile($('#overlay-template').html());
store.renderOverlay = function(index){
    var html = "";
    html = template(store.items[index-1]);
    return html;
}
store.displayOverlay = function(html){
    $('#overlay-display').html(html);
}