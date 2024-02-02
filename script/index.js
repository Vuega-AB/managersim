// Open panels
const button_to_open_ids = ["more_information"];

button_to_open_ids.forEach(e => {
    const panel_id = e + "_panel";
    if(document.getElementById(e)) {
        document.getElementById(e).addEventListener("click", () => {
            if(document.getElementById(panel_id)){
                document.getElementById(panel_id).style.display = "flex";
            }
        })

    //     Add event listener for close panel
        const close_button = e + "_close";
        if(document.getElementById(close_button)){
            document.getElementById(close_button).addEventListener("click", () => {
                if(document.getElementById(panel_id)){
                    document.getElementById(panel_id).style.display = "none";
                }
            })
        }
    }
})