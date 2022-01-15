const { Router } = require('express'); //Que usaremos la funcion Router, del paquete express
const router = Router(); //Creamos un router

const { create_institution, update_institution, get_institutions, get_institution, delete_institution } = require('../controllers/institution_controller');

router.post('/institution', create_institution); //Al hacer un get en esta ubicacion se ejecuta el metodo login
router.put('/institution', update_institution);
router.get('/institutions', get_institutions);
router.get('/institution', get_institution);
router.delete('/institution', delete_institution);

module.exports = router;