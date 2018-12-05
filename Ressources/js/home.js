function setSellChart() {
    var top = parseInt(localStorage.getItem("ChartTop"));
    var bottom = parseInt(localStorage.getItem("CharBottom"));
    var ecart = (top - bottom) / 5;
    
    if (bottom != 0) {
        var element0 = document.getElementById("barChar_0");
        element0.innerHTML = bottom;
    }
    $("#barChar_1").text(String(bottom + ecart));
    //var element1 = document.getElementById("barChar_1");
    //element1.innerHTML = String(bottom + ecart);
    var element2 = document.getElementById("barChar_2");
    element2.innerHTML = bottom + 2*ecart;
    var element3 = document.getElementById("barChar_3");
    element3.innerHTML = bottom + 3*ecart;
    var element4 = document.getElementById("barChar_4");
    element4.innerHTML = bottom + 4*ecart;
    var element5 = document.getElementById("barChar_5");
    element5.innerHTML = top;
}

localStorage.setItem("CharTop", "5000");
localStorage.setItem("CharBottom", "0");

setSellChart();