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
            type: "SOLO",
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

    document.getElementById('light').style.display = 'block';
    document.getElementById('fade').style.display = 'block';
    $('#light').center();

};

var closeOverlay = function() {

    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';

};

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

$(".storeItem").mouseenter(function() {
    $('#helloWorld').css('visibility', 'visible');
});

$(".storeItem").mouseleave(function() {
    $('#helloWorld').css('visibility', 'hidden');
});





