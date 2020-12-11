document.getElementById('web-share-button').addEventListener("click", async () => {
    try {
            await navigator.share({ title: document.title, url: window.location.href });
            console.log("Data was shared successfully");
            } catch (err) {
                console.error("Share failed:", err.message);
            }
        });