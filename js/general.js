jQuery.getJSON("json/general.json", function (data) {
    print(data);
});

function print(data) {
    var header = document.getElementById("header");
    header.setAttribute("class", data.header.class);
    header.innerHTML = data.header.content;

    var footer = document.getElementById("footer");
    footer.setAttribute("class", data.footer.class);
    footer.innerHTML = data.footer.content;

    var footer = document.getElementById("asideJS");
    footer.innerHTML = data.aside.content;
}