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

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(JSON.parse(xhr.responseText)[0]);
        }
        else if (xhr.readyState === 404)
            callback("error");
    };
    xhr.send();
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

getCoinViaApi("bitcoin", function (e) {
    if (e === "error")
        showAlert("error", "La coin n'existe pas!");
    else
        console.log(e);
});
