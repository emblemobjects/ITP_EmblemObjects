<script type="text/handlebars" id="overlay-template">
<div id="overlayTemplate">
<overlayText>

{{#compare type "SOLO" operator="==="}}
    <div class="leftText">
        <h1>{{ name }}</h1>
    </div>

    <div class="rightText">
        <h2> $ {{ price }} </h2>
    </div>
    <div style="clear:both"></div>
    <br />

    <div id="imgBox" class="leftText">
        <img src="{{img}}" alt="" class="store-img" width="285px" height="250px"/>
    </div>

    <div id="optionsBox" class="rightText">

        Description: {{description}}

        <br /><br />

        <form>

        Select a Color
        <select name="colors">
            {{#each colors}}
                <option> {{this}} </option>
            {{/each}}
        </select>
        <br />

        Select a Material
        <select name="materials">
            {{#each materials}}
                <option> {{this}} </option>
            {{/each}}
        </select>
        <br />

        Select a Size
        <select name="sizes">
            {{#each sizes}}
                <option> {{this}} </option>
            {{/each}}
        </select>

        </form>
    </div>

    <div style="clear:both"></div>

    <br />

    <div id="buttonBuySoloDiv" class="leftText">
        <form action="../payment/index.php?item_id={{id}}&detail_id={{detail_id}}">
            <button type="submit">Buy Item</button>
        </form>
    </div>

{{/compare}}

{{#compare type "CUSTOM" operator="==="}}
    <div class="leftText">
        <h1>{{ name }}</h1>
    </div>

    <div class="rightText">
        <h2> $ {{ price }} </h2>
    </div>
    <div style="clear:both"></div>
    <br />

    <div id="imgBox" class="leftText">
        <img src="{{img}}" alt="" width="230px" height="230px"/>
    </div>

    <div id="optionsBox" class="rightText">

        Description: {{description}}

        <br /><br />

        <form>

        Select a Color
        <select name="colors">
            {{#each colors}}
                <option> {{this}} </option>
            {{/each}}
        </select>
        <br />

        Select a Material
        <select name="materials">
            {{#each materials}}
                <option> {{this}} </option>
            {{/each}}
        </select>
        <br />

        Select a Size
        <select name="sizes">
            {{#each sizes}}
                <option> {{this}} </option>
            {{/each}}
        </select>

        </form>
    </div>

    <div style="clear:both"></div>

        <div id="buttonCustomDiv" class="leftText">
            <form action="../payment/index.php">
                <button type="submit">Buy Item</button>
            </form>
        </div>

        <div class="leftText">
            <form method="get" action="../customize/index.php?item_id={{id}}&detail_id={{details.detail_id}}">
                <button type="submit">Customize Item</button>
            </form>
        </div>

    <div style="clear:both"></div>

{{/compare}}

</overlayText>
</div>
</script>