// function addCart(id_product, num_modal) {
//     var num = document.querySelectorAll('.product__order-number-item-center');
//     var size = document.querySelectorAll('.btn--primary.btn--size-s');
//     var priceTotal = document.querySelectorAll('.product__order-sum-price-total');
//     console.log(size[num_modal].innerText);
//     $.ajax({
//         url : "ajax/add.php",
// 		type : "post",
//         data : {
//             'id_product' : id_product,
//             'num' : parseInt(num[num_modal].innerText),
//             'size' : size[num_modal].innerText,
//             'priceTotal' : parseInt(priceTotal[num_modal].innerText) * 1000
//         },
//         dataType : 'text',
//         success: function(result){
//             alert(result);
//         },
//         error : function(result) {
//             alert("thất bại");      
//         }
//     })
// }