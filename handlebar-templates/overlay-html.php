<script id="overlay-template" type="text/x-handlebars-template">
<div id="display-preview">
	<img id="preview-main" src="../objects/{{images.[0].image_filepath}}" />
	<div id="display-thumbnails">
		<div class="thumbnail-icon">
			<img class="icon-img" src="../objects/{{images.[1].image_filepath}}"/>
			<div class="icon-state icon-selected"></div>
		</div>
		<div class="thumbnail-icon">
			<img class="icon-img" src="../objects/{{images.[2].image_filepath}}"/>
			<div class="icon-state icon-none"></div>
		</div>
		<div class="thumbnail-icon">
			<img class="icon-img" src="http://placekitten.com/110/115"/>
			<div class="icon-state icon-none"></div>
		</div>
		<div class="thumbnail-icon">
			<img class="icon-img" src="http://placekitten.com/110/115"/>
			<div class="icon-state icon-none"></div>
		</div>

		<div class="thumbnail-icon">
			<img class="icon-img" src="http://placekitten.com/110/115"/>
			<div class="icon-state icon-none"></div>
		</div>
		<div class="thumbnail-icon">
			<img class="icon-img" src="http://placekitten.com/110/115"/>
			<div class="icon-state icon-none"></div>
		</div>

	</div>
</div><!-- end div#display-preview -->

<div id="display-info">
	<div id="info-name">{{name}}</div>
	<div id="info-collection">from the <a class="standout hover" href="#collection">{{collection_name}}h</a> collection</div>
	<div id="info-designer">designed by <a class="standout hover" href="#designer">{{designer_first_name}} {{designer_last_name}}</a></div>
	<div id="info-category">
		<a class="standout hover" href="#category">{{category}}</a> - <a class="standout hover" href="#subcategory">{{subcategory}}</a>
	</div>
	<div id="info-description">{{description}}</div>
</div><!-- end div#display-info -->

<div id="display-form">
	<form method="get">
		<div id="form-size" class="form-grp">
			<div class="form-label">What size would you like your object in?</div>
			<label class="radio-label">
				<input class="radio-input" type="radio" name="size" value="1in x 2in"/>
				<span>1in x 2in</span>
			</label>
			<label class="radio-label">
				<input class="radio-input" type="radio" name="size" value="1.25in x 2.5in"/>
				<span>1.25in x 2.5in</span>
			</label>
			<label class="radio-label">
				<input class="radio-input" type="radio" name="size" value="1.5in x 3in"/>
				<span>1.5in x 3in</span>
			</label>
			<div class="clear"></div>
		</div>
		<div id="form-material" class="form-grp">
			<div class="form-label">What material would you like your object to be made from?</div>
			<label class="radio-label">
				<input class="radio-input" type="radio" name="material-id" value="1"/>
				<span>Bronze</span>
			</label>
			<label class="radio-label">
				<input class="radio-input" type="radio" name="material-id" value="2"/>
				<span>Brass</span>
			</label>
			<label class="radio-label">
				<input class="radio-input" type="radio" name="material-id" value="3"/>
				<span>Silver</span>
			</label>
			<label class="radio-label">
				<input class="radio-input" type="radio" name="material-id" value="4"/>
				<span>Gold Plated Brass</span>
			</label>
			<div class="clear"></div>
		</div>
		<div id="form-accesory" class="form-grp bb-1">
			<div class="form-label">Would you like to add an accessory?</div>
			<select class="select-input" name="accessory-id">
				<option value="none">none</option>
				<option value="1">10" silver necklace</option>
				<option value="2">14" silver necklace</option>
				<option value="3">16" leather necklace</option>
			</select>
		</div>
		<div id="form-price" class="form-grp bb-1">Price: <span>starting at $10.74</span></div>
		<input type="hidden" name="detail-id"/>
		<button type="submit" formaction="#purchase">BUY</button>
		<button type="submit" formaction="#enable/request">DESIGN</button>
		<div id="form-info">BUY ORDERS OBJECT AS IS.</div>
	</form>
</div><!-- div#display-form -->

<div class="clear"></div>
</script>