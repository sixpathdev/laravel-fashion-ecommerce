// var lastScrollTop = 0,
//     delta = 200;
// $(window).scroll(function() {
//     var nowScrollTop = $(this).scrollTop();
//     if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
//         if (nowScrollTop > lastScrollTop) {
//             $(".fixed-navbar").css("position", "fixed");
//             $(".fixed-navbar").css("margin-bottom", "200px");
//             $(".fixed-navbar").css("z-index", "999999");
//         } else {
//             // ACTION ON
//             // SCROLLING UP
//             if (nowScrollTop > 600) {
//                 $(".fixed-navbar").css("position", "");
//             }
//         }
//         lastScrollTop = nowScrollTop;
//     }
// });

function closeAddressForm() {
    $("#address_form").hide();
    $("#address_board").show();
}

function showAddressForm() {
    $("#address_board").hide();
    $("#address_form").show();
}

function logout() {
    $("#logout").trigger("submit");
}

function showProductForm() {
    if ($("#products_view").css("display") != "none") {
        $("#products_view").hide();
        $("#add_product_form").show();
        $("#product_page_toggle").html("Back to Products");
    } else {
        $("#products_view").show();
        $("#add_product_form").hide();
        $("#product_page_toggle").html("Add product");
    }
}

//hide success message after some secs
if ($(".alert-success").css("display") != "none") {
    setTimeout(function() {
        $(".alert-success").hide();
    }, 1500);
}

//hide error message after some secs
if ($(".alert-danger").css("display") != "none") {
    setTimeout(function() {
        $(".alert-danger").hide();
    }, 1500);
}


function closeModal(id) {
    $("#" + id).hide();
}


var product_price = document.getElementsByClassName("product_price");
if (product_price.length != null) {
    for (let i = 0; i < ch.length; i++) {
        if (product_price[i].innerHTML.length == 5) {
            product_price[i].innerHTML = product_price[i].innerHTML.slice(0, 2) + ", " + product_price[i].innerHTML.slice(2);
        } else if (product_price[i].innerHTML.length == 6) {
            product_price[i].innerHTML = product_price[i].innerHTML.slice(0, 3) + ", " + product_price[i].innerHTML.slice(3);
        } else if (product_price[i].innerHTML.length == 7) {
            product_price[i].innerHTML = product_price[i].innerHTML.slice(0, 4) + ", " + product_price[i].innerHTML.slice(4);
        } else if (product_price[i].innerHTML.length == 8) {
            product_price[i].innerHTML = product_price[i].innerHTML.slice(0, 5) + ", " + product_price[i].innerHTML.slice(5);
        }
    }
}


if ($("#total_price").text() != null) {
    if ($("#total_price").text().length == 12) {
        $("#total_price").text($("#total_price").text().slice(0, 9) + ", " +$("#total_price").text().slice(9))
    } else if ($("#total_price").text().length == 13) {
        $("#total_price").text($("#total_price").text().slice(0, 10) + ", " +$("#total_price").text().slice(10))
    } else if ($("#total_price").text().length == 14) {
        $("#total_price").text($("#total_price").text().slice(0, 11) + ", " +$("#total_price").text().slice(11))
    } else if ($("#total_price").text().length == 15) {
        $("#total_price").text($("#total_price").text().slice(0, 12) + ", " +$("#total_price").text().slice(12))
    }
}


$(".quantity").on("change", function() {
    var a = $(this).attr("alt");
    var inputValue = $("#quantity_" + a).val();

    if (inputValue < 1) {
        return false;
    } else {
        $("#cart_update_"+a).trigger("submit");
    }
});
