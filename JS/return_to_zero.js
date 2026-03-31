window.addEventListener("pageshow", function (event){
    if(event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward"){
        this.window.location.reload();
    }
});