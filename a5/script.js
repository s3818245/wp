document.querySelectorAll(".category").forEach(
    item => {
        item.addEventListener("click", function () {
            var filter = this.value
            document.querySelectorAll(".card ").forEach(item => {
                if (item.className != ("card " + filter)) {
                    item.setAttribute("hidden", true)
                }
            }
            )
        })
    }
)