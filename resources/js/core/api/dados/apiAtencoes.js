import Api from '@api/api'

class ApiAtencoes extends Api {
    
    constructor(host) {
        super(host)
    }

    buscar () {
        return this.get('atencoes')
    }

}

const apiAtencoes = new ApiAtencoes('/api/v1/dado/')
export default apiAtencoes