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