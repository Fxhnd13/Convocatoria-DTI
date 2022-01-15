const {Person} = require('../models/person');
const jwt = require('jsonwebtoken');
const bcrypt = require('bcrypt');
const { Academic_Achievement } = require('../models/academic_achievement');
const { Institution } = require('../models/institution');
const { Performance_Area } = require('../models/performance_area');
const { Area_Assignment } = require('../models/area_assignment');

const BCRYPT_SALT_ROUNDS = 3;

const create_person = async (req, res) => {
    bcrypt.hash(req.body.password,BCRYPT_SALT_ROUNDS).then(hashed_password => {
        Person.create({
            cui: req.body.cui,
            name: req.body.name,
            last_name: req.body.last_name,
            address: req.body.address,
            phone_number: req.body.phone_number,
            birth_day: req.body.birth_day,
            username: req.body.username,
            password: hashed_password
        }).then(() =>{
            res.status(200).json({information_message: 'Se ha creado la persona con exito'})
        });
    });
};

const update_person = async (req, res) => {
    const session = jwt.decode(req.headers.token);
    if(session == null) {
        res.status(403).json({information_message: 'Error, usuario no autenticado'});
    }else{
        Person.update({
            name: req.body.name,
            last_name: req.body.last_name,
            address: req.body.address,
            phone_number: req.body.phone_number,
            birth_day: req.body.birth_day
        }, {
            where: {
                cui: session.cui
            }
        }).then(()=>{
            res.status(200).json({information_message: 'Se ha actualizado correctamente'});
        });
    }
};

const delete_person = async (req, res) => {

};

const get_person = async (req, res) => {
    const session = jwt.decode(req.headers.token);
    if(session == null){
        res.status(403).json({information_message: 'No posee permiso para acceder a esta información.'});
    }else{
        let person_promisse = Person.findOne({where:{cui: session.cui}});
        let achievements_promisse = Academic_Achievement.findAll({where:{cui: session.cui}, include: Institution});
        let areas_promisse = Area_Assignment.findAll({where:{cui: session.cui}, include: Performance_Area});
        Promise.all([person_promisse, achievements_promisse, areas_promisse]).then(values=>{
            res.status(200).json({
                person: values[0],
                achievements: values[1],
                areas: values[2]
            });
        });
    }
};

const get_all_people = async (req, res) => {
    Person.findAll({
        include:{
            model: Academic_Achievement, 
            order: [['year','DESC']],
            limit: 1
        }
    }).then(persons =>{
        res.status(200).json(persons);
    });
};

module.exports = {
    create_person,
    update_person,
    delete_person,
    get_person,
    get_all_people
}