$(document).ready(function() {

	/* получаем Данные в формате json */
	data = {};
    $.getJSON('/calculator5.json', {}, function(json) {
		data = json;
		return false;
    });

    var calculate_price, update_products;
    
	/* обновляем продукты */
    update_products = function(num){
		
		var cid, product, rid;
		var s_region = $('#calc-region_'+num);
		var s_category = $('#calc-category_'+num);
		var s_products = $('#calc-product_'+num);
		var category_name = $('#calc-category-name_'+num);
		var region_name = $('#calc-region-name_'+num);
		
		s_products.parent().children('p').text('Выберите продукт');
		s_products.parent().children('p').css('color','#7f7f7f');
		s_products.val();
		
		cid = s_category.val();
		rid = s_region.val();
		var last_product_id = s_products.val();
		if (cid && rid) {
			s_products.removeAttr("disabled");
			s_products.parent().children('p').removeClass('selecttitle_dis');
			
			category_name.val(data.categories[cid]);
			region_name.val(data.regions[rid]);
			s_products.empty().append('<option value=""></option>');
			if( num == 1){
				var prices = data.call_prices[rid];
			} else {
				var prices = data.test_prices[rid];
			}
			for (product in data.products[cid]) {
				if(prices[product]){
					if(last_product_id == product){
						s_products.append('<option selected="selected" value="' + product + '">' + data.products[cid][product] + '</option>');
					}else{
						s_products.append('<option value="' + product + '">' + data.products[cid][product] + '</option>');
					}
				}
			}
		} else {
			s_products.attr("disabled", "disabled");
			s_products.parent().children('p').addClass('selecttitle_dis');
		}
		$('.undtext'+num).show();
		$('.price'+num).empty().hide();
		return false;
    };
    
	
	/* выбор стоимости товара */
    calculate_price = function(num) {
		var summ, summ2;
		
		var s_region = $('#calc-region_'+num);
		var s_category = $('#calc-category_'+num);
		var s_products = $('#calc-product_'+num);
		var category_name = $('#calc-category-name_'+num);
		var region_name = $('#calc-region-name_'+num);
		var product_name = $('#calc-product-name_'+num);
		var price_input = $('#calc-price_'+num);
		var price_block = $('.price'+num);
		
		var cid = s_category.val();
		var pid = s_products.val();
		var rid = s_region.val();
		if (pid && rid) {
			
			price_block.empty().show();
			$('.undtext'+num).hide();
			
			product_name.val(data.products[cid][pid]);
			if (num === 2) {
				summ = data.test_prices[rid][pid];
			if (summ > 100) {
				price_block.html('<span style="font:18px Arial; font-weight:normal;">Cтоимость тестового периода:</span><br />');
				price_block.text(summ + 'руб.');
				return price_input.val(summ);
			}
			} else if (num === 3) {
				summ2 = data.test_prices[rid][pid];
				if (summ2 > 1000) {
					price_block.append(summ2 + 'руб.');
					return price_input.val("" + summ2);
				}
			} else {
				summ = data.call_prices[rid][pid];
				if (summ > 400) {
					price_block.html('<span style="font:18px Arial; font-weight:normal;">Cтоимость 1 целевого звонка:</span><br />');
					price_block.append(summ + 'руб.');
					return price_input.val(summ);
				}
			}
		} else {
			$('.undtext'+num).show();
			price_block.empty().hide();
			
		}
    };
	
	
	/* select */
	$('.select_main').click(function(){
		var ide = $(this).children('select').attr('id');
		var ide_n = parseInt(ide.replace(/\D+/g,""));
		var name = $('#'+ide+' :selected').html();
		
		var s_region = $('#calc-region_'+ide_n);
		var s_category = $('#calc-category_'+ide_n);
		var s_products = $('#calc-product_'+ide_n);
		
		/* меняем регион */
		s_region.change(function(){
			update_products(ide_n);
		});
		
		
		/* меняем категорию товара */
		s_category.change( function(){
			update_products(ide_n);
		});
		
		/* выбираем товар */
		s_products.change( function(){
			calculate_price(ide_n);
		});
		
		
		$(this).children('p').text(name);
		
		if ($(this).children('select').val() !=''){
			$(this).children('.selecttitle').css('color','#000');
		} else {
			$(this).children('.selecttitle').css('color','#7f7f7f');
		};
	});
	
});