$(document).ready(function(){
    $('.add-to-cart-form').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var size = form.find('select[name="item_size"]').val();  // Получаем значение выбранного размера
        if (size === 'Размер не выбран') {
            alert('Пожалуйста, выберите размер товара');  // Выводим сообщение об ошибке
        } else {
            var formData = form.serialize();
            $.ajax({
                type: 'POST',
                url: 'php/add_to_cart.php',
                data: formData,
                dataType: 'json'
            });
        }
    });
});


function handleClick(button) {
    button.value = 'Добавлено';
    setTimeout(function() {
        button.value = 'Добавить в корзину';
    }, 1000);
}

function validateForm(event) {
    var fullName = document.getElementById("full-name").value;
    var deliveryAddress = document.getElementById("delivery-address").value;
    var email = document.getElementById("email").value;

    if (fullName == "" || deliveryAddress == "" || email == "") {
        if (fullName == "") {
            alert("Пожалуйста, введите ФИО");
            return false
        }
        if (deliveryAddress == "") {
            alert("Пожалуйста, введите адрес доставки");
            return false
        }
        if (email == "") {
            alert("Пожалуйста, введите адрес электронной почты");
            return false
        }
    } else {
        alert("Ваш заказ оформлен. Спасибо, что обратились в наш магазин!");
        return true
    }
}


