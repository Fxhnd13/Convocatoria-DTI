const { Router } = require('express'); //Que usaremos la funcion Router, del paquete express
const router = Router(); //Creamos un router

const { login } = require("../controllers/auth_controller");

router.post('/login', login); //Al hacer un get en esta ubicacion se ejecuta el metodo login

module.exports = router;