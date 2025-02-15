document.addEventListener("DOMContentLoaded", function () {
    var apiUrl = "http://localhost:8080/api/banners";
    
    fetch(apiUrl)
        .then((response) => response.json())
        .then((banners) => {
            var script = document.querySelector('script[src*="banner.js"]');
            var customWidth = script.getAttribute("data-width") || null;
            var customHeight = script.getAttribute("data-height") || null;
            var customPosition = script.getAttribute("data-position");
            var bannerContainer = document.getElementById("bannerContainer");
            var check = document.getElementById("bannerContainer");
            //alert(bannerContainer);
            if(bannerContainer==null){
                //alert(bannerContainer);
                //alert();
                bannerContainer = document.createElement("div");
            }
            
            bannerContainer.style.display = "flex";  // Ensures horizontal alignment
            bannerContainer.style.justifyContent = "center"; // Center align banners
            bannerContainer.style.width = "100%";
            //bannerContainer.style.height = "25%";
            bannerContainer.style.marginTop = "10px"; // Adjust spacing

            banners.forEach((data) => {
                var banner = document.createElement("div");
                banner.style.margin = "0 10px"; // Space between banners

                banner.innerHTML = `
                    <a href="${data.link}" target="_blank">
                        <img src="${data.image_url}" alt="${data.alt_text}" width="${customWidth?customWidth:data.width}" height="${customHeight?customHeight:data.height}" />
                    </a>
                `;
                //else{
                bannerContainer.appendChild(banner);

                //}
            });
            if(check==null){
                //alert();
                document.body.prepend(bannerContainer);
            }
            // Append the banner container to the body or a specific section
            //document.body.prepend(bannerContainer);
        })
        .catch((error) => console.error("Error loading banners:", error));
});
