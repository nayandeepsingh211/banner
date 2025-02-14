(function() {
    var script = document.currentScript;
    var bannerId = script.getAttribute('data-id');
    var apiUrl = "http://localhost:8080/api/banners/" + bannerId;
    //alert(apiUrl);
    fetch(apiUrl)
      .then(response => response.json())
      .then(data => {
            var banner = document.createElement("div");
            banner.innerHTML = `
                <a href="${data.link}" target="_blank">
                    <img src="${data.image_url}" alt="${data.alt_text}" width="${data.width}" height="${data.height}" />
                </a>
            `;

            // Apply position styles
            banner.style.position = "fixed";
            banner.style.zIndex = "9999";

            if (data.position === "left") {
                banner.style.left = "10px";
                banner.style.top = "10%";
                banner.style.transform = "translateY(-50%)";
            } else if (data.position === "right") {
                banner.style.right = "10px";
                banner.style.top = "10%";
                banner.style.transform = "translateY(-50%)";
            } else if (data.position === "bottom") {
                banner.style.left = "10%";
                banner.style.bottom = "10px";
                banner.style.transform = "translateX(-50%)";
            }

            document.body.appendChild(banner);
        })
      .catch(error => console.error('Error:', error));
})();
