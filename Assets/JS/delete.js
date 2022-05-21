function deleteOrder(id_order) {
    console.log(id_order);
    $.ajax({
        url : "ajax/delete_order.php",
		type : "post",
        data : {
            'id_order' : id_order,   
        },
        dataType : 'text',
        success: function(result){
            alert(result);
            // window.location.reload(true);
        },
        error : function(result) {
            alert("thất bại");      
        }
    })
}

// shake

// btnCart__animation = document.querySelector('.header__cart--animation');

// setInterval(function() {
//     btnCart__animation.classList.add('shake');
//     setTimeout(function() {
//         btnCart__animation.classList.remove('shake');
//     }, 500)
// }, 2000)


// log out

function logout() {
	$.ajax({
		url : 'ajax/logout.php',
		type : 'post',
		success : function (result) {
			window.location = "index.php?controller=start";
		}
	})
}