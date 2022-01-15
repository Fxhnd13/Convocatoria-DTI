const { Router } = require('express'); //Que usaremos la funcion Router, del paquete express
const router = Router(); //Creamos un router

const {Academic_Achievement} = require('../models/academic_achievement');
const {Person} = require('../models/person');
const {Performance_Area} = require('../models/performance_area');
const {Institution} = require('../models/institution');
const {Area_Assignment} = require('../models/area_assignment');

router.post('/do_db', async (req, res) => {
    await Person.sync({force: true});
    await Institution.sync({force: true});
    await Academic_Achievement.sync({force: true});
    await Performance_Area.sync({force: true});
    await Area_Assignment.sync({force: true});
}); //Al hacer un get en esta ubicacion se ejecuta el metodo login

module.exports = router;