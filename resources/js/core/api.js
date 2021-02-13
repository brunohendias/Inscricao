import axios from 'axios'

export default class Api {
    constructor (host) {
        this._host = host
    }

    submit (method, url, data = null, params = null) {

        url = this._host + url
        return new Promise((resolve, reject) => {
            axios({ method, url, params, data })
            .then( response => resolve(response) )
            .catch( error => reject(error) )
        })

    }

    get (url, params) {
        return this.submit('get', url, null, params)
    }

    post (url, data) {
        return this.submit('post', url, data)
    }

    put (url, data) {
        return this.submit('put', url, data)
    }

    patch (url, data) {
        return this.submit('get', url, data)
    }

    delete (url) {
        return this.submit('delete', url)
    }
}