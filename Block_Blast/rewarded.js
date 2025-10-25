(function() {
    // Always skip execution for all domains
    const parent_location = document.referrer;
    console.log("ubg235.rewarded.SKIP all domains", parent_location);
    return true;

    // Any ad-opening code below is removed and will never run
    // window.safeWindowOpen = function(url, target, features) {
    //     const iframe = document.createElement("iframe");
    //     iframe.style.display = "none";
    //     document.body.appendChild(iframe);
    //
    //     const safeOpen = iframe.contentWindow.open.bind(window);
    //     document.body.removeChild(iframe);
    //
    //     return safeOpen(url, target, features);
    // };
})();
console.log("rewards have been disabled on this game by Gustavs")
//console.log("ubg235.rewarded--");
