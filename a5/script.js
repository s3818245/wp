document.querySelectorAll(".category").forEach(
    item => {
        item.addEventListener("click", function () {
            var filter = this.value
            if (filter != "") {
                document.querySelectorAll(".item ").forEach(item => {
                    item.removeAttribute("hidden")
                    if (item.className != ("item " + filter + " col py-2")) {
                        item.setAttribute("hidden", true)
                    }
                }
                )
            }
            else {
                document.querySelectorAll(".item ").forEach(item => {
                    item.removeAttribute("hidden")
                }
                )
            }
        })
    }
)
