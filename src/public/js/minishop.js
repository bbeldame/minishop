/*****************************************
 * SELECT MULTIPLE PARSER
 */

function getSelectValues(select) {
    var result = [];
    var options = select && select.options;
    var opt;

    for (var i=0, iLen=options.length; i<iLen; i++) {
        opt = options[i];

        if (opt.selected) {
            result.push(opt.value || opt.text);
        }
    }
    return result;
}

/*****************************************
 * AJAX
 */

function getCoinViaApi(coin, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://api.coinmarketcap.com/v1/ticker/" + coin + "/", true);
    xhr.send();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(JSON.parse(xhr.responseText)[0]);
        }
        else if (xhr.status === 404 && xhr.readyState === 4){
            showAlert("error", "La coin n'existe pas!")
        }

    };
}

function ajaxData(url, data, callback) {
    addr = location.href.substring(0, location.href.indexOf('/', 8));
    var xhr = new XMLHttpRequest();
    addr += url;
    xhr.open("POST", addr, true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            callback(JSON.parse(xhr.responseText));
        }
    };
    var datas = JSON.stringify(data);
    xhr.send(datas);
}

/*****************************************
 * ALERT CLIENT SIDE
 */

function showAlert(type, msg) {
    strong = (type === "success") ? "Succès !" : "Erreur !";
    alert = '<div class="alert '+ type + '" onclick="this.style.display=\'none\';">'
        + '<strong>' + strong + '</strong> ' + msg
        + '</div>';
    document.getElementById("alertDatas").innerHTML += alert;
    window.setTimeout( function () {
        document.getElementById("alertDatas").firstElementChild.remove();
    }, 4000);
}

/*****************************************
 * COIN EDIT ADD REMOVE
 */

function clickAddCoin() {
    var name = document.getElementById("name").value;
    var categories = getSelectValues(document.getElementById("categories"));
    var stock = document.getElementById("stock").value;
    getCoinViaApi(name, function (e) {
        e.categories = categories;
        e.stock = stock;
        ajaxData("/admin/ajax/coin/add", e, function (r) {
            if (r === "success"){
                showAlert("success", e.name + " a été ajoutée!");
                setTimeout(function () {
                    window.location.reload(1);
                }, 800);
            }
            else
                showAlert("error", r);

        });
    });
}

function clickDeleteCoin(el) {
    id = el.getAttribute("id");
    item = el.parentNode.parentNode.parentNode;
    ajaxData("/admin/ajax/coin/remove", {'id': id}, function (e) {
        if (e === "success") {
            showAlert("success", "La coin a éte éditée");
            setTimeout(function () {
                window.location.reload(1);
            }, 800);
        }
        else
            showAlert("error", e);
    });
}

function clickEditCoin(id) {
    var send = {};
    var stock = document.getElementById("stock").value;
    var categories = getSelectValues(document.getElementById("categories"));
    send.id = id;
    send.stock = stock;
    send.categories = categories;
    ajaxData("/admin/ajax/coin/edit", send, function (e) {
        if (e === "success") {
            showAlert("success", "La coin a éte supprimée!");
            setTimeout(function () {
                window.location.reload(1);
            }, 800);
        }
        else
            showAlert("error", e);
    });
}

/*****************************************
 * CATEGORY EDIT ADD REMOVE
 */

function clickAddCategory() {
    var send = {};
    var name = document.getElementById("name").value;
    send.name = name;
    ajaxData("/admin/ajax/category/add", send, function (e) {
        if (e === "success") {
            showAlert("success", "La catégorie " + name + " a éte crée!");
            setTimeout(function () {
                window.location.reload(1);
            }, 800);
        }
        else
            showAlert("error", e);
    });
}

function clickEditCategory(id) {
    var send = {};
    var name = document.getElementById("name").value;
    send.id = id;
    send.name = name;
    ajaxData("/admin/ajax/category/edit", send, function (e) {
        if (e === "success") {
            showAlert("success", "La catégorie " + name + " a éte éditée!");
            setTimeout(function () {
                window.location.reload(1);
            }, 800);
        }
        else
            showAlert("error", e);
    });
}

function clickRemoveCategory(id) {
    var send = {};
    send.id = id;
    ajaxData("/admin/ajax/category/remove", send, function (e) {
        if (e === "success") {
            showAlert("success", "La catégorie a éte supprimée!");
            setTimeout(function () {
                window.location.reload(1);
            }, 800);
        }
        else
            showAlert("error", e);
    });
}


