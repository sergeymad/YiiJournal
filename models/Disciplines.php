<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplines".
 *
 * @property int $id
 * @property string $name
 * @property int $lecturer_id
 * @property int $year
 * @property int $semester
 * @property int $hours
 * @property int $credits
 * @property int $created_at
 * @property int $updated_at
 */
class Disciplines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disciplines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'created_at', 'updated_at'], 'required'],
            [['lecturer_id', 'year', 'semester', 'hours', 'credits', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'lecturer_id' => Yii::t('app', 'Lecturer ID'),
            'year' => Yii::t('app', 'Year'),
            'semester' => Yii::t('app', 'Semester'),
            'hours' => Yii::t('app', 'Hours'),
            'credits' => Yii::t('app', 'Credits'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
