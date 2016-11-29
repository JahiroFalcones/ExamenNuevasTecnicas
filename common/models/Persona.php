<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id
 * @property integer $departamento_id
 * @property string $nombres
 * @property string $apellidos
 * @property string $cedula
 *
 * @property Departamento $departamento
 * @property Producto[] $productos
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['departamento_id', 'nombres', 'apellidos', 'cedula'], 'required'],
            [['departamento_id'], 'integer'],
            [['nombres', 'apellidos'], 'string', 'max' => 50],
            [['cedula'], 'string', 'max' => 10],
            [['departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['departamento_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departamento_id' => 'Departamento ID',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'cedula' => 'Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['id' => 'departamento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['persona_id' => 'id']);
    }
}
