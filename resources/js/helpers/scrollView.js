export default (id, behavior = 'smooth') => {
    document.getElementById(id).scrollIntoView({ behavior });
};