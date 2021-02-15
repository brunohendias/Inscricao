export default (obj, msgs = {}) => {
    let keys = []
    let value, key
    for (key in obj) {
        value = obj[key]
        if (value === null) {
            msgs[key] = true
            keys.push(key)
        } else {
            msgs[key] = false
        }
    }

    return keys
};