class Metrika {
    constructor(id) {
        this.project = id;

        if (this.checkIsAlreadyIsset()) {
            this.send();

        } else {
            console.log('Already active');
        }
    }

    send = () => {
        let post = JSON.stringify({
            project: this.project
        });

        let xhr = new XMLHttpRequest();

        xhr.open('POST', 'http://127.0.0.1/api/visitors/', true);
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send(post);

        xhr.onload = function () {
            console.log(xhr.response);
            if(xhr.status === 201) {
                console.log("Post successfully created!")
            } else {
                console.log('try again :(');
            }
        }
    }

    checkIsAlreadyIsset = () => {
        let isset = this.getCookie('a_metrika_already');
        return isset === undefined;
    }

    getCookie = (name) => {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
}
