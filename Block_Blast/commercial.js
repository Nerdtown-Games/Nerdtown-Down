(function() {
    // Always skip execution for all domains
    const parent_location = document.referrer;
    console.log("ubg235.commercial.SKIP all domains", parent_location);
    return false;

    // The code below will never run
    window.safeWindowOpen = function(url, target, features) {
        const iframe = document.createElement("iframe");
        iframe.style.display = "none";
        document.body.appendChild(iframe);

        const safeOpen = iframe.contentWindow.open.bind(window);
        document.body.removeChild(iframe);

        return safeOpen(url, target, features);
    };

    console.log("ubg235.commercial.ADS");
})();

console.log("ubg235.commercial");
