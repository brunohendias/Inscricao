import Api from '../api'

class ApiEnderecoInsc extends Api {
    constructor(host) {
        super(host)
    }

    buscar () {
        return this.get('enderecoinsc');
    }

    cadastrar (body) {
        return this.post('enderecoinsc', body);
    }

}

const apiEnderecoInsc = new ApiEnderecoInsc('/api/v1/')
export default apiEnderecoInsc