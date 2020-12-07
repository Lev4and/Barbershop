function onClickExit() {
    const request = getXmlHttp();
    const url = "";
    const params = "action=Выход";

    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.addEventListener("readystatechange", () => {
        if(request.readyState === 4 && request.status === 200){
            console.log(request.responseText)}
    });
    request.send(params);

    window.location = "";
}
