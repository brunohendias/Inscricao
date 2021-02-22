import Api from '@api/api'

class ApiInscricao extends Api {
    constructor(host) {
        super(host)
    }

    inscrever(body) {
        return this.post('inscricao', body);
    }
}

const apiInscricao = new ApiInscricao('/api/v1/')
export default apiInscricao