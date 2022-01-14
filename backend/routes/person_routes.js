const { Router } = require('express'); //Que usaremos la funcion Router, del paquete express
const router = Router(); //Creamos un router

const {create_person, get_person, get_all_people, update_person, delete_person} = require('../controllers/person_controller');

router.get('/person',get_person);
router.get('/people', get_all_people);
router.post('/person', create_person); //Al hacer un get en esta ubicacion se ejecuta el metodo login
router.put('/person', update_person);
router.delete('/person', delete_person);


module.exports = router;