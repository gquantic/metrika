class Metrika {
    constructor(id) {
        this.project = id;

        if (this.checkIsAlreadyIsset()) {
            this.send();
            document.cookie = "user=John";
        } else {
            console.log('Already active');
        }
    }

    send = () => {
        let post = JSON.stringify({
            project: this.project
        });

        let xhr = new XMLHttpRequest();

        xhr.open('POST', 'https://cygreat.ru/api/visitors/', true);
        xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
        xhr.send(post);

        xhr.onload = function () {
            if(xhr.status === 200 || xhr.status === 201) {
                console.log("Post successfully created!");
                document.cookie = "a_metrika_already=true";
            } else {
                console.log('try again :(');
                console.log(xhr.response);
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
