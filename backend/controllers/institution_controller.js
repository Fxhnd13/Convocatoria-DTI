const {Institution} = require('../models/institution');

const get_institutions = async (req, res) => {
    Institution.findAll({raw: true}).then(institutions=>{
        res.status(200).json(institutions);
    });
};

const create_institution = async (req, res) => {
    Institution.create({
        institution: req.body.institution
    }).then(()=>{
        res.status(200).json({information_message: 'Se ha registrado la institución'});
    });
};

const update_institution = async (req, res) => {
    Institution.update({
        institution: req.body.institution
    },{
        where: {
            id_institution: req.body.id_institution
        }
    }).then(()=>{
        res.status(200).json({information_message: 'Se ha actualizado la institución'});
    });
};

const delete_institution = async (req, res) => {
    Institution.destroy({where: req.body.id_institution}).then(()=>{
        res.status(200).json({information_message: 'Se ha eliminado la institución correctamente'});
    });
};

module.exports = {
    create_institution,
    update_institution,
    get_institutions,
    delete_institution
}