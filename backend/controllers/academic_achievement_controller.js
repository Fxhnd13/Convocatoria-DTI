const {Academic_Achievement} = require('../models/academic_achievement');
const jwt = require('jsonwebtoken');

const get_academic_achievements_by_person = async (req, res) => { 
    const session = jwt.decode(req.headers.token);
    if(session == null){
        res.status(403).json({information_message: 'No puede realizar esta acción si no se encuentra logeado'});
    }else{
        Academic_Achievement.findAll({where: {cui: session.cui}, raw: true}).then(achievements=>{
            res.status(200).json(achievements);
        })
    }
};

const create_academic_achievement = async (req, res) => {
    const session = jwt.decode(req.headers.token);
    if(session == null){
        res.status(403).json({information_message: 'No puede realizar esta acción si no se encuentra logeado'});
    }else{
        Academic_Achievement.create({
            year: req.body.year,
            tittle: req.body.tittle,
            cui: session.cui,
            id_institution: req.body.id_institution
        }).then(()=>{
            res.status(200).json({information_message: 'Se ha asignado correctamente el logro academico'});
        });
    }
};

const update_academic_achievement = async (req, res) => { 
    const session = jwt.decode(req.headers.token);
    if(session == null) {
        res.status(403).json({information_message: 'Necesita estar logeado para realizar esta acción.'});
    }else{
        Academic_Achievement.findOne({where: {id_achievement: req.body.id_achievement}}).then(achievement=>{
           if(achievement.cui == session.cui) {
               achievement.update({
                    year: req.body.year,
                    tittle: req.body.tittle,
                    id_institution: req.body.id_institution
               });
               res.status(200).json({information_message: 'Se ha eliminado el logro academico de su perfil'});
           }else{
               res.status(403).json({information_message: 'No tiene permiso para realizar esta acción'});
           }
        })
    }
};

const delete_academic_achievement = async (req, res) => {
    const session = jwt.decode(req.headers.token);
    if(session == null) {
        res.status(403).json({information_message: 'Necesita estar logeado para realizar esta acción.'});
    }else{
        Academic_Achievement.findOne({where: {id_achievement: req.body.id_achievement}}).then(achievement=>{
           if(achievement.cui == session.cui) {
               achievement.destroy();
               res.status(200).json({information_message: 'Se ha eliminado el logro academico de su perfil'});
           }else{
               res.status(403).json({information_message: 'No tiene permiso para realizar esta acción'});
           }
        })
    }
};

module.exports = {
    get_academic_achievements_by_person,
    update_academic_achievement,
    delete_academic_achievement,
    create_academic_achievement
}