
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

///////////////////////////////////////// DATA TO BE REPLACED BY JSON

var theData = {
    storeItems:[
        {
            name: "Super Cool Necklace",
            materials: ["wood", "copper", "plastic"],
            sizes: [5, 6, 7],
            colors: ["red", "blue", "white"],
            type: "SOLO",
            img: "../objects/1_boxPendant/jacobBBlitzer_1_boxPendant_render1.jpg",
            description: "This is the complete ically pass the ically pass the ting HTML code from " +
                "ically pass the ically pass the ically pass the ically pass thpass the ically pass the " +
                "the data into a JavaScript variable, I decided tically pass the o put all of that into",
            price:20.99
        },
        {
            name: "Pretty Butterfly Thing",
            materials: ["silver", "copper", "plastic"],
            sizes: [5, 7],
            colors: ["pink", "purple", "cyan"],
            type: "CUSTOM",
            img: "../objects/1_boxPendant/jacobBBlitzer_1_boxPendant_render2.jpg",
            description: "ically pass the ically pass the ically pass the ically pass the ically pass the " +
                "ically pass the ically pass the ically pass the ically pass the ically pass the ically pass the " +
                "ically pass the ically pass the ically pass the ically pass the ically pass the ically pass the " +
                "ically pass the ically pass the ically pass the ically pass the ically pass the ically pass the ",
            price:9.99
        }
    ]
};

///////////////////////////////////////// OVERLAY FUNCTIONS

var openOverlay = function() {

    $('.storeItem-hover').css('visibility', 'visible');
    document.getElementById('light').style.display = 'block';
    document.getElementById('fade').style.display = 'block';
    $('#light').center();

};

var closeOverlay = function() {

    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';
    $('.storeItem-hover').css('visibility', 'hidden');

};

///////////////////////////////////////// JSON STUFF FUNCTION

function jsonStuff() {
    console.log(' start of jsonStuff function');

    $.ajax({
        type: "GET",
        url: './../php/json-store-objects.php',
        dataType: "json",
        success: function(data){
            //do your stuff with the JSON data
            var obj = JSON.parse(data);
            console.log('helllllllllloooo...... ' + obj);
        }
    });

}

///////////////////////////////////////// RENDERING HANDLEBARS FUNCTIONS

var renderOverlayTemplate = function() {
    var scriptHTML = document.getElementById('overlay-template').innerHTML;
    var templateFunction = Handlebars.compile(scriptHTML);
    document.getElementById('light').innerHTML = templateFunction(theData.storeItems[0]);
};

var renderItemTemplate = function() {
    var itemHTML = document.getElementById('item-template').innerHTML;
    var itemTemplateFunction = Handlebars.compile(itemHTML);
    document.getElementById('item').innerHTML = itemTemplateFunction(theData.storeItems[0]);
};

var renderHoverTemplate = function() {
    var hoverHTML = document.getElementById('hover-template').innerHTML;
    var hoverTemplateFunction = Handlebars.compile(hoverHTML);
    document.getElementById('hover').innerHTML = hoverTemplateFunction(theData.storeItems[0]);
};

///////////////////////////////////////// JQUERY PROTOTYPING (CENTERING)

jQuery.prototype.center = function () {
    this.css("position","absolute");

    var windowHeight = (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop();
    var windowWidth = (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft();

    this.css("top", Math.max(0, windowHeight) + "px");
    this.css("left", Math.max(0, windowWidth) + "px");

    return this;
};

//////////////////////////////////////// EXECUTION

renderItemTemplate();
renderOverlayTemplate();
renderHoverTemplate();
//jsonStuff();

//////////////////////////////////////// JQUERY STUFF
$(".storeItem").mouseenter(function() {
    $('.storeItem-hover').css('visibility', 'visible');
});

$(".storeItem-hover").mouseleave(function() {
    $('.storeItem-hover').css('visibility', 'hidden');
});
