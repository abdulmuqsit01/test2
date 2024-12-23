confirmDeleteButton.addEventListener("click", async () => {
    const csrf = document.querySelector(
        "input[type=hidden][name=_token]"
    ).value;
    const form = new URLSearchParams();
    form.append("_token", csrf);
    const route = new URL(openDeleteAlertButton.dataset.route);
    const res = await fetch(route, {
        method: "DELETE",
        credentials: "same-origin",
        redirect: "manual",
        body: form,
    });
    if (res.ok || res.status == 302 || res.type == "opaqueredirect") {
        window.location.href = openDeleteAlertButton.dataset.redirect;
    } else {
        console.log("Failed to delete", res);
    }
});
