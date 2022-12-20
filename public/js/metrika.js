function uuidv4() {
    return ([1e7]+-1e3+-4e3+-8e3+-1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
}

function getUniqueId() {
    let uniqueId = localStorage.getItem('uniqueId');

    if(!uniqueId || uniqueId === null) {
        uniqueId = uuidv4();
        localStorage.setItem('uniqueId', uniqueId);
    }

    return uniqueId;
}

document.addEventListener('DOMContentLoaded', () => {
    fetch(`https://cygreat.ru/api/visitors`, {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            uuid: getUniqueId(),
            project: window.location.host
        })
    }).then(res => {
        console.trace(res);
    }).catch(e => {
        console.trace(e);
    });
});
