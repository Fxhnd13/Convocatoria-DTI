const { sequelize } = require("../confs/credentials");
const { DataTypes } = require('sequelize');
const { Person } = require('./person');
const { Institution } = require("./institution");

var Academic_Achievement = sequelize.define(
    'academic_achievement', {
        id_achievement: {
            type: DataTypes.INTEGER,
            primaryKey: true,
            allowNull: false,
            autoIncrement: true
        },
        year: {
            type: DataTypes.INTEGER,
            allowNull: false
        },
        tittle:{
            type: DataTypes.STRING(40),
            allowNull: false
        },
        cui: {
            type: DataTypes.BIGINT,
            allowNull: false
        },
        id_institution: {
            type: DataTypes.INTEGER,
            allowNull: false
        }
    }, {
        timestamps: false,
        freezeTableName: true // Model tableName will be the same as the model name
    }
);

//----------------------------------------------------------------------------
Person.hasMany(Academic_Achievement,{foreignKey: 'cui'});
Institution.hasMany(Academic_Achievement,{foreignKey: 'id_institution'});
Academic_Achievement.belongsTo(Person,{foreignKey: 'cui'});
Academic_Achievement.belongsTo(Institution,{foreignKey: 'id_institution'});

module.exports = {
    Academic_Achievement
}