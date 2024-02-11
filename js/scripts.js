$(document).ready(function(){
    $('.add-to-cart-form').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: '../tes/add_to_cart.php',
            data: formData,
            dataType: 'json',
            success: function(response){
                alert(response.message); // Оповещение об успешном добавлении товара в корзину
            }
        });
    });
});

$('.view-cart-button').click(function(){
    window.location.href = 'view_cart.php'; // Переход на страницу отображения корзины
});