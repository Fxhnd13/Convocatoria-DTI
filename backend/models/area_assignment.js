const { sequelize } = require("../confs/credentials");
const { DataTypes } = require('sequelize');
const { Person } = require('./person');
const { Institution } = require("./institution");
const { Performance_Area } = require("./performance_area");

var Area_Assignment = sequelize.define(
    'area_assignment', {
        id_assignment: {
            type: DataTypes.INTEGER,
            primaryKey: true,
            allowNull: false,
            autoIncrement: true
        },
        id_area: {
            type: DataTypes.INTEGER,
            allowNull: false
        },
        cui: {
            type: DataTypes.BIGINT,
            allowNull: false
        }
    }, {
        timestamps: false,
        freezeTableName: true // Model tableName will be the same as the model name
    }
);

//----------------------------------------------------------------------------
Person.hasMany(Area_Assignment,{foreignKey: 'cui'});
Performance_Area.hasMany(Area_Assignment,{foreignKey: 'id_area'});
Area_Assignment.belongsTo(Person,{foreignKey: 'cui'});
Area_Assignment.belongsTo(Performance_Area,{foreignKey: 'id_area'});

module.exports = {
    Area_Assignment
}