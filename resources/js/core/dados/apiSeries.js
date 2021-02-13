import Api from '../api'

class ApiSerie extends Api {
    constructor(host) {
        super(host)
    }

    buscar () {
        return this.get('series');
    }
}

const apiSerie = new ApiSerie('/api/v1/dado/')
export default apiSerie