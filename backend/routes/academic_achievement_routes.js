const { Router } = require('express'); //Que usaremos la funcion Router, del paquete express
const router = Router(); //Creamos un router

const { create_academic_achievement, update_academic_achievement, get_academic_achievements_by_person, delete_academic_achievement } = require('../controllers/academic_achievement_controller');

router.post('/academic_achievement', create_academic_achievement);
router.put('/academic_achievement', update_academic_achievement);
router.get('/academic_achievement', get_academic_achievements_by_person);
router.delete('/academic_achievement', delete_academic_achievement);

module.exports = router;