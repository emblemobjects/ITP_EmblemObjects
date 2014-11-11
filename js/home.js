store = window.store || {};
///////////////////////////////////////// HANDLEBARS HELPER

// Handlebars.registerHelper('compare', function(lvalue, rvalue, options) {

//     if (arguments.length < 3)
//         throw new Error("Handlerbars Helper 'compare' needs 2 parameters");

//     operator = options.hash.operator || "==";

//     var operators = {
//         '===':      function(l,r) { return l === r; },
//         '!=':       function(l,r) { return l != r; },
//         '<':        function(l,r) { return l < r; },
//         '>':        function(l,r) { return l > r; },
//     }

//     if (!operators[operator])
//         throw new Error("Handlerbars Helper 'compare' doesn't know the operator "+operator);

//     var result = operators[operator](lvalue,rvalue);

//     if( result ) {
//         return options.fn(this);
//     } else {
//         return options.inverse(this);
//     }

// });

// handlebars helper if equals
Handlebars.registerHelper('ifEqual', function(value1, value2, options) {
    if (value1 == value2) {
        return options.fn(this);
    }
    return options.inverse(this);
});

store.getIndex = function(el){
    return $(el).attr('data-item-id');
}


var template = Handlebars.compile($('#overlay-template').html());
store.renderOverlay = function(index){
    var html = "";
    var i = 0;
    for (var k = 0; k < store.items.length; k++){
        if (store.items[k]['id'] == index){
            var i = k;
        }
    }
    html = template(store.items[i]);
    return html;
}
store.displayOverlay = function(html){
    $('#overlay-display').html(html);
}

store.overlayInitThumb = function() {
    $('.thumbnail-icon:first-child div')
        .addClass('icon-selected');
}

store.overlaySetPreview = function() {
    $('.icon-state').on('click', function() {
        var src = $(this).prev().attr('src');
        $('#preview-main').attr('src', src);

        $('.icon-state').removeClass('icon-selected');
        $(this).addClass('icon-selected');
    });
};

