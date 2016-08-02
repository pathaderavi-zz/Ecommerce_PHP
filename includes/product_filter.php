<div class="product_filter">
	
	<h4 style="margin-bottom:12px;">Advanced Search Filter</h4>
	
	<div class="filter-wrap">
		
		<div>
		
			<label style="margin-bottom:5px;display:block;float:left;">Sort by rating:</label>
			<div style="float: right;margin-top:14px;margin-right:35px;">
				<label>Disable Rating Filter</label>
				<input type="checkbox" value="Y" id="rating_checkbox" />
			</div>
			<div id="rating_slider"></div>
			<input type="text" name="rating_value" id="rating_value" value="50"/>
		
		</div>
		
		<div>
		
			<label style="margin-bottom:5px;display:block;float:left;">Sort by popularity:</label>
			<div style="float: right;margin-top:14px;margin-right:35px;">
				<label>Disable Popularity Filter</label>
				<input type="checkbox" value="Y" id="popularity_checkbox" />
			</div>
			<div id="popularity_slider"></div>
			<input type="text" name="popularity_value" id="popularity_value" value="50"/>
			
		</div>

		<div>
		
			<label style="margin-bottom:5px;display:block;float:left;">Sort by price:</label>
			<div style="float: right;margin-top:14px;margin-right:35px;">
				<label>Disable Price Filter</label>
				<input type="checkbox" value="Y" id="price_checkbox" />
			</div>
			<div id="price_slider"></div>
			<input type="text" name="price_value" id="price_value" value="50"/>
		
		</div>
		
		<div>
			
			<label style="margin-top: 14px !important;margin-bottom: 0px!important;display: block;">Select A Category</label>
			<select id="category_filter">
				
				<option selected value="0">All Categories</option>
				
				<?
			
					$categories = getCategories();
				
					foreach($categories as $category){
				
						echo '<option value="' . $category[0] . '">' . $category[1] . '</option>';
				
					}
			
				?>
			
			</select>
			
		</div>
	
	</div>
	
	<p>Use our MAU filter to sort the products to find exactly what you need! Simply slide the sliders to the desired value.</p>
	
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
	
		$("#rating_slider").slider();
		$("#popularity_slider").slider();
		$("#price_slider").slider();
	
		$( "#rating_slider" ).slider("value", 50);
		$( "#popularity_slider" ).slider("value", 50);
		$( "#price_slider" ).slider("value", 50);
	
		updateProducts(50,50,50,0);
	
		$('#category_filter').change(function(e){
			updateProducts($('#rating_value').val(), $('#popularity_value').val(), $('#price_value').val(), $(this).val());
		});
	
		$('#rating_slider').slider({
			change: function(event, ui){
				$('#rating_value').val(ui.value);
				updateProducts(ui.value, $('#popularity_value').val(), $('#price_value').val(), $('#category_filter').val());
			} 
		})
		
		$('#popularity_slider').slider({
			change: function(event, ui){ 
				$('#popularity_value').val(ui.value);
				updateProducts($('#rating_value').val(), ui.value, $('#price_value').val(), $('#category_filter').val());
			}
		})
		
		$('#price_slider').slider({
			change: function(event, ui){ 
				$('#price_value').val(ui.value);
				updateProducts($('#rating_value').val(), $('#popularity_value').val(), ui.value, $('#category_filter').val());
			} 
		})
		
		$('#rating_value').keydown(function(){
			$( "#rating_slider" ).slider("value", $(this).val());
		});
		
		$('#popularity_value').keydown(function(){
			$( "#popularity_slider" ).slider("value", $(this).val());
		});

		$('#price_value').keydown(function(){
			$( "#price_slider" ).slider("value", $(this).val());
		});
		
		$('#rating_value').keyup(function(){
			$( "#rating_slider" ).slider("value", $(this).val());
		});
		
		$('#popularity_value').keyup(function(){
			$( "#popularity_slider" ).slider("value", $(this).val());
		});

		$('#price_value').keyup(function(){
			$( "#price_slider" ).slider("value", $(this).val());
		});
		
		
		function updateProducts(rating, popularity, price, category){
		
			if($('#rating_checkbox').is(":checked")){
				rating = 'D';
			}
			
			if($('#popularity_checkbox').is(":checked")){
				popularity = 'D';
			}
			
			if($('#price_checkbox').is(":checked")){
				price = 'D';
			}
			
			$.ajax({
				
				method: "POST",
				url: "ajax.php",
				data: { rating: rating, popularity: popularity, price: price, category: category }
			
			}).done(function(response){
				
				$('#products_box').html(response);
			
			});
		
		}
		
	});

</script>