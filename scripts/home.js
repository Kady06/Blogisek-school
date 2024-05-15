document.querySelector("#categorySelect").addEventListener("change", function() {
    if (this.value !== "all") {
        window.location.href = "/home/category/" + this.value;
    } else {
        window.location.href = "/";
    }
});