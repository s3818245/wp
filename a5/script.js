document.querySelectorAll(".category").forEach(
    item => {
        item.addEventListener("click", function () {
            var filter = this.value
            if (filter != "") {
                document.querySelectorAll(".card ").forEach(item => {
                    item.removeAttribute("hidden")
                    if (item.className != ("card " + filter)) {
                        item.setAttribute("hidden", true)
                    }
                }
                )
            }
            else {
                document.querySelectorAll(".card ").forEach(item => {
                    item.removeAttribute("hidden")
                }
                )
            }
        })
    }
)
