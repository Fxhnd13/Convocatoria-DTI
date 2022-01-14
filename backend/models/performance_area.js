const { sequelize } = require("../confs/credentials");
const { DataTypes } = require('sequelize');

var Performance_Area = sequelize.define(
    'performance_area', {
        id_area: {
            type: DataTypes.INTEGER,
            primaryKey: true,
            allowNull: false,
            autoIncrement: true
        },
        performance_area: {
            type: DataTypes.STRING(25),
            allowNull: false
        }
    }, {
        timestamps: false,
        freezeTableName: true // Model tableName will be the same as the model name
    }
);

module.exports = {
    Performance_Area
}