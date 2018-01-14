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

function ajaxData(url, data, callback) {
    addr = location.href.substring(0, location.href.indexOf('/', 8));
    var xhr = new XMLHttpRequest();
    addr += url;
    xhr.open("POST", addr, true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(JSON.parse(xhr.responseText));
        }
    };
    var datas = JSON.stringify(data);
    xhr.send(datas);
}

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

function showAlert(type, msg) {
    strong = (type === "success") ? "Success!" : "Error!";
    alert = '<div class="alert '+ type + '" onclick="this.style.display=\'none\';">'
        + '<strong>' + strong + '</strong> ' + msg
        + '</div>';
    document.getElementById("alertDatas").innerHTML += alert;
    window.setTimeout( function () {
        document.getElementById("alertDatas").firstElementChild.remove();
    }, 4000);
}

function clickAddNewCoin() {
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
                }, 2000);
            }
            else
                showAlert("error", r);

        });
    });
}
