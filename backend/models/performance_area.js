const { sequelize } = require("../db/credentials");
const { DataTypes } = require('sequelize');
const { Person } = require('./person');
const { Institution } = require("./institution");

var Performance_Area = sequelize.define(
    'performance_area', {
        id_area: {
            type: DataTypes.INTEGER,
            primaryKey: true,
            allowNull: false,
            autoIncrement: true
        },
        performance_area: {
            type: DataTypes.TEXT,
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
Person.hasMany(Performance_Area,{foreignKey: 'cui'});
Performance_Area.belongsTo(Person,{foreignKey: 'cui'});

module.exports = {
    Performance_Area
}