/**
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Classes
 */
class Something {

    constructor(element) {

        // Note that the listeners in this case are `this`, not this.handleEvent
        element.body.addEventListener("click", this, false);
        element.body.addEventListener("dblclick", this, false);
        element.getElementById("myBtn").onclick = function () {
            console.log('myBtn')
        };
    }

    getDate(ev) {
        let queryString = window.location.search;
        console.log(queryString);
        console.log(ev)
        return new Date();
    }

    handleEvent(event) {
        console.log(this.getDate(event)); // 'Something Good', as this is bound to newly created object
        switch (event.type) {
            case "click":
                // some code here…
                break;
            case "dblclick":
                // some code here…
                break;
        }
    }
}

const s = new Something(document);