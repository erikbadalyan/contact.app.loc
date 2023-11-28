window.addEventListener("DOMContentLoaded", () => {
    let url = location.href
    if (url.split("?")[1] != undefined && url.split("?")[1].split("=")[1] === "") {
        location.href = location.href.split("?")[0];
    }
});
