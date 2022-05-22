let cates = document.querySelectorAll('.category__link')

let cateCurrent = cates[0]
cateCurrent.classList.add("category__link-active")

let sort = document.querySelector('.sort_product')
sort.addEventListener('click', function() {
	filter();
})

let searchBtn = document.querySelector('.btn-search-product');
searchBtn.addEventListener('click', function() {
	filter();
})

let searchValue ='';
$(document).ready(function() {
		$("#search_product").keyup(function(){
			 searchValue = $(this).val();
		});
	});

// console.log(cateCurrent)


for (let cate of cates) {
	cate.addEventListener('click', function() {
		cate.classList.add("category__link-active")
		cateCurrent.classList.remove("category__link-active")
		cateCurrent = cate
		filter();
	})	
}

var productBtnOrders = document.querySelectorAll('.body__product-btn-order');
var overlayOrders = document.querySelectorAll('.modal__overlay');
var modalOrders = document.querySelectorAll('.modal');

console.log(productBtnOrders.length)

var btnCloses = document.querySelectorAll('.product__order-info-icon');

if(productBtnOrders) {
	for (var i = 0; i < productBtnOrders.length; i++ ) (function(i){ 
		productBtnOrders[i].onclick = function() {
			// console.log(productBtnOrders[i].getAttribute('stt'))
			overlayOrders[productBtnOrders[i].getAttribute('stt') - 1].style.display = 'block';
			modalOrders[productBtnOrders[i].getAttribute('stt') - 1].style.display = 'block';
		}
	})(i);
}

if (overlayOrders) {
	for (var i = 0; i < overlayOrders.length; i++ ) (function(i) {
		overlayOrders[i].onclick = function() {
			overlayOrders[i].style.display = 'none';
			modalOrders[i].style.display = 'none';
		}
	})(i);
}

if (btnCloses) {
	for (var i = 0; i < btnCloses.length; i++ ) (function(i) {
		btnCloses[i].onclick = function() {
			overlayOrders[i].style.display = 'none';
			modalOrders[i].style.display = 'none';
		}
	})(i);
}

function filter() {
	var sort_product = $('.sort_product option:selected').val();
	var id_category = cateCurrent.getAttribute('cate');
	var search = searchValue;
	
	$.ajax({
		url : "ajax/filter.php",
		type : "post",
		data : {
			'id_category' : cateCurrent.getAttribute('cate'),
			'search':  searchValue,
			'sort_product' :  $('.sort_product option:selected').val(),
		},
		dataType : 'text',
		success: function(result){
			$('.products').html(result)
			var productBtnOrders = document.querySelectorAll('.body__product-btn-order');
			var overlayOrders = document.querySelectorAll('.modal__overlay');
			var modalOrders = document.querySelectorAll('.modal');

			console.log(productBtnOrders.length)

			var btnCloses = document.querySelectorAll('.product__order-info-icon');

			if(productBtnOrders) {
				for (var i = 0; i < productBtnOrders.length; i++ ) (function(i){ 
					productBtnOrders[i].onclick = function() {
						// console.log(productBtnOrders[i].getAttribute('stt'))
						overlayOrders[productBtnOrders[i].getAttribute('stt') - 1].style.display = 'block';
						modalOrders[productBtnOrders[i].getAttribute('stt') - 1].style.display = 'block';
					}
				})(i);
			}

			if (overlayOrders) {
				for (var i = 0; i < overlayOrders.length; i++ ) (function(i) {
					overlayOrders[i].onclick = function() {
						overlayOrders[i].style.display = 'none';
						modalOrders[i].style.display = 'none';
					}
				})(i);
			}

			if (btnCloses) {
				for (var i = 0; i < btnCloses.length; i++ ) (function(i) {
					btnCloses[i].onclick = function() {
						overlayOrders[i].style.display = 'none';
						modalOrders[i].style.display = 'none';
					}
				})(i);
			}
			// window.location.reload(true);
		},
		error : function(result) {
			alert("thất bại");      
		}
	})
}