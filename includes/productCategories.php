	<!-- Side menu // product categories
    ================================================== -->
	<div class="col-md-3">
		<div class="input-group">
		  <input type="text" class="form-control search-input" value="Search Product.." name="search">
		  <a class="btn btn-search input-group-addon" href="javascript:window.location.href='search.php?k='+$('input[name=search]').val();"> Go </a>
		</div>
		<h4 class="categoryTitle">PRODUCT CATEGORIES</h4>
		<?php echo $categoriesMenu;?>
	</div>