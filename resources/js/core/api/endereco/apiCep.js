import Api from '@api/api'
import env from '../../env.js'

class ApiCep extends Api{
    
    constructor(host) {
        super(host)
    }

    buscar (cep) {
        return this.post('cep/' + cep, env.variaveis.paramsCep);
    }

}

const apiCep = new ApiCep(env.links.api_cep)
export default apiCep