const {Performance_Area} = require('../models/performance_area');
const {Area_Assignement} = require('../models/area_assignment');

const get_performance_areas = async (req, res) => { 
    Performance_Area.findAll({raw: true}).then(areas=>{
        res.status(200).json(areas);
    })
};

const create_performance_area = async (req, res) => {
    Performance_Area.create({
        performance_area: req.body.area
    }).then(()=>{
        res.status(200).json({information_message: 'Se ha creado el area de desempeño correctamente'});
    });
};

const update_performance_area = async (req, res) => { 
    Performance_Area.update({
        performance_area: req.body.area
    },{
        where: {
            id_area: req.body.id_area
        }
    }).then(()=>{
        res.status(200).json({information_message: 'Se ha modificado correctamente el area de desempeño.'});
    });
};

const delete_performance_area = async (req, res) => {
    Performance_Area.destroy({where: req.body.id_area}).then(()=>{
        res.status(200).json({information_message: 'Se ha eliminado el area de desempeño correctamente'});
    });
};

//---------------------------------------------------------------------------------------------------------

const get_assignments = async (req, res) => {
    const session = jwt.decode(req.headers.token);
    if(session == null){
        res.status(403).json({information_message: 'No puede realizar esta acción si no se encuentra logeado'});
    }else{
        Area_Assignement.findAll({where: {cui: session.cui},raw: true}).then(assignments=>{
            res.status(200).json(assignments);
        })
    }
};

const create_assignment = async (req, res) => {
    const session = jwt.decode(req.headers.token);
    if(session == null){
        res.status(403).json({information_message: 'No puede realizar esta acción si no se encuentra logeado'});
    }else{
        Area_Assignement.create({
            cui: session.cui,
            performance_area: req.body.id_area
        }).then(()=>{
            res.status(200).json({information_message: 'Se ha asignado correctamente el area de desempeño'});
        });
    }
};

const delete_assignment = async (req, res) => {
    const session = jwt.decode(req.headers.token);
    if(session == null) {
        res.status(403).json({information_message: 'Necesita estar logeado para realizar esta acción.'});
    }else{
        Area_Assignment.findOne({where: {id_assignment: req.body.id_assignment}}).then(area_assignment=>{
           if(area_assignment.cui == session.cui) {
               area_assignment.destroy();
               res.status(200).json({information_message: 'Se ha eliminado el area de desempeño de su perfil'});
           }else{
               res.status(403).json({information_message: 'No tiene permiso para realizar esta acción'});
           }
        })
    }
};

module.exports = {
    get_performance_areas,
    create_performance_area,
    update_performance_area,
    delete_performance_area,
    get_assignments,
    create_assignment,
    delete_assignment
}