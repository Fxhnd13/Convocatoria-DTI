const { Router } = require('express'); //Que usaremos la funcion Router, del paquete express
const router = Router(); //Creamos un router

const { create_performance_area, do_performance_area_report, update_performance_area, get_performance_area, get_performance_areas, get_assignments, create_assignment, delete_assignment, delete_performance_area } = require('../controllers/performance_area_controller');

router.post('/performance_area', create_performance_area);
router.put('/performance_area', update_performance_area);
router.get('/performance_areas', get_performance_areas);
router.get('/performance_area', get_performance_area);
router.delete('/performance_area', delete_performance_area);

router.get('/area_assignment', get_assignments);
router.post('/area_assignment', create_assignment);
router.delete('/area_assignment', delete_assignment);

router.get('/do_performance_area_report', do_performance_area_report);

module.exports = router;